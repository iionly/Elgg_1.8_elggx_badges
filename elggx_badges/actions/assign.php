<?php

$user = get_user_by_username(get_input('username'));

if ($user) {
    $user->badges_badge = (int)get_input('badge');
    $user->badges_locked = (int)get_input('locked');
    system_message(elgg_echo("badges:assign:success"));
} else {
    system_message(elgg_echo("badges:assign:nouser"));
}

// Anounce it on the river
if ($guid = $user->badges_badge) {
    elgg_delete_river(array("view" => 'river/object/badge/award', "subject_guid" => $user->guid, "object_guid" => $user->guid));
    elgg_delete_river(array("view" => 'river/object/badge/assign', "subject_guid" => $user->guid, "object_guid" => $user->guid));
    add_to_river('river/object/badge/assign', 'assign', $user->guid, $user->guid);
}

forward(REFERER);
