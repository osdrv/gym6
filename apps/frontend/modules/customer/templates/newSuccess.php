<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
        <script type="text/javascript" src="/js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="/js/jquery-ui-1.8.5.custom.min.js"></script>
        <script type="text/javascript">
            $(function(){
                $(".fb").click(function () {
        if(window.location.hash.length == 0)
        {
            url = "https://www.facebook.com/dialog/oauth?client_id=103051006436239&redirect_uri=" + window.location +
                     "&response_type=token";
            window.open(url);

        } else {
            accessToken = window.location.hash.substring(1);
            graphUrl = "https://graph.facebook.com/me?" + accessToken +
                        "&callback=displayUser"

            //use JSON-P to call the graph
            var script = document.createElement("script");
            script.src = graphUrl;
            document.body.appendChild(script);  
        }

                    }); 
            });
        function displayUser(user) {
            userName.innerText = user.name;
            fbavatar.src = '//graph.facebook.com/' + user.id + '/picture';
            $(".login").toggle();
            $(".no_login").toggle();
        }
        </script>
<?php if(0):?>
            <div class="tarifs">
                <div class="tarif1">
                    <h2>free</h2>
                    <ul>
                        <li>Three days of training</li>
                        <li>Try before you buy</li>
                    </ul>
                    <a href="#">Chooise</a>
                </div>
                <div class="tarif2">
                    <h2>Single Month</h2>
                    <ul>
                        <li>Daily training</li>
                        <li>Individual programs</li>
                        <li>Reminders and achievements</li>
                    </ul>
                    <a href="#">Choice</a>
                </div>
                <div class="tarif3">
                    <h2>Three Months</h2>
                    <ul>
                        <li>Save $230</li>
                        <li>Improve your body on a daily basis</li>
                    </ul>
                     <a href="#">Chooise</a>
                </div>
            </div>
<?php endif; ?>
            <div class="tarifs" style="margin-top:50px;"> <!-- 50px что бы не налезало, стереть -->
                <div class="tarif1 deactive">
                    <h2>free</h2>
                    <ul>
                        <li>Three days of training</li>
                        <li>Try before you buy</li>
                    </ul>
                    <a href="#">Chooise</a>
                </div>
                <div class="tarif2 active">
                    <h2>Single Month</h2>
                    <ul>
                        <li>Daily training</li>
                        <li>Individual programs</li>
                        <li>Reminders and achievements</li>
                    </ul>
                    <a href="#">Chooise</a>
                </div>
                <div class="tarif3 deactive">
                    <h2>Three Months</h2>
                    <ul>
                        <li>Save $230</li>
                        <li>Improve your body on a daily basis</li>
                    </ul>
                     <a href="#">Chooise</a>
                </div>
                <!-- <div class="error">Choose something</div> -->
            </div>

            <div class="reg3">
                <h2 class="join_now">Join now</h2>
                <div class="login" style="display:none;"><img id='fbavatar' src="/img/temp/av.jpg" /> You have connected via Facebook as <h2><p id="userName"></p></h2></div>
                <div class="no_login">
                    <form action="<?php echo url_for('@sf_guard_register') ?>" method="post">
                    <label><span>User name</span><?php echo $form['name']->render() ?></label>
                    <label><span>Password</span><?php echo $form['password']->render() ?><!-- <span class="error">Enter password</span></label>-->
                    <label><span>Password</span><?php echo $form['password_again']->render() ?></label>
                    </form>
                    <div class="or">or <div class="fb"><img src="/img/temp/fb.png" /></div></div> 
                </div>
                <label class="checkbox"><?php echo $form['agreement']->render() ?>I agree to the <a href="#">Terms of Service</a></label>
                <label class="checkbox"><?php echo $form['not_ill']->render() ?><a href="#">Я не больной и не беременный</a></label>
                <a href="<?php echo url_for('customer/registration2') ?>" class="next_step"></a>
            </div>
        </div>