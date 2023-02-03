<?php
/**
 * Вьюшка добавления админ серверов
 */

/**
 * @author Craft-Soft Team
 * @package CS:Bans
 * @version 1.0 beta
 * @copyright (C)2013 Craft-Soft.ru.  Все права защищены.
 * @link http://craft-soft.ru/
 * @license http://creativecommons.org/licenses/by-nc-sa/4.0/deed.ru  «Attribution-NonCommercial-ShareAlike»
 */

$this->pageTitle = Yii::app()->name . ' :: Административен център - Добавяне на AmxModX админ';
$this->breadcrumbs = array(
	'Административен център' => array('/admin/index'),
	'AmxModX админ' => array('admin'),
	'Добавяне на AmxModX админ'
);

$this->renderPartial('/admin/mainmenu', array('active' =>'server', 'activebtn' => 'servamxadmins'));

$this->menu=array(
	array('label'=>'Управление на админи', 'url'=>array('admin')),
);
?>

<h2>Добавяне на AmxModX админ</h2>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'webadmins' => new Webadmins)); ?>