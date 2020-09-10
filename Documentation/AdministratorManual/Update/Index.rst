.. include:: ../../Includes.txt

Updating
========

If you update EXT:sponsoring to a newer version, please read this section carefully!

Update to Version 3.0.0
-----------------------

We have added column `path_segment` to project table which you can use in your own RouteEnhancer configuration.
If you have a lot of projects you can use our UpgradeWizard to prefill `path_segment` with a sanitized version of
project name column.

We have removed TYPO3 8 compatibility and added TYPO3 10 compatibility instead.
