<?php

$performed_by = $vars['item']->getSubjectEntity();
$performed_on = $vars['item']->getObjectEntity();
$object = $vars['item']->getObjectEntity();

if ($guid = $object->badges_badge) {
    $badge = get_entity($guid);
    $badge_url = $badge->badges_url;

    // set security token
    $ts = time ();
    $token = generate_action_token ( $ts );
    $tokenRequest = "&__elgg_token=$token&__elgg_ts=$ts";

    if ($badge_url) {
         $badge_view = "<a href=\"" . $badge_url . "\"><img title=\"" . $badge->title . "\" src=\"" . elgg_get_site_url() . "action/badges/view?file_guid=" . $badge->guid . $tokenRequest . "\"></a>";
    } else {
         $badge_view = "<img title=\"" . $badge->title . "\" src=\"" . elgg_get_site_url() . "action/badges/view?file_guid=" . $badge->guid . $tokenRequest . "\">";
    }

    $url = "<a href=\"{$performed_by->getURL()}\">{$performed_by->name}</a>";
    $string = elgg_echo('badges:river:assigned', array($url, $badge->title));

    echo elgg_view('river/elements/layout', array(
            'item' => $vars['item'],
            'attachments' => $badge_view,
            'message' => $string,
    ));
}
