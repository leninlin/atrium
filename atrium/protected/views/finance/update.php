<?php
/* @var $this FinanceController */
/* @var $model Finance */

$this->breadcrumbs=array(
	'Finances'=>array('index'),
	$model->finance_id=>array('view','id'=>$model->finance_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Finance', 'url'=>array('index')),
	array('label'=>'Create Finance', 'url'=>array('create')),
	array('label'=>'View Finance', 'url'=>array('view', 'id'=>$model->finance_id)),
	array('label'=>'Manage Finance', 'url'=>array('admin')),
);
?>

<h1>Update Finance <?php echo $model->finance_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>