<?php
/* @var $this UsergroupController */
/* @var $model Usergroup */

$this->breadcrumbs=array(
	'Usergroups'=>array('index'),
	$model->name=>array('view','id'=>$model->usergroup_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Usergroup', 'url'=>array('index')),
	array('label'=>'Create Usergroup', 'url'=>array('create')),
	array('label'=>'View Usergroup', 'url'=>array('view', 'id'=>$model->usergroup_id)),
	array('label'=>'Manage Usergroup', 'url'=>array('admin')),
);
?>

<h1>Update Usergroup <?php echo $model->usergroup_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>