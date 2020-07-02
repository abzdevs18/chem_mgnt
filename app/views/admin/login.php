<!DOCTYPE html>
<html>

<head>
    <title><?=SITE_NAME;?></title>
    <link rel="icon" type="image/x-icon" href="/img/logo_icon/lab.ico">
    <link rel="stylesheet" type="text/css" href="/css/admin_setup.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://pro.fontawesome.com/releases/v5.1.0/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="/js/offline/jquery.js"></script>
    <script src="/js/jquery-ui.js"></script>
    <script type="module" src="/js/main.js"></script>

<script src="https://cdn.jsdelivr.net/npm/intro.js@2.9.3/intro.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intro.js@2.9.3/introjs.min.css">
</head>

<body style="background-color:#fff !important;">
    <main style="background-color:#fff !important;">
        <div id="flash-msgs">
            <p>Wrong username/password</p>
        </div>
        <section class="form">

            <div class="awesome">
                <!-- Admin Credential start -->
                <div class="icon">
                    <img style="width: 55%;margin-bottom: -45px;" src="<?=URL_ROOT;?>/img/default/<?=$data['logo']->path?>">
                    <!-- <i class="fal fa-user-shield"></i> -->
                </div>
                <div class="add">
                    <!-- <h3>Site/Admin Login</h3> -->
                    <form id="loginCredentials">
                        <div class="group-control adminUVal">
                            <div class="form-group" style="box-shadow:0px 0px 7px #3333;border-radius:3px;">
                                <input type="text" name="adminUserName" class="form-control" autocomplete="off" data-intro='Use "admin" as username' data-step="1">
                                <label for="adminUserName" style="background-color:#fff !important;">Username</label>
                            </div>
                            <label class="invalid-feedback">Error reporting</label>
                        </div><!-- End Database Name Input -->
                        <div class="group-control adminPVal">
                            <div class="form-group" style="box-shadow:0px 0px 7px #3333;border-radius:3px;">
                                <input type="password"  autocomplete="off" name="adminUserPass" class="form-control" data-intro="Your temporary password is: 779267" data-step="2">
                                <label for="adminUserPass" style="background-color:#fff !important;">Password</label>
                            </div>
                            <label class="invalid-feedback">Error reporting</label>
                        </div><!-- End Database Name Input -->
                    </form>
                </div>
                <button class="login-btn login-admin" data-intro="Submit to login" data-step="3">Login</button>
            </div><!-- Admin Credential End -->
        </section>
    </main>
	<script>
    introJs().start();
	</script>
</body>

</html>