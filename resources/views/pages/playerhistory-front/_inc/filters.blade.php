<section class="section2">
    <div class="sec-2-div">
        <i>Hard work, dedication & pure motivation makes you who you are and will become.</i>
        <p class="quotewriter">~ Ronnie O'sullivan</p>
    </div>
    <form action="" method="get">

    <div class="sec-2-button-div">
        <input type="hidden" class="d-none" name="filter" value="true" hidden>

        <button class="sec-2-button1" name='8-pool' type="button">POOL</button>
        <button class="sec-2-button2" name='snooker' type="button">SNOOKER</button>
    </div>
</section>

<section class="section3">

        <div class="sec-3-div">
            <div class="div1sec3">
                <input type="text" name="player1" placeholder="Player 1" value="{{ request()->player1 }}">

            </div>
            <div class="div2sec3">
                <input type="submit" value="Show Head2Head Details">

            </div>
            <div class="div3sec3">
                <input type="text" name="player2" placeholder="Player 2" value="{{ request()->player2 }}">

            </div>
        </div>
    <input type="hidden" class="d-none" name="type" value="snooker" hidden>
</form>
