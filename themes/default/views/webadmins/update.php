<?php
/**
 * Вьюшка редактирования веб админ
 */

/**
 * @author Craft-Soft Team
 * @package CS:Bans
 * @version 1.0 beta
 * @copyright (C)2013 Craft-Soft.ru.  Все права защищены.
 * @link http://craft-soft.ru/
 * @license http://creativecommons.org/licenses/by-nc-sa/4.0/deed.ru  «Attribution-NonCommercial-ShareAlike»
 */

$this->pageTitle = Yii::app()->name .' :: Административен център - Редактиране WEB админ' . $model->username;
$this->breadcrumbs=array(
	'Административен център'=>array('/admin/index'),
	'Веб админ'=>array('admin'),
	'Редактиране ВЕБ админ ' . $model->username,
);

$this->menu=array(
	array('label'=>'Административен център', 'url'=>array('/admin/index')),
	array('label'=>'Управление веб админи', 'url'=>array('admin')),
	array('label'=>'Изтрий', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Изтрий?')),
);
$this->renderPartial('/admin/mainmenu', array('active' =>'site', 'activebtn' => 'webadmins'));
?>

<h2>Редактиране ВЕБ админ "<?php echo $model->username; ?>"</h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>