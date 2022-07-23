<section class="section4">
    <table class="table1">
        <tr>
            <td class="darkerwhite"> {{ date('Y') - $player1->dob->format('Y') }} ( {{ $player1->dob->format('Y-m-d') }}) </td>
            <td class="darkred">AGE</td>
            <td class="darkerwhite">  {{ date('Y') - $player2->dob->format('Y') }} ( {{ $player2->dob->format('Y-m-d') }})
            </td>
        </tr>
        <tr>
            <td class="darkwhite"> {{ $player1->birth_place }} </td>
            <td class="darkerred">BIRTHPLACE</td>
            <td class="darkwhite"> {{ $player2->birth_place }} </td>
        </tr>
        <tr>
            <td class="darkerwhite"> {{ $player1->residence }} </td>
            <td class="darkred">RESIDENCE</td>
            <td class="darkerwhite"> {{ $player2->residence }} </td>
        </tr>
        <tr>
            <td class="darkwhite"> {{ $player1->plays_with }} </td>
            <td class="darkerred">PLAYS</td>
            <td class="darkwhite"> {{ $player2->plays_with }} </td>
        </tr>
        <tr>
            <td class="darkerwhite"> {{ $player1->professional_since }} </td>
            <td class="darkred">PROFFESIONAL SINCE</td>
            <td class="darkerwhite"> {{ $player2->professional_since }} </td>
        </tr>

        @if( !isset(request()->type) || request()->type == 'snooker')
            <tr>
                <td class="darkerwhite"> {{ $player1->highest_break }} </td>
                <td class="darkred">HIGHEST BREAK</td>
                <td class="darkerwhite"> {{ $player2->highest_break }} </td>
            </tr>
        @endif



        <tr>
            <td class="darkwhite">{{ $player1->won_lost }}</td>
            <td class="darkerred">WON/LOST</td>
            <td class="darkwhite"> {{ $player2->won_lost }} </td>
        </tr>
        <tr>
            <td class="darkerwhite"> {{ $player1->titles }} </td>
            <td class="darkred">TITLES</td>
            <td class="darkerwhite"> {{ $player2->titles }} </td>
        </tr>
        <tr>
            <td class="darkwhite"> {{ $player1->earnings }} MAD </td>
            <td class="darkerred">TOTAL EARNINGS</td>
            <td class="darkwhite"> {{ $player2->earnings }} MAD</td>
        </tr>
    </table>
</section>
