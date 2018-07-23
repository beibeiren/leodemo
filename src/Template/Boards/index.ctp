<h1><?=__('board') ?></h1>
<p><?=$this->Html->link(
    __('post'),
    ['action' => 'add']
) ?></p>

<p><?=__('{0} post',$count) ?></p>
<div>
<table>
<tr>
<th width="25%"><?=__('user') ?></th><th><?=__('title') ?></th>
</tr>
<?php foreach ($data as $obj):?>
    <tr>
    <!--<td><?= $obj ?></td>-->
    <td><?=$this->Html->link(
    $obj['person']['name'],
    ['action' => 'show2',$obj['person_id']]
    ) ?></td>
    <td><?=$this->Html->link(
        $obj['title'],
        ['action' => 'show',$obj['id']]
        ) ?></td>
    </tr>
	<!--<pre><?php print_r($obj->toArray()) ?></pre>-->
<?php endforeach; ?>
</table>
  <div class="paginator">
  <ul class="pagination">
      <?=$this->Paginator->first(' << first') ?>
      <?=$this->Paginator->prev(' < prev') ?>
      <?=$this->Paginator->next(' next >') ?>
      <?=$this->Paginator->last(' last >>') ?>
  </ul>
  </div>
  <div class="paginator">
  <ul class="pagination">
        <?=$this->Paginator->numbers() ?>

  </ul>
  </div>

  <div class="paginator">
        <ul class="pagination">
            <?=$this->Paginator->numbers([
            'before'=>$this->Paginator->first('<<') . '.',
            'after'=>'.'. $this->Paginator->last('>>'),
            'modulus'=>4,
            'separator'=>'.'

            ]) ?>

  </ul>
  </div>
  

</div>