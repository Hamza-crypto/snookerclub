<div class="sec3playernamediv">
    <div class="player1name">
        <h2>1</h2>
        <h3>{{ $player1->name }}</h3>
    </div>
    <div class="player2name">
        <h2>2</h2>
        <h3> {{ $player2->name }} </h3>
    </div>
</div>
<div class="playerimg">
    <div class="player1img">
        <img src="{{ asset('assets/front') }}/images/player-1.png" alt="PLAYER 1">
    </div>
    <div class="circlediv">
        <img src="{{ asset('assets/front') }}/images/circle-vs.png" alt="VS">
    </div>
    <div class="player2img">
        <img src="{{ asset('assets/front') }}/images/player-2.png" alt="PLAYER 2">
    </div>
</div>
</section>
