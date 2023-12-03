@extends('layouts.app')

@section('title', 'Add Tournament')

@section('scripts')
    <script>
        $(document).ready(function () {

            $(".daterange").daterangepicker({
                singleDatePicker: true,
                timePicker: true,
                showDropdowns: true,
                startDate: moment(),
                locale: {
                    format: "Y-MM-DD HH:mm:ss"
                }
            });

        });

    </script>

    <script src="{{ mix('js/app.js') }}"></script>

@endsection
@section('content')

    <h1 class="h3 mb-3">Add New Tournament </h1>

    @if(session('success'))
        <x-alert type="success">{{ session('success') }}</x-alert>
    @endif
    @if(session('error'))
        <x-alert type="danger">{{ session('error') }}</x-alert>
    @endif
    @if(session('warning'))
        <x-alert type="warning">{{ session('warning') }}</x-alert>
    @endif



    <div id="app">
        <tournaments/>
    </div>


@endsection
