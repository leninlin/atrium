<?php
/* @var $this UsergroupController */
/* @var $model Usergroup */

$this->breadcrumbs=array(
	'Usergroups'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Usergroup', 'url'=>array('index')),
	array('label'=>'Create Usergroup', 'url'=>array('create')),
	array('label'=>'Update Usergroup', 'url'=>array('update', 'id'=>$model->usergroup_id)),
	array('label'=>'Delete Usergroup', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->usergroup_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Usergroup', 'url'=>array('admin')),
);
?>

<h1>View Usergroup #<?php echo $model->usergroup_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'usergroup_id',
		'name',
	),
)); ?>
