<?php

?>

<p>
    <?php echo elgg_echo('badges:lock_high'); ?>
    <?php echo elgg_view('input/dropdown', array(
                             'name' => 'params[lock_high]',
                             'options_values' => array('1' => elgg_echo('badges:settings:yes'), '0' => elgg_echo('badges:settings:no')),
                             'value' => $vars['entity']->lock_high
                             )
                        );
    ?>
    <div class="badges_settings_info"><?php echo elgg_echo('badges:lock_high:info'); ?></div>

    <?php echo elgg_echo('badges:show_description'); ?>
    <?php echo elgg_view('input/dropdown', array(
                             'name' => 'params[show_description]',
                             'options_values' => array('1' => elgg_echo('badges:settings:yes'), '0' => elgg_echo('badges:settings:no')),
                             'value' => $vars['entity']->show_description
                             )
                        );
    ?>
    <div class="badges_settings_info"><?php echo elgg_echo('badges:show_description:info'); ?></div>

    <?php echo elgg_echo('badges:avatar_overlay'); ?>
    <?php echo elgg_view('input/dropdown', array(
                             'name' => 'params[avatar_overlay]',
                             'options_values' => array('1' => elgg_echo('badges:settings:yes'), '0' => elgg_echo('badges:settings:no')),
                             'value' => $vars['entity']->avatar_overlay
                             )
                        );
    ?>
    <div class="badges_settings_info"><?php echo elgg_echo('badges:avatar_overlay:info'); ?></div>
</p>
