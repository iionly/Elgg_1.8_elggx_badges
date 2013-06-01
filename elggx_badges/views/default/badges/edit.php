<?php

    $badge = get_entity((int)get_input('guid'));

    $ts = time();
    $token = generate_action_token($ts);
?>

<div>
    <div id="badges_upload_form">
        <form action="<?php echo elgg_get_site_url(); ?>action/badges/edit" method="post">
        <p>

            <?php echo elgg_view('input/hidden', array('name' => '__elgg_token', 'value' => $token)); ?>
            <?php echo elgg_view('input/hidden', array('name' => '__elgg_ts', 'value' => $ts)); ?>
            <?php echo elgg_view("input/hidden",array('name' => 'guid', 'value' => $badge->guid)); ?><br />

            <label><?php echo elgg_echo("badges:name"); ?>:</label><br />
            <?php echo elgg_view("input/text",array('name' => 'name', 'value' => $badge->title)); ?><br />
            <?php echo elgg_echo("badges:name:info"); ?>
            <br /><br />

            <label><?php echo elgg_echo("badges:description"); ?>:</label><br />
            <?php echo elgg_view("input/text",array('name' => 'description', 'value' => $badge->description)); ?><br />
            <?php echo elgg_echo("badges:description:info"); ?>
            <br /><br />

            <label><?php echo elgg_echo("badges:access_id"); ?>:</label>
            <?php echo elgg_view("input/dropdown",array('name' => 'access_id',
                                                        'options_values' => array('0'  => elgg_echo('PRIVATE'),
                                                                                  '1'  => elgg_echo('LOGGED_IN'),
                                                                                  '2'  => elgg_echo('PUBLIC'),
                                                                                  '-2' => elgg_echo('access:friends:label')),
                                                        'value' => $badge->access_id)); ?><br />
            <?php echo elgg_echo("badges:description:access_id"); ?>
            <br /><br />

            <label><?php echo elgg_echo("badges:description:url"); ?>:</label><br />
            <?php echo elgg_view("input/text",array('name' => 'url', 'value' => $badge->badges_url)); ?><br />
            <?php echo elgg_echo("badges:description:url:info"); ?>
            <br /><br />

            <label><?php echo elgg_echo("badges:points"); ?>:</label><br />
            <?php echo elgg_view("input/text",array('name' => 'points', 'value' => $badge->badges_userpoints)); ?><br />
            <?php echo elgg_echo("badges:points:info"); ?>
            <br />

            <br /><input type="submit" class="elgg-button-submit" value="<?php echo elgg_echo("save"); ?>" />
        </p>
        </form>
    </div>
</div>
