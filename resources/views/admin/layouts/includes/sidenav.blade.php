<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="{{ url('admin/dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link" href="{{ url('admin/questionnaire/listing') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Questionnaire
                </a>
                <a class="nav-link" href="{{ url('admin/report/listing') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Reports
                </a>
                <hr>
                <a class="nav-link" href="{{ url('auth/logout') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-sign-out"></i></div>
                    Logout
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Quiz App
        </div>
    </nav>
</div>
