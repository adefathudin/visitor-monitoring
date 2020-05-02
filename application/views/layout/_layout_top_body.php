
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo font-weight-bold" href="index.html">Visitor Monitoring</a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <div class="search-field d-none d-md-block col">
                <form class="d-flex align-items-center h-100 check-card" action="services/visitors/check_visitor" method="GET">
                    <div class="input-group">
                        <input type="text" style="border-radius: 24px" autocomplete=off name="card" id="tap_card" class="text-center shadow form-control bg-transparent border-1 bg-white" placeholder="Tap the Card" autofocus>                            
                        <button type="submit" style="border-radius: 24px" class="btn-check-card btn btn-sm btn-light shadow border-1 bg-white"><i class="mdi mdi-account-search text-info"></i></button>
                    </div>
                </form>
            </div>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>