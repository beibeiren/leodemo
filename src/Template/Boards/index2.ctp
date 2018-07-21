<?=$this->Html->charset('utf-8') ?>
<?=$this->Html->css('hello') ?>
<p style='<?=$this->Html->style(['color'=>'red','font-size'=>'14','font-weight'=>'bold'],false); ?>'>hello</p>
<?=$this->Html->doctype('xhtml-strict'); ?>
<?=$this->Html->meta('keywords',null,array('content'=>'php,cakephp,bake,フレームワーク'),false); ?>
<?=$this->Html->image('01.jpg',array('width'=>'200','height'=>'200','alt'=>'sample image')); ?>
<?=$this->Html->link('<<sample link>>','http://google.com',['target'=>'_blank']) ?>
<!--<?=$this->Html->para('p_style','これは、&lt;p&gt;タグを自動生成したものです。',
['align'=>'center']); ?>-->

<?=$this->Html->div('div_style','これは、&lt;p&gt;タグを自動生成したものです。',
['onclick'=>'alert("クリックしました。")']); ?>
