
  <body onload="startTime()">
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo font-weight-bold" href="<?= base_url() ?>">Visitor Monitoring</a>
          <a class="navbar-brand brand-logo-mini" href="<?= base_url() ?>"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <div class="search-field d-none d-md-block col">
                <form autocomplete="off" class="d-flex align-items-center h-100 check-card" action="services/visitors/check_visitor" method="GET">
                    <div class="input-group">
                        <input type="password" style="border-radius: 24px" autocomplete=off name="card" id="tap_card" class="text-center form-control bg-transparent border-1 bg-white" placeholder="Tap the Card" autofocus>                            
                        <button type="submit" style="display:none" style="border-radius: 24px" class="btn-check-card btn btn-sm btn-light  border-1 bg-white"><i class="mdi mdi-account-search text-info"></i></button>
                    </div>
                </form>
            </div>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                        <div class="nav-profile-text">
                            <p class="mb-1 text-black"><?= $data_user->nama_lengkap ?></p>
                            <p class="mb-1 small"><?= $data_user->jabatan ?></p>
                        </div>
                    </a>
                    <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url() ?>/auth/logout">
                            <i class="mdi mdi-logout mr-2 text-danger"></i> Signout </a>
                    </div>
                </li>
            </ul>
        </div>
      </nav>