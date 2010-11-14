<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Gym6</title>
        <link rel="stylesheet" href="/css/style.css" type="text/css" />

        <script type="text/javascript" src="/js/jquery-1.4.3.js"></script>
        <script type="text/javascript" src="/js/jquery-ui.js"></script>
        <script type="text/javascript" src="/js/jquery.ui.slider.js"></script>

        <script type="text/javascript" src="/js/publisher.js"></script>
        <script type="text/javascript" src="/js/subscriber.js"></script>
        <script type="text/javascript" src="/js/ui.formBase.js"></script>
        <script type="text/javascript" src="/js/ui.formWidgetBase.js"></script>
        <script type="text/javascript" src="/js/ui.widgetBlock.js"></script>
        <script type="text/javascript" src="/js/ui.scrollbarWidget.js"></script>
        <script type="text/javascript" src="/js/ui.scalableSet.js"></script>
        <script type="text/javascript" src="/js/ui.scalable.js"></script>
        <script type="text/javascript" src="/js/ui.buttonSet.js"></script>
        <script type="text/javascript" src="/js/ui.complexityBlock.js"></script>
        <script type="text/javascript" src="/js/ui.monthCalendar.js"></script>
        <script type="text/javascript" src="/js/ui.tabs.js"></script>

        <script type="text/javascript" src="/js/init.js"></script>

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
            <p>To get support — financial or technological — write Mary Jenkins to <a href="#">mary@gym6.com</a></p>
            Gym6 has been produced by Dan Ayphor. <br /><a href="#">Write him</a> to tell your opinion or discuss business opportunities.
        </div></div>


    </body>
</html>