<?php

$guid = (int)get_input('guid');

$file = get_entity($guid);
$filename = $file->getFilenameOnFilestore();

$results = $file->delete();

if ($results != '') {
    system_message(elgg_echo("badges:delete_success"));
} else {
    system_message(elgg_echo("badges:delete_fail") . ' ' . $filename);
}

forward(REFERER);
