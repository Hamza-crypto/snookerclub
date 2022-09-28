<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class TournamentController extends Controller
{

    public function index()
    {
        $matches = Tournament::latest()->get();
        return view('pages.matches.index', compact('matches'));
    }

    public function create()
    {
        $players = Player::latest()->get();
        return view('pages.matches.add', compact('players'));
    }


    public function store(Request $request)
    {
        // create match
        Tournament::create([
            'player_1' => $request->player_1,
            'player_2' => $request->player_2,
            'year' => $request->year,
            'tournament' => $request->tournament,
            'rules' => $request->rules,
            'round' => $request->round,
            'type' => $request->type,
            'status' => Tournament::KEY_ACTION_CREATED,
            'draw_url' => $request->draw_url,
            'score_player_1' => 0,
            'score_player_2' => 0
        ]);

        Session::flash('success', 'Tournament successfully added.');
        return redirect()->route('matches.create');
    }

    public function edit(Tournament $match)
    {
        return view('pages.matches.edit', compact('match'));
    }

    public function update(Request $request, Tournament $match)
    {
        //update match
        $match->update([
            'round' => $request->round,
            'winner' => $request->winner == -100 ? null : $request->winner,
            'score_player_1' => $request->score_player_1,
            'score_player_2' => $request->score_player_2,
            'break_run_player_1' => $request->break_and_run_player_1,
            'break_run_player_2' => $request->break_and_run_player_2,
            'status' => $request->status
        ]);

        Session::flash('success', 'Successfully updated.');
        return back();

    }

    public function destroy(Tournament $match)
    {
        $match->frames()->delete();
        $match->delete();
        Session::flash('success', 'Tournament deleted successfully.');
        return redirect()->route('matches.index');
    }

    public function results2()
    {
        $matches = Tournament::latest()
            ->whereDate('year', Carbon::today())
            ->get();

        return view('pages.matches.results', compact('matches'));
    }

    public function results()
    {
        return view('pages.results.index');
    }
    public function results_api()
    {
        $data = request()->all();

        if (!isset($data['type'])) {
            $data['type'] = '8-pool';
        }

        $matches = Tournament::oldest('year')->where('type', $data['type']);
        if (isset($data['date'])) {
            $matches = $matches->whereMonth('year', $data['month'])->whereDay('year', $data['date']);
        } else {
            $matches = $matches->whereDate('year', Carbon::today());
        }

        $matches = $matches->get();

        $matches = $matches->groupBy('tournament')->all();

        foreach ($matches as $key => $match) {

            $match = $match->map(function ($item, $key) {
                return [
                    'id' => $item->id,
                    'player_1' => get_player_name($item->player_1),
                    'player_1_id' => $item->player_1,
                    'player_2' => get_player_name($item->player_2),
                    'player_2_id' => $item->player_2,
                    'round' => $item->round,
                    'year' => $item->year->format('H:i'),
                    'score_player_1' => $item->status == 0 ? '-' : $item->score_player_1,
                    'score_player_2' => $item->status == 0 ? '-' : $item->score_player_2,
                    'winner' => $item->winner,
                    'draw_url' => $item->draw_url
                ];
            });

            $matches[$key] = $match->groupBy('round')->all();
        }

        return response()->json($matches);
    }

    public function results_details(Tournament $match)
    {
        $player_1 = $match->player_1;
        $player_2 = $match->player_2;

        $players = [$match->player_1, $match->player_2];

        $matches = Tournament::WhereIn('player_1', $players)
            ->WhereIn('player_2', $players)
            ->Where('type', $match->type)
            ->get();

        $player1_all_matches = Tournament::Where('type', $match->type)->latest('year');

        if ($match->status != Tournament::KEY_ACTION_FINISHED) {
            $player1_all_matches->where('id', '!=', $match->id);
        }

        $player1_all_matches = $player1_all_matches->where(function ($q) use ($player_1) {
            $q->where('player_1', $player_1)
                ->orWhere('player_2', $player_1);
        })->get();

        $player2_all_matches = Tournament::Where('type', $match->type)->latest('year');

        if ($match->status != Tournament::KEY_ACTION_FINISHED) {
            $player2_all_matches->where('id', '!=', $match->id);
        }
        $player2_all_matches = $player2_all_matches->where(function ($q) use ($player_2) {
                $q->where('player_1', $player_2)
                    ->orWhere('player_2', $player_2);
            })->get();

        // update time
        $previous_total_time = (int)$match->total_time;

        $startTime = $match->start_time;
        $endTime = time();

        $totalDuration = $endTime - $startTime;
        if ($startTime == 0) {
            $totalDuration = 0;
        }
        $match->total_time = $previous_total_time + $totalDuration;

        return view('pages.results.match_detail', get_defined_vars());
    }

    public function results_details_frames_api(Tournament $match)
    {
        $frames = $match->load('frames');
        $frames = $frames->frames;

        $status = '';
        if (in_array($match->status, [1, 4])) {
            $status = 'LIVE';
        } else if ($match->status == 2) {
            $status = 'Interrupted';
        } else if ($match->status == 3) {
            $status = 'Break';
        } else if ($match->status == 5) {
            $status = 'Finished';
        }

        return response()->json([
            'frames' => $frames,
            'score' => $match->score_player_1 . ' - ' . $match->score_player_2,
            'status' => $status
        ]);
    }


    public function contact()
    {
        return view('pages.contact.index');
    }

    public function about()
    {
        return view('pages.about.index');
    }

    public function send_email(Request $request)
    {
        Mail::to('6793siddique@gmail.com')
            ->send(new \App\Mail\NewContact($request->all()));

        $submit = true;
        return view('pages.contact.index', compact('submit'));
    }
}
