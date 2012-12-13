<?php
/* @var $this TaskActionController */
/* @var $model TaskAction */

$this->breadcrumbs=array(
	'Task Actions'=>array('index'),
	$model->action_id,
);

$this->menu=array(
	array('label'=>'List TaskAction', 'url'=>array('index')),
	array('label'=>'Create TaskAction', 'url'=>array('create')),
	array('label'=>'Update TaskAction', 'url'=>array('update', 'id'=>$model->action_id)),
	array('label'=>'Delete TaskAction', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->action_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TaskAction', 'url'=>array('admin')),
);
?>

<h1>View TaskAction #<?php echo $model->action_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'action_id',
		'progress',
		'time',
		'task_id',
	),
)); ?>
