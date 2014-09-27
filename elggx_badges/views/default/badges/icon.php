<?php

if (elgg_get_context() == 'profile' && $vars['size'] == 'large') {

	if ($guid = $vars['entity']->badges_badge) {
		$badge = get_entity($guid);

		if (is_object($badge)) {

?>

<div class="badges_profile mtm">
<div>
			<span><?php echo elgg_echo('badges:badge:upper'); ?>

			<?php if ($badge->badges_url) { ?>
				<a href="<?php echo $badge->badges_url; ?>">
			<?php } ?>

			<img title="<?php echo $badge->title; ?>" src="<?php echo elgg_add_action_tokens_to_url(elgg_get_site_url() . 'action/badges/view?file_guid=' . $guid); ?>">

			<?php if ($badge->badges_url) { ?>
				</a>
			<?php } ?>

			<?php if ((int)elgg_get_plugin_setting('show_description', 'elggx_badges')) { ?>
				<div class="elgg-subtext"><?php echo $badge->description; ?></div>
			<?php } ?>
			</span>
</div>
</div>

		<?php } ?>
	<?php } ?>
<?php } ?>
