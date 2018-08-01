<style type="text/css">
span.highlight {
  color:white;
  background:blue;
  font-weight:bold;
}
</style>



<?php
$content = "テキストの一部をハイライト表示します。";
$hstr = $this->Text->highlight(
  $content,
  "ハイライト表示",
  [
  'format' =>
      '<span class="highlight">\1</span>',
      'html' => true
  ]
  );
  ?>
  <?=$this->Html->para('p',$hstr) ?>
<?php
$res = $this->Text->autoLink("please check http://google.com/ .",array());
echo $this->Html->para(null,$res,array());
 $str = "<p>please check <a href=\"http://google.com/\">
 http:www.tuyano.com/</a> .</p>";
 echo $this->Text->stripLinks ($str);
 $content = 'this is <b>sample page</b> for cake3app.';?>

 <p><?=$this->Text->excerpt(
  $content, 'page', 10, '***'
  ) ?></p>

  <p><?=$this->Text->truncate(
  $content, 15, ['ellipsis'=>'...?','html' => true,]
  ) ?></p>
<?php $num = "12345.6789"; ?>
<p><?=$this->Number->currency($num, 'EUR') ?></p>
<p><?=$this->Number->precision($num, 3) ?></p>
<p><?=$this->Number->toPercentage($num, 1) ?></p>

<p><?=$this->Number->toReadableSize(12345678) ?></p>

<?php $t = time(); ?>
<p><?=$this->Time->fromString($t) ?></p>
<p><?=$this->Time->toUnix($t) ?></p>
<p><?=$this->Time->gmt($t) ?></p>

<?php $t = '2016-10-24 12:34:56'; ?>
<p><?=$this->Time->format($t,'yyyy年MM月dd日 HH時mm分ss秒') ?></p>
<p><?=$this->Time->nice($t) ?></p>
<p><?=$this->Time->toAtom($t) ?></p>
<p><?=$this->Time->toRSS($t) ?></p>

<pre>
<?php
 $t = time();
 print_r($this->Time->toQuarter($t,true));
  print_r($this->Time->toQuarter($t,false));
  echo $this->Time->nice($t) . "について:\n";
  echo $this->Time->isToday($t) ? "今日です\n":"...\n";
  echo $this->Time->wasYesterday($t) ? "昨日です\n":"...\n";
  echo $this->Time->isTomorrow($t) ? "明日です\n":"...\n";
  echo $this->Time->isThisWeek($t) ? "今週です\n":"...\n";
  echo $this->Time->isThisMonth($t) ? "今月です\n":"...\n";
  echo $this->Time->isThisYear($t) ? "今年です\n":"...\n";

 ?>
</pre>

<p><?php
$w = '3 years';
$d = '2015-1-1';
echo $this->Time->wasWithinLast($w,$d)  ?
   "今日は、" . $d . "から" . $w . "以内です。" :
   "範囲外!";
?></p>






