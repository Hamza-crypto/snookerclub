@php
    $role = Auth()->user()->role;
@endphp
<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ env("APP_URL") }}">
            <span class="align-middle me-3">{{ env("APP_NAME") }}</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                General
            </li>
            <li class="sidebar-item {{ request()->is('dashboard') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('dashboard.index') }}">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-header">
                Players
            </li>
            <li class="sidebar-item {{ request()->is('players') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.players.index') }}">
                    <i class="align-middle" data-feather="users"></i>
                    <span class="align-middle">All Players</span>
                </a>
            </li>
            @if( $role == 'admin')

                <li class="sidebar-item {{ request()->is('players/create') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin.players.create') }}">
                        <i class="align-middle" data-feather="plus-square"></i>
                        <span class="align-middle">Add New Player</span>
                    </a>
                </li>
            @endif

            <li class="sidebar-header">
                Matches
            </li>

            <li class="sidebar-item {{ request()->is('matches') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('matches.index') }}">
                    <i class="align-middle" data-feather="users"></i>
                    <span class="align-middle">All Matches</span>
                </a>
            </li>
            @if( $role == 'admin')

                <li class="sidebar-item {{ request()->is('matches/create') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('matches.create') }}">
                        <i class="align-middle" data-feather="plus-square"></i>
                        <span class="align-middle">Add New Match</span>
                    </a>
                </li>
            @endif


            @if( $role == 'admin')
                <li class="sidebar-header">
                    Manage
                </li>
                <li class="sidebar-item {{ request()->is('admin/users*') ? 'active' : '' }} ">
                    <a data-target="#users" data-toggle="collapse" class="sidebar-link {{ request()->is('admin/users/*') ? 'collapsed' : '' }}">
                        <i class="align-middle" data-feather="users"></i>
                        <span class="align-middle">Users</span>
                    </a>
                    <ul id="users"
                        class="sidebar-dropdown list-unstyled collapse {{ request()->is('admin/users*') ? 'show' : '' }}"
                        data-parent="#sidebar">

                        <li class="sidebar-item {{ request()->is('admin/users') ? 'active' : '' }}">
                            <a class="sidebar-link" href="{{ route('admin.users.index') }}">
                                <i class="align-middle" data-feather="users"></i>
                                <span class="align-middle">All Users</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ request()->is('admin/users/create') ? 'active' : '' }}">
                            <a class="sidebar-link" href="{{ route('admin.users.create') }}">
                                <i class="align-middle" data-feather="user-plus"></i>
                                <span class="align-middle">Add New User</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

        </ul>
    </div>
</nav>
