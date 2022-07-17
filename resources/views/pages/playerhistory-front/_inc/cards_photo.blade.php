<section class="section3">
    <div class="sec-3-div">
        <div class="div1sec3">
            <input class="pnames player1" type="text" name="player1" value="{{ request()->player1 }}" placeholder="Player 1" onchange="setName('player1')">
        </div>
        <button class="div2sec3" onclick="changeState_head2head()" type="button">Show Head2Head Details</button>
        <div class="div3sec3">
            <input class="pnames player2" type="text" name="player2" value="{{ request()->player2 }}" placeholder="Player 2" onchange="setName('player2')">
        </div>
    </div>
    <div class="sec3playernamediv">
        <div class="player1name d-flex flex-column">
            <h2 class="player1Score">1</h2>
            <div class="d-flex flex-column">
                <h3> {{ $player1->name }}</h3>

            </div>
        </div>
        <div class="player2name d-flex flex-column">
            <h2 class="player2Score">2</h2>
            <div class="d-flex flex-column">
                <h3> {{ $player2->name }}</h3>

            </div>
        </div>
    </div>
    <div class="playerimg">
        <div class="player1img">
            <img src="{{ asset('assets/front') }}/images/player-1.png" alt="PLAYER 1">
        </div>
        <div class="circlediv d-flex justify-content-center align-items-center">
            <div class="percent">
                <svg>
                    <circle cx="105" cy="105" r="100"></circle>
                    <circle id="progress" cx="105" cy="105" r="100" style="--percent: {{ $player2_win_percentage }}"></circle>
                </svg>
                <div class="number">
                    <div class="versus">VS</div>
                </div>
            </div>
        </div>
        <div class="player2img">
            <img src="{{ asset('assets/front') }}/images/player-2.png" alt="PLAYER 2">
        </div>
    </div>
</section>
