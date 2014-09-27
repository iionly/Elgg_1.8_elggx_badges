Elggx Bagdes plugin for Elgg 1.8
Latest Version: 1.8.11
Released: 2014-09-25
Contact: iionly@gmx.de
License: GNU General Public License version 2
Copyright: (c) iionly (for Elgg 1.8 version), Billy Gunn



This plugin allows users to be awarded a badge based on a configurable number of userpoints. Alternatively, the badges can also be assigned manually.

To use the automatic assign feature depending on userpoints your need the Elggx Userpoints plugin, too.

The badge will show below the profile picture on the user's profile pages. There's also the option to display the badges as overlay of the avatars. If you intend to use the overlay option, it requires the badge images to be of size 16x16 pixels or they won't get displayed completely! Larger images wouldn't work especially for the smaller versions of the avatars. The avatars would either be completely covered or the badge might even be larger than the avatar itself. The badge overlay is displayed in the upper-left corner of the avatar (lower-right seemed a bad idea due to the hover menu link and also because Elgg 1.8 doesn't increase the size of smaller profile images anymore like in previous versions).



Installation:

In case you have an earlier version of the Elggx Badges plugin installed it's best to remove the folder completely before copying the new version to the server.

1. Copy the elggx_badges folder into the mod directory of your Elgg installation,
2. Enable the plugin in the admin section of your site,
3. Configure then the plugin settings (section "Configure" - "Settings" - "Elggx Badges"). At last upload some Badges and enter the Badges details (section "Administer" - "Utilities" - "Elggx Badges").



Changelog:

1.8.11 (iionly):

* Slightly better support for Elgg sites served by https,
* Badge details displayed only below 'large' profile icon on profile pages (before it could have happened that the info was displayed elsewhere on profile pages unintended depending on theme / other plugins used),
* No badge overlay anymore on "tiny" profile images (they are just too small),
* Code cleanup / no longer using private Elgg API functions whereever possible.


1.8.10 (iionly):

* on manually assigning userpoints to a user that result in the badge of this user to change the river entry informing about the new badge now correctly includes this user and not the admin user who assigned the userpoints. Also the former river entry informing about the last change of badge of the user gets deleted and no longer the river entry of the admin user's last badge change. Thanks to Michele for reporting the issue.


1.8.9 (iionly):

* badges that overlay the profile images also visible for logged-out site visitors instead of only an empty white area,
* Unassigning of badges,
* when a user gets a new badge assigned (or a new badge is awarded on reaching the necessary number of userpoints) any existing river entries telling about this action for this user will first be deleted before the new river entry is created. So, only a single river entry with the current badge of the user will exist at any time. On unassigning a badge from a user any corresponding river entry telling about the assigning of the badge will get removed.


1.8.8 (iionly):

* Removing "Site default" as possible selection for badges' access level. Some words of explanation regarding this: Michele reported that badges with "Site default" as access level don't behave as expected, i.e. don't follow changes done in the default access level setting of the site. After I got a clarification on this issue (https://github.com/Elgg/Elgg/issues/5565) I know now that the site default access level is not to be used for entities at all anyway. As there's no dynamic adjustment of access level of badges possible it's better to remove this option from the access level setting of badges altogether. And additionally:

After Upgrading to version 1.8.8 of the Elggx Badges plugin you should reset the access level of all badges you have formerly configured with "Site default" as access level. Set the new access level to whatever suits your requirements best. If in doubt on which badges you might need to reset the access level, I would suggest to reset the access level of all badges to be on the save side.


1.8.7 (iionly):

* Fix of pagination issue on "List of badges" tab in plugin settings (reported by Starphysique),
* Fix of "List of badges" list ordering by name and points respectively including a working pagination for both ordering types,
* Replacement of custom badges_get_entities_from_metadata_by_value() function in favor of Elgg's elgg_get_entities_from_metadata() function,
* Fix / Rework of river views for the (optionally configurable) links of badges to work and to include the name of the badge in the river entry (reported by Michele),
* Some general code cleanup.


1.8.6 (iionly):

* Fixed a copy+paste issue in deactivate.php (this bug resulted in the Tidypics plugin to fail after the Elggx Badges plugin was disabled and could result in activity page or index page not being displayed correctly anymore).

(Best way to update to version 1.8.6: do not disable the Badges plugin before the update but overwrite the elggx-badges folder directly. After the new version is copied to the server execute "Upgrade" from the admin dashboard)


1.8.5 (iionly):

* Access level setting for badges added (you should configure the access level for previously added badges after updating to this version),
* Code cleanup,
* German language file added.


1.8.4 (iionly):

- Fixed a deprecated issue introduced by Elgg 1.8.4,
- Fix in river entries handling: commenting on badge river entries is no longer possible (Former version allowed commenting on entries about badges awarded to users. Unfortunately, for the same badge awarded all comments written to different users showed up together because there's only a single Elgg entity of each badge. The possibility to add comments was only a side-effect anyway, because in the former version the badge entity was declared as "object" when creating the river entry. Elgg added the commenting option automatically. Now the user getting the badge is the "object". In this case Elgg offers no commenting option...)



1.8.3 (iionly):

- Fixed description URL bug on profile page. The badge image on the profile page below the avatar will now be clickable and link to a url, if this url has been provided in the badge settings (it already worked for the river entries).


1.8.2 (iionly):

- No overlay of badge on profile pictures when logged out.


1.8.1 (iionly):

- Added an option to display the user's badge as overlay to the profile icon. It's displayed wherever the avatar of the user is shown on the site. (Requirement: badge images of size 16x16 pixels),
- Fixed the option to lock the badge when using userpoints (it won't get removed when the number of userpoints falls below the limit the badge got assigned),
- Fixed the option to display the badge description on the profile page,
- Added a river entry for manual assignment of badges,
- Added some missing language strings for river entries (that Elgg 1.8 silently expects to exist).


1.8.0 (iionly):

- Initial release for Elgg 1.8.


1.0.3 (latest version published by Billy Gunn):

- for Elgg 1.7 or earlier.
