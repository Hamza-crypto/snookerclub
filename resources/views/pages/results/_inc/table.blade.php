@foreach($matches as $key => $match)
    <div class="tour-nam">

        <div class="tounamnam"><h3 class="tour-h3">{{ $key }}</h3></div>


        <div class="rightt">
            <p style="padding-top: 1em; padding-left: 0.8em; margin: 0px;" class="text-right">

                <a class="drawbutton" style="color: white;" href="{{ $match[0]->draw_url }}">
                    Draw
                </a>

            </p>
        </div>

    </div>

    <div class="tablediv">
        <table class="table table-responsive data matches-round" id="round1">
            <colgroup>
                <col class="col-1">
                <col class="col-2">
                <col class="col-3">
                <col class="col-4">
                <!-- <col class="col-5"> -->
            </colgroup>
            <thead>
            <tr>
                <th class="text-uppercase"><span class="tbl-hd-label"><abbr title="Number">#</abbr></span></th>
                <th class="text-uppercase"><span class="tbl-hd-label">Player 1</span></th>
                <th class="text-uppercase"></th>
                <th class="text-uppercase"><span class="tbl-hd-label">Player 2</span></th>
            </tr>
            </thead>
            <tbody>

            @foreach($match as $item)

                <tr class="odd">
                    @if ($loop->iteration % 2 == 0)

                        <td rowspan="1" style="background: #ff2c2c !important;"> {{ $item->year->format('H:i') }}</td>
                    @else
                        <td rowspan="1"> {{ $item->year->format('H:i') }}</td>
                    @endif
                    <td class="text-right"> {{ get_player_name($item->player_1) }} </td>
                    <td>
                        <div class="row odds-parent">
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
                                <span class="score"> {{ explode(' ', $item->result ?? '- -')[0] ?? '-' }}  </span>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center"><abbr class="versus"
                                                                                               title="Versus">v</abbr>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-left">
                                <span class="score"> {{ explode(' ', $item->result ?? '- -')[1] ?? '-' }} </span>
                            </div>
                        </div>
                    </td>
                    <td class="text-left"> {{ get_player_name($item->player_2) }} </td>

                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endforeach

@if(count($matches) == 0)

    <div class="tablediv">
        <table class="table table-responsive data matches-round" id="round1">
            <colgroup>
                <col class="col-1">
            </colgroup>
            <thead>
            <tr>
                <th><span class="tbl-hd-label">No matches planned for this date</span></th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@endif
