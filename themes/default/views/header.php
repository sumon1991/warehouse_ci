<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <base href="<?= site_url() ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?> - <?= $Settings->site_name ?></title>
    <link rel="shortcut icon" href="<?= $assets ?>images/icon.png"/>
    <link href="<?= $assets ?>styles/theme.css" rel="stylesheet"/>
    <link href="<?= $assets ?>styles/style.css" rel="stylesheet"/>
    <link href="<?= $assets ?>styles/multi-select.css" rel="stylesheet"/>
    
<?php if($this->router->method == "view_tree") {?>
<link rel="stylesheet" href="<?= $assets ?>treant-js-master/Treant.css">
<link rel="stylesheet" href="<?= $assets ?>treant-js-master/examples/basic-example/basic-example.css">
<?php } ?>
    
    
    <script type="text/javascript" src="<?= $assets ?>js/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="<?= $assets ?>js/jquery-migrate-1.2.1.min.js"></script>
    <!--[if lt IE 9]>
    <script src="<?= $assets ?>js/jquery.js"></script>
    <![endif]-->
    
    <?php if($this->router->method == "view_tree") {?>
<script src="<?= $assets ?>treant-js-master/vendor/raphael.js"></script>
<script src="<?= $assets ?>treant-js-master/Treant.js"></script>
<?php } ?>

    <noscript><style type="text/css">#loading { display: none; }</style></noscript>
    <?php if ($Settings->user_rtl) { ?>
        <link href="<?= $assets ?>styles/helpers/bootstrap-rtl.min.css" rel="stylesheet"/>
        <link href="<?= $assets ?>styles/style-rtl.css" rel="stylesheet"/>
        <script type="text/javascript">
            $(document).ready(function () { $('.pull-right, .pull-left').addClass('flip'); });
        </script>
    <?php } ?>
    <script type="text/javascript">
        $(window).load(function () {
            $("#loading").fadeOut("slow");
        });
    </script>
</head>

<body>
<noscript>
    <div class="global-site-notice noscript">
        <div class="notice-inner">
            <p><strong>JavaScript seems to be disabled in your browser.</strong><br>You must have JavaScript enabled in
                your browser to utilize the functionality of this website.</p>
        </div>
    </div>
</noscript>
<div id="loading"></div>
<div id="app_wrapper">
    <header id="header" class="navbar">
        <div class="container">
            <a class="navbar-brand" href="<?= site_url() ?>"><span class="logo"><?= $Settings->site_name ?></span></a>

            <div class="btn-group visible-xs pull-right btn-visible-sm">
                <button class="navbar-toggle btn" type="button" data-toggle="collapse" data-target="#sidebar_menu">
                    <span class="fa fa-bars"></span>
                </button>
                <a href="<?= site_url('users/profile/' . $this->session->userdata('user_id')); ?>" class="btn">
                    <span class="fa fa-user"></span>
                </a>
                <a href="<?= site_url('logout'); ?>" class="btn">
                    <span class="fa fa-sign-out"></span>
                </a>
            </div>
            <div class="header-nav">
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown">
                        <a class="btn account dropdown-toggle" data-toggle="dropdown" href="#">
                            <img alt="" src="<?= $this->session->userdata('avatar') ? site_url() . 'assets/uploads/avatars/thumbs/' . $this->session->userdata('avatar') : base_url('assets/images/' . $this->session->userdata('gender') . '.png'); ?>" class="mini_avatar img-rounded">

                            <div class="user">
                                <span><?= lang('welcome') ?> <?= $this->session->userdata('username'); ?></span>
                            </div>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="<?= site_url('users/profile/' . $this->session->userdata('user_id')); ?>">
                                    <i class="fa fa-user"></i> <?= lang('profile'); ?>
                                </a>
                            </li>
                            <li>
                                <a href="<?= site_url('users/profile/' . $this->session->userdata('user_id') . '/#cpassword'); ?>"><i class="fa fa-key"></i> <?= lang('change_password'); ?>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?= site_url('logout'); ?>">
                                    <i class="fa fa-sign-out"></i> <?= lang('logout'); ?>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown hidden-xs"><a class="btn tip" title="<?= lang('dashboard') ?>" data-placement="bottom" href="<?= site_url('welcome') ?>"><i class="fa fa-dashboard"></i></a></li>
                     <?php if(hasAccess(20,0)) {?>
                    <li class="dropdown hidden-sm">
                        <a class="btn tip" title="<?= lang('settings') ?>" data-placement="bottom" href="<?= site_url('system_settings') ?>">
                            <i class="fa fa-cogs"></i>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if(hasAccess(20,54)) {?>
                    <li class="dropdown hidden-xs">
                        <a class="btn tip" title="<?= lang('calculator') ?>" data-placement="bottom" href="#" data-toggle="dropdown">
                            <i class="fa fa-calculator"></i>
                        </a>
                        <ul class="dropdown-menu pull-right calc">
                            <li class="dropdown-content">
                                <span id="inlineCalc"></span>
                            </li>
                        </ul>
                    </li>
                    <?php }?>
                    <?php if(hasAccess(19,0) && hasAccess(19,9)) {?>
                    <?php if ($info) { ?>
                        <li class="dropdown hidden-sm">
                            <a class="btn tip" title="<?= lang('notifications') ?>" data-placement="bottom" href="#" data-toggle="dropdown">
                                <i class="fa fa-info-circle"></i>
                                <span class="number blightOrange black"><?= sizeof($info) ?></span>
                            </a>
                            <ul class="dropdown-menu pull-right content-scroll">
                                <li class="dropdown-header"><i class="fa fa-info-circle"></i> <?= lang('notifications'); ?></li>
                                <li class="dropdown-content">
                                    <div class="scroll-div">
                                        <div class="top-menu-scroll">
                                            <ol class="oe">
                                                <?php foreach ($info as $n) {
                                                    echo '<li>' . $n->comment . '</li>';
                                                } ?>
                                            </ol>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>
					<?php }?>
                    <?php if(hasAccess(31,0) && hasAccess(31,9)) {?>
                    <?php if ($events) { ?>
                        <li class="dropdown hidden-xs">
                            <a class="btn tip" title="<?= lang('calendar') ?>" data-placement="bottom" href="#" data-toggle="dropdown">
                                <i class="fa fa-calendar"></i>
                                <span class="number blightOrange black"><?= sizeof($events) ?></span>
                            </a>
                            <ul class="dropdown-menu pull-right content-scroll">
                                <li class="dropdown-header">
                                <i class="fa fa-calendar"></i> <?= lang('upcoming_events'); ?>
                                </li>
                                <li class="dropdown-content">
                                    <div class="top-menu-scroll">
                                        <ol class="oe">
                                            <?php foreach ($events as $event) {
                                                echo '<li>' . date($dateFormats['php_ldate'], strtotime($event->start)) . ' <strong>' . $event->title . '</strong><br>'.$event->description.'</li>';
                                            } ?>
                                        </ol>
                                    </div>
                                </li>
                                <li class="dropdown-footer">
                                    <a href="<?= site_url('calendar') ?>" class="btn-block link">
                                        <i class="fa fa-calendar"></i> <?= lang('calendar') ?>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php } else { ?>
                    <li class="dropdown hidden-xs">
                        <a class="btn tip" title="<?= lang('calendar') ?>" data-placement="bottom" href="<?= site_url('calendar') ?>">
                            <i class="fa fa-calendar"></i>
                        </a>
                    </li>
                    <?php } ?>
                    <?php }?>
                    <?php if(hasAccess(20,52)) {?>
                    <li class="dropdown hidden-sm">
                        <a class="btn tip" title="<?= lang('styles') ?>" data-placement="bottom" data-toggle="dropdown"
                           href="#">
                            <i class="fa fa-css3"></i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li class="bwhite noPadding">
                                <a href="#" id="fixed" class="">
                                    <i class="fa fa-angle-double-left"></i>
                                    <span id="fixedText">Fixed</span>
                                </a>
                                <a href="#" id="cssLight" class="grey">
                                    <i class="fa fa-stop"></i> Grey
                                </a> 
                                <a href="#" id="cssBlue" class="blue">
                                    <i class="fa fa-stop"></i> Blue
                                </a> 
                                <a href="#" id="cssBlack" class="black">
                                   <i class="fa fa-stop"></i> Black
                               </a>
                           </li>
                        </ul>
                    </li>
                    <?php }?>
                    <?php if(hasAccess(20,53)) {?>
                    <li class="dropdown hidden-xs">
                        <a class="btn tip" title="<?= lang('language') ?>" data-placement="bottom" data-toggle="dropdown"
                           href="#">
                            <img src="<?= base_url('assets/images/' . $Settings->user_language . '.png'); ?>" alt="">
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <?php $scanned_lang_dir = array_map(function ($path) {
                                return basename($path);
                            }, glob(APPPATH . 'language/*', GLOB_ONLYDIR));
                            foreach ($scanned_lang_dir as $entry) { ?>
                                <li>
                                    <a href="<?= site_url('welcome/language/' . $entry); ?>">
                                        <img src="<?= base_url(); ?>assets/images/<?= $entry; ?>.png" class="language-img"> 
                                        &nbsp;&nbsp;<?= ucwords($entry); ?>
                                    </a>
                                </li>
                            <?php } ?>
                            <li class="divider"></li>
                            <li>
                                <a href="<?= site_url('welcome/toggle_rtl') ?>">
                                    <i class="fa fa-align-<?=$Settings->user_rtl ? 'right' : 'left';?>"></i>
                                    <?= lang('toggle_alignment') ?>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php }?>
                    <?php //if ($Owner && $Settings->update) { ?>
                  <!--  <li class="dropdown hidden-sm">
                        <a class="btn blightOrange tip" title="<? //= lang('update_available') ?>" 
                            data-placement="bottom" data-container="body" href="<? //= site_url('system_settings/updates') ?>">
                            <i class="fa fa-download"></i>
                        </a>
                    </li>-->
                        <?php //} ?>
                    <?php //if (($Owner || $Admin || $GP['reports-quantity_alerts'] || $GP['reports-expiry_alerts']) && ($qty_alert_num > 0 || $exp_alert_num > 0)) { ?>
                    <?php if(hasAccess(13,36) && hasAccess(13,63)) {?>
                        <li class="dropdown hidden-sm">
                            <a class="btn blightOrange tip" title="<?= lang('alerts') ?>" 
                                data-placement="left" data-toggle="dropdown" href="#">
                                <i class="fa fa-exclamation-triangle"></i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                             <?php if(hasAccess(13,36)) {?>
                                <li>
                                    <a href="<?= site_url('reports/quantity_alerts') ?>" class="">
                                        <span class="label label-danger pull-right" style="margin-top:3px;"><?= $qty_alert_num; ?></span>
                                        <span style="padding-right: 35px;"><?= lang('quantity_alerts') ?></span>
                                    </a>
                                </li>
                                <?php }?>
                                 <?php if(hasAccess(13,63)) {?>
                                <?php if ($Settings->product_expiry) { ?>
                                <li>
                                    <a href="<?= site_url('reports/expiry_alerts') ?>" class="">
                                        <span class="label label-danger pull-right" style="margin-top:3px;"><?= $exp_alert_num; ?></span>
                                        <span style="padding-right: 35px;"><?= lang('expiry_alerts') ?></span>
                                    </a>
                                </li>
                                <?php } ?>   <?php } ?>
                            </ul>
                        </li>
                    <?php } ?>
                     <?php if(hasAccess(14,0) && hasAccess(14,9)) {?>
                    <?php if (POS) { ?>
                    <li class="dropdown hidden-xs">
                        <a class="btn bdarkGreen tip" title="<?= lang('pos') ?>" data-placement="bottom" href="<?= site_url('pos') ?>">
                            <i class="fa fa-th-large"></i> <span class="padding05"><?= lang('pos') ?></span>
                        </a>
                    </li>
                    <?php } ?> <?php } ?>
                <?php if(hasAccess(13,64)) {?>
                        <li class="dropdown">
                            <a class="btn bdarkGreen tip" id="today_profit" title="<span><?= lang('today_profit') ?></span>" 
                                data-placement="bottom" data-html="true" href="<?= site_url('reports/profit') ?>" 
                                data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-hourglass-2"></i>
                            </a>
                        </li>
                    <?php } ?>
                    <?php //if ($Owner || $Admin) { ?>
                    <?php if(hasAccess(14,9)) {?>
                    <?php if (POS) { ?>
                    <li class="dropdown hidden-xs">
                        <a class="btn bblue tip" title="<?= lang('list_open_registers') ?>" data-placement="bottom" href="<?= site_url('pos/registers') ?>">
                            <i class="fa fa-list"></i>
                        </a>
                    </li>
                    <?php } ?>
                   <!-- <li class="dropdown hidden-xs">
                        <a class="btn bred tip" title="<? //= lang('clear_ls') ?>" data-placement="bottom" id="clearLS" href="#">
                            <i class="fa fa-eraser"></i>
                        </a>
                    </li>-->
                    <?php } ?>
                </ul>
            </div>
        </div>
    </header>

    <div class="container" id="container">
        <div class="row" id="main-con">
        <table class="lt"><tr><td class="sidebar-con">
            <?php $this->load->view($this->Settings->theme.'/views/sidebar_left'); ?>
            </td><td class="content-con">
            <div id="content">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <ul class="breadcrumb">
                            <?php
                            foreach ($bc as $b) {
                                if ($b['link'] === '#') {
                                    echo '<li class="active">' . $b['page'] . '</li>';
                                } else {
                                    echo '<li><a href="' . $b['link'] . '">' . $b['page'] . '</a></li>';
                                }
                            }
                            ?>
                            <li class="right_log hidden-xs">
                                <?= lang('your_ip') . ' ' . $ip_address . " <span class='hidden-sm'>( " . lang('last_login_at') . ": " . date($dateFormats['php_ldate'], $this->session->userdata('old_last_login')) . " " . ($this->session->userdata('last_ip') != $ip_address ? lang('ip:') . ' ' . $this->session->userdata('last_ip') : '') . " )</span>" ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <?php if ($message) { ?>
                            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close" type="button">×</button>
                                <?= $message; ?>
                            </div>
                        <?php } ?>
                        <?php if ($error) { ?>
                            <div class="alert alert-danger">
                                <button data-dismiss="alert" class="close" type="button">×</button>
                                <?= $error; ?>
                            </div>
                        <?php } ?>
                        <?php if ($warning) { ?>
                            <div class="alert alert-warning">
                                <button data-dismiss="alert" class="close" type="button">×</button>
                                <?= $warning; ?>
                            </div>
                        <?php } ?>
                        <?php
                        if ($info) {
                            foreach ($info as $n) {
                                if (!$this->session->userdata('hidden' . $n->id)) {
                                    ?>
                                    <div class="alert alert-info">
                                        <a href="#" id="<?= $n->id ?>" class="close hideComment external"
                                           data-dismiss="alert">&times;</a>
                                        <?= $n->comment; ?>
                                    </div>
                                <?php }
                            }
                        } ?>
                        <div class="alerts-con"></div>
