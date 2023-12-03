@extends('layouts.app')

@section('title', __('Matches'))

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#users-table').DataTable();
        });
    </script>
@endsection

@section('content')
    <h1 class="h3 mb-3">{{ __('Today Tournaments') }}</h1>

    @if(session('success'))
        <x-alert type="success">{{ session('success') }}</x-alert>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="dt-buttons btn-group flex-wrap">

                    </div>

                    @if(session('delete'))
                        <x-alert type="danger">{{ session('delete') }}</x-alert>
                    @elseif(session('password_update'))
                        <x-alert type="success">{{ session('password_update') }}</x-alert>
                    @elseif(session('account'))
                        <x-alert type="success">{{ session('account') }}</x-alert>
                    @endif


                    <table id="users-table" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>{{ 'Tournament' }}</th>
                            <th>{{ 'Player 1' }}</th>
                            <th>{{ 'Player 2' }}</th>
                            <th>{{ 'Day' }}</th>
                            <th>{{ 'Rules' }}</th>
                            <th>{{ 'Round' }}</th>
                            <th>{{ 'Winner' }}</th>
                            <th>{{ 'Result' }}</th>
                            <th>{{ 'Created at' }}</th>
                            @auth
                                <th>{{ 'Action' }}</th>
                            @endauth
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($matches as $match)
                            <tr>

                                <td>
                                    {{ $match->tournament }}
                                </td>
                                <td>{{ get_player_name($match->player_1) }} </td>

                                <td>{{ get_player_name($match->player_2) }}</td>

                                <td>{{ $match->year->format('Y-m-d') }}</td>

                                <td>{{ $match->rules }}</td>

                                <td>{{ $match->rounds }}</td>

                                <td>{{ get_player_name($match->winner) }}</td>

                                <td>{{ $match->result }}</td>

                                <td data-sort="{{ strtotime($match->created_at) }}"
                                    title="{{ $match->created_at }}">{{ $match->created_at->diffForHumans() }}</td>

                                @auth
                                    <td class="table-action">

                                    <a href="{{ route('matches.edit', $match->id) }}" class="btn"
                                       style="display: inline">
                                        <i class="fa fa-edit text-info"></i>
                                    </a>

                                </td>
                                @endauth
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
