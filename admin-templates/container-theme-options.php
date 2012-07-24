<div class="wrap eecf-container <?php echo $container_tag_class_name ?>">
	<div id="icon-options-general" class="icon32"><br /></div>
	<h2><?php echo $this->title ?></h2>
	
	<?php if ( !empty($this->errors) ) : ?>
		<div class="error settings-error">
			<?php foreach ($this->errors as $error) : ?>
				<p><strong><?php echo $error?></strong></p>
			<?php endforeach; ?>
		</div>
	<?php elseif ( !empty($this->notifications) ): ?>
		<?php foreach ($this->notifications as $notification): ?>
			<div class="settings-error updated">
				<p><strong><?php echo $notification ?></strong></p>
			</div>
		<?php endforeach ?>
	<?php endif; ?>

	<form method="post" class="" enctype="multipart/form-data">
		<table border="0" cellspacing="0" cellpadding="0" class="form-table">
			<?php foreach ($this->fields as $field): 
				$field->load();
			?>
				<tr>
					<th scope="row">
						<?php echo $field->get_label(); ?>
						<?php echo $field->get_help_text(); ?>
					</th>
					<td>
						<div class="eecf-field" data-type="<?php echo $field->type ?>">
							<?php echo $field->render(); ?>
						</div>
					</td>
				</tr>
			<?php endforeach ?>
		</table>
		<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="Save Changes"></p>
		<?php wp_nonce_field('eecf_panel_' . $this->id . '_nonce', $this->get_nonce_name(), /*referer?*/ false, /*echo?*/ true); ?>
	</form>
</div>