
<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item nav-profile">
                <a href="#" class="nav-link">
                    <div class="nav-profile-image">
                        <img src="assets/images/faces/face1.jpg" alt="profile">
                        <span class="login-status online"></span>
                        <!--change to offline or busy as needed-->
                    </div>
                    <div class="nav-profile-text d-flex flex-column">
                        <span class="font-weight-bold mb-2">Alvin Pradipta</span>
                        <span class="text-secondary text-small">Shift 2</span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>dashboard">
                    <span class="menu-title">Dashboard</span>
                    <i class="mdi mdi-home menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>visitors">
                    <span class="menu-title">Users Management</span>
                    <i class=" mdi mdi-account-multiple menu-icon"></i>
                </a>
            </li>
        </ul>
    </nav>