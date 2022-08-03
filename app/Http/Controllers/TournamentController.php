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
            'rounds' => $request->rounds,
            'type' => $request->type
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
            'rounds' => $request->rounds,
            'winner' => $request->winner,
            'result' => $request->result
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
            $data['type'] = 'snooker';
        }

        $matches = Tournament::latest()
            ->whereDay('year', $data['date'])
            ->where('type', $data['type'])
            ->get();

        $matches = $matches->groupBy('tournament')->all();

        return view('pages.results.index', compact('matches'));
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
