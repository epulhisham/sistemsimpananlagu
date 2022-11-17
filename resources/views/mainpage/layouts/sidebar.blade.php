<div>
  <div class="bg-light" id="mySidenav" style="width: 230px;  min-height: 100%; position:fixed; top:0; left:0; z-index:1; overflow-x: hidden; transition: 0.5s;">
    <ul class="nav nav-pills flex-column mb-auto mt-3">
      <li class="nav item">
        <a href="javascript:void(0)" class="closebtn mx-3 link-dark text-decoration-none " onclick="closeNav()"><span data-feather="menu"></span></a>
      </li>
    </ul>
    <a href="/mainpage/songs" class="d-flex align-items-center mt-3 mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <img class="" src="/img/rtm.png" alt="" width="110" height="70">  
      <span class="fw-bold px-3">Sistem Simpan Lagu</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto mt-3">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('mainpage/songs') ? 'active' : '' }} link-dark" aria-current="page" href="/mainpage/songs">
          <span data-feather="home"></span>
          Senarai Lagu
        </a>
        @can('pengguna')
          <a class="nav-link {{ Request::is('dihantar/songs') ? 'active' : '' }} link-dark" aria-current="page" href="/dihantar/songs">
            <span data-feather="music"></span>
            Lagu Dihantar
          </a>
        @endcan
        @can('penilai')
          <a class="nav-link {{ Request::is('menilai/songs') ? 'active' : '' }} link-dark" aria-current="page" href="/menilai/songs">
            <span data-feather="music"></span>
            Menilai Lagu
          </a>
        @endcan
        @can('pelulus')
          <a class="nav-link {{ Request::is('meluluskan/songs') ? 'active' : '' }} link-dark" aria-current="page" href="/meluluskan/songs">
            <span data-feather="music"></span>
            Meluluskan Lagu
          </a>
        @endcan
        <a class="nav-link {{ Request::is('mainpage/songs/create') ? 'active' : '' }} link-dark" aria-current="page" href="/mainpage/songs/create">
          <span data-feather="file-plus"></span>
          Hantar Lagu
        </a>
        <a class="nav-link {{ Request::is('diterbit/songs') ? 'active' : '' }} link-dark" aria-current="page" href="/diterbit/songs">
          <span data-feather="send"></span>
          Lagu Diterbit
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
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
