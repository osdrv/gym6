        <img src="/img/temp/a.jpg" style="padding-top:3px;" />
            <div class="reg1">
                <img src="/img/free!.png" />
                <!-- <?php echo $form->renderGlobalErrors() ?>-->
                <form action="<?php echo url_for('customer/registration2') ?>" method="post" name="registration2">
                <?php echo $form['_csrf_token']; ?>
                <dl>
                    <dt><label><?php echo include_partial('field',array('fld' => $form['reminder']));?> Reminder Service</label></dt>
                    <dd>
                        <p>Reminder service texts you every time you need to exercise and e-mails you if you miss your workouts too often.</p>
                        <label><span>Email</span><?php echo include_partial('field',array('fld' => $form['email_address']));?></label>
                        <label><span>Phone</span><?php echo include_partial('field',array('fld' => $form['phone']));?></label>
                    </dd>
                    <dt>Progress in Twitter</dt>
                    <dd>
                        <p>Not more than once a week your goodges and badges will be posted to your Twitter. <a href="#">Undo</a></a>
                        
                        <a href="#" class="twitter">
                            <span>Press to autentificate</span>
                        </a>
                    </dd>
                    <dt><label><?php echo include_partial('field',array('fld' => $form['post2fb']));?>Post my progress to Facebook</label></dt>
                    <dd>
                        <p>Not more than once a week. Feel free to learn about goodges and badges.</p>
                        <a href="#" class="facebook">
                            <span class="error">You have chosen to post your progress to Facebook (which is nice). <br />
                            Please, press this button to allow Gym6 limited access to your Facebook account.</span>
                        </a>
                    </dd>
                </dl>
                </form>
                <a href="#" class="next_step" onclick="document.registration2.submit();"></a>
            </div>
        </div>  
