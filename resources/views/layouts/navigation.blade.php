<!-- Navigation Menu -->
<div id="myTopnav" class="topnav">
    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : null }}">Dashboard</a>
    <a href="{{ route('drivers') }}" class="{{ request()->routeIs('drivers') ? 'active' : null }}">Drivers</a>
    <a href="{{ route('series.index') }}" class="{{ request()->routeIs('series.*') ? 'active' : null }}">Series</a>

    @if(auth()->user())
        <a href="{{ route('incidents.index') }}" class="{{ request()->routeIs('incidents.*') ? 'active' : null }}">Incidents</a>
        <a href="{{ route('logout') }}">Logout</a>
    @else
        <a href="{{ route('login') }}">Login</a>
    @endif
    <a href="javascript:void(0);" class="icon" onClick="toggleNavClass();">
        <i class="fa fa-bars"></i>
    </a>
</div>
