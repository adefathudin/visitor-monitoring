
<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item nav-profile">
                <a href="#" class="nav-link">     
                    <div class="nav-profile-text d-flex flex-column text-black">
                        <span class="mb-2 text-center"><div id="time"></div></span>
                        <span class=""><?= date('l, d M Y') ?></span>
                    </div>
                </a>                
                <hr class="text-black">
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>dashboard">
                    <span class="menu-title">Dashboard</span>
                    <i class="mdi mdi-home menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>visitors">
                    <span class="menu-title">Visitors</span>
                    <i class=" mdi mdi-account-multiple menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>users">
                    <span class="menu-title">Petugas</span>
                    <i class=" mdi mdi-account menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>visitor_card">
                    <span class="menu-title">Visitor Card</span>
                    <i class=" mdi mdi-contacts menu-icon"></i>
                </a>
            </li>
        </ul>
    </nav>