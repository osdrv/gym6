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
            <?php if(0):?>
            <div class="sign"><a href="#">Nastia Larkina</a>|<a href="#">Logout</a></div>
            <?php else:?><!--
            <div class="sign_popup">
                    <?php if(0):?>
                    <p class="error">We don't seem to know you yet. <br /><a href="<?php echo url_for('customer/new') ?>">Sign Up</a> or try another username.</p>
                    <?php endif; ?>
                    <strong>User name</strong>
                    <input type="text" class="text error_text" value="" name=customer[name]/>
                    <strong>Password</strong>
                    <input type="password" class="text" value="" name=customer[password]/>
                        <div class="bottom_sign_popup">
                            <input type="submit" value="" class="sign_in" />
                            <div class="memory">
                                <label><input type="checkbox" /> Stay signed in</label><br />
                                <a href="#">Forgot password?</a>
                            </div>
                        </div>
                </div> -->
            <?php endif; ?>
            <h1 class="logo_new">GYM6<a href="/"></a></h1>
            <?php if(1):?>
            <div class="sign"><a href="<?php echo url_for('customer/new') ?>">Sign Up</a>|<a href="#">Sign In</a> <div class="fb"><img src="/img/temp/fb.png" /></div></div>
            <?php endif;?>
<div id="content">
<?php if ($sf_user->hasFlash('notice')): ?>
<div class="flash_notice">
<?php echo $sf_user->getFlash('notice') ?>
</div>
<?php endif ?>
<?php if ($sf_user->hasFlash('error')): ?>
<div class="flash_error">
<?php echo $sf_user->getFlash('error') ?>
</div>
<?php endif ?>
<div class="content">
<?php echo $sf_content ?>
</div>
</div>
        </div>
        <div id="footer"><div>
            <p>Have any further questions, comments, or suggestions? Just email Julie, our Client Representative and you can expect to receive a response within approximately 1-3 hours.</p>
            Gym6.com was created by Dan Bennington.
            Dan welcomes and appreciates your input about the Gym6 website.
            Please feel free to <a href="#">email</a> Dan with your comments or to find out more
            about business opportunities with Gym6.
        </div></div>


    </body>
</html>