
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="chart chart-xs">
                <canvas id="chartjs-dashboard-pie" style="display: block;" class="chartjs-render-monitor"></canvas>
            </div>


        </div>
    </div>
</div>


<div class="row">

        <div class="col-6 col-sm-6">
            <div class="card float-right">

                <img class="card-img-top" style="max-height: 480px; min-height: 180px;  max-width: 340px;" src="{{ get_img_url($player1->image) }}" alt="{{ $player1->name }}">

                <div class="card-header px-4 pt-4">

                    <h1 class="card-title mb-0"> {{ $player1->name }}
                        ({{ $player1_wins }} wins)
                    </h1>

                </div>

            </div>
        </div>
        <div class="col-6 col-sm-6">
            <div class="card float-left">

                <img class="card-img-top" style="max-height: 480px; min-height: 180px;  max-width: 340px;" src="{{ get_img_url($player2->image) }}" alt="{{ $player2->name }}">

                <div class="card-header px-4 pt-4">
                    <h5 class="card-title mb-0"> {{ $player2->name }}
                        ({{ $player2_wins }} wins)
                    </h5>

                </div>

            </div>
        </div>

</div>

