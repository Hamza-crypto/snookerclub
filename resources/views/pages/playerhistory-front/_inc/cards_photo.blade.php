
<section class="section3">
    <div class="sec-3-div">
        <div class="div1sec3">
            <input class="pnames player1" list="playerss" type="text" name="player1" value="{{ request()->player1 }}" placeholder="Player 1" onchange="setName('player1')">
        </div>
        <button class="div2sec3" onclick="changeState_head2head()" type="button">Show Head2Head Details</button>
        <div class="div3sec3">
            <input class="pnames player2" list="playerss" type="text" name="player2" value="{{ request()->player2 }}" placeholder="Player 2" onchange="setName('player2')">
        </div>
    </div>
    <datalist id="playerss">
        @foreach($players as $player)
            <option value="{{ $player->name }}">
        @endforeach
    </datalist>
    <div class="sec3playernamediv">
        <div class="player1name d-flex flex-column">
            <h2 class="player1Score"> {{ $player1_wins }} </h2>
            <div class="d-flex flex-column">
                <h3> {{ $player1->name }}</h3>

            </div>
        </div>
        <div class="player2name d-flex flex-column">
            <h2 class="player2Score"> {{ $player2_wins }}  </h2>
            <div class="d-flex flex-column">
                <h3> {{ $player2->name }}</h3>

            </div>
        </div>
    </div>
    <div class="playerimg">
        <div class="player1img">
            <img src="{{ get_img_url($player1->image1) }}" alt="{{ $player1->name }}">
        </div>
        <div class="circlediv d-flex justify-content-center align-items-center">
            <div class="percent">
                <svg>
                    <circle cx="105" cy="105" r="100"></circle>
                    <circle id="progress" cx="105" cy="105" r="100" style="--percent:
{{ $player1_win_percentage == $player2_win_percentage && $player1_win_percentage  == 0 ? 50 : $player2_win_percentage }}
                        "></circle>
                </svg>
                <div class="number">
                    <div class="versus">VS</div>
                </div>
            </div>
        </div>
        <div class="player2img">
            <img src="{{ get_img_url($player2->image1) }}" alt="{{ $player2->name }}">
        </div>
    </div>
</section>
