<?php

// set security token
$ts = time();
$token = generate_action_token($ts);
$tokenRequest = "&__elgg_token=$token&__elgg_ts=$ts";

if (elgg_get_context() == 'profile') {

    if ($guid = $vars['entity']->badges_badge) {
        $badge = get_entity($guid);

        if (is_object($badge)) {

?>
<br /><br />
<div class="badges_profile">
<div>
            <span><?php echo elgg_echo('badges:badge:upper'); ?>

            <?php if ($badge->badges_url) { ?>
                <a href="<?php echo $badge->badges_url; ?>">
            <?php } ?>

            <img title="<?php echo $badge->title; ?>" src="<?php echo elgg_get_site_url(); ?>action/badges/view?file_guid=<?php echo $guid . $tokenRequest; ?>">

            <?php if ($badge->badges_url) { ?>
                </a>
            <?php } ?>

            <?php if ((int)elgg_get_plugin_setting('show_description', 'elggx_badges')) { ?>
                <div class="badges_profile_description"><?php echo $badge->description; ?></div>
            <?php } ?>
            </span>
</div>
</div>

        <?php } ?>
    <?php } ?>
<?php } ?>
