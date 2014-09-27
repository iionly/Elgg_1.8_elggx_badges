<?php

$content = "<div>";
$content .= elgg_echo('badges:lock_high');
$content .= elgg_view('input/dropdown', array(
	'name' => 'params[lock_high]',
	'options_values' => array(
		'1' => elgg_echo('badges:settings:yes'),
		'0' => elgg_echo('badges:settings:no')
	),
	'value' => $vars['entity']->lock_high
));
$content .= elgg_view("output/longtext", array("value" => elgg_echo('badges:lock_high:info'), 'class' => 'elgg-subtext mbm'));
$content .= "</div>";


$content .= "<div>";
$content .= elgg_echo('badges:show_description');
$content .= elgg_view('input/dropdown', array(
	'name' => 'params[show_description]',
	'options_values' => array(
		'1' => elgg_echo('badges:settings:yes'),
		'0' => elgg_echo('badges:settings:no')
	),
	'value' => $vars['entity']->show_description
));
$content .= elgg_view("output/longtext", array("value" => elgg_echo('badges:show_description:info'), 'class' => 'elgg-subtext mbm'));
$content .= "</div>";


$content .= "<div>";
$content .= elgg_echo('badges:avatar_overlay');
$content .= elgg_view('input/dropdown', array(
	'name' => 'params[avatar_overlay]',
	'options_values' => array(
		'1' => elgg_echo('badges:settings:yes'),
		'0' => elgg_echo('badges:settings:no')
	),
	'value' => $vars['entity']->avatar_overlay
));
$content .= elgg_view("output/longtext", array("value" => elgg_echo('badges:avatar_overlay:info'), 'class' => 'elgg-subtext mbm'));
$content .= "</div>";

echo $content;
