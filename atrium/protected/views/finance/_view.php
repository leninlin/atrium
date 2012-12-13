<?php
/* @var $this FinanceController */
/* @var $data Finance */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('finance_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->finance_id), array('view', 'id'=>$data->finance_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_id')); ?>:</b>
	<?php echo CHtml::encode($data->project_id); ?>
	<br />


</div>