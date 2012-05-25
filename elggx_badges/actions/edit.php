<?php

global $CONFIG;

admin_gatekeeper();
action_gatekeeper();

$guid = (int)get_input('guid');

$badge = get_entity($guid);

$badge->title = get_input('name');
$badge->description = get_input('description');
$badge->save();

$badge->badges_name = get_input('name');
$badge->badges_userpoints = get_input('points');

if (get_input('url') != '') {
    $url = get_input('url');
    if (preg_match('/^http/i', $url)) {
        $badge->badges_url = $url;
    } else {
        $badge->badges_url = $CONFIG->wwwroot . $url;
    }
}

system_message(elgg_echo("badges:saved"));

forward($_SERVER['HTTP_REFERER']);
