<?php if(!$sf_user->isAuthenticated()):?>
        <script type="text/javascript">
            $(function(){
                $("#signin_href").click(function () {
                    $(".sign_popup").toggle(); return false;
                    });
            });
        </script>
    <div class="sign_popup" <?if(!$authform['username']->hasError()){?> style="display:none;"<?}?>>
            <?php
            $err = "";
            if($authform['username']->hasError()):?>
            <p class="error"> We don't seem to know you yet.<br /> <a href="<?php echo url_for('/customer/new') ?>">Sign Up</a> or try another username.</p>
            <?php
             $err = " error_text";
             endif; ?>
            <form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
            <?php echo $authform['_csrf_token']; ?>
            <strong>User name</strong>
            <?php echo $authform['username']->render(array('class'=>"text".$err)); ?>
            <strong>Password</strong>
            <?php echo $authform['password']->render(array('class'=>"text".$err)); ?>
                <div class="bottom_sign_popup">
                    <input type="submit" value="" class="sign_in" />
                    <div class="memory">
                        <label><?php echo $authform['remember']->render(); ?> Stay signed in</label><br />
                        <a href="<?php echo url_for('/customer/forgotpass') ?>">Forgot password?</a>
                    </div>
                </div>
            </form>
        </div>
    <div class="sign"><a href="<?php echo url_for('/customer/new') ?>">Sign Up</a>|<a href="#" id="signin_href">Sign In</a>   <div class="fb"><img src="/img/temp/fb.png" /></div> </div>
<?php else:
$user_name = $sf_user->getUsername();
$sfg_user = $sf_user->getGuardUser();
$a = $sfg_user->getProfile()->getFirstName();
$b = $sfg_user->getLastName();
if(strlen($a.$b)>1) $user_name = $a.' '.$b;
?>
    <div class="sign"><a href="#"><?php echo $user_name;?></a>|<a href="<? echo url_for('@sf_guard_signout'); ?>">Logout</a></div>
<?php endif; ?>