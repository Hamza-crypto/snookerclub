<div class="row">
        <div class="col-sm">
            <div class="card">

                <img class="card-img-top" src="{{ $player1->image }}" alt="{{ $player1->name }}">

                <div class="card-header px-4 pt-4">

                    <h1 class="card-title mb-0"> {{ $player1->name }} {{ isset($player1_win_percentage) ?  (sprintf("(%.2f%% wins)", $player1_win_percentage)) : '' }}</h1>

                </div>

            </div>
        </div>


        <div class="col-sm">
            <div class="card">

                <div class="chart chart-xs">
                    <canvas id="chartjs-dashboard-pie" style="display: block;" class="chartjs-render-monitor"></canvas>
                </div>


            </div>
        </div>

        <div class="col-sm">
            <div class="card">

                <img class="card-img-top" src="{{ $player2->image }}" alt="{{ $player2->name }}">

                <div class="card-header px-4 pt-4">
                    <h5 class="card-title mb-0"> {{ $player2->name }} {{ isset($player2_win_percentage) ?  (sprintf("(%.2f%% wins)", $player2_win_percentage)) : '' }} </h5>

                </div>

            </div>
        </div>
    </div>
