<?php

    $user = get_user(get_input('user_guid'));

    // set security token
    $ts = time ();
    $token = generate_action_token ( $ts );
    $tokenRequest = "&__elgg_token=$token&__elgg_ts=$ts";

    $meta_array = array(array('name' => 'badges_name', 'operand' => 'like', 'value' => '%'));
    $entities = badges_get_entities_from_metadata_by_value($meta_array, 'object', 'badge', false, 0, 0, 999999, 0, 'v1.string');

    foreach ($entities as $entity) {
        $label = "<img src=\"{$vars['url']}action/badges/view?{$tokenRequest}&file_guid={$entity->guid}\"> " . $entity->title . " - {$entity->badges_userpoints} points";
        $options[$label] = $entity->guid;
    }

?>

<br>
<div id="badges_assign_form">
    <form action="<?php echo $vars['url']; ?>action/badges/assign" method="post" enctype="multipart/form-data">
    <p>
        <?php echo elgg_view('input/hidden', array('name' => '__elgg_token', 'value' => $token)); ?>
        <?php echo elgg_view('input/hidden', array('name' => '__elgg_ts', 'value' => $ts)); ?>

        <b><?php echo elgg_echo("badges:username"); ?>:</b><br />
        <?php echo elgg_view("input/text",array('name' => 'username', 'value' => $user->username)); ?>
        <br /><br />

        <?php echo elgg_view('input/checkboxes', array('name' => 'locked',
                                                       'id' => 'locked',
                                                        'options' => array(elgg_echo('badges:lock') => 0)
                                                      ));
        ?>
        <?php echo elgg_echo("badges:lock:info"); ?>
        <br /><br />

        <b><?php echo elgg_echo("badges:points"); ?>:</b><br />
        <?php echo elgg_view("input/radio",array('name' => 'badge', 'value' => $entity->guid,  'options' => $options)); ?><br />
        <br /><br />

        <br /><input type="submit" class="submit_button" value="<?php echo elgg_echo("save"); ?>" />
    </p>
    </form>
</div>
