..  include:: /Includes.rst.txt


..  _changelog:

=========
ChangeLog
=========

Version 7.0.0
=============

*   Fixed TYPO3 13 LTS Version compatibility
*   Remove older version compatibility

Version 5.0.2
=============

*   Remove exclude from path_segment
*   Update .editorconfig
*   Update .gitignore

Version 5.0.1
=============

*   Remove GetPromotions ViewHelper

Version 5.0.0
=============

*   Add TYPO3 11 compatibility
*   Add item for newContentElementWizard
*   Integrate AbstractController into ProjectController

Version 4.0.0
=============

*   Remove TYPO3 9 compatibility
*   Use new pagination API
*   Add Events to all Controller Actions

Version 3.1.0
=============

*   Set promotion type as multiple side by side

Version 3.0.7
=============

*   Update translation for "Organizational unit"

Version 3.0.6
=============

*   Move SlugHelper from constructor argument into getSlugHelper()

Version 3.0.4
=============

*   Bugfix: Property "fields" must be in array of generatorOptions of SlugUpdater

Version 3.0.3
=============

*   Remove CSH

Version 3.0.2
=============

*   Add UID to slug while running Slug Updater to prevent duplicates

Version 3.0.1
=============

*   Use !empty instead of count for performance reasons
*   Update slugs also for hidden records by start-/endtime

Version 3.0.0
=============

*   Remove TYPO3 8 compatibility
*   Add TYPO3 10 compatibility
*   Add UpgradeWizard to prefill path_segment for RouteEnhancer
