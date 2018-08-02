<?php
$imgTag = $this->Html->image('cake.power.gif',
   ['alt'=>'Cake.PHP','width'=>100,'height'=>15]);
$aTag = $this->Html->link($imgTag,'http://www.cakephp.org',
   ['target'=>'_blank','escape'=>false]);
 $msg = '<span> copyright CakePHP.</span>'
 ?>
 <p><?=$this->RgbText->redString($aTag . $msg) ?></p>