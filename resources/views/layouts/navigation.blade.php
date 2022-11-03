<!-- Navigation Menu -->
<div id="myTopnav" class="topnav">
    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : null }}">Main</a>
    <a href="{{ route('drivers') }}" class="{{ request()->routeIs('drivers') ? 'active' : null }}">Drivers</a>
    <a href="{{ route('series.index') }}" class="{{ request()->routeIs('series.*') ? 'active' : null }}">Series</a>
    <a href="{{ route('incidents.index') }}" class="{{ request()->routeIs('incidents.*') ? 'active' : null }}">Incidents</a>
    @if(auth()->user())
        <a href="{{ route('logout') }}">Logout</a>
    @else
        <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : null }}">Login</a>
        <a href="{{ route('register') }}" class="{{ request()->routeIs('register') ? 'active' : null }}">Register</a>
    @endif
    <a href="javascript:void(0);" class="icon" onClick="toggleNavClass();">
        <i class="fa fa-bars"></i>
    </a>
</div>
