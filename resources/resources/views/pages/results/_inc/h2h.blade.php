<div class="tab-pane fade playerform match" id="h2h" role="tabpanel" aria-labelledby="nav-contact-tab">
    <div class="w-100">
        <div>
            <div class="headsection text-start">
                Head-to-head matches
            </div>
            @foreach($matches as $match)
                <div class="w-100 d-flex justify-content-center align-items-center flex-column">
                    <a href="#play1" class="events col-12 d-flex align-items-center">
                        <div class="col-2" style="margin-left: 6px;">{{ $match->year->format('Y-m-d') }}</div>
                        <div class="col-2" style="gap:10px">
                            <!-- <img src="https://www.flashscore.com/res/_fs/build/nirl.dab832b.png" width="18px" height="12px" />
                            <span>NIO</span> -->
                        </div>
                        <div class="col-4 d-flex flex-column flex-wrap">
                            <div class="col-12 d-flex align-items-center" style="gap:5px">
                                <!-- <img src="https://www.flashscore.com/res/_fs/build/nirl.dab832b.png" width="18px" height="12px" /> -->
                                <span @if($match->player_1 == $match->winner) style="font-weight: 900;" @endif> {{ get_player_name($match->player_1) }} </span>
                            </div>
                            <div class="col-12 d-flex align-items-center" style="gap:5px">
                                <!-- <img src="https://www.flashscore.com/res/_fs/build/nirl.dab832b.png" width="18px" height="12px" /> -->
                                <span @if($match->player_2 == $match->winner) style="font-weight: 900;" @endif> {{ get_player_name($match->player_2) }} </span>
                            </div>
                        </div>
                        <div class="col-2 d-flex flex-column flex-wrap">
                            <div @if($match->player_1 == $match->winner) style="font-weight: 900;" @endif> {{ $match->score_player_1 }} </div>
                            <div @if($match->player_2 == $match->winner) style="font-weight: 900;" @endif> {{ $match->score_player_2 }} </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
