{{--<nav class="navbar navbar-expand-lg navbar-dark" id="bgdark">--}}
{{--    <div class="container-fluid">--}}
{{--        <a class="navbar-brand" href="{{ route('homepage.front') }}">--}}
{{--            <img src="{{ asset('assets/front') }}/images/logo.png">--}}
{{--        </a>--}}
{{--        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}
{{--        <div class="collapse navbar-collapse" id="navbarNavDropdown">--}}
{{--            <ul class="navbar-nav">--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link active" aria-current="page" href="{{ route('homepage.front') }}">HOME</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" id="navitem" href="{{ route('tournament.results') }}">SCORES</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" id="navitem" href="https://live.snookernpool.com">WATCH LIVE</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" id="navitem" href="https://live.snookernpool.com/calender">CALENDER</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" id="navitem" href="https://snookernpool.com/about">ABOUT US</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}


<nav class="navbar navbar-expand-lg navbar-dark" id="bgdark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('homepage.front') }}">
            <img src="{{ asset('assets/front') }}/images/logo.png">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('homepage.front') }}">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="navitem" href="{{ route('tournament.results') }}">SCORES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="navitem" href="https://live.snookernpool.com/scores">WATCH LIVE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="navitem" href="https://live.snookernpool.com/scores">CALENDER</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="navitem" href="{{ route('tournament.about') }}">ABOUT US</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="navitem" href="{{ route('tournament.contact') }}">Contact US</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
