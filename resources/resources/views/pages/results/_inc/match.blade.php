<div class="match tab-pane fade show active d-flex justify-content-start align-items-start flex-column" id="match"
     role="tabpanel" aria-labelledby="nav-home-tab">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist" style="gap:5px">
            <button class="nav-link active tabBtns" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#history"
                    type="button" role="tab" aria-controls="nav-History" aria-selected="true">History
            </button>
            <button class="nav-link tabBtns" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#statistics"
                    type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Statistics
            </button>
        </div>
    </nav>
    <div class="w-100">
        <div class="tab-pane fade show active" id="history" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="headsection">
                Frame by frame
            </div>

            <div id="app">
                <frames/>
            </div>

            <div class="headsection matchtime">
                <span class="match-time col-10">MATCH TIME</span>
                <span class="time col-2">2.57</span>
            </div>
        </div>
        <div class="tab-pane fade" id="statistics" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="breakRun mt-4">
                <div class="tags">{{ $match->break_run_player_1 }}</div>
                <div class="text">Break and Run</div>
                <div class="tags">{{ $match->break_run_player_2 }}</div>
            </div>
        </div>
    </div>

</div>

