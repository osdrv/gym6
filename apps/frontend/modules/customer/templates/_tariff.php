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
<?php else: ?>
<script  type="text/javascript">
$(function(){
    $(".choice").click(function () {
        $(this).parent().removeClass('deactive');
        $(this).parent().addClass('active');
    })});
</script>
            <div class="tarifs" style="margin-top:50px;"> <!-- 50px что бы не налезало, стереть -->
                <div class="tarif1 active">
                    <h2>free</h2>
                    <ul>
                        <li>Three days of training</li>
                        <li>Try before you buy</li>
                    </ul>
                    <a href="#" class="choice f1">Chooise</a>
                </div>
                <div class="tarif2 deactive">
                    <h2>Single Month</h2>
                    <ul>
                        <li>Daily training</li>
                        <li>Individual programs</li>
                        <li>Reminders and achievements</li>
                    </ul>
                    <a href="#" class="choice f2">Chooise</a>
                </div>
                <div class="tarif3 deactive">
                    <h2>Three Months</h2>
                    <ul>
                        <li>Save $230</li>
                        <li>Improve your body on a daily basis</li>
                    </ul>
                     <a href="#" class="choice f3">Chooise</a>
                </div>
                <div class="error">Choose something</div>
            </div>
<?php endif; ?>