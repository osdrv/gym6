<!--        <script type="text/javascript" src="/js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="/js/jquery-ui-1.8.5.custom.min.js"></script> -->
        <script type="text/javascript">
            $(function(){
                $('.slider').slider({value:50});
                $(".switch_gender a").click(function () {$(this).addClass('active').siblings().removeClass('active'); $(".figure").removeClass('men women alien').addClass($(this).attr('switch')); return false}); 
            });
        </script>
        <ul class="menu">
            <li><a href="#">Workout</a></li>
            <li class="sub"><a href="#">Settings</a></li>
            <li><a href="#">Progress</a></li>
            <li><a href="#">Profile</a></li>
        </ul>
        <img src="/img/temp/a2.jpg" />
        
            <div class="reg2">
                    <div class="reg_date" id="reg_date">
                        <h2>Set your schedule <a href="#" class="q"></a></h2>
                        <div id="week-date-selector" class="days">
                            <a href="#" class="first" value="1">Mon</a>
                            <a href="#" value="2">Tu</a>
                            <a href="#" value="3">Wed</a>
                            <a href="#" value="4">Thu</a>
                            <a href="#" value="5">Fri</a>
                            <a href="#" class="pink" value="6">Sat</a>
                            <a href="#" class="last pink" value="0">Sun</a>
                        </div>
                        <div class="weeks" id="month-date-selector">
                            <div class="month">
                                <h3><?php echo $n_o_month?></h3>
                                <?php $mv=0; foreach($mdays as $mweeks) {
                                      $c = ($mv?($mv==5?'pink':($mv==6?'pink last':'')):'first'); $mv++;?>
                                <div class="<?php echo $c ?>" day="<?php echo $mv==7?0:$mv?>">
                                <?php foreach($mweeks as $mdays) {?>
                                <a href="#" date="<?php echo $mdays['date'] ?>"><?php echo $mdays['view'] ?></a>
                                <?php } ?>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="month">
                                <h3><?php echo $n_o_month1 ?></h3>
                                <?php $mv=0; foreach($mdays1 as $mweeks) {?>
                                <?php $c = ($mv?($mv==5?'pink':($mv==6?'pink last':'')):'first'); $mv++;?>
                                <div class="<?php echo $c ?>" day="<?php echo $mv==7?0:$mv?>">
                                <?php foreach($mweeks as $mdays) {?>
                                <a href="#" date="<?php echo $mdays['date'] ?>"><?php echo $mdays['view'] ?></a>
                                <?php } ?>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <input type="hidden" name="data[dates]" id="data_dates" value=""/>
                     </div>

             <div class="reg_length">
                <h2>Choose your length</h2>
                <div style="position:relative; padding:20px 0; width:330px;">
                <span style="position:absolute; top:9px; left:-30px;">min</span>
                <div id="scalable-set">
                <span class="raz" style="left:10px;">10</span>
                <span class="raz" style="left:100px;">35</span>
                <span class="raz" style="left:50%;">50</span>
                <span class="raz" style="left:80%">80</span>
                </div>
                    <div class="slider" id="slider_length"></div>
                <input type="hidden" name="data[length]" id="data_length" value="50" />
                </div>
            </div>


                <div class="reg_complexity">
                    <h2>Choose your complexity</h2>
                    <div  id="complexity-set">
                            <a value="1" href="#" class="c1">Easy</a>
                            <a value="2" href="#" class="c2">Normal</a>
                            <a value="3" href="#" class="c3">Hard</a>
                            <a value="4" href="#" class="c4">Pro</a>
<!--                    <a href="#" class="c1_select">Easy</a><a href="#" class="c2">Normal</a><a href="#" class="c3">Hard</a><a href="#" class="c4">Pro</a>
-->
                    </div>
                    <input type="hidden" name="data[complexity]" id="data_complexity" value="2" />
                </div>
                
                <div class="reg_setting" id="reg_setting">
                    <div class="men figure">
                        <i class="s1" style="opacity:0.4;" id="indicator-prelum"></i>
                        <i class="s2" style="opacity:0.7;" id="indicator-arms"></i>
                        <i class="s3" style="opacity:0.3;" id="indicator-legs"></i>
                        <i class="s4" style="opacity:0.8;" id="indicator-flexibility"></i>
                        <i class="s5" style="opacity:1;" id="indicator-buttocks"></i>
                    </div>
                    <h2>Настрой-ка</h2>
                    <div style="width:340px; padding-bottom:5px;"><span style="float:right">max</span>min</div>
<!--                    <div class="slider"><span style="font-size:22px;">Arms</span></div>
                    <div class="slider"><span style="font-size:18px;">Prelum</span></div>
                    <div class="slider"><span style="font-size:16px;">Legs</span></div>
                    <div class="slider"><span style="font-size:22px;">Flexibility</span></div>
                    <div class="slider"><span style="font-size:20px;">Buttocks</span></div> -->
                        <div class="slider" id="arms-slider"><span>Arms</span></div>
                        <input type="hidden" name="data[arms]" id="data_arms" value="" />
                        <div class="slider" id="prelum-slider"><span>Prelum</span></div>
                        <input type="hidden" name="data[prelum]" id="data_prelum" value="" />
                        <div class="slider" id="legs-slider"><span>Legs</span></div>
                        <input type="hidden" name="data[legs]" id="data_legs" value="" />
                        <div class="slider" id="flexibility-slider"><span>Flexibility</span></div>
                        <input type="hidden" name="data[flexibility]" id="data_flexibility" value="" />
                        <div class="slider" id="buttocks-slider"><span>Buttocks</span></div>
                        <input type="hidden" name="data[buttocks]" id="data_buttocks" value="" />

                    <div class="switch_gender"><a href="#" class="sg1 active" switch="men">Male</a><a href="#" class="sg2" switch="women">Female</a><a href="#" class="sg3" switch="alien">Alien</a></div>
                </div>
                
                <a href="<?php echo url_for('customer/registration4') ?>" class="sip"></a>
                
            </div>
        </div>  
<script type="text/javascript">registration()</script>