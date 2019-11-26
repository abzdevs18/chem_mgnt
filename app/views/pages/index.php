<?php require_once APP_ROOT . '/views/inc/header.php'; ?>

<h1><?=$data['title'];?></h1>

<input type="text" id="msg">
    <button>Send</button>
    <div id="log" class="mCustomScrollbar sample fluid light" data-mcs-theme="inset-2-dark" style="height: 400px;width: 300px;">

</div>
<li class="nav" data-page="home"><a href="<?=URL_ROOT.'/pages/about';?>">HOME</a></li>
<?php require_once APP_ROOT . '/views/inc/footer.php'; ?>