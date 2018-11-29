<?php
$user1 = Auth::user();
$user = $user1->id;
?>
<!--<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <img alt="image" class="img-circle" src="{{ asset('/backend/images/profile_48x48.png') }}" />
                         </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Auth::user()->name }}</strong>
                         </span> <span class="text-muted text-xs block">DNAsbook Admin <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{ url('/admin/manage-profile') }}"><i class="glyphicon glyphicon-user"></i> {{ trans('backend.profile') }}</a></li>
                        
                        <li class="divider"></li>
                        <li><a href="{{ url('/logout') }}"><i class="glyphicon glyphicon-off"></i> {{ trans('backend.logout') }}</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
        </ul>
        
        <ul class="nav metismenu" id="side-menu">
            
            @include('layouts.backend.partials.sidebar-navigation-items', array('items' => $MainNav->roots()))

        </ul>

    </div>
</nav>
-->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{Auth::user()->photo}}" class="img-circle"
                     alt="User Image">
            </div>
            <div class="pull-left info" style="background-color: transparent;">
                <p>{{Auth::user()->last_name .' '.Auth::user()->first_name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            @include('layouts.backend.partials.sidebar-navigation-items', array('items' => $MainNav->roots()))
            <li class="">
                <a class="treeview" data-toggle="dropdown" href="" aria-expanded="false">
                    COMPANY
                    <span class="fa arrow"></span> </a>
                <ul class="treeview-menu" style="display: none;">
                    <li>
                        <a href="\company\edit\{{$user}}">
                            Company Profile
                        </a>
                    </li>
                    <li>
                        <a href="/testo">
                            Testomonial
                        </a>
                    </li>
                    <li>
                        <a href="/photo">
                            Photo
                        </a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a class="treeview" data-toggle="dropdown" href="" aria-expanded="false">
                    OFFLINE PAYMENT
                    <span class="fa arrow"></span> </a>
                <ul class="treeview-menu" style="display: none;">
                    <li>
                        <a href="/offline_pay">
                            PAYMENT
                        </a>
                    </li>
                    <li>
                        <a href="{{route('offline_pay.verify')}}">
                            VERIFY
                        </a>
                    </li>
                </ul>
            </li>
            {{--<li>
                <a href="/offline_pay">
                    OFFLINE PAYMENT
                </a>
            </li>--}}
            <li><a href="{{ url('/logout') }}"><i class="fa fa-link"></i> <span>Logout</span></a></li>
        </ul>
    </section>
</aside>
