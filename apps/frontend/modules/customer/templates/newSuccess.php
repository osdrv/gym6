<!--   <h1>New Customer</h1>

<?php include_partial('form', array('form' => $form)) ?>
-->
            <img src="/img/temp/a.jpg" />
            <div class="reg1">
                <img src="/img/free.png" />
                <dl>
                    <dt><label><input type="checkbox" checked="checked" />Reminder Service</label></dt>
                    <dd>
                        <p>Reminder service texts you every time you need to exercise and e-mails you if you miss your workouts too often.</p>
                        <label><span>Email</span><input type="text" /></label>
                        <label><span>Phone</span><input type="text" /></label>
                    </dd>
                    <dt><label><input type="checkbox" checked="checked" />Post my progress to Twitter</label></dt>
                    <dd>
                        <p>Not more thanonce a week. Feel free to learn about goodges and badges.</p>
                        <a href="#" class="twitter"><span>Press to autentificate</span></a>
                    </dd>
                    <dt><label><input type="checkbox" />Post my progress to Facebook</label></dt>
                    <dd>
                        <p>Not more thanonce a week. Feel free to learn about goodges and badges.</p>
                        <a href="#" class="facebook_disabled"></a>
                    </dd>
                </dl>
                <a href="<?php echo url_for('customer/pay')?>" class="next_step"></a>
            </div>
