
@include('includes.header-front')

<section class="section1">
    <div class="sec-1-div1">
        <h1 class="sec-1-h1 text-white">BETVICTOR CHAMPIONSHIP LEAGUE</h1>
        <button class="sec-1-button text-white" type="button">LIVE SCORES</button>
    </div>
</section>

        @include('pages.playerhistory-front._inc.filters')
        @include('pages.playerhistory-front._inc.cards_photo')

        @include('pages.playerhistory-front._inc.comparison')
        @if(isset($_REQUEST['filter']))
            @include('pages.playerhistory-front._inc.event-breakdown')
        @endif

@include('pages.playerhistory-front._inc.sponsored')

@include('includes.footer-front')
