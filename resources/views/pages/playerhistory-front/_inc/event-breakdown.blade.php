
    <div class="eventbreakdown">
        <h1>EVENT BREAKDOWN</h1>
        <div class="table2div">
            <table class="table2">
                <tr>
                    <td class="darkerred ">Year</td>
                    <td class="darkred">Event</td>
                    <td class="darkerred">Rules</td>
                    <td class="darkred">Round</td>
                    <td class="darkred">Score</td>
                    <td class="darkerred">Winner</td>
                </tr>
                @if(count($matches) > 0)
                    @foreach($matches as $match)
                        <tr class="darkwhite">
                            <td> {{ $match->year->format('Y-m-d') }} </td>
                            <td> {{ $match->tournament }} </td>
                            <td>{{ $match->rules }}</td>
                            <td>{{ $match->round }}</td>
                            <td>{{ $match->score_player_1 }}-{{ $match->score_player_2 }}</td>
                            <td> {{ $match->winner == $player2->id ? $player2->name : $player1->name }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr class="darkwhite">
                        <td colspan="6">No matches found</td>
                    </tr>
                @endif
            </table>
        </div>
    </div>

