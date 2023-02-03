<?php
/**
 * Вьюшка создания группы причин банов
 */

/**
 * @author Craft-Soft Team
 * @package CS:Bans
 * @version 1.0 beta
 * @copyright (C)2013 Craft-Soft.ru.  Все права защищены.
 * @link http://craft-soft.ru/
 * @license http://creativecommons.org/licenses/by-nc-sa/4.0/deed.ru  «Attribution-NonCommercial-ShareAlike»
 */

$page = 'Добави причина за бан';
$this->pageTitle = Yii::app()->name .' :: Административен център - ' . $page;

$this->breadcrumbs=array(
	'Административен център'=>array('/admin/index'),
	'Причини за бан'=>array('/admin/reasons'),
	$page
);

$this->renderPartial('/admin/mainmenu', array('active' =>'server', 'activebtn' => 'servreasons'));
?>

<h2>Добави група причини</h2>

<?php
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'reasons-set-form',
	'enableAjaxValidation'=>TRUE,
));
?>

	<p class="note">Маркираните полета <span class="required">*</span> са задължителни.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'setname',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->checkboxListRow($model, 'reasons', Reasons::model()->getList(FALSE)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Добави' : 'Запазване',
		)); ?>
		<?php echo CHtml::link(
				'Отказ',
				Yii::app()->createUrl('/admin/reasons'),
				array(
					'class' => 'btn btn-danger'
				)
			);
		?>
	</div>

<?php $this->endWidget(); ?>