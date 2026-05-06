..  include:: /Includes.rst.txt


..  _changelog:

=========
ChangeLog
=========

Version 8.0.0
=============

*   [TASK] Add Project model persistence configuration
*   [TASK] Rename and simplify organizer field in project model
*   [TASK] Remove hard dependency on EXT:service_bw2
*   [TASK] Update allowed file types in TCA configuration
*   [TASK] Remove redundant TCA columns from configuration
*   [TASK] Simplify plugin registration in ext_localconf.php
*   [TASK] Add missing newline in ext_conf_template.txt
*   [TASK] Update comment in .gitignore file
*   [TASK] Remove unused and redundant documentation files
*   [TASK] Correct inconsistent HTML indentation in templates
*   [TASK] Adjust XML formatting in language files
*   [TASK] Refactor plugin registration and configuration
*   [TASK] Apply code style improvements
*   [TASK] Update and optimize code quality tools

Version 7.1.1
=============

*   [TASK] Removed SQL table definitions for Sponsoring module as core handle this by default
*   [BUGFIX]: Adjusted TCA datetime configurations and removed deprecated properties

Version 7.1.0
=============

*   [BUGFIX]: Resolved issues with date formatting in TCA definitions.
*   [BUGFIX]: Added missing configuration fields (pages, recursive) for the Sponsoring plugin to ensure correct backend display.
*   [BUGFIX]: Corrected invalid Controller Namespaces.
*   [BUGFIX]: Removed outdated ViewInterface dependency from controllers to align with modern Extbase standards.
*   [BUGFIX]: Resolved issues within the Pagination class to ensure correct record navigation.
*   [BUGFIX]: Fixed incorrect property type declarations.

Version 7.0.2
=============

*   [TASK] Updated wizard title with [extension] name format

Version 7.0.1
=============

*   [BUGFIX] Remove deprecated usage of SoftRef parser: images

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
