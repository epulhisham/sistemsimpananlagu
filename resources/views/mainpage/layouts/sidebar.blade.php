<div>
  <div class="bg-light" id="mySidenav" style="width: 230px;  min-height: 100%; position:fixed; top:0; left:0; z-index:1; overflow-x: hidden; transition: 0.5s;">
    <ul class="nav nav-pills flex-column mb-auto mt-3">
      <li class="nav item">
        <a href="javascript:void(0)" class="closebtn mx-3 link-dark text-decoration-none " onclick="closeNav()"><span data-feather="menu"></span></a>
      </li>
    </ul>
    @can('pelulus')
    <a href="/pelulus-lagu" class="d-flex align-items-center mt-3 mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <img class="" src="/img/rtm.png" alt="" width="110" height="70">  
      <span class="fw-bold px-3">Sistem Simpan Lagu</span>
    </a> 
    @endcan
    @can('penilai')
    <a href="/penilai-lagu" class="d-flex align-items-center mt-3 mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <img class="" src="/img/rtm.png" alt="" width="110" height="70">  
      <span class="fw-bold px-3">Sistem Simpan Lagu</span>
    </a> 
    @endcan
    @can('syarikat_rakam')
    <a href="/lagu" class="d-flex align-items-center mt-3 mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <img class="" src="/img/rtm.png" alt="" width="110" height="70">  
      <span class="fw-bold px-3">Sistem Simpan Lagu</span>
    </a> 
    @endcan
    @can('syarikat_stesen')
    <a href="/lagu" class="d-flex align-items-center mt-3 mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <img class="" src="/img/rtm.png" alt="" width="110" height="70">  
      <span class="fw-bold px-3">Sistem Simpan Lagu</span>
    </a> 
    @endcan
    <hr>
    <ul class="nav nav-pills flex-column mb-auto mt-3">
      <li class="nav-item">
        @can('pelulus')
          <div class="dropdown">
            <a class="nav-link dropdown-toggle link-dark" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <span data-feather="home"></span>
              Senarai Lagu
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
              <li>
                <a class="dropdown-item" href="/pelulus-lagu">
                  <span data-feather="file-text"></span>
                  Senarai semua lagu
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="/lagu-lulus">
                  <span data-feather="check"></span>
                  Lagu yang lulus
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="/lagu-taklulus">
                  <span data-feather="x"></span>
                  Lagu yang tidak lulus
                </a>
              </li>
            </ul>
          </div>
          <a class="nav-link {{ Request::is('/meluluskan') ? 'active' : '' }} link-dark" aria-current="page" href="/meluluskan">
            <span data-feather="music"></span>
            Meluluskan Lagu
          </a>
          <a class="nav-link {{ Request::is('/lagu-diterbit') ? 'active' : '' }} link-dark" aria-current="page" href="/lagu-diterbit">
            <span data-feather="send"></span>
            Lagu Diterbit
          </a>
          <a class="nav-link {{ Request::is('/statistik') ? 'active' : '' }} link-dark" aria-current="page" href="statistik">
            <span data-feather="bar-chart-2"></span>
            Statistik
          </a>
        @endcan
        @can('penilai')
          <div class="dropdown">
            <a class="nav-link dropdown-toggle link-dark" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <span data-feather="home"></span>
              Senarai Lagu
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
              <li>
                <a class="dropdown-item" href="/penilai-lagu">
                  <span data-feather="file-text"></span>
                  Senarai semua lagu
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="/lagu-dinilai">
                  <span data-feather="check"></span>
                  Lagu yang dinilai
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="/belum-dinilai">
                  <span data-feather="x"></span>
                  Lagu yang belum dinilai
                </a>
              </li>
            </ul>
          </div>
        @endcan
        @can('syarikat_rakam')
          <a class="nav-link {{ Request::is('/lagu/create') ? 'active' : '' }} link-dark" aria-current="page" href="/lagu/create">
            <span data-feather="file-plus"></span>
            Hantar Lagu
          </a>
          <a class="nav-link {{ Request::is('/lagu') ? 'active' : '' }} link-dark" aria-current="page" href="/lagu">
            <span data-feather="music"></span>
            Lagu Dihantar
          </a>
        @endcan
        @can('syarikat_stesen')
          <a class="nav-link {{ Request::is('/lagu/create') ? 'active' : '' }} link-dark" aria-current="page" href="/lagu/create">
            <span data-feather="file-plus"></span>
            Hantar Lagu
          </a> 
          <a class="nav-link {{ Request::is('/lagu') ? 'active' : '' }} link-dark" aria-current="page" href="/lagu">
            <span data-feather="music"></span>
            Lagu Dihantar
          </a>
          <a class="nav-link {{ Request::is('/lagu-diterbit') ? 'active' : '' }} link-dark" aria-current="page" href="/lagu-diterbit">
            <span data-feather="send"></span>
            Lagu Diterbit
          </a> 
        @endcan
      </li>
    </ul>
    <hr>
    <div class="dropdown px-3">
      <a class="nav-link dropdown-toggle link-dark" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <span data-feather="user"></span>
        Hai, {{ auth()->user()->name }}
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
        <li>
          <a class="dropdown-item" href="/edit-profile/{{ auth()->user()->id }}/edit">
            <span data-feather="edit"></span>
            Kemaskini Profile
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="/tukar-password/{{ auth()->user()->id }}">
            <span data-feather="edit-3"></span>
            Tukar Password
          </a>
        </li>
        <li><hr class="dropdown-divider"></li>
          <form action="/logout" method="post">
            @csrf
            <button type="submit" class="nav-link px-3 border-0 bg-white link-dark"><span data-feather="log-out" class="align-text-bottom"></span> Log Keluar</button>
          </form>
      </ul>
    </div>
  </div>
</div>
<div>
  <span style="font-size:17px;cursor:pointer;" onclick="openNav()">&#9776;</span>
</div>
