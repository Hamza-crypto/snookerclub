<div class="row">
    <div class="col-1"></div>
    <div class="col-10">
        <h1 class="h3 mb-3"> Event Breakdown</h1>
        <div class="card">
            <div class="card-body">
                <div class="dt-buttons btn-group flex-wrap">


                    <table id="users-table" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>{{ 'ID' }}</th>
                            <th>{{ 'Year' }}</th>
                            <th>{{ 'Event' }}</th>
                            <th>{{ 'Rules' }}</th>
                            <th>{{ 'Round' }}</th>
                            <th>{{ 'Winner' }}</th>
                            <th>{{ 'Result' }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($matches) > 0)
                            @foreach($matches as $match)

                                <tr>
                                    <td>{{ $match->id }}</td>
                                    <td>{{ $match->year }} </td>
                                    <td>{{ $match->tournament }}</td>
                                    <td>{{ $match->rules }}</td>
                                    <td>{{ $match->round }}</td>

                                    <td>
                                        <span class="badge badge-{{ $match->winner == $player2->id ? 'primary' : 'warning' }}">
                                            {{ $match->winner == $player2->id ? $player2->name : $player1->name }}
                                        </span>
                                    </td>
                                    <td>{{ $match->result }}</td>

                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8" class="text-center">No matches found</td>
                            </tr>
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-1"></div>
</div>
