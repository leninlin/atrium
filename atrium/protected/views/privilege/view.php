<?php
/* @var $this PrivilegeController */
/* @var $model Privilege */

$this->breadcrumbs=array(
	'Privileges'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Privilege', 'url'=>array('index')),
	array('label'=>'Create Privilege', 'url'=>array('create')),
	array('label'=>'Update Privilege', 'url'=>array('update', 'id'=>$model->privilege_id)),
	array('label'=>'Delete Privilege', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->privilege_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Privilege', 'url'=>array('admin')),
);
?>

<h1>View Privilege #<?php echo $model->privilege_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'privilege_id',
		'name',
		'description',
	),
)); ?>
