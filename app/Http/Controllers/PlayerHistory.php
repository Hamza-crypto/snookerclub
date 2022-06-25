<?php

namespace App\Http\Controllers;

use App\Models\Match;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerHistory extends Controller
{

    public function index()
    {


        $data = request()->all();
        $player1 = Player::findOrFail($data['player1']);
        $player2 = Player::findOrFail($data['player2']);

        $players = Player::all();

        $matches = Match::whereIn('player_1',[$player1->id, $player2->id] )
            ->WhereIn('player_2',[$player1->id, $player2->id] )
            ->get();

//        dd($matches->toArray());

        return view('pages.playerhistory.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
