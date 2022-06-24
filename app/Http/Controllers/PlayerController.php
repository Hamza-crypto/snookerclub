<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PlayerController extends Controller
{

    public function index()
    {

        $players = Player::latest()->get();
        return view('pages.players.index', compact('players'));
    }


    public function create()
    {
        return view('pages.players.add');
    }


    public function store(Request $request)
    {
        // upload photo
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('players'), $fileName);
        } else {
            $fileName = null;
        }
        Player::create(
            [
                'name' => $request->name,
                'dob' => $request->dob,
                'birth_place' => $request->birth_place,
                'image' => $fileName,
            ]);

        Session::flash('success', 'Player successfully added.');
        return redirect()->route('playerss.create');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        //
    }

    public function destroy(Player $player)
    {
        $player->delete();
        Session::flash('success', 'Player deleted successfully.');
        return redirect()->route('playerss.index');
    }
}
