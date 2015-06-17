<?php
$uploaditConfig = Configure::read('Uploadit');
$thumbVersion = $uploaditConfig['versions']['thumbnail'];
$originalVersion = $uploaditConfig['versions']['original'];
if ($uploads && !$uploaditMultiple) {
	$uploads = array($uploads);
}
?>
<div class="media">
	<?php foreach ($uploads as $fileData) {
		$versions = json_decode($fileData['versions'], true);
		$thumbUrl = $uploaditConfig['sslUrl'] ? $versions[$thumbVersion]['ssl_url'] : $versions[$thumbVersion]['url'];
		$originalUrl = $uploaditConfig['sslUrl'] ? $versions[$originalVersion]['ssl_url'] : $versions[$originalVersion]['url'];
		echo $this->Html->link(
			$this->Html->image($thumbUrl, array('data-src' => $originalUrl, 'alt' => $fileData['name'], 'width' => 100)),
			$originalUrl,
			array('class' => 'pull-left', 'escape' => false, 'target' => '_blank')
		);
		?>
		<div class="media-body">
			<strong><?php echo __('Name'); ?>:</strong> <?php echo $this->Text->truncate($fileData['name']); ?> <br/>
			<strong><?php echo __('Size'); ?>:</strong> <?php echo $this->Number->toReadableSize($versions[$originalVersion]['size']); ?> <br/>
			<strong><?php echo __('Mime'); ?>:</strong> <?php echo $versions[$originalVersion]['mime']; ?> <br/>
			<strong><?php echo __('Width x Height'); ?>:</strong> <?php echo $versions[$originalVersion]['meta']['width'] . ' x ' . $versions[$originalVersion]['meta']['height']; ?> <br/>
		</div>
	<?php } ?>
</div>