<table>
<tr>
    <th><?=$this->Paginator->sort('Person.name','名前') ?></th>
　　<th><?=$this->Paginator->sort('title','タイトル') ?></th>
</tr>
<!--<?=$this->Html->tableHeaders(
['投稿者','タイトル'],
['style'=>'color:#000066;background-color: #AAAAFF'],
['style'=>'color:#000066;background-color: #EEEEFF']
); ?>-->
<?php foreach ($data as $obj): ?>
<?=$this->Html->tableCells(
  [$obj['person']['name'],$obj['title']],
  ['style'=>'color:#000099; background-color: #CCCCFF'],
  ['style'=>'color:#006600; background-color: #EEFFEE'],
  false,true) ?>
<?php endforeach; ?>
</table>
<p>
<?php
      $this->Html->addCrumb('First','one');
      $this->Html->addCrumb('Second','two');
      $this->Html->addCrumb('Last','end');
?>
    <?=$this->Html->getCrumbs('|','Top') ?>
</p>

<?=$this->Html->tag('span',
h('use this　HTML helper create a <span>.'),
['styple'=>'color: #006600; font-weight: bold'],
true) ?>