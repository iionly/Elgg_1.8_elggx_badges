<?php

?>

<p>
    <label><?php echo elgg_echo('badges:lock_high'); ?></label>
    <?php echo elgg_view('input/dropdown', array(
                             'name' => 'params[lock_high]',
                             'options_values' => array('1' => elgg_echo('badges:settings:yes'), '0' => elgg_echo('badges:settings:no')),
                             'value' => $vars['entity']->lock_high
                             )
                        );
    ?>
    <div class="badges_settings_info"><?php echo elgg_echo('badges:lock_high:info'); ?></div>

    <label><?php echo elgg_echo('badges:show_description'); ?></label>
    <?php echo elgg_view('input/dropdown', array(
                             'name' => 'params[show_description]',
                             'options_values' => array('1' => elgg_echo('badges:settings:yes'), '0' => elgg_echo('badges:settings:no')),
                             'value' => $vars['entity']->show_description
                             )
                        );
    ?>
    <div class="badges_settings_info"><?php echo elgg_echo('badges:show_description:info'); ?></div>

    <label><?php echo elgg_echo('badges:avatar_overlay'); ?></label>
    <?php echo elgg_view('input/dropdown', array(
                             'name' => 'params[avatar_overlay]',
                             'options_values' => array('1' => elgg_echo('badges:settings:yes'), '0' => elgg_echo('badges:settings:no')),
                             'value' => $vars['entity']->avatar_overlay
                             )
                        );
    ?>
    <div class="badges_settings_info"><?php echo elgg_echo('badges:avatar_overlay:info'); ?></div>
</p>
