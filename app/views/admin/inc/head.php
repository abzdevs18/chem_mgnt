<!DOCTYPE html>
<html>

<head>
    <title><?=SITE_NAME;?></title>
    <!-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> -->
    <link rel="icon" type="image/x-icon" href="/img/logo_icon/lab.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto|Quicksand:400,500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://1914282112.rsc.cdn77.org/css/all.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="/lib/css/fa/css/all.min.css"> -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/drop_down.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="/lib/css/jquery.mCustomScrollbar.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/lfnph5l20f8g9uy5tmuwru7xu7a2egw7rq58pmwxgalo4r80/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/intro.js@2.9.3/intro.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intro.js@2.9.3/introjs.min.css">
    <script type="text/javascript" src="/lib/js/jquery.simplePagination.js"></script>
    <script type="text/javascript" src="/lib/js/paginator.js"></script>
    <script src="moment.js"></script>
    <!-- <script src="/js/modules.js"></script> -->
    <link type="text/css" rel="stylesheet" href="/lib/css/simplePagination.css"/>
    <style>
    @import url("/css/static-style.css");

    #navigation-scroll>.mCSB_inside>.mCSB_container {
        margin-right: 0px !important;
    }

    #accordion .ui-state-active {
        background-color: #2b2f3e !important;
        border-color: #2b2f3e !important;
    }

    #accordion h3 {
        font: var(--font-quick-500-18);
        font-size: 15px;
    }

    .mCSB_inside>.mCSB_container {
        margin-right: 5px !important;
    }

    .tox-statusbar__branding {
        display: none !important;
    }
    .req_formula_listing > p {
        display: inline-block;
    }
    </style>
    <script>
    $(function() {
        $("#accordion").accordion();
    });
    </script>
    <script>
    // var socket = io.connect('https://34.71.32.229:3000/');

    // Connecting to secure socket
    var socket = io.connect('https://chemlab.cf:3389/',{secure: true});

    tinymce.init({
        selector: 'textarea#chemicalFormula',
        // without the below lines of code. TinyMCE editor gets the value of the textarea
        // on second click, not on the first click.
        //NOTE: important code.
        setup: function(editor) {
            editor.on('change', function() {
                tinymce.triggerSave();
            });
        }
    });
    </script>
    <!-- Base on the documentation, if multiple editors we need to initialize each -->
    <script>
    $(function() {
        $('i').tooltip();
    });
    </script>
</head>

<body style="position:relative;" >
    <!-- <img style="position:absolute;z-index:-1;" src="/css/svg/header.svg" alt="" class="src"> -->
    <!-- Modal: For adding chemicals. First Plan -->
    <div id="modal"
        style="display:none;width: 100%;height: 100vh;background: rgba(51, 51, 51, 0.37);z-index: 999999;position: fixed;">
        <form>
            <section class="offices-msgs">
                <div class="alerts-notif" style="width: 66.66%;margin: 0 auto;position: relative;">
                    <span class="modal-close"
                        style="position: absolute;color: #fff;z-index: 9;right: 0;padding: 10px;background: green;top: -21px;border-radius: 50%;width: 20px;height: 20px;text-align: center;line-height: 20px;font-size: 20px;"><i
                            class="fal fa-times"></i></span>
                    <div class="alert-content no-fixed-height" style="display: flex;flex-direction: column;">
                        <div class="content-head">
                            <h2>Job Details</h2>
                        </div>
                    </div>
                </div>
            </section>
            <section class="offices-msgs">
                <div class="alerts-notif">
                    <div class="alert-content">
                        <div class="content-head">
                            <h2>Site Activity Log</h2>
                        </div>
                        <div id="log">
                            <ul id="content-log-list" class="mCustomScrollbar content fluid light"
                                data-mcs-theme="inset-2-dark" style="height: 400px;width: 100%;">
                                <?php for($i = 0; $i <= 10; $i++) :?>
                                <li>
                                    <h3>You Posted A Job - Carpenter Required</h3>
                                    <time>02 Minutes Ago</time>
                                </li>
                                <?php endfor;?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="alerts-notif">
                    <div class="alert-content">
                        <div class="content-head">
                            <h2>Recent request</h2>
                        </div>
                        <div class="ad-log">
                            <ul class="mCustomScrollbar content fluid light" data-mcs-theme="inset-2-dark"
                                style="height: 400px;width: 100%;">
                                <?php for($i = 0; $i <= 10; $i++) :?>
                                <li>
                                    <span class="tg-adverified">Verified Ad</span>
                                    <h3>Brand new lenovo laptop i5 for sale</h3>
                                    <time datetime="2017-08-08">01 Day Ago</time>
                                </li>
                                <?php endfor;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>
    <!-- End Modal -->
    <!-- Modal: For adding chemicals. First Plan -->
    <div id="cc-modal" style="display:none;width: 100%; height: 100vh; z-index: 999999; position: fixed;background: rgba(3,3,3,0.2);transition: all .5s ease-in-out;">
        <div style="min-width: 300px;width: 50%;margin: 0 auto;margin-top: -100%;transition: all .5s ease-in-out;" class="modal-notification" >
            <section class="offices-msgs" style="flex-direction: column;width: 100%;background: #fff;border-radius: 5px;">
                <div class="alerts-notif" style="width: 100%;margin: 0 auto;position: relative;padding: 0;">
                    <span class="modal-close notif-cc-close" style="position: absolute;color: #fff;z-index: 9;right: 0px;padding: 5px 7px 10px;border-radius: 3px;width: 15px;height: 15px;text-align: center;line-height: 20px;font-size: 20px;border: 1px solid #fff;margin: 14px;"><i
                            class="fal fa-times"></i></span>
                    <div class="alert-content no-fixed-height" style="display: flex;flex-direction: column;">
                        <div class="content-head">
                            <h2>Job Details</h2>
                        </div>
                    </div>
                </div>
                <section class="alert-content">
                    <p class="alert-message">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum odio vero aperiam assumenda quos rerum animi nostrum, sint ratione provident necessitatibus, quaerat, commodi asperiores dolorem! Itaque reiciendis mollitia quod repudiandae!</p>
                </section>
                <section class="alert-actions">
                    <button style="background:var(--proceed-with-caution-label);">Delete</button>
                    <button style="background: var(--green);">Cancel</button>
                </section>
            </section>
        </div>
    </div>
    <!-- End Modal -->
    <!-- Float Alert -->    
    <div class="float-alert">
        <p>Wrong username/password</p>
    </div>
    <!-- Float alert end -->
    <!-- Right Sidebar -->
    <div class="request_side">
        <span><i class="fal fa-times"></i></span>
        <div class="req_details mCustomScrollbar content fluid light" data-mcs-theme="inset-2-dark"
            style="height: calc( 100vh - 100px );width:100%;">
            <div id="head_name">
                <div class="request_icon_wrapper m_icon">
                    <div class="req_icon m_icon_req">
                        <span>M</span>
                    </div>
                    <div style="margin:5px;margin-top:11px;" class="m_head_req">
                        <h3>Clint Anthony Abueva</h3>
                    </div>
                    <p style="font:var(--font-quick-500-18);font-size:15px;">Department</p>
                    <div id="m_req_status">
                        <span><i class="fas fa-circle" style="font-size:10px;"></i> Pending</span>
                    </div>
                </div>
            </div>
            <div id="accordion">
                <h3>Requested</h3>
                <div class="ad-log">
                    <ul class="mCustomScrollbar content fluid light" data-mcs-theme="inset-2-dark"
                        style="height: 300px;width: 100%;">
                        <?php for($i = 0; $i <= 10; $i++) :?>
                        <li>
                            <span class="tg-adverified cat_chemical">Salt</span>
                            <h3>Sodium Orthophosphate</h3>
                            <time datetime="2017-08-08">01 Day Ago</time>
                        </li>
                        <?php endfor;?>
                    </ul>
                </div>
                <h3>Note</h3>
                <div class="ad-log">
                    <ul class="mCustomScrollbar content fluid light" data-mcs-theme="inset-2-dark"
                        style="height: 300px;width: 100%;">
                        <?php for($i = 0; $i <= 2; $i++) :?>
                        <li>
                            <span class="tg-adverified cat_chemical">Salt</span>
                            <h3>Sodium Orthophosphate</h3>
                            <time datetime="2017-08-08">01 Day Ago</time>
                        </li>
                        <?php endfor;?>
                    </ul>
                </div>
            </div>
            <div class="actionButtonModal">
                <button>Deny</button>
                <button id="cancelDeletion">Approve</button>
            </div>
        </div>
    </div>
    <!-- End Right Sidebar -->

    <!-- Notification Modal -->
    <div class="m_notification">
        <h3>Notification</h3>
        <div class="ad-log">
            <ul class="mCustomScrollbar content fluid light notif-holder" data-mcs-theme="inset-2-dark"
                style="height: 400px;width: 100%;">
            </ul>
        </div>
    </div>
    <!-- End Notification Modal -->
    <main>
        <header class="dashboard-nav">
            <div id="add-post">
                <div class="search-dash" style="margin-top: 5px;">
                    <div id="search-sort" style="width: 80%;">
                        <input type="text" name="search" placeholder="Search Here" style="width: 100%;"
                            id="admin-search-field">
                        <i class="fal fa-search"></i>
                    </div>
                    <div class="dash-result">
                        <div>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </div>
                    </div>
                </div>
                <div>
                    <?php if($data['user'][0]->user_type == 1):?>
                        <a href="/admin/form"><i class="fal fa-bookmark"></i> Store Chemical</a>
                    <?php elseif($data['config'][6]->config_value == 1 && $data['user'][0]->user_type == 0):?>
                        <a href="/admin/form"><i class="fal fa-bookmark"></i> Store Chemical</a>
                    <?php endif;?>
                    <div id="notif-icon">
                        <button><i class="fal fa-bell"></i></button>
                        <span id="notif-counter">2</span>
                    </div>
                    <div
                        style="display: flex;flex-direction: row;margin-left: 20px;vertical-align: middle;line-height: 45px;border-left: 2px solid #999;">
                        <span style="font-family: 'quicksand';font-weight: 600;padding-left: 10px;">Administrator</span>
                        <div
                            style="width: 46px;height: 46px;border: 1px solid #666;margin-left: 10px;border-radius: 50%;background: #f3f3f3;background-image: url('/img/prof.png');background-size: contain;background-repeat: no-repeat;background-position: center;">

                        </div>
                    </div>
                </div>
            </div>
            <section id="side-navigation">
                <div class="clip-path">
                    <span>
                        <i class="fal fa-angle-left caret-left caret"></i>
                        <i class="fal fa-angle-right caret-right caret"></i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="67" viewBox="0 0 20 67">
                            <metadata>
                                <!--?xpacket begin="﻿" id="W5M0MpCehiHzreSzNTczkc9d"?-->
                                <x:xmpmeta xmlns:x="adobe:ns:meta/"
                                    x:xmptk="Adobe XMP Core 5.6-c138 79.159824, 2016/09/14-01:09:01">
                                    <rdf:rdf xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#">
                                        <rdf:description rdf:about=""></rdf:description>
                                    </rdf:rdf>
                                </x:xmpmeta>
                                <!--?xpacket end="w"?-->
                            </metadata>
                            <path id="bg" class="cls-1"
                                d="M20,27.652V39.4C20,52.007,0,54.728,0,67.265,0,106.515.026-39.528,0-.216-0.008,12.32,20,15.042,20,27.652Z">
                            </path>
                        </svg>
                    </span>
                </div>
                <!--  data-simplebar -->
                <div id="navigation-scroll" class="mCustomScrollbar content fluid light" data-mcs-theme="inset-2-dark"
                    style="height: 100%;width: 100%;">
                    <div id="logo-admin" dir="ltr">
                        <div style="width: 116px;">
                            <img style="width: 100%;" src="/img/logo1.png" id="logo-icon">
                        </div>
                    </div>
                    <div id="admin-profile">
                        <div id="profile-container" class="adm-prof">
                            <div id="admin-icon">
                                <img src="/img/prof.png">
                            </div>
                            <div id="admin-details">
                                <h3>Hi! I'm Angela</h3>
                                <p>Administrator</p>
                            </div>
                            <div id="admin-edit">
                                <a href="/admin/profile"><i class="fal fa-pencil"></i></a>
                            </div>
                        </div>
                    </div>
                    <nav>
                        <ul id="menus-nav">
                            <li data-link="/admin"
                                class="<?=($_SESSION['menu_active']=="home") ? 'menu-active' : ''; ?>">
                                <i class="fal fa-chart-bar"></i>
                                <a href="#"> Analytics</a>
                            </li>
                            <li data-link="/admin/profile"
                                class="<?=($_SESSION['menu_active']=="profile") ? 'menu-active' : ''; ?>">
                                <i class="fal fa-cog"></i>
                                <a href="#"> Profile settings</a>
                            </li>
                            <li data-link="/admin/request"
                                class="<?=($_SESSION['menu_active']=="request") ? 'menu-active' : ''; ?>">
                                <i class="fal fa-cubes"></i>
                                <a href="#"> Requests</a>
                            </li>
                            <li data-link="/admin/messages"
                                class="<?=($_SESSION['menu_active']=="messages") ? 'menu-active' : ''; ?>">
                                <i class="fal fa-envelope"></i>
                                <a href="#"> Messages</a>
                            </li>
                            <li data-link="/admin/chemical"
                                class="<?=($_SESSION['menu_active']=="chemicals") ? 'menu-active' : ''; ?>">
                                <i class="fal fa-flask"></i>
                                <a href="#"> Chemicals</a>
                            </li>
                            <li data-link="/admin/student"
                                class="<?=($_SESSION['menu_active']=="student") ? 'menu-active' : ''; ?>">
                                <i class="fal fa-users-class"></i>
                                <a href="#"> Students</a>
                            </li>
                            <?php if($data['user'][0]->user_type == 1):?>
                            <li data-link="/admin/privacy"
                                class="<?=($_SESSION['menu_active']=="privacy") ? 'menu-active' : ''; ?>">
                                <i class="fal fa-shield-check"></i>
                                <a href="#"> Privacy settings</a>
                            </li>
                            <?php endif;?>
                            <li data-link="/admin/logs"
                                class="<?=($_SESSION['menu_active']=="logs") ? 'menu-active' : ''; ?>">
                                <i class="fal fa-clipboard"></i>
                                <a href="#"> System Logs</a>
                            </li>
                            <li data-link="/users/signout">
                                <i class="fal fa-sign-out"></i>
                                <a href="#"> Logout</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </section>
        </header>