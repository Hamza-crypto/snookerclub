@extends('layouts.app')

@section('title', 'Add Match')

@section('scripts')
    <script>
        $(document).ready(function () {

            $(".daterange").daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                startDate: moment(),
                locale: {
                    format: "Y-MM-DD"
                }
            });

        });

    </script>

@endsection
@section('content')

    <h1 class="h3 mb-3">Add New Match </h1>

    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    @if(session('success'))
                        <x-alert type="success">{{ session('success') }}</x-alert>
                    @endif
                    @if(session('error'))
                        <x-alert type="danger">{{ session('error') }}</x-alert>
                    @endif
                    @if(session('warning'))
                        <x-alert type="warning">{{ session('warning') }}</x-alert>
                    @endif

                    <form method="post" action="{{ route('matches.store') }}" >
                        @csrf

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="tournament">Tournament</label>
                                    <input
                                        class="form-control form-control-lg"
                                        type="text"
                                        name="tournament"
                                        placeholder="Enter match title"
                                    />
                                </div>

                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="year">Year</label>

                                    <input
                                        class="form-control form-control-lg daterange"
                                        type="text"
                                        name="year"
                                    />

                                </div>

                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="form-label" for="players"> Player 1 </label>
                                    <select name="player_1" id="player1"
                                            class="form-control form-select custom-select select2"
                                            data-toggle="select2">
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
                                    <select name="player_2" id="player2"
                                            class="form-control form-select custom-select select2"
                                            data-toggle="select2">
                                        @foreach($players as $player)
                                            <option
                                                value="{{ $player->id  }}" {{ request()->player2 == $player->id ? 'selected' : '' }} >{{ $player->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="rules">Rules</label>
                                    <input
                                        class="form-control form-control-lg"
                                        type="text"
                                        name="rules"
                                        placeholder="Enter rules"
                                    />
                                </div>

                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="rounds">Rounds</label>
                                    <input
                                        class="form-control form-control-lg"
                                        type="text"
                                        name="round"
                                        placeholder="Enter rounds"
                                    />
                                </div>

                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="form-label" for="type"> Select type </label>
                                    <select name="type" id="type"
                                            class="form-control form-select custom-select select2"
                                            data-toggle="select2">
                                            <option value="snooker" selected> Snooker </option>
                                            <option value="8-pool"> 8-Pool </option>

                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <button type="submit" id="add" class="btn btn-lg btn-primary">Add New
                                Match
                            </button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>





@endsection
