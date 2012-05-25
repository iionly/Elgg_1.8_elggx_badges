<?php

    $badge = get_entity((int)get_input('guid'));

    $ts = time();
    $token = generate_action_token($ts);
?>

<div>
    <div id="badges_upload_form">
        <form action="<?php echo $vars['url']; ?>action/badges/edit" method="post">
        <p>

            <?php echo elgg_view('input/hidden', array('name' => '__elgg_token', 'value' => $token)); ?>
            <?php echo elgg_view('input/hidden', array('name' => '__elgg_ts', 'value' => $ts)); ?>
            <?php echo elgg_view("input/hidden",array('name' => 'guid', 'value' => $badge->guid)); ?><br />

            <b><?php echo elgg_echo("badges:name"); ?>:</b><br />
            <?php echo elgg_view("input/text",array('name' => 'name', 'value' => $badge->title)); ?><br />
            <?php echo elgg_echo("badges:name:info"); ?>
            <br /><br />

            <b><?php echo elgg_echo("badges:description"); ?>:</b><br />
            <?php echo elgg_view("input/text",array('name' => 'description', 'value' => $badge->description)); ?><br />
            <?php echo elgg_echo("badges:description:info"); ?>
            <br /><br />

            <b><?php echo elgg_echo("badges:description:url"); ?>:</b><br />
            <?php echo elgg_view("input/text",array('name' => 'url', 'value' => $badge->badges_url)); ?><br />
            <?php echo elgg_echo("badges:description:url:info"); ?>
            <br /><br />

            <b><?php echo elgg_echo("badges:points"); ?>:</b><br />
            <?php echo elgg_view("input/text",array('name' => 'points', 'value' => $badge->badges_userpoints)); ?><br />
            <?php echo elgg_echo("badges:points:info"); ?>
            <br />

            <br /><input type="submit" class="submit_button" value="<?php echo elgg_echo("save"); ?>" />
        </p>
        </form>
    </div>
</div>
