<?php

function order_activity($title , $order) {
    $order->activities()->create([
        "order_id" => $order->id,
        "title" => $title,

    ]);
}

function get_player_name($id ) {

    $player = \App\Models\Player::select('name')
        ->where('id',$id )
        ->first();

    try {
        return $player['name'];
    }
    catch (\Exception $e) {
        return "---";
    }

}
