<!DOCTYPE html>
<html lang="en">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>{{@$sitesetting->title}} | {{@$title}}</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="<?php echo URL::to('/'); ?>/uploads/logo/{{$sitesetting->backend_logo}}">

<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<!-- iCheck -->
<link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<!-- JQVMap -->
<link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('assets/css/adminlte.min.css')}}">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
<link rel="stylesheet" href="{{asset('fronted/css/toastr.min.css')}}" type="text/css">

<!-- summernote -->
<link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<!-- Google Font: Source Sans Pro -->
<style type="text/css">
    .sa-navs-links.active {
        background-color: #bc9d6c !important;
    }

    .sa-navs-links {
        background-color: #bc9d6c !important;
    }

    .sa-bg-color2 {
        background-color: #bc9d6c !important;
    }

    [class*=sidebar-dark-] .nav-sidebar>.nav-item.menu-open>.nav-link,
    [class*=sidebar-dark-] .nav-sidebar>.nav-item:hover>.nav-link,
    [class*=sidebar-dark-] .nav-sidebar>.nav-item>.nav-link:focus {
        background-color: #bc9d6c !important;
        color: #fff;
    }

    .sa-btn-signin {
        width: 100px;
        font-size: 17px;
        background-color: #bc9d6c;
        border: #bc9d6c;
        border-radius: 5px;
        color: #fff;
    }

    .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active,
    .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
        background-color: #bc9d6c;
        color: #fff;
    }

    [class*=sidebar-dark-] .nav-sidebar>.nav-item.menu-open>.nav-link,
    [class*=sidebar-dark-] .nav-sidebar>.nav-item:hover>.nav-link,
    [class*=sidebar-dark-] .nav-sidebar>.nav-item>.nav-link:focus {
        background-color: #bc9d6c !important;
        color: #fff;
    }


    .nav-pills .sa-nav-links.active {
        color: #fff;
        background-color: #bc9d6c;
    }

    .sa-card-outlines {
        border-top: 3px solid #bc9d6c;
    }

    .sa-bg-color2 {
        background-color: #bc9d6c !important;
    }

    .sa-btn-add,
    .sa-btn-submit {
        width: 100px;
        font-size: 17px;
        background-color: #bc9d6c;
        border: #bc9d6c;
        border-radius: 5px;
        color: #fff;
    }

    .sa-btn-add:focus,
    .sa-btn-submit:focus,
    .sa-btn-close:focus {
        outline: none;
    }

    .sa-btn-add:hover,
    .sa-btn-submit:hover {
        background-color: #bc9d6c;
    }

    .sa-btn-close {
        width: 100px;
        font-size: 17px;
        background-color: #6c757d;
        border: #6c757d;
        border-radius: 5px;
        color: #fff;
    }

    .sa-table1 {
        font-size: 17px;
    }

    .sa-navs-links.active {
        background-color: #bc9d6c !important;
    }

    .sa-navs-links {
        background-color: #bc9d6c !important;
    }

    .sa-icons {
        color: #ff0000;
    }

    .sa-icons.active {
        color: #ff0000;
    }


    .sa-bg-color2 {
        background-color: #bc9d6c !important;
    }

    .sa-profile-img {
        height: 40px;
    }

    .close:focus {
        outline: none;
    }

    .sa-icons1.active {
        color: #495057;
    }

    [class*=sidebar-dark-] .nav-sidebar>.nav-item.menu-open>.nav-link,
    [class*=sidebar-dark-] .nav-sidebar>.nav-item:hover>.nav-link,
    [class*=sidebar-dark-] .nav-sidebar>.nav-item>.nav-link:focus {
        background-color: #bc9d6c !important;
        color: #fff;
    }

    .sa-navs-links.active {
        background-color: #bc9d6c !important;
    }

    .sa-navs-links {
        background-color: #bc9d6c !important;
    }

    .sa-bg-color2 {
        background-color: #bc9d6c !important;
    }

    .sa-btn-submit:focus,
    .sa-btn-close:focus {
        outline: none;
    }

    .sa-btn-submit:hover {
        background-color: #bc9d6c;
    }

    .sa-btn-close {
        width: 100px;
        font-size: 17px;
        background-color: #6c757d;
        border: #6c757d;
        border-radius: 5px;
        color: #fff;
    }

    .sa-btn-submit {
        width: 100px;
        font-size: 17px;
        background-color: #bc9d6c;
        border: #bc9d6c;
        border-radius: 5px;
        color: #fff;
    }

    [class*=sidebar-dark-] .nav-sidebar>.nav-item.menu-open>.nav-link,
    [class*=sidebar-dark-] .nav-sidebar>.nav-item:hover>.nav-link,
    [class*=sidebar-dark-] .nav-sidebar>.nav-item>.nav-link:focus {
        background-color: #bc9d6c !important;
        color: #fff;
    }
</style>
</head>