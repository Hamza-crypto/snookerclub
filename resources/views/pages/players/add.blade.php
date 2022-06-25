@extends('layouts.app')

@section('title', 'Add Player')

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

    <h1 class="h3 mb-3">Add New Vehicle </h1>

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

                    <form method="post" action="{{ route('admin.players.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="number">Name</label>
                                    <input
                                        class="form-control form-control-lg"
                                        type="text"
                                        name="name"
                                        placeholder="Enter player name"
                                    />
                                </div>

                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="number">DOB</label>

                                    <input
                                        class="form-control form-control-lg daterange"
                                        type="text"
                                        name="dob"
                                    />

                                </div>

                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="number">Birth Place</label>
                                    <input
                                        class="form-control form-control-lg"
                                        type="text"
                                        name="birth_place"
                                        placeholder="Enter birth place"
                                    />

                                </div>

                            </div>

                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="number">Profile photo</label>
                                    <input
                                        type="file"
                                        name="image"
                                    />
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" id="add" class="btn btn-lg btn-primary">Add New
                                Player
                            </button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>





@endsection
