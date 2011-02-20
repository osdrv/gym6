<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Gym6</title>
        <link rel="stylesheet" href="/css/style.css" type="text/css" />
<?php include_javascripts() ?>
    </head>
    <body>
        <div id="page">
        <?php include_component('demo', 'signin_form') ?>
            <h1 class="logo_new">GYM6<a href="<?php echo url_for('@homepage') ?>"></a></h1>
<!-- <div id="content">
<?php if ($sf_user->hasFlash('notice')): ?>
    <div class="flash_notice">
    <?php echo $sf_user->getFlash('notice') ?>
    </div>
<?php endif; ?>
<?php if ($sf_user->hasFlash('error')): ?>
    <div class="flash_error">
    <?php echo $sf_user->getFlash('error') ?>
    </div>
<?php endif; ?> -->
<div class="content">
<?php echo $sf_content ?>
</div>

 </div>
        <div id="footer"><div>
            <p>Have any further questions, comments, or suggestions? <br /> Just <a href="#">email Julie</a>, our Client Representative and you can expect to receive a response<br /> within approximately 1—3 hours. </p>
            Gym6.com was created by Dan Bennington. Dan welcomes and appreciates your input about the Gym6 website. Please feel free to <a href="#">email Dan</a> with your comments<br /> or to find out more about business opportunities with Gym6.
        </div></div>
<?php
if (has_slot('fb_connect'))
{
  include_slot('fb_connect');
}?>
    </body>
</html>