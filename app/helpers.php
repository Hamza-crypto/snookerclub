<?php

use Illuminate\Support\Facades\Storage;

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

function get_img_url($key)
{
    if (str_contains($key, 'https')) {
        return $key;
    } else {
        return Storage::disk('s3')->url($key);
    }

}
