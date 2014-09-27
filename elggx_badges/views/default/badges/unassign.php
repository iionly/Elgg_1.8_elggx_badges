<?php

$user = get_user(get_input('user_guid'));

?>

<br>
<div id="badges_assign_form">
	<form action="<?php echo elgg_add_action_tokens_to_url(elgg_get_site_url() . 'action/badges/unassign'); ?>" method="post" enctype="multipart/form-data">
	<p>
		<label><?php echo elgg_echo("badges:username"); ?>:</label><br />
		<?php echo elgg_view("input/text",array('name' => 'username', 'value' => $user->username)); ?>
		<br /><br />

		<br /><input type="submit" class="elgg-button-submit" value="<?php echo elgg_echo("badges:unassign_badge"); ?>" />
	</p>
	</form>
</div>
