<?php

    $user = get_user(get_input('user_guid'));

    // set security token
    $ts = time ();
    $token = generate_action_token ( $ts );
    $tokenRequest = "&__elgg_token=$token&__elgg_ts=$ts";

?>

<br>
<div id="badges_assign_form">
    <form action="<?php echo elgg_get_site_url(); ?>action/badges/unassign" method="post" enctype="multipart/form-data">
    <p>
        <?php echo elgg_view('input/hidden', array('name' => '__elgg_token', 'value' => $token)); ?>
        <?php echo elgg_view('input/hidden', array('name' => '__elgg_ts', 'value' => $ts)); ?>

        <label><?php echo elgg_echo("badges:username"); ?>:</label><br />
        <?php echo elgg_view("input/text",array('name' => 'username', 'value' => $user->username)); ?>
        <br /><br />

        <br /><input type="submit" class="elgg-button-submit" value="<?php echo elgg_echo("badges:unassign_badge"); ?>" />
    </p>
    </form>
</div>
