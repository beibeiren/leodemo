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



