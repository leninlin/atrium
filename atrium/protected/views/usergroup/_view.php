<?php
/* @var $this UsergroupController */
/* @var $data Usergroup */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('usergroup_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->usergroup_id), array('view', 'id'=>$data->usergroup_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />


</div>