<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Models\Player;
use Illuminate\Http\Request;
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
            'rounds' => $request->rounds
        ]);

        Session::flash('success', 'Tournament successfully added.');
        return redirect()->route('matches.create');
    }

    public function show(Tournament $match)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tournament  $match
     * @return \Illuminate\Http\Response
     */
    public function edit(Tournament $match)
    {
        return view('pages.matches.edit', compact('match'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tournament  $match
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tournament  $match
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tournament $match)
    {
        $match->delete();
        Session::flash('success', 'Tournament deleted successfully.');
        return redirect()->route('matches.index');
    }

}
