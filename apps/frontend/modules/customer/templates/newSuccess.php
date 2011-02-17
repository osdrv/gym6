<?php
use_helper('sfFacebookConnect');
slot('fb_connect');
include_facebook_connect_script();
end_slot();
?>
<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
        <script type="text/javascript" src="/js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="/js/jquery-ui-1.8.5.custom.min.js"></script>
        <script type="text/javascript">
            $(function(){
                $(".fb").click(function () {
                    FB.login(function(response) {
                          if (response.session) {
                            if (response.perms) {
                              // user is logged in and granted some permissions.
                              // perms is a comma separated list of granted permissions
                            } else {
                              // user is logged in, but did not grant any permissions
                            }
                            FB.api('/me', displayUser);
                          } else {
                            // user is not logged in
                          }
                        }, {perms:'publish_stream,email'});
                    });
            });
        function displayUser(user) {
            $("#userName").val(user.name);
            $("#userId").val(user.id);
            document.fbregistration.submit();
        }
        </script>
<?php echo include_partial('tariff') ?>
            <div class="reg3">
                <h2 class="join_now">Join now</h2>
                <!-- <?php echo $form->renderGlobalErrors() ?>-->
                <form action="<?php echo url_for('customer/fb') ?>" method="post" name="fbregistration">
                <input type=hidden id="userName" name='fbname'>
                <input type=hidden id="userId" name='fbid'>
                </form>
                <form action="<?php echo url_for('customer/new') ?>" method="post" name="registration">
                <?php echo $form['_csrf_token']; ?>
                <div class="no_login">

                    <label><span>User name</span><?php echo include_partial('field',array('fld' => $form['username']));?></label>
                    <label><span>Password</span><?php echo include_partial('field',array('fld' => $form['password']));?></label>
                    <label><span>Password</span><?php echo include_partial('field',array('fld' => $form['password_again']));?></label>

                    <div class="or">or <div class="fb"><img src="/img/temp/fb.png" /></div></div>
                </div>
                <label class="checkbox"><?php echo $form['agreement']->render() ?>I agree to the <a href="#">Terms of Service</a><?php echo include_partial('error',array('wdgt' => $form['agreement']));?></label>
                <label class="checkbox"><?php echo $form['not_ill']->render() ?><a href="#">Я не больной и не беременный</a><?php echo include_partial('error',array('wdgt' => $form['not_ill']));?></label>
                <a href="#" class="next_step" onclick="document.registration.submit();"></a>
                </form>
            </div>
