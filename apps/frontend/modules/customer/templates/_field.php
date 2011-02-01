<?php
if ($fld->hasError())
{
    echo $fld->render(array('class' => 'error')); ?>
<span class="error">
<?php echo $fld->getError();?>
</span>
<?php 
} else 
echo $fld->render(); ?> 