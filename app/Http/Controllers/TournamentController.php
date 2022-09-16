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
        $data = request()->all();

        if(!isset($data['date'])){
            $data['date'] = Carbon::today();
        }
        if(!isset($data['type'])){
            $data['type'] = '8-pool';
        }

        $matches = Tournament::oldest('year')
            ->whereDay('year', $data['date'])
            ->where('type', $data['type'])
            ->get();

        $matches = $matches->groupBy('tournament')->all();

        foreach ($matches as $key => $match){
            $matches[$key] = $match->groupBy('round')->all();
        }

        return view('pages.results.index', compact('matches'));
    }

    public function results_details(Tournament $match)
    {
        $frames = $match->load('frames');
        $frames = $frames->frames;

        $player_1 = $match->player_1;
        $player_2 = $match->player_2;

        $players = [$match->player_1, $match->player_2];

        $matches = Tournament::with('frames')
            ->WhereIn('player_1', $players)
            ->WhereIn('player_2', $players)
            ->Where('type', $match->type)
            ->get();

//        dump($frames->toArray());

        $player1_all_matches = Tournament::Where('type', $match->type)
            ->where(function ($q) use ($player_1) {
                $q->where('player_1', $player_1)
                    ->orWhere('player_2', $player_1);
            })->get();

        $player2_all_matches = Tournament::Where('type', $match->type)
            ->where(function ($q) use ($player_2) {
                $q->where('player_1', $player_2)
                    ->orWhere('player_2', $player_2);
            })->get();

        // update time
        $previous_total_time = (int)$match->total_time;

        $startTime = $match->start_time;
        $endTime = time();

        $totalDuration = $endTime - $startTime;
        if($startTime == 0) {
            $totalDuration = 0;
        }
        $match->total_time = $previous_total_time + $totalDuration;

        return view('pages.results.match_detail', get_defined_vars());
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
