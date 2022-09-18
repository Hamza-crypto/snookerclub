<?php

namespace App\Observers;

use App\Models\Tournament;
use App\Models\TournamentFrames;
use Carbon\Carbon;

class TournamentObserver
{
    public function updated(Tournament $match)
    {
        $increment_for_break_and_run_for_player = '';
        $should_increment_for_break_and_run = false;
        $create_new_entry_for_frame = false;

        if ($match->isDirty('score_player_1')) {
            $newPlayer1 = $match->score_player_1;
            $increment_in_score = 1;
            $create_new_entry_for_frame = true;
        }
        if ($match->isDirty('score_player_2')) {
            $newPlayer2 = $match->score_player_2;
            $increment_in_score = 2;
            $create_new_entry_for_frame = true;
        }

        if ($match->isDirty('break_run_player_1')) {
            $newPlayer1 = $match->score_player_1;
            $increment_for_break_and_run_for_player = 'score_player_1';
            $should_increment_for_break_and_run = true;
            $increment_in_score = 1;
        }
        if ($match->isDirty('break_run_player_2')) {
            $newPlayer2 = $match->score_player_2;
            $increment_for_break_and_run_for_player = 'score_player_2';
            $should_increment_for_break_and_run = true;
            $increment_in_score = 2;
        }

        $data = [
            'tournament_id' => $match->id,
            'score_player_1' => $newPlayer1 ?? $match->score_player_1,
            'score_player_2' => $newPlayer2 ?? $match->score_player_2,
            'break_run_player_1' => $increment_for_break_and_run_for_player == 'score_player_1' ? 1 : 0,
            'break_run_player_2' => $increment_for_break_and_run_for_player == 'score_player_2' ? 1 : 0,
            'increment_in_score' => $increment_in_score ?? null,
        ];

        if ($should_increment_for_break_and_run) {
            Tournament::where('id', $match->id)
                ->increment($increment_for_break_and_run_for_player);

            $data[$increment_for_break_and_run_for_player] = $data[$increment_for_break_and_run_for_player] + 1;
            TournamentFrames::create($data);

        }

        if ($create_new_entry_for_frame) {
            TournamentFrames::create($data);
        }

        // Time Related stuff
        if ($match->isDirty('status')) {
            if($match->status == Tournament::KEY_ACTION_STARTED) {
                $dateTime = Carbon::now();
                $dateTime = $dateTime->setTime(
                    $dateTime->format('H'),
                    round($dateTime->format('i') / 5) * 5,
                    0
                );
                Tournament::where('id', $match->id)->update([
                    'start_time' => time(),
                    'year' => $dateTime,
                ]);
            }

            if(in_array($match->status, [Tournament::KEY_ACTION_INTERRUPTED, Tournament::KEY_ACTION_BREAK])  ) {
                $previous_total_time = (int)$match->total_time;

                $startTime = $match->start_time;
                $endTime = time();

                $totalDuration = $endTime - $startTime;
                if($startTime == 0) {
                    $totalDuration = 0;
                }

                Tournament::where('id', $match->id)->update([
                    'total_time' => $previous_total_time + $totalDuration,
                    'start_time' => 0,
                ]);
            }

            if($match->status == Tournament::KEY_ACTION_RESUMED) {
                Tournament::where('id', $match->id)->update([
                    'start_time' => time()
                ]);
            }

            if($match->status == Tournament::KEY_ACTION_FINISHED) {
                $previous_total_time = (int)$match->total_time;

                $startTime = $match->start_time;
                $endTime = time();

                $totalDuration = $endTime - $startTime;
                if($startTime == 0) {
                    $totalDuration = 0;
                }

                Tournament::where('id', $match->id)->update([
                    'total_time' => $previous_total_time + $totalDuration,
                    'start_time' => 0,
                ]);
            }
        }

    }
}
