<?php

    $offset = get_input('offset') ? (int)get_input('offset') : 0;
    $limit = 10;

    $ts = time ();
    $token = generate_action_token ( $ts );
    $tokenRequest = "&__elgg_token=$token&__elgg_ts=$ts";

    if (get_input('sort') == 'points') {
        $meta_array = array(array('name' => 'badges_userpoints', 'operand' => 'like', 'value' => '%'));
        $order = 'v1.string + 0 DESC';
    } else {
        $meta_array = array(array('name' => 'badges_name', 'operand' => 'like', 'value' => '%'));
        $order = 'v1.string';
    }

    $count = badges_get_entities_from_metadata_by_value($meta_array, 'object', 'badge', true, 0, 0, 0, 0);
    $entities = badges_get_entities_from_metadata_by_value($meta_array, 'object', 'badge', false, 0, 0, $limit, $offset, $order);

    $nav = elgg_view('navigation/pagination',array(
        'base_url' => $_SERVER['REQUEST_URI'],
        'offset' => $offset,
        'count' => $count,
        'limit' => 5,
    ));

    $html = $nav;

    $html .= "<div><br><table><tr><th width=\"40%\"><b><a href=\"{$vars['url']}admin/administer_utilities/elggx_badges.php?tab=list&sort=name\">".elgg_echo('badges:name')."</a></b></th>";
    $html .= "<th width=\"10%\"><b><a href=\"{$vars['url']}admin/administer_utilities/elggx_badges.php?tab=list&sort=points\">".elgg_echo('badges:points')."</a></b></th>";
    $html .= "<th width=\"10%\"><b>".elgg_echo('badges:image')."</b></th>";
    $html .= "<th width=\"10%\"><b>".elgg_echo('badges:action')."</b></tr>";
    $html .= "<tr><td colspan=4><hr></td></tr>";

    foreach ($entities as $entity) {

        $html .= "<tr><td>{$entity->title}</td>";
        $html .= "<td>{$entity->badges_userpoints}</td>";
        $html .= "<td><img src=\"{$vars['url']}action/badges/view?{$tokenRequest}&file_guid={$entity->guid}\"></td>";
        $html .= "<td>";
        $html .= "<a href=\"{$vars['url']}admin/administer_utilities/elggx_badges?tab=edit&guid={$entity->guid}&__elgg_token=$token&__elgg_ts=$ts\">".elgg_echo('badges:edit')."</a> | ";
        $html .= elgg_view("output/confirmlink", array(
                              'href' => $vars['url'] . "action/badges/delete?guid={$entity->guid}&__elgg_token=$token&__elgg_ts=$ts",
                              'text' => elgg_echo('badges:delete'),
                              'confirm' => elgg_echo('badges:delete:confirm')
                          ));
        $html .= "</td></tr>";
    }

    $html .= "</table></div>";

    echo $html;
