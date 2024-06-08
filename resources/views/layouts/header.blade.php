<header class="app-header">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="index.php" class="d-flex align-items-center mb-md-0 text-dark text-decoration-none gap-2">
            <!-- <img src="./assets/img/logo.png" alt="" width=36> -->
            <span class="fs-4 fw-bold" style="white-space:nowrap">
              Teaching Factory
            </span>
          </a>
        </li>
      </ul>
      <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end gap-2">
          <li class="nav-item d-none d-md-inline">
            <form>
              <div class="d-flex gap-1">
                <input type="search" class="form-control border border-primary" name='s' style="width: 400px;" placeholder="Cari Nama..." aria-label="Search">
                <button class="btn btn-outline-primary btn-menu px-3 py-2" type="submit">
                  <i class="ti ti-search fs-6"></i>
                </button>
              </div>
            </form>
          </li>
          <li class="nav-item d-inline d-md-none">
            <div>
              <button class="btn btn-outline-primary btn-menu px-3 py-2" id="btnMenu">
                  <svg xmlns="http://www.w3.org/2000/svg" class="fill-menu" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg>
              </button>
              <div class="position-absolute w-full bg-light p-2 shadow"  id="menu">
                <form>
                  <div class="d-flex gap-1">
                    <input type="search" class="form-control border border-primary" name='s' placeholder="Cari Nama..." aria-label="Search">
                    <button class="btn btn-outline-primary btn-menu px-3 py-2" type="submit">
                      <i class="ti ti-search fs-6"></i>
                    </button>
                  </div>
                </form>
            </div>
          </li>
          <li class="nav-item dropdown">
            @auth()
            <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
              aria-expanded="false">
              <i class="ti ti-user fs-6"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
              <p class="p-2">{{ Auth::user()->name }}</p>
              <div class="message-body">
                <a href="/logbook" class="d-flex align-items-center gap-2 dropdown-item">
                  <i class="ti ti-list-check fs-6"></i>
                  <p class="mb-0 fs-3">Daftar Logbook</p>
                </a>
                <form method="post" action="/logout" class="d-flex ">
                  @csrf
                  <button class="btn btn-outline-primary mx-3 mt-2 d-block shadow-none" style="flex:1">Logout</button>
                </form>
              </div>
            </div>
            @else
            <a class="nav-link nav-icon-hover" href="/login"
              aria-expanded="false">
              <i class="ti ti-login fs-6"></i>
            </a>
            @endauth
          </li>
        </ul>
      </div>
    </nav>
  </div>
</header>