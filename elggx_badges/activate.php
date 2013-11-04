<?php
/**
 * Activate Elggx Badges
 *
 */

// register class
if (get_subtype_id('object', 'badge')) {
    update_subtype('object', 'badge', 'BadgesBadge');
} else {
    add_subtype('object', 'badge', 'BadgesBadge');
}
