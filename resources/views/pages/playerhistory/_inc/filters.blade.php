<div class="row">
    <div class="col-12" >
        <div class="card">
            <div class="card-body">
                <form>
                    <input type="hidden" class="d-none" name="filter" value="true" hidden>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label class="form-label" for="players"> Player 1 </label>
                                <select name="player1" id="player1"
                                        class="form-control form-select custom-select select2"
                                        data-toggle="select2">
                                    <option value="-100"> Select Player</option>
                                    @foreach($players as $player)
                                        <option
                                            value="{{ $player->id  }}" {{ request()->player1 == $player->id ? 'selected' : '' }} >{{ $player->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label class="form-label" for="players"> Player 2 </label>
                                <select name="player2" id="player2"
                                        class="form-control form-select custom-select select2"
                                        data-toggle="select2">
                                    <option value="-100"> Select Player</option>
                                    @foreach($players as $player)
                                        <option
                                            value="{{ $player->id  }}" {{ request()->player2 == $player->id ? 'selected' : '' }} >{{ $player->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label class="form-label" for="type"> Type </label>
                                <select name="type" id="type"
                                        class="form-control form-select custom-select select2"
                                        data-toggle="select2">
                                    <option value="snooker" selected> Snooker </option>
                                    <option value="8-pool"> 8-Pool </option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm mt-4">
                            <button class="btn btn-pill btn-primary btn-lg apply-dt-filters">Show Head 2 Head
                            </button>

                            <button class="btn btn-pill btn-secondary clear-dt-filters">Clear</button>

                        </div>
                    </div>


                </form>

            </div>
        </div>
    </div>
</div>

