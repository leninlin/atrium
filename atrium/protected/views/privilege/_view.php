<?php
/* @var $this PrivilegeController */
/* @var $data Privilege */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('privilege_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->privilege_id), array('view', 'id'=>$data->privilege_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>