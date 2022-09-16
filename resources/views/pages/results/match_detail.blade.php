@php
    $runTimeStatus = $match->status==1 || $match->status==4 ? true : false;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,900&amp;display=swap">
    <title>SnookernPool</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/front/css/results/result_detail.css') }}" >

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
</head>
<body>
<div class="MainContainer">
    <nav class="navbar navbar-light hd-bkg">
        <a class="navbar-brand m-4 my-0" href="{{ route('homepage.front') }}">
            <img src="https://snookernpool.com/assets/front/images/logo.png" width="80" height="30" class="d-inline-block align-top" alt="">
            <!-- Logo -->
        </a>
    </nav>
    <nav class="headcrumbs" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#snooker"> {{ $match->type }}</a></li>
            <li class="breadcrumb-item">{{ $match->tournament }} <a href="#north"> - {{ $match->round }} </a></li>
        </ol>
    </nav>
    <div class="participants d-flex justify-content-around align-items-center">
        <div class="d-flex justify-content-center align-items-center">
            <div class="card participant d-flex justify-content-center align-items-center" style="width: 14rem;">
                <img class="card-img-top" src="{{ get_img_url($match->player1->image2) }}" alt="Card image cap">
                <div class="card-body d-flex justify-content-center align-items-center flex-column p-4">
                    <a href="#" class="card-link player-name">{{ get_player_name($match->player_1) }}</a>
                    <!-- <small class="player-status">World Ranking : 99.</small> -->
                </div>
            </div>
        </div>

        <div class="score d-flex justify-content-center align-items-center flex-column">
            <div class="startTime">{{ $match->year }}</div>
            <span class="scores">{{ $match->score_player_1 }} - {{ $match->score_player_2 }}</span>
            <span class="status">Finished</span>
        </div>

        <div class="d-flex justify-content-center align-items-center">
            <div class="card participant d-flex justify-content-center align-items-center" style="width: 14rem;">
                <img class="card-img-top" src="{{ get_img_url($match->player2->image2) }}" alt="Card image cap">
                <div class="card-body d-flex justify-content-center align-items-center flex-column">
                    <a href="#" class="card-link player-name">{{ get_player_name($match->player_2) }}</a>
                    <!-- <small class="player-status">World Ranking : 90.</small> -->
                </div>
            </div>

        </div>

    </div>
    <nav class="maintabs">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#match" type="button" role="tab" aria-controls="match" aria-selected="true">MATCH</button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#playerform" type="button" role="tab" aria-controls="playerform" aria-selected="false">PLAYERS FORM</button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#h2h" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">H2H</button>
            <!-- <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#draw" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">DRAW</button> -->
        </div>
    </nav>
    <div class="tab-content p-3" id="nav-tabContent">
        @include('pages.results._inc.match')
        @include('pages.results._inc.players_form')
        @include('pages.results._inc.h2h')
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    let seconds = "{{ $match->total_time }}";
    let runTime = "{{$runTimeStatus}}";
    console.log(seconds, runTime, typeof runTime);
    //string to boolean

    $(document).ready(function(){
        showTime();
    });

    function showTime() {
        var date = new Date(null);

        date.setSeconds(seconds);
        seconds++;
        document.getElementsByClassName("time")[0].innerText = date.toISOString().substr(14, 5);
        if (runTime == '1') {
            setTimeout(showTime, 1000);
        }
    }

</script>
</html>
