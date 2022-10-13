<style>
    .dropdown-item:hover {
        background-color: #222 !important;
    }

    .dropdown-toggle::after {
        display: none;
    }

    .dropdown:hover .dropdown-menu {
        display: block;
    }

    .dropdown-toggle {
        color: #fff !important;
        font-weight: inherit;
    }
</style>
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
                    <a class="nav-link" id="navitem" href="https://live.snookernpool.com">WATCH LIVE</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        STATS
                    </a>
                    <ul class="dropdown-menu" style="background-color:#111!important">
                        <li><a class="dropdown-item" href="stats?type=8-pool" style="color:#fff!important; font-weight:inherit;">8
                                POOL</a></li>
                        <li><a class="dropdown-item" href="stats?type=snooker"
                               style="color:#fff!important;font-weight:inherit;">SNOOKER</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="navitem" href="https://live.snookernpool.com/calender">CALENDER</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="navitem" href="{{ route('tournament.about') }}">ABOUT US</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
