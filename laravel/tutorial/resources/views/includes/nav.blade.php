<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/teszt">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/names">Nevek</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/names/manage/surname">Családnevek</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="/profil">Profil</a>
                    </li>
                @endauth
            </ul>
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item">
                        <a href="#" class="nav-link"
                            onclick="event.preventDefault(); document.getElementById('form-logout').submit();">Kijelentkezés
                            ({{ Auth::user()->name }})</a>
                        <form action="/logout" id="form-logout" method="post">@csrf</form>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="/login" class="nav-link">Bejelentkezés</a>
                    </li>
                    <li class="nav-item">
                        <a href="/register" class="nav-link">Regisztráció</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>