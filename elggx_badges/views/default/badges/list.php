<?php

    $offset = get_input('offset') ? (int)get_input('offset') : 0;
    $limit = 10;
    $sort = get_input('sort');

    $ts = time ();
    $token = generate_action_token ( $ts );
    $tokenRequest = "&__elgg_token=$token&__elgg_ts=$ts";

    if ($sort == 'points') {
        $order = array('name' => 'badges_userpoints', 'direction' => ASC, 'as' => integer);
    } else {
        $sort = 'name';
        $order = array('name' => 'badges_name', 'direction' => ASC);
    }

    $count = elgg_get_entities_from_metadata(array('type' => 'object', 'subtype' => 'badge', 'count' => true));
    $entities = elgg_get_entities_from_metadata(array('type' => 'object', 'subtype' => 'badge', 'limit' => $limit, 'offset' => $offset, 'order_by_metadata' => $order));

    $nav = elgg_view('navigation/pagination',array(
        'base_url' => elgg_get_site_url() . "admin/administer_utilities/elggx_badges?tab=list&sort=$sort",
        'offset' => $offset,
        'count' => $count,
        'limit' => 10,
    ));

    $html = $nav;

    $html .= "<div><br><table><tr><th width=\"40%\"><b><a href=\"" . elgg_get_site_url() . "admin/administer_utilities/elggx_badges?tab=list&sort=name\">".elgg_echo('badges:name')."</a></b></th>";
    $html .= "<th width=\"10%\"><b><a href=\"" . elgg_get_site_url() . "admin/administer_utilities/elggx_badges?tab=list&sort=points\">".elgg_echo('badges:points')."</a></b></th>";
    $html .= "<th width=\"10%\"><b>".elgg_echo('badges:image')."</b></th>";
    $html .= "<th width=\"10%\"><b>".elgg_echo('badges:action')."</b></tr>";
    $html .= "<tr><td colspan=4><hr></td></tr>";

    foreach ($entities as $entity) {

        $html .= "<tr><td>{$entity->title}</td>";
        $html .= "<td>{$entity->badges_userpoints}</td>";
        $html .= "<td><img src=\"" . elgg_get_site_url() . "action/badges/view?{$tokenRequest}&file_guid={$entity->guid}\"></td>";
        $html .= "<td>";
        $html .= "<a href=\"" . elgg_get_site_url() . "admin/administer_utilities/elggx_badges?tab=edit&guid={$entity->guid}&__elgg_token=$token&__elgg_ts=$ts\">".elgg_echo('badges:edit')."</a> | ";
        $html .= elgg_view("output/confirmlink", array(
                              'href' => elgg_get_site_url() . "action/badges/delete?guid={$entity->guid}&__elgg_token=$token&__elgg_ts=$ts",
                              'text' => elgg_echo('badges:delete'),
                              'confirm' => elgg_echo('badges:delete:confirm')
                          ));
        $html .= "</td></tr>";
    }

    $html .= "</table></div>";

    echo $html;
