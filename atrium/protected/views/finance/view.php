<?php
/* @var $this FinanceController */
/* @var $model Finance */

$this->breadcrumbs=array(
	'Finances'=>array('index'),
	$model->finance_id,
);

$this->menu=array(
	array('label'=>'List Finance', 'url'=>array('index')),
	array('label'=>'Create Finance', 'url'=>array('create')),
	array('label'=>'Update Finance', 'url'=>array('update', 'id'=>$model->finance_id)),
	array('label'=>'Delete Finance', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->finance_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Finance', 'url'=>array('admin')),
);
?>

<h1>View Finance #<?php echo $model->finance_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'finance_id',
		'project_id',
	),
)); ?>
