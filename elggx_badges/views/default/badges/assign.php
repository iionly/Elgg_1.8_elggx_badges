<?php

$user = get_user(get_input('user_guid'));

$order = array('name' => 'badges_name', 'direction' => ASC);
$entities = elgg_get_entities_from_metadata(array('type' => 'object', 'subtype' => 'badge', 'limit' => false, 'order_by_metadata' => $order));

foreach ($entities as $entity) {
	$label = "<img src=\"" . elgg_add_action_tokens_to_url(elgg_get_site_url() . 'action/badges/view?file_guid=' . $entity->guid) . "\"> " . $entity->title . " - {$entity->badges_userpoints} " . elgg_echo('badges:points');
	$options[$label] = $entity->guid;
}

?>

<br>
<div id="badges_assign_form">
	<form action="<?php echo elgg_add_action_tokens_to_url(elgg_get_site_url() . 'action/badges/assign'); ?>" method="post" enctype="multipart/form-data">
	<p>
		<label><?php echo elgg_echo("badges:username"); ?>:</label><br />
		<?php echo elgg_view("input/text",array('name' => 'username', 'value' => $user->username)); ?>
		<br /><br />

		<?php echo elgg_view('input/checkboxes', array(
				'name' => 'locked',
				'id' => 'locked',
				'options' => array(elgg_echo('badges:lock') => 0)
			));
		?>
		<?php echo elgg_echo("badges:lock:info"); ?>
		<br /><br />

		<label><?php echo elgg_echo("badges:assign_list"); ?></label><br />
		<?php echo elgg_view("input/radio",array('name' => 'badge', 'value' => $entity->guid,  'options' => $options)); ?><br />
		<br /><br />

		<br /><input type="submit" class="elgg-button-submit" value="<?php echo elgg_echo("badges:assign_badge"); ?>" />
	</p>
	</form>
</div>
