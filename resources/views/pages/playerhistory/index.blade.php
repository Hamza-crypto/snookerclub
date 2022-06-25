@extends('layouts.app')

@section('title', 'Players')

@section('scripts')
    <script>
        $(document).ready(function () {

            $("input[id=\"daterange\"]").daterangepicker({

                autoUpdateInput: false,
            }).on('apply.daterangepicker', function (ev, picker) {
                $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            }).on('cancel.daterangepicker', function (ev, picker) {
                $(this).val('');
            });

            $('.apply-dt-filters').on('click', function () {
                var p1 = $('#player1').val();
                var p2 = $('#player2').val();
                var url = "{{ route('homepage.index') }}";
                if (p1 != '' && p2 != '') {
                    url += '?player1=' + p1 + '&player2=' + p2;
                }
                window.location.href = url;
            });

            $('.clear-dt-filters').on('click', function () {
                $('#player1').val('-100').trigger('change');
                $('#player2').val('-100').trigger('change');

            });

        });
    </script>
@endsection

@section('content')
    @if(session('success'))
        <x-alert type="success">{{ session('success') }}</x-alert>
    @elseif(session('error'))
        <x-alert type="error">{{ session('error') }}</x-alert>
    @elseif(session('warning'))
        <x-alert type="warning">{{ session('warning') }}</x-alert>
    @endif


    {{--    <h1 class="h3 mb-3">All Vehicles</h1>--}}

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form>
                        <input type="hidden" class="d-none" name="filter" value="true" hidden>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="form-label" for="players"> Player 1 </label>
                                    <select name="player1" id="player1"
                                            class="form-control form-select custom-select select2"
                                            data-toggle="select2">
                                        <option value="-100"> Select Player</option>
                                        @foreach($players as $player)
                                            <option
                                                value="{{ $player->id  }}" {{ request()->player1 == $player->id ? 'selected' : '' }} >{{ $player->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="form-label" for="players"> Player 2 </label>
                                    <select name="player2" id="player2"
                                            class="form-control form-select custom-select select2"
                                            data-toggle="select2">
                                        <option value="-100"> Select Player</option>
                                        @foreach($players as $player)
                                            <option
                                                value="{{ $player->id  }}" {{ request()->player2 == $player->id ? 'selected' : '' }} >{{ $player->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm mt-4">
                                <button class="btn btn-pill btn-primary btn-lg apply-dt-filters">Show Head 2 Head
                                </button>

                                <button class="btn btn-pill btn-secondary clear-dt-filters">Clear</button>

                            </div>
                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped dataTable" style="width: 100%;">
                        <tbody>
                        <tr class="odd">
                            <th> {{ date('Y') - $player1->dob->format('Y') }} ( {{ $player1->dob->format('Y-m-d') }})
                            </th>
                            <td>Age</td>
                            <th> {{ date('Y') - $player2->dob->format('Y') }} ( {{ $player2->dob->format('Y-m-d') }})
                            </th>
                        </tr>

                        <tr class="even">
                            <th>{{ $player1->birth_place }}</th>
                            <td>Birthplace</td>
                            <th>{{ $player2->birth_place }}</th>
                        </tr>

                        <tr class="odd">
                            <th>{{ $player1->residence }}</th>
                            <td>Residence</td>
                            <th>{{ $player2->residence }}</th>
                        </tr>

                        <tr class="even">
                            <th>{{ $player1->plays_with }}</th>
                            <td>Plays</td>
                            <th>{{ $player2->plays_with }}</th>
                        </tr>

                        <tr class="odd">
                            <th>{{ $player1->professional_since }}</th>
                            <td>Professional since</td>
                            <th>{{ $player2->professional_since }}</th>
                        </tr>

                        <tr class="even">
                            <th>{{ $player1->won_lost }}</th>
                            <td>Won/lost</td>
                            <th>{{ $player2->won_lost }}</th>
                        </tr>

                        <tr class="odd">
                            <th>{{ $player1->titles }}</th>
                            <td> Titles</td>
                            <th>{{ $player2->titles }}</th>
                        </tr>

                        <tr class="even">
                            <th> ${{ $player1->earnings }}</th>
                            <td>Total Earnings</td>
                            <th> ${{ $player2->earnings }}</th>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-1"></div>
    </div>



    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <h1 class="h3 mb-3"> Event Breakdown</h1>
            <div class="card">
                <div class="card-body">
                    <div class="dt-buttons btn-group flex-wrap">


                        <table id="users-table" class="table table-striped" style="width:100%">
                            <thead>
                            <tr>
                                <th>{{ 'ID' }}</th>
                                <th>{{ 'VS' }}</th>
                                <th>{{ 'Year' }}</th>
                                <th>{{ 'Event' }}</th>
                                <th>{{ 'Rules' }}</th>
                                <th>{{ 'Round' }}</th>
                                <th>{{ 'Winner' }}</th>
                                <th>{{ 'Result' }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($matches) > 0)))
                            @foreach($matches as $match)
                                <tr>

                                    <td>{{ $match->id }}</td>
                                    <td>{{ $match->player_1  }} vs {{  $match->player_2  }} </td>
                                    <td>{{ $match->year }} </td>
                                    <td>{{ $match->tournament }}</td>
                                    <td>{{ $match->rules }}</td>
                                    <td>{{ $match->round }}</td>
                                    <td>{{ $match->winner }}</td>
                                    <td>{{ $match->result }}</td>

                                </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="8" class="text-center">No matches found</td>
                                </tr>
                            @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
@endsection


