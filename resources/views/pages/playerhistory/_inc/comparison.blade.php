<div class="row">
{{--    <div class="col-1"></div>--}}
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped dataTable table-responsive-sm" style="width: 100%;">
                    <tbody>
                    <tr>
                        <th> {{ date('Y') - $player1->dob->format('Y') }} ( {{ $player1->dob->format('Y-m-d') }})
                        </th>
                        <td>Age</td>
                        <th> {{ date('Y') - $player2->dob->format('Y') }} ( {{ $player2->dob->format('Y-m-d') }})
                        </th>
                    </tr>

                    <tr>
                        <th>{{ $player1->birth_place }}</th>
                        <td>Birthplace</td>
                        <th>{{ $player2->birth_place }}</th>
                    </tr>

                    <tr>
                        <th>{{ $player1->residence }}</th>
                        <td>Residence</td>
                        <th>{{ $player2->residence }}</th>
                    </tr>

                    <tr>
                        <th>{{ $player1->plays_with }}</th>
                        <td>Plays</td>
                        <th>{{ $player2->plays_with }}</th>
                    </tr>

                    <tr>
                        <th>{{ $player1->professional_since }}</th>
                        <td>Professional since</td>
                        <th>{{ $player2->professional_since }}</th>
                    </tr>

                    @if( request()->type == '8-pool' )
                        <tr>
                            <th>{{ $player1->highest_break }}</th>
                            <td>Highest Break</td>
                            <th>{{ $player2->highest_break }}</th>
                        </tr>
                    @endif


                    <tr>
                        <th>{{ $player1->won_lost }}</th>
                        <td>Won/lost</td>
                        <th>{{ $player2->won_lost }}</th>
                    </tr>

                    <tr>
                        <th>{{ $player1->titles }}</th>
                        <td> Titles</td>
                        <th>{{ $player2->titles }}</th>
                    </tr>

                    <tr >
                        <th> ${{ $player1->earnings }}</th>
                        <td>Total Earnings</td>
                        <th> ${{ $player2->earnings }}</th>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
{{--    <div class="col-1"></div>--}}
</div>
