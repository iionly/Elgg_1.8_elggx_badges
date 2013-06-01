<?php

$guid = (int)get_input('guid');
$access_id = (int)get_input('access_id');
if(!$access_id) {
    $access_id = get_default_access();
}

$badge = get_entity($guid);

$badge->title = get_input('name');
$badge->description = get_input('description');
$badge->access_id = $access_id;
$badge->save();

$badge->badges_name = get_input('name');
$badge->badges_userpoints = get_input('points');

if (get_input('url') != '') {
    $url = get_input('url');
    if (preg_match('/^http/i', $url)) {
        $badge->badges_url = $url;
    } else {
        $badge->badges_url = elgg_get_config('wwwroot') . $url;
    }
}

system_message(elgg_echo("badges:saved"));

forward(REFERER);
