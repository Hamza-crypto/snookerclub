<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Models\Player;

class PlayerHistory extends Controller
{
    public function index()
    {
        $data = request()->all();

        $graph_data = ['labels' => [], 'data' => [ 1, 1]];

        if(!(isset($data['player1']) && $data['player1'] != -100 && isset($data['player2']) && $data['player2'] != -100)){ // if player1 is set, then we are looking for a match
            $player1 = null;
            $player2 = null;
        }
        else{

            $player1 = Player::find($data['player1']);
            $player2 = Player::find($data['player2']);

            $player1_wins = 0;
            $player2_wins = 0;
            $graph_data['labels'] = [ sprintf("%s (%d wins)", $player2->name,$player2_wins ) , sprintf("%s (%d wins)", $player1->name,$player1_wins ) ];

            $matches = Tournament::WhereIn('player_1',[$player1->id, $player2->id] )
                ->WhereIn('player_2',[$player1->id, $player2->id] )
                ->Where('type', $data['type'] )
                ->get();


            if(count($matches) > 0 ){
                $player1_wins = $matches->where('winner', $data['player1'])->count();
                $player2_wins = $matches->where('winner', $data['player2'])->count();
//dd($player1_wins, $player2_wins);
                try {
                    $player1_win_percentage = ($player1_wins / ($player1_wins + $player2_wins)) * 100;
                    $player2_win_percentage = ($player2_wins / ($player1_wins + $player2_wins)) * 100;
                }
                catch (\Exception $e) {
                    $player1_win_percentage = 0;
                    $player2_win_percentage = 0;
                }


                $graph_data = [
                    'labels' => [ sprintf("%s (%d wins)", $player2->name,$player2_wins ) , sprintf("%s (%d wins)", $player1->name,$player1_wins ) ],
                    'data' => [$player2_wins, $player1_wins]
                ];
            }
        }


        $players = Player::all();


//        dd($graph_data['labels'], $player1_win_percentage, $player2_win_percentage);

        return view('pages.playerhistory.index', get_defined_vars(), $graph_data);
    }

}
