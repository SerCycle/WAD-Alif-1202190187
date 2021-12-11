<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container justify-content-center">
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/"><b>HOME</b></a>
            <a class="nav-link {{ Request::is('vaccine') ? 'active' : ''}}" href="/vaccine"><b>VACCINE</b></a>
            <a class="nav-link {{ Request::is('patient') ? 'active' : ''}}" href="/patient"><b>PATIENT</b></a>
        </div>
        </div>
    </div>
</nav>
