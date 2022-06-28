@extends('layouts.app')

@section('title', 'Players')

@php

@endphp

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Pie chart
            //read php variables in javascript
            var app = <?php echo json_encode($graph_data); ?>;
            console.log(app);
            new Chart(document.getElementById("chartjs-dashboard-pie"), {
                type: "pie",
                data: {
                    labels: <?php echo json_encode($graph_data['labels']); ?>,
                    datasets: [{
                        data: <?php echo json_encode($graph_data['data']); ?>,
                        backgroundColor: [
                            window.theme.primary,
                            window.theme.warning

                        ],
                        borderWidth: 5,
                        borderColor: window.theme.white
                    }]
                },
                options: {
                    responsive: !window.MSInputMethodContext,
                    maintainAspectRatio: false,
                    cutoutPercentage:30,
                    legend: {
                        display: true,
                        reverse: true,
                    }
                }
            });
        });
    </script>
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

    @include('pages.playerhistory._inc.filters')

    @if(isset($_REQUEST['filter']) && $_REQUEST['player1'] != -100 && $_REQUEST['player2'] != -100)
        @include('pages.playerhistory._inc.cards_photo')
        @include('pages.playerhistory._inc.comparison')
        @include('pages.playerhistory._inc.event-breakdown')
    @endif





@endsection


