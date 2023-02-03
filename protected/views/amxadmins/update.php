<?php
/**
 * Вьюшка редактирования админ серверов
 */

/**
 * @author Craft-Soft Team
 * @package CS:Bans
 * @version 1.0 beta
 * @copyright (C)2013 Craft-Soft.ru.  Все права защищены.
 * @link http://craft-soft.ru/
 * @license http://creativecommons.org/licenses/by-nc-sa/4.0/deed.ru  «Attribution-NonCommercial-ShareAlike»
 */

$this->pageTitle = Yii::app()->name . ' :: Административен център - Редактиране на админ';
$this->breadcrumbs = array(
	'Административен център' => array('/admin/index'),
	'AmxModX админ' => array('admin'),
	'Редактиране на админ ' . $model->nickname
);

$this->renderPartial('/admin/mainmenu', array('active' =>'server', 'activebtn' => 'servamxadmins'));

$this->menu=array(
	array('label'=>'Добави AmxModX админ', 'url'=>array('create')),
	array('label'=>'Управление на AmxModX админи', 'url'=>array('admin')),
);
?>

<h2>Редактиране AmxModX админ <?php echo $model->nickname; ?></h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>