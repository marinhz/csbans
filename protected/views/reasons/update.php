<?php
/**
 * Вьюшка редактирования причины бана
 */

/**
 * @author Craft-Soft Team
 * @package CS:Bans
 * @version 1.0 beta
 * @copyright (C)2013 Craft-Soft.ru.  Все права защищены.
 * @link http://craft-soft.ru/
 * @license http://creativecommons.org/licenses/by-nc-sa/4.0/deed.ru  «Attribution-NonCommercial-ShareAlike»
 */

$this->pageTitle = Yii::app()->name .' :: Административен център - Причини за бан';

$this->breadcrumbs=array(
	'Административен център'=>array('/admin/index'),
	'Причини за бан' => array('/admin/reasons'),
	'Редактиране причина ' . $model->reason
);

$this->renderPartial('/admin/mainmenu', array('active' =>'server', 'activebtn' => 'servreasons'));

?>

<h2>Редактиране причина "<?php echo $model->reason; ?>"</h2>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>