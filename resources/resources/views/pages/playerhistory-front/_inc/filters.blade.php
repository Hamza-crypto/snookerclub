<section class="section2">
    <div class="sec-2-div">
        <i>Hard work, dedication & pure motivation makes you who you are and will become.</i>
        <p class="quotewriter">~ Ronnie O'sullivan</p>
    </div>
    <form method="get" id="form" class="sec-2-button-div">
        <div class="sec-2-button1 d-flex justify-content-center align-items-center position-relative">
            <input type="radio" name="gameType" value="POOL" @if( request()->type == '8-pool' || request()->type == null) checked @endif onclick="checkRadio('8-pool')">
            <label for="html">POOL</label><br>
        </div>
        <div class="sec-2-button2 d-flex justify-content-center align-items-center position-relative">
            <input type="radio" name="gameType" value="SNOOKER" @if( request()->type == 'snooker' ) checked @endif onclick="checkRadio('snooker')">
            <label for="html">SNOOKER</label><br>
        </div>
    </form>
</section>
