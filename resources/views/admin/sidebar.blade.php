<!-- START SIDEBAR-->
<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="./assets/img/admin-avatar.png" width="45px" />
            </div>
            <div class="admin-info">
                @if(Auth::check())
                    <div class="font-strong">{{ Auth::user()->name }}</div><small>{{ Auth::user()->email }}</small></div>
                @endif
        </div>
        <ul class="side-menu metismenu">
            <li>
                <a class="active" href=""><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li class="heading">FEATURES</li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                    <span class="nav-label">About Us</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ route('add-about') }}">Add About</a>
                    </li>
                    <li>
                        <a href="{{ route('manage-about') }}">Manage About</a>
                    </li>
                    
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-edit"></i>
                    <span class="nav-label">Service</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ route('add-service') }}">Add Service</a>
                    </li>
                    <li>
                        <a href="{{ route('manage-service') }}">Manage Service</a>
                    </li>
                    
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-table"></i>
                    <span class="nav-label">Products</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ route('add-product') }}">Add Product</a>
                    </li>
                    <li>
                        <a href="{{ route('manage-product') }}">Manage Product</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('manage-contact') }}"><i class="sidebar-item-icon fa fa-smile-o"></i>
                    <span class="nav-label">Contact</span>
                </a>
            </li> 
            <li>
                <a href="{{ route('manage-delivery') }}"><i class="sidebar-item-icon fa fa-smile-o"></i>
                    <span class="nav-label"></span>
                    <span class="nav-label">Delivery</span>
                </a>
            </li> 
        </ul>
    </div>
</nav>
<!-- END SIDEBAR-->
<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    @yield('main_section')
    
    <!-- END PAGE CONTENT-->
    <footer class="page-footer">
        <div class="font-13">2018 © <b>AdminCAST</b> - All rights reserved.</div>
        <a class="px-4" href="http://themeforest.net/item/adminca-responsive-bootstrap-4-3-angular-4-admin-dashboard-template/20912589" target="_blank">BUY PREMIUM</a>
        <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
    </footer>
</div>
</div>
<!-- BEGIN THEME CONFIG PANEL-->

<!-- CORE PLUGINS-->
{{-- <script src="../assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script> --}}
<script src="{{ asset('assets/vendors/jquery/dist/jquery.min.js') }}"></script>

<script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/metisMenu/dist/metisMenu.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/popper.js/dist/umd/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<!-- PAGE LEVEL PLUGINS-->
<script src="{{ asset('assets/vendors/chart.js/dist/Chart.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js') }}" type="text/javascript"></script>
<!-- CORE SCRIPTS-->
<script src="{{ asset('assets/js/app.min.js') }}" type="text/javascript"></script>
<!-- PAGE LEVEL SCRIPTS-->
<script src="{{ asset('assets/js/scripts/dashboard_1_demo.js') }}" type="text/javascript"></script>
</body>

</html>