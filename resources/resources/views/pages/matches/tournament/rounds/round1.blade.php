<div id="1" class="draw__round draw__round--first">
    <div class="draw__header">
        <div class="draw__label"> {!! $tournaments[0]['round'] !!} </div>
        <div id="mobShifter1" class="draw__arrow draw__arrow--next"></div>
    </div>
    <div class="draw__brackets ">
        @foreach($tournaments as $tournament)

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
                                    {{--                        <span class="bracket__info">(1)</span>--}}
                                </div>
                                <div class="bracket__result bracket__result--home">
                                    <div class="result "> {{ $tournament['score_player_1']  }} </div>
                                </div>
                                <div class="bracket__participant bracket__participant--away">
                        <span
                            class="bracket__name @if($tournament['winner'] == $tournament['player_2_id']) bracket__name--advancing @endif">
                            {{ $tournament['player_2']  }}
                        </span>
                                </div>
                                <div class="bracket__result bracket__result--away">
                                    <div class="result "> {{ $tournament['score_player_2']  }} </div>
                                </div>
                    </div>
                </div>
        @endforeach
                </div>
    </div>
