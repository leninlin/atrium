<?php
/* @var $this TaskActionController */
/* @var $model TaskAction */

$this->breadcrumbs=array(
	'Task Actions'=>array('index'),
	$model->action_id=>array('view','id'=>$model->action_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TaskAction', 'url'=>array('index')),
	array('label'=>'Create TaskAction', 'url'=>array('create')),
	array('label'=>'View TaskAction', 'url'=>array('view', 'id'=>$model->action_id)),
	array('label'=>'Manage TaskAction', 'url'=>array('admin')),
);
?>

<h1>Update TaskAction <?php echo $model->action_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>