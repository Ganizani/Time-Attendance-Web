<div class="header navbar navbar-inverse ">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="navbar-inner">
        <div class="header-seperation">
            <ul class="nav pull-left notifcation-center visible-xs visible-sm">
                <li class="dropdown">
                    <a href="#main-menu" data-webarch="toggle-left-side">
                        <i class="material-icons">menu</i>
                    </a>
                </li>
            </ul>
            <!-- BEGIN LOGO -->
            <a href="/" >
                <img src="{{URL::asset("theme/img/logo")}}"  alt="Logo" class="logo" data-src="{{URL::asset("theme/img/")}}"   data-src-retina="{{URL::asset("theme/img/")}}" width="21" height="21" >
            </a>
            <!-- END LOGO -->
        </div>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <div class="header-quick-nav">
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="pull-left">
                <ul class="nav quick-section">
                    <li class="quicklinks">
                        <a href="#" class="" id="layout-condensed-toggle">
                            <i class="material-icons">menu</i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
            <!-- BEGIN CHAT TOGGLER -->
            <div class="pull-right">
                <div class="chat-toggler sm">
                    <div class="profile-pic">
                        <img src="{{ URL::asset("theme/img/profile_placeholder.jpg")}}"  alt="" data-src="{{URL::asset("theme/img/profile_placeholder.jpg")}}" width="35" height="35" />
                        <div class="availability-bubble online"></div>
                    </div>
                </div>
                <ul class="nav quick-section ">
                    <li class="quicklinks">
                        <a data-toggle="dropdown" class="dropdown-toggle  pull-right " href="#" id="user-options">
                            <i class="material-icons">tune</i>
                        </a>
                        <ul class="dropdown-menu  pull-right" role="menu" aria-labelledby="user-options">
                            <li>
                                <a href="/my-account"> My Account</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="/logout"><i class="material-icons">power_settings_new</i>&nbsp;&nbsp;Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- END CHAT TOGGLER -->
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END TOP NAVIGATION BAR -->
</div>
