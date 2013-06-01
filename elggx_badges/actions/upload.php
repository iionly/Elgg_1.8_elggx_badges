<?php

$filename    = $_FILES['badge']['name'];
$mime        = $_FILES['badge']['type'];


$access_id = (int)get_input('access_id');
if(!$access_id) {
    $access_id = get_default_access();
}

if (!is_array($_FILES['badge'])) {
    register_error(elgg_echo('badges:noimage'));
    forward($_SERVER['HTTP_REFERER']);
}

$prefix = 'image/badges/';

$filestorename = strtolower(time().$filename);

$file = new BadgesBadge();
$file->setFilename($prefix.$filestorename);
$file->setMimeType($mime);
$file->originalfilename = $filename;
$file->subtype = 'badge';
$file->access_id = $access_id;
$file->open("write");
$file->write(get_uploaded_file('badge'));
$file->close();

$file->title = get_input('name');
$file->description = get_input('description');
$guid = $file->save();

// if image, we need to create thumbnails (this should be moved into a function)
if ($guid && $file->simpletype == "image") {
    $thumbnail = get_resized_image_from_existing_file($file->getFilenameOnFilestore(),60,60, true);
    if ($thumbnail) {
        $thumb = new ElggFile();
        $thumb->setMimeType($_FILES['upload']['type']);

        $thumb->setFilename($prefix."thumb".$filestorename);
        $thumb->open("write");
        $thumb->write($thumbnail);
        $thumb->close();

        $file->thumbnail = $prefix."thumb".$filestorename;
        unset($thumbnail);
    }

    $thumbsmall = get_resized_image_from_existing_file($file->getFilenameOnFilestore(),153,153, true);
    if ($thumbsmall) {
        $thumb->setFilename($prefix."smallthumb".$filestorename);
        $thumb->open("write");
        $thumb->write($thumbsmall);
        $thumb->close();
        $file->smallthumb = $prefix."smallthumb".$filestorename;
        unset($thumbsmall);
    }

    $thumblarge = get_resized_image_from_existing_file($file->getFilenameOnFilestore(),600,600, false);
    if ($thumblarge) {
        $thumb->setFilename($prefix."largethumb".$filestorename);
        $thumb->open("write");
        $thumb->write($thumblarge);
        $thumb->close();
        $file->largethumb = $prefix."largethumb".$filestorename;
        unset($thumblarge);
    }
}

/**
 * Add the name as metadata. This is a hack to
 * allow sorting the admin list view by name
 */
$file->badges_name = get_input('name');

// Add the userpoints at which this badge will be awarded
$file->badges_userpoints = get_input('points');

if (get_input('url') != '') {
    $url = get_input('url');
    if (preg_match('/^http/i', $url)) {
        $file->badges_url = $url;
    } else {
        $file->badges_url = elgg_get_config('wwwroot') . $url;
    }
}

system_message(elgg_echo("badges:uploaded"));

forward(REFERER);
