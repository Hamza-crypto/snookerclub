@php
$player_1_name = get_player_name($match->player_1);
$player_2_name = get_player_name($match->player_2);
@endphp
<div class="tab-pane fade playerform match" id="playerform" role="tabpanel" aria-labelledby="nav-profile-tab">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active tabBtns" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#player1"
                    type="button" role="tab" aria-controls="nav-History" aria-selected="true" style="height: 40px;"> {{ $player_1_name }}
            </button>
            <button class="nav-link tabBtns" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#player2"
                    type="button" role="tab" aria-controls="nav-profile" aria-selected="false" style="height: 40px;"> {{ $player_2_name }}
            </button>
        </div>
    </nav>
    <div class="w-100">
        <div class="tab-pane fade show active" id="player1" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="headsection text-start">
                Last matches: {{ $player_1_name }}
            </div>
            <div class="w-100 d-flex justify-content-center align-items-center flex-column">
                @foreach($player1_all_matches as $player1_match)
                    <a href="#play1" class="events col-12 d-flex align-items-center">
                        <div class="col-2" style="margin-left: 6px;"> {{ $player1_match->year->format('Y-m-d') }} </div>
                        <div class="col-2" style="gap:10px">
                            <!-- <img src="https://www.flashscore.com/res/_fs/build/nirl.dab832b.png" width="18px" height="12px" />
                            <span>NIO</span> -->
                        </div>
                        <div class="col-4 d-flex flex-column flex-wrap">
                            <div class="col-12 d-flex align-items-center" style="gap:5px">
                                <!-- <img src="https://www.flashscore.com/res/_fs/build/nirl.dab832b.png" width="18px" height="12px" /> -->
                                <span
                                    class="sameplayer @if($player1_match->player_1 == $match->player_1) lost @endif  @if($player1_match->player_1 != $player1_match->winner) font_light @endif"> {{ get_player_name($player1_match->player_1) }} </span>
                            </div>
                            <div class="col-12 d-flex align-items-center" style="gap:5px">
                                <!-- <img src="https://www.flashscore.com/res/_fs/build/nirl.dab832b.png" width="18px" height="12px" /> -->
                                <span
                                    class="sameplayer @if($player1_match->player_2 == $match->player_1) lost @endif  @if($player1_match->player_2 != $player1_match->winner) font_light @endif">{{ get_player_name($player1_match->player_2) }}</span>
                            </div>
                        </div>
                        <div class="col-2 d-flex flex-column flex-wrap">
                            <div
                                @if($player1_match->player_1 == $player1_match->winner) style="font-weight: 900;" @endif> {{ $player1_match->score_player_1 }} </div>
                            <div
                                @if($player1_match->player_2 == $player1_match->winner) style="font-weight: 900;" @endif> {{ $player1_match->score_player_2 }} </div>
                        </div>
                        @if($player1_match->winner)
                            <div class="ml-auto tags">
                                {{--                                show winner with respect to player 2 of current match--}}
                                @if($match->player_1 == $player1_match->winner)
                                    <div class="Tag greenTag">W</div>
                                @else
                                    <div class="Tag redTag">L</div>
                                @endif
                            </div>
                        @endif
                    </a>
                @endforeach

            </div>
        </div>
        <div class="tab-pane fade" id="player2" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="headsection text-start">
                Last matches: {{ $player_2_name }}
            </div>
            <div class="w-100 d-flex justify-content-center align-items-center flex-column">
                @foreach($player2_all_matches as $player2_match)
                    <a href="#play1" class="events col-12 d-flex align-items-center">
                        <div class="col-1" style="margin-left: 6px;">{{ $player2_match->year->format('Y-m-d') }}</div>
                        <div class="col-2" style="gap:10px">
                            <!-- <img src="https://www.flashscore.com/res/_fs/build/nirl.dab832b.png" width="18px" height="12px" />
                            <span>NIO</span> -->
                        </div>
                        <div class="col-4 d-flex flex-column flex-wrap">
                            <div class="col-12 d-flex align-items-center" style="gap:5px">
                                <!-- <img src="https://www.flashscore.com/res/_fs/build/nirl.dab832b.png" width="18px" height="12px" /> -->
                                <span
                                    class="sameplayer @if($player2_match->player_1 == $match->player_2) lost @endif  @if($player2_match->player_1 != $player2_match->winner) font_light @endif"> {{ get_player_name($player2_match->player_1) }} </span>
                            </div>
                            <div class="col-12 d-flex align-items-center" style="gap:5px">
                                <!-- <img src="https://www.flashscore.com/res/_fs/build/nirl.dab832b.png" width="18px" height="12px" /> -->
                                <span
                                    class="sameplayer @if($player2_match->player_2 == $match->player_2) lost @endif  @if($player2_match->player_2 != $player2_match->winner) font_light @endif">{{ get_player_name($player2_match->player_2) }}</span>
                            </div>
                        </div>

                        <div class="col-2 d-flex flex-column flex-wrap">
                            <div
                                @if($player2_match->player_1 == $player2_match->winner) style="font-weight: 900;" @endif> {{ $player2_match->score_player_1 }} </div>
                            <div
                                @if($player2_match->player_2 == $player2_match->winner) style="font-weight: 900;" @endif> {{ $player2_match->score_player_2 }} </div>
                        </div>


                        @if($player2_match->winner)
                            <div class="ml-auto tags">
                                {{-- show winner with respect to player 2 of current match--}}
                                @if($match->player_2 == $player2_match->winner)
                                    <div class="Tag greenTag">W</div>
                                @else
                                    <div class="Tag redTag">L</div>
                                @endif
                            </div>
                        @endif
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

