<!-- BEGIN SIDEBAR -->
<div class="page-sidebar " id="main-menu">
    <!-- BEGIN MINI-PROFILE -->
    <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
        <div class="user-info-wrapper sm">
            <div class="profile-wrapper sm">
                <img src="{{URL::asset("theme/img/profiles/profile_placeholder.jpg")}}"  alt="" data-src="{{URL::asset("theme/img/profiles/profile_placeholder.jpg")}}"  data-src-retina="{{URL::asset("theme/img/profiles/profile_placeholder.jpg")}}"  width="69" height="69" />
                <div class="availability-bubble online"></div>
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
            <li @if(Request::is('/')) class="open active" @endif>
                <a href="/"> <i class="material-icons">home</i> <span class="title">Dashboard</span> <span class="selected"></span> </a>
            </li>

            <li @if(Request::is('reports/*')) class="open active" @endif>
                <a href="javascript:;"> <i class="material-icons">assignment</i> <span class="title">Reports</span>  <span class="@if(Request::is('reports/*')) open @endif arrow"></span> </a>
                <ul class="sub-menu">
                    <li> <a href="/reports/absent">         Absent</a> </li>
                    <li> <a href="/reports/attendance">     Attendance </a> </li>
                    <li> <a href="/reports/base">           Base </a> </li>
                    <li> <a href="/reports/leave">          Leave </a> </li>
                    <li> <a href="/reports/map">            Map </a> </li>
                    <li> <a href="/reports/stipend">        Stipend </a> </li>
                    <li> <a href="/reports/registration">   Registration </a> </li>
                </ul>
            </li>

            <li @if(Request::is('companies/*') || Request::is('companies')) class="open active" @endif>
                <a href="javascript:;"> <i class="material-icons">account_balance</i> <span class="title">Companies</span>  <span class="@if(Request::is('companies/*') || Request::is('companies')) open @endif arrow"></span> </a>
                <ul class="sub-menu">
                    <li> <a href="/companies"> List</a> </li>
                    <li> <a href="/companies/add" > Add </a> </li>
                    <li> <a href="/companies/upload" > Upload </a> </li>
                </ul>
            </li>

            <li @if(Request::is('devices/*') || Request::is('devices')) class="open active" @endif>
                <a href="javascript:;"> <i class="material-icons">dock</i> <span class="title">Devices</span>  <span class="@if(Request::is('devices/*') || Request::is('devices')) open @endif arrow"></span> </a>
                <ul class="sub-menu">
                    <li> <a href="/devices">   List</a> </li>
                    <li> <a href="/devices/add">    Add </a> </li>
                    <li> <a href="/devices/upload"> Upload </a> </li>
                </ul>
            </li>

            <li @if(Request::is('leaves/*') || Request::is('leaves')) class="open active" @endif>
                <a href="javascript:;"> <i class="material-icons">local_hospital</i> <span class="title">Leaves</span>  <span class="@if(Request::is('leaves/*') || Request::is('leaves')) open @endif arrow"></span> </a>
                <ul class="sub-menu">
                    <li> <a href="/leaves/add">    Add Leave </a> </li>
                    <li> <a href="/leaves/upload"> Upload Leave</a> </li>
                    <li> <a href="/leaves/types/add">  Add Leave Type </a> </li>
                    <li> <a href="/leaves/types">   List Leave Type </a> </li>
                </ul>
            </li>

            <li @if(Request::is('holidays/*') || Request::is('holidays') ) class="open active" @endif>
                <a href="javascript:;"> <i class="material-icons">event</i> <span class="title">Holidays</span>  <span class="@if(Request::is('holidays/*') || Request::is('holidays')) open @endif arrow"></span> </a>
                <ul class="sub-menu">
                    <li> <a href="/holidays">   List</a> </li>
                    <li> <a href="/holidays/add" >   Add </a> </li>
                    <li> <a href="/holidays/upload"> Upload </a> </li>
                </ul>
            </li>

            <li @if(Request::is('users/*') || Request::is('users')) class="open active" @endif>
                <a href="javascript:;"> <i class="material-icons">person</i> <span class="title">Users</span>  <span class="@if(Request::is('users/*') || Request::is('users')) open @endif arrow"></span> </a>
                <ul class="sub-menu">
                    <li> <a href="/users"> List</a> </li>
                    <li> <a href="/users/add">  Add </a> </li>
                    <li> <a href="/users/upload"> Upload </a> </li>
                </ul>
            </li>

        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>
<a href="#" class="scrollup">Scroll</a>
<div class="footer-widget">
    <div class="progress transparent progress-small no-radius no-margin">
        <div class="progress-bar progress-bar-success animate-progress-bar" data-percentage="100%" style="width: 79%;"></div>
    </div>
    <div class="pull-right">
        <div class="details-status"> <span class="animate-number" data-value="100" data-animation-duration="560"></span></div>
    </div>
</div>
<!-- END SIDEBAR -->