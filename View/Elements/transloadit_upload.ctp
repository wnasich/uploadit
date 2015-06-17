<?php
$this->Html->script(array(
	'//assets.transloadit.com/js/jquery.transloadit2-v2-latest.js',
	'Uploadit.transloadit_upload'
), array('inline' => false));

echo $this->element('thumbnails', compact('uploads'), array('plugin' => 'Uploadit'));

echo $this->Form->input('Uploadit.baseModel', array('type' => 'hidden', 'value' => $baseModel));
echo $this->Form->input('Uploadit.targetModel', array('type' => 'hidden', 'value' => $targetModel));
echo $this->Form->input('Uploadit.name', array('label' => __('Imagen'), 'type' => 'file', 'multiple' => $uploaditMultiple));
?>