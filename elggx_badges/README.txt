Elggx Bagdes plugin for Elgg 1.8
Latest Version: 1.8.5
Released: 2013-02-03
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
