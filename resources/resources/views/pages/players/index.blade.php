@extends('layouts.app')

@section('title', __('Players'))

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#users-table').DataTable();
        });
    </script>
@endsection

@section('content')
    <h1 class="h3 mb-3">{{ __('All Players') }}</h1>

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
                            <th>{{ 'ID' }}</th>
                            <th>{{ 'Name' }}</th>
                            <th>{{ 'Birthplace' }}</th>
                            <th>{{ 'Age' }}</th>
                            <th>{{ 'Won/Lost' }}</th>
                            <th>{{ 'Created at' }}</th>
                            <th>{{ 'Action' }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($players as $player)
                            <tr>

                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ $player->name }}
                                </td>
                                <td>{{  $player->birth_place }}</td>

                                <td data-sort="{{ strtotime($player->dob) }}"
                                    title="{{ $player->dob->format('Y-m-d') }}">{{ str_replace(' ago', '', $player->dob->diffForHumans())  }}</td>

                                <td>{{  $player->won_lost }}</td>

                                <td data-sort="{{ strtotime($player->created_at) }}"
                                    title="{{ $player->created_at }}">{{ $player->created_at->diffForHumans() }}</td>
                                <td class="table-action">

{{--                                    <a href="{{ route('admin.players.edit', $player->id) }}" class="btn"--}}
{{--                                       style="display: inline">--}}
{{--                                        <i class="fa fa-edit text-info"></i>--}}
{{--                                    </a>--}}


                                    <form method="post" action="{{ route('admin.players.destroy', $player->id) }}"
                                          onsubmit="return confirmSubmission(this, 'Are you sure you want to delete player ' + '{{ "$player->name"  }}')"
                                          style="display: inline">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn text-danger"
                                                href="{{ route('admin.players.destroy', $player->id) }}">
                                            <i class="fa fa-trash"></i>

                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
