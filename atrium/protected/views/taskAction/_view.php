<?php
/* @var $this TaskActionController */
/* @var $data TaskAction */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('action_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->action_id), array('view', 'id'=>$data->action_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('progress')); ?>:</b>
	<?php echo CHtml::encode($data->progress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time')); ?>:</b>
	<?php echo CHtml::encode($data->time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('task_id')); ?>:</b>
	<?php echo CHtml::encode($data->task_id); ?>
	<br />


</div>