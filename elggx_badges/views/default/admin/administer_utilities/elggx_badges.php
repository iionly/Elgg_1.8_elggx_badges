<?php

$tab = get_input('tab') ? get_input('tab') : 'list';

$params = array(
        'tabs' => array(
                array('title' => elgg_echo('badges:list'), 'url' => "$url" . '?tab=list', 'selected' => ($tab == 'list')),
                array('title' => elgg_echo('badges:assign'), 'url' => "$url" . '?tab=assign', 'selected' => ($tab == 'assign')),
                array('title' => elgg_echo('badges:unassign'), 'url' => "$url" . '?tab=unassign', 'selected' => ($tab == 'unassign')),
                array('title' => elgg_echo('badges:upload'), 'url' => "$url" . '?tab=upload', 'selected' => ($tab == 'upload')),
        )
);

echo elgg_view('navigation/tabs', $params);

        switch($tab) {
                case 'list':
                        echo elgg_view("badges/list");
                        break;
                case 'assign':
                        echo elgg_view("badges/assign");
                        break;
                case 'unassign':
                        echo elgg_view("badges/unassign");
                        break;
                case 'upload':
                        echo elgg_view("badges/upload");
                        break;
                case 'edit':
                        echo elgg_view("badges/edit");
                        break;
        }
