<?php echo include_partial('tariff') ?>
            <div class="reg3">
                <h2 class="join_now">Join now</h2>
                <!-- <?php echo $form->renderGlobalErrors() ?>-->
                <form action="<?php echo url_for('customer/fb') ?>" method="post" name="registration">
                <?php echo $form['_csrf_token']; ?>
                <?php echo $form['fbname']->render() ?>
                <?php echo $form['fbid']->render() ?>
                <div class="login"><img id='fbavatar' src="//graph.facebook.com/<?php echo $fbid?>/picture" /> You have connected via Facebook as <h2><p><?php echo $fbname ?></p></h2></div>
                <label class="checkbox"><?php echo $form['agreement']->render() ?>I agree to the <a href="#">Terms of Service</a><?php echo include_partial('error',array('wdgt' => $form['agreement']));?></label>
                <label class="checkbox"><?php echo $form['not_ill']->render() ?><a href="#">Я не больной и не беременный</a><?php echo include_partial('error',array('wdgt' => $form['not_ill']));?></label>
                <a href="#" class="next_step" onclick="document.registration.submit();"></a>
                </form>
            </div>
