<?php

    $ts = time();
    $token = generate_action_token($ts);
?>

<br>
<div id="badges_upload_form">
    <form action="<?php echo elgg_get_site_url(); ?>action/badges/upload" method="post" enctype="multipart/form-data">
    <p>
        <?php echo elgg_view('input/hidden', array('name' => '__elgg_token', 'value' => $token)); ?>
        <?php echo elgg_view('input/hidden', array('name' => '__elgg_ts', 'value' => $ts)); ?>

        <b><?php echo elgg_echo("badges:image"); ?>:<font color="red">*</font></b><br />
        <?php echo elgg_view("input/file",array('name' => 'badge')); ?>
        <br /><br />

        <b><?php echo elgg_echo("badges:name"); ?>:<font color="red">*</font></b><br />
        <?php echo elgg_view("input/text",array('name' => 'name')); ?><br />
        <?php echo elgg_echo("badges:name:info"); ?>
        <br /><br />

        <b><?php echo elgg_echo("badges:description"); ?>:</b><br />
        <?php echo elgg_view("input/text",array('name' => 'description')); ?><br />
        <?php echo elgg_echo("badges:description:info"); ?>
        <br /><br />

        <b><?php echo elgg_echo("badges:access_id"); ?>:</b>
        <?php echo elgg_view("input/dropdown",array('name' => 'access_id',
                                                    'options_values' => array('-1' => elgg_echo('badges:access:default'),
                                                                              '0'  => elgg_echo('PRIVATE'),
                                                                              '1'  => elgg_echo('LOGGED_IN'),
                                                                              '2'  => elgg_echo('PUBLIC'),
                                                                              '-2' => elgg_echo('access:friends:label')),
                                                    'value' => $badge->access_id)); ?><br />
        <?php echo elgg_echo("badges:description:access_id"); ?>
        <br /><br />

        <b><?php echo elgg_echo("badges:description:url"); ?>:</b><br />
        <?php echo elgg_view("input/text",array('name' => 'url')); ?><br />
        <?php echo elgg_echo("badges:description:url:info"); ?>
        <br /><br />

        <b><?php echo elgg_echo("badges:points"); ?>:</b><br />
        <?php echo elgg_view("input/text",array('name' => 'points')); ?><br />
        <?php echo elgg_echo("badges:points:info"); ?>
        <br />

        <br /><input type="submit" class="elgg-button-submit" value="<?php echo elgg_echo("upload"); ?>" />
    </p>
    </form>
</div>
