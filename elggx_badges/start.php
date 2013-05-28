<?php

elgg_register_event_handler('init','system','badges_init');

function badges_init() {

    elgg_extend_view('css/elgg', 'badges/css');
    elgg_extend_view('icon/user/default','badges/icon');

    elgg_register_plugin_hook_handler('userpoints:update', 'all', 'badges_userpoints');

    elgg_register_admin_menu_item('administer', 'elggx_badges', 'administer_utilities');

    // Extend avatar hover menu
    elgg_register_plugin_hook_handler('register', 'menu:user_hover', 'badges_user_hover_menu');

    // Register actions
    $base_dir = elgg_get_plugins_path() . 'elggx_badges/actions';
    elgg_register_action("badges/upload", "$base_dir/upload.php", 'admin');
    elgg_register_action("badges/edit", "$base_dir/edit.php", 'admin');
    elgg_register_action("badges/assign", "$base_dir/assign.php", 'admin');
    elgg_register_action("badges/view", "$base_dir/view.php", 'public');
    elgg_register_action("badges/delete", "$base_dir/delete.php", 'admin');
}

/**
 * Add to the user hover menu
 */
function badges_user_hover_menu($hook, $type, $return, $params) {
        $user = $params['entity'];

        $url = "admin/administer_utilities/elggx_badges?tab=assign&user_guid={$user->guid}";
        $item = new ElggMenuItem('badges', elgg_echo('badges:assign_badge'), $url);
        $item->setSection('admin');
        $return[] = $item;

        return $return;
}

/**
 * This method is called when a users points are updated.
 * We check to see what the users current balance is and
 * assign the appropriate badge.
 */
function badges_userpoints($hook, $type, $return, $params) {

    if ($params['entity']->badges_locked) {
        return(true);
    }

    $points = $params['entity']->userpoints_points;
    $badge = get_entity($params['entity']->badges_badge);

    $options = array('type' => 'object', 'subtype' => 'badge', 'limit' => 0, 'order_by_metadata' =>  array('name' => 'badges_userpoints', 'direction' => DESC, 'as' => integer));
    $options['metadata_name_value_pairs'] = array(array('name' => 'badges_userpoints', 'value' => $points,  'operand' => '<='));
    $entities = elgg_get_entities_from_metadata($options);

    if ((int)elgg_get_plugin_setting('lock_high', 'elggx_badges')) {
        if ($badge->badges_userpoints > $entities[0]->badges_userpoints) {
            return(true);
        }
    }

    if ($badge->guid != $entities[0]->guid) {
        $params['entity']->badges_badge = $entities[0]->guid;
        if (!elgg_trigger_plugin_hook('badges:update', 'object', array('entity' => $user), true)) {
            $params['entity']->badges_badge = $badge->guid;
            return(false);
        }

        // Announce it on the river
        $user_guid = elgg_get_logged_in_user_guid();
        add_to_river('river/object/badge/award', 'award', $user_guid, $user_guid);
    }

    return(true);
}
