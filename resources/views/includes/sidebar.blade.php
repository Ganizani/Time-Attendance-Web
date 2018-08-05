<!-- BEGIN SIDEBAR -->
<div class="page-sidebar " id="main-menu">
    <!-- BEGIN MINI-PROFILE -->
    <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
        <div class="user-info-wrapper sm">
            <div class="profile-wrapper sm">
                <img src="{{URL::asset("theme/img/profile_placeholder.jpg")}}"  alt="" data-src="{{URL::asset("theme/img/profile_placeholder.jpg")}}"  data-src-retina="{{URL::asset("theme/img/profile_placeholder.jpg")}}"  width="69" height="69" />
                <!--div class="availability-bubble online"></div-->
            </div>
            <div class="user-info sm">
                <div class="username"> <span class="semi-bold"></span></div>
                <div class="status"></div>
            </div>
        </div>
        <!-- END MINI-PROFILE -->
        <!-- BEGIN SIDEBAR MENU -->
        <p class="menu-title sm">MENU <span class="pull-right"></span></p>
        <ul>
            @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['system_admin']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['system_admin'] == 1 )
                <li @if(Request::is('/')) class="open active" @endif>
                    <a href="/dashboard"> <i class="material-icons">home</i> <span class="title">Dashboard</span> <span class="selected"></span> </a>
                </li>
            @endif

            @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['view_reports'])
                && (
                    $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['view_reports'] == 1 ||
                    $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['list_leaves'] == 1
                ))
                <li @if(Request::is('reports/*')) class="open active" @endif>
                    <a href="javascript:;"> <i class="material-icons">assignment</i> <span class="title">Reports</span>  <span class="@if(Request::is('reports/*')) open @endif arrow"></span> </a>
                    <ul class="sub-menu">
                        <li> <a href="/reports/absent">         Absent</a> </li>
                        <li> <a href="/reports/attendance">     Attendance </a> </li>
                        <li> <a href="/reports/base">           Base </a> </li>
                        @if((isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['list_leaves']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['list_leaves'] == 1)
                            || (isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['view_reports']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['view_reports'] == 1))
                            <li> <a href="/reports/leave">          Leave </a> </li>
                        @endif
                        <li> <a href="/reports/map">            Map </a> </li>
                    </ul>
                </li>
            @endif

            @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['add_departments']) &&
                ($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['add_departments'] == 1
                || $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['edit_departments'] == 1
                || $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['list_departments'] == 1
                || $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_departments'] == 1))

                <li @if(Request::is('departments') || Request::is('departments')) class="open active" @endif>
                    <a href="javascript:;"> <i class="material-icons">account_balance</i> <span class="title">Departments</span>  <span class="@if(Request::is('departments/*') || Request::is('departments')) open @endif arrow"></span> </a>
                    <ul class="sub-menu">
                        @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['list_departments']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['list_departments'] == 1)
                            <li> <a href="/departments"> List</a> </li>
                        @endif
                        @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['add_departments']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['add_departments'] == 1)
                            <li> <a href="/departments/add" > Add </a> </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['add_devices']) &&
                ($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['add_devices'] == 1
                || $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['edit_devices'] == 1
                || $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['list_devices'] == 1
                || $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_devices'] == 1))
            <li @if(Request::is('devices/*') || Request::is('devices')) class="open active" @endif>
                <a href="javascript:;"> <i class="material-icons">dock</i> <span class="title">Devices</span>  <span class="@if(Request::is('devices/*') || Request::is('devices')) open @endif arrow"></span> </a>
                <ul class="sub-menu">
                    @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['list_devices']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['list_devices'] == 1 )
                        <li> <a href="/devices">   List</a> </li>
                    @endif
                    @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['add_devices']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['add_devices'] == 1)
                        <li> <a href="/devices/add">    Add </a> </li>
                    @endif
                </ul>
            </li>
            @endif

            @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['add_leaves']) &&
                ($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['add_leaves'] == 1
                || $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['edit_leaves'] == 1
                || $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['list_leaves'] == 1
                || $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_leaves'] == 1
                || $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['upload_leaves'] == 1
                || $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['add_leave_types'] == 1
                || $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['edit_leave_types'] == 1
                || $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['list_leave_types'] == 1
                || $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_leave_types'] == 1
                ))
            <li @if(Request::is('leaves/*') || Request::is('leaves')) class="open active" @endif>
                <a href="javascript:;"> <i class="material-icons">local_hospital</i> <span class="title">Leaves</span>  <span class="@if(Request::is('leaves/*') || Request::is('leaves')) open @endif arrow"></span> </a>
                <ul class="sub-menu">
                    @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['add_leaves']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['add_leaves'] == 1 )
                        <li> <a href="/leaves/add">    Add Leave </a> </li>
                    @endif
                    @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['upload_leaves']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['upload_leaves'] == 1 )
                        <li> <a href="/leaves/upload"> Upload Leave</a> </li>
                    @endif
                    @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['add_leave_types']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['add_leave_types'] == 1 )
                        <li> <a href="/leaves/types/add">  Add Leave Type </a> </li>
                    @endif
                    @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['list_leave_types']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['list_leave_types'] == 1 )
                        <li> <a href="/leaves/types">   List Leave Type </a> </li>
                    @endif
                </ul>
            </li>
            @endif

            @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['add_holidays']) &&
                ($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['add_holidays'] == 1
                || $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['edit_holidays'] == 1
                || $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['list_holidays'] == 1
                || $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_holidays'] == 1))
            <li @if(Request::is('holidays/*') || Request::is('holidays') ) class="open active" @endif>
                <a href="javascript:;"> <i class="material-icons">event</i> <span class="title">Holidays</span>  <span class="@if(Request::is('holidays/*') || Request::is('holidays')) open @endif arrow"></span> </a>
                <ul class="sub-menu">
                    @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['list_holidays']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['list_holidays'] == 1 )
                        <li> <a href="/holidays">   List</a> </li>
                    @endif
                    @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['add_holidays']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['add_holidays'] == 1 )
                        <li> <a href="/holidays/add" >   Add </a> </li>
                    @endif
                </ul>
            </li>
            @endif

            @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['add_users']) &&
                ($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['add_users'] == 1
                || $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['edit_users'] == 1
                || $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['list_users'] == 1
                || $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_users'] == 1))
            <li @if(Request::is('users') || Request::is('users')) class="open active" @endif>
                <a href="javascript:;"> <i class="material-icons">person</i> <span class="title">Users</span>  <span class="@if(Request::is('users/*') || Request::is('users')) open @endif arrow"></span> </a>
                <ul class="sub-menu">
                    @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['list_users']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['list_users'] == 1 )
                        <li> <a href="/users"> List</a> </li>
                    @endif
                    @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['add_users']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['add_users'] == 1 )
                        <li> <a href="/users/add"> Add</a> </li>
                    @endif

                </ul>
            </li>
            @endif

            @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['add_user_groups']) &&
                ($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['add_user_groups'] == 1
                || $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['edit_user_groups'] == 1
                || $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['list_user_groups'] == 1
                || $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_user_groups'] == 1))
            <li @if(Request::is('access-control') || Request::is('access-control')) class="open active" @endif>
                <a href="javascript:;"> <i class="material-icons">phonelink_lock</i> <span class="title">Access Control</span>  <span class="@if(Request::is('access-control/*') || Request::is('access-control')) open @endif arrow"></span> </a>
                <ul class="sub-menu">
                    @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['list_user_groups']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['list_user_groups'] == 1 )
                        <li> <a href="/user-groups/"> List</a> </li>
                    @endif
                    @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['add_user_groups']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['add_user_groups'] == 1 )
                        <li> <a href="/user-groups/add">  Add </a> </li>
                    @endif
                </ul>
            </li>
            @endif

            @if((
                    isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['manual_clocking'])
                    || isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['apply_for_leave'])
                )
                &&
                (
                    $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['manual_clocking'] == 1
                    || $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['apply_for_leave'] == 1
                ))
                <li @if(Request::is('admin') || Request::is('admin')) class="open active" @endif>
                    <a href="javascript:;"> <i class="material-icons">assignment_ind</i> <span class="title">Admin</span>  <span class="@if(Request::is('admin/*') || Request::is('admin')) open @endif arrow"></span> </a>
                    <ul class="sub-menu">
                        @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['manual_clocking']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['manual_clocking'] == 1 )
                            <li> <a href="/admin/manual-clock"> Manual Clock</a> </li>
                        @endif
                        @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['apply_for_leave']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['apply_for_leave'] == 1 )
                            <li> <a href="/admin/apply-for-leave">  Apply For Leave </a> </li>
                        @endif
                    </ul>
                </li>
            @endif

        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>
<a href="#" class="scrollup">Scroll</a>
<div class="footer-widget">
    <p><b>{{env('COMPANY')}} &nbsp;</b>  v1.0</p>
</div>
<!-- END SIDEBAR -->