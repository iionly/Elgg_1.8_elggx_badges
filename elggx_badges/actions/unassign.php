<?php

$user = get_user_by_username(get_input('username'));

if ($user) {
    unset($user->badges_badge);
    unset($user->badges_locked);
    elgg_delete_river(array("view" => 'river/object/badge/award', "subject_guid" => $user->guid, "object_guid" => $user->guid));
    elgg_delete_river(array("view" => 'river/object/badge/assign', "subject_guid" => $user->guid, "object_guid" => $user->guid));
    system_message(elgg_echo("badges:unassign:success"));
} else {
    system_message(elgg_echo("badges:unassign:nouser"));
}

forward(REFERER);
