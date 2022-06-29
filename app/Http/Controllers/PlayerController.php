<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('players'), $image_name);
//            $path = Storage::disk('s3')->put('players', $request->image, 'public');
        } else {
            $image_name = null;
        }


        $year = substr($request->professional_since, 0, 4);

        Player::create([
            'name' => $request->name,
            'dob' => $request->dob,
            'birth_place' => $request->birth_place,
            'residence' => $request->residence,
            'plays_with' => $request->plays_with,
            'professional_since' => $year,
            'won_lost' => $request->won_lost,
            'titles' => $request->titles,
            'earnings' => $request->earnings,
            'image' => $image_name,
        ]);

        Session::flash('success', 'Player successfully added.');
        return redirect()->route('admin.players.create');


    }

    public function destroy(Player $player)
    {
        $player->delete();
        Session::flash('success', 'Player deleted successfully.');
        return redirect()->route('admin.players.index');
    }
}
