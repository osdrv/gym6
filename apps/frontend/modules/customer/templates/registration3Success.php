        <script type="text/javascript" src="/js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="/js/jquery-ui-1.8.5.custom.min.js"></script>
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
            <div class="reg_date">
                <h2>Set your schedule 
                    <a href="#" class="q"><span>
                         Тут будет пояснение о том, как работает календарь.
                         Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sed dui quis sem commodo accumsan. Integer sed risus nibh. Maecenas quis ipsum eu ligula posuere volutpat non et est. Praesent laoreet libero sed odio blandit convallis. Proin ut dolor a velit volutpat pretium.
                         <i></i>
                    </span></a>
                </h2>
                <div class="days"><a href="#" class="first select">Mon</a><a href="#">Tu</a><a href="#">Wed</a><a href="#" class="select">Thu</a><a href="#">Fri</a><a href="#" class="pink">Sat</a><a href="#" class="last pink">Sun</a></div>
                <div class="weeks">
                    <div class="month">
                        <h3>October</h3>
                        <div class="first select"><a href="#">27</a><a href="#">4</a><a href="#">11</a><a href="#">18</a><a href="#">25</a></div>
                        <div><a href="#">28</a><a href="#">5</a><a href="#">12</a><a href="#">19</a><a href="#">26</a></div>
                        <div><a href="#">29</a><a href="#">6</a><a href="#">13</a><a href="#">20</a><a href="#">27</a></div>
                        <div class="select"><a href="#">30</a><a href="#">7</a><a href="#">14</a><a href="#">21</a><a href="#">28</a></div>
                        <div><a href="#">1</a><a href="#">8</a><a href="#">15</a><a href="#">22</a><a href="#">29</a></div>
                        <div class="pink"><a href="#">2</a><a href="#">9</a><a href="#">16</a><a href="#">23</a><a href="#">30</a></div>
                        <div class="pink last"><a href="#">3</a><a href="#">10</a><a href="#">17</a><a href="#">24</a><a href="#">31</a></div>
                    </div>           
                     <div class="month">
                        <h3>November</h3>
                        <div class="first"><a href="#">27</a><a href="#">4</a><a href="#">11</a><a href="#">18</a><a href="#">25</a></div>
                        <div><a href="#">28</a><a href="#">5</a><a href="#">12</a><a href="#">19</a><a href="#">26</a></div>
                        <div><a href="#">29</a><a href="#">6</a><a href="#">13</a><a href="#">20</a><a href="#">27</a></div>
                        <div><a href="#">30</a><a href="#">7</a><a href="#">14</a><a href="#">21</a><a href="#">28</a></div>
                        <div><a href="#">1</a><a href="#">8</a><a href="#">15</a><a href="#">22</a><a href="#">29</a></div>
                        <div class="pink"><a href="#">2</a><a href="#">9</a><a href="#">16</a><a href="#">23</a><a href="#">30</a></div>
                        <div class="pink last select"><a href="#">3</a><a href="#">10</a><a href="#">17</a><a href="#">24</a><a href="#">31</a></div>
                    </div>
                </div>
             </div>

             <div class="reg_length">
                <h2>Choose your length</h2>
                <div style="position:relative; padding:20px 0; width:330px;">
                <span style="position:absolute; top:9px; left:-30px;">min</span>
                <span class="raz" style="left:10px;">10</span>
                <span class="raz" style="left:100px;">35</span>
                <span class="raz big" style="left:50%;">50</span>
                <span class="raz" style="left:80%">80</span>
                    <div class="slider"></div>
                </div>
            </div>


                <div class="reg_complexity">
                    <h2>Choose your complexity</h2>
                    <div><a href="#" class="c1_select">Easy</a><a href="#" class="c2">Normal</a><a href="#" class="c3">Hard</a><a href="#" class="c4">Pro</a></div>
                </div>
                
                <div class="reg_setting">
                    <div class="men figure">
                        <i class="s1" style="opacity:0.4;"></i>
                        <i class="s2" style="opacity:0.7;"></i>
                        <i class="s3" style="opacity:0.3;"></i>
                        <i class="s4" style="opacity:0.8;"></i>
                        <i class="s5" style="opacity:1;"></i>
                    </div>
                    <h2>Настрой-ка</h2>
                    <div style="width:340px; padding-bottom:5px;"><span style="float:right">max</span>min</div>
                    <div class="slider"><span style="font-size:22px;">Arms</span></div>
                    <div class="slider"><span style="font-size:18px;">Prelum</span></div>
                    <div class="slider"><span style="font-size:16px;">Legs</span></div>
                    <div class="slider"><span style="font-size:22px;">Flexibility</span></div>
                    <div class="slider"><span style="font-size:20px;">Buttocks</span></div> 
                    <div class="switch_gender"><a href="#" class="sg1 active" switch="men">Male</a><a href="#" class="sg2" switch="women">Female</a><a href="#" class="sg3" switch="alien">Alien</a></div>
                </div>
                
                <a href="<?php echo url_for('customer/registration4') ?>" class="sip"></a>
                
            </div>
        </div>  
