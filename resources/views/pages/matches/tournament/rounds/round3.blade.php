<div id="3" class="draw__round ">
    <div class="draw__header">
        <div class="draw__arrow draw__arrow--previous"></div>
        <div class="draw__label"> {!! $third_round[0]['round'] !!} </div>
        <div class="draw__arrow draw__arrow--next"></div>
    </div>
    <div class="draw__brackets ">
        @foreach($third_round as $tournament)
            @if( $loop->iteration % 2 == 0 )
                <div class="draw__bracket draw__bracket--even" style="--zIndex:0;">
                    @else
                        <div class="draw__bracket draw__bracket--odd" style="--zIndex:0;">
                            @endif
                            <div class="bracket    " title="Click to view a list of matches">
                                <div class="bracket__participant bracket__participant--home">
                                                            <span
                                                                class="bracket__name @if($tournament['winner'] == $tournament['player_1_id']) bracket__name--advancing @endif">
                                                                {{ $tournament['player_1']  }}
                                                            </span>
                                </div>
                                <div class="bracket__result bracket__result--home">
                                    <div class="result "> {{ $tournament['score_player_1'] == 0 ? '' : $tournament['score_player_1']  }} </div>
                                </div>
                                <div class="bracket__participant bracket__participant--away">
                                    <span class="bracket__name @if($tournament['winner'] == $tournament['player_2_id']) bracket__name--advancing @endif"> {{ $tournament['player_2']  }}</span>
                                </div>
                                <div class="bracket__result bracket__result--away">
                                    <div class="result "> {{ $tournament['score_player_2'] == 0 ? '' : $tournament['score_player_2']  }} </div>
                                </div>
                            </div>

                        </div>
                        @endforeach
                </div>
    </div>
