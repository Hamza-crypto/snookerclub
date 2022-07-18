@foreach($matches as $key => $match)
{{--{{ dd($match) }}--}}
<div class="tour-nam">

    <div class="tounamnam"><h3 class="tour-h3">{{ $key }}</h3></div>


    <div class="rightt">
        <p style="padding-top: 1em; padding-left: 0.8em; margin: 0px;" class="text-right">
            <span class="drawbutton">Draw</span>
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
                <td rowspan="1">1</td>
                <td class="text-right"> {{ get_player_name($item->player_1) }} </td>
                <td>
                    <div class="row odds-parent">
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
                            <span class="score"> {{ explode(' ', $item->result ?? '- -')[0] ?? '-' }}  </span>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center"><abbr class="versus" title="Versus">v</abbr>
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
