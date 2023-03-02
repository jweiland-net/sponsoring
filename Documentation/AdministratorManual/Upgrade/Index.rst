..  include:: /Includes.rst.txt


..  _upgrade:

=======
Upgrade
=======

If you update EXT:sponsoring to a newer version, please read this section carefully!

Update to Version 5.0.0
=======================

We have remove the `GetPromotions` ViewHelper. Please visit your overwritten sponsoring templates for `list` and
`search` actions. Replace `sp:getPromotions` with just `promotions` and remove the sp ViewHelper registration
at top of file.

Update to Version 4.0.0
=======================

We have removed TYPO3 9 compatibility

As f:widget.paginate is deprecated and POST requests are not allowed anymore in this widget, we have rewritten
the widget to new TYPO3 Pagination API.

Please remove the f:widget.paginate from Templates and insert this code:

..  code-block:: html

    <f:render partial="Component/Pagination"
              arguments="{pagination: pagination, paginator: paginator, actionName: actionName}" />


Update to Version 3.0.6
=======================

We have changed some method arguments, please flush cache in InstallTool


Update to Version 3.0.0
=======================

We have added column `path_segment` to project table which you can use in your own RouteEnhancer configuration.
If you have a lot of projects you can use our UpgradeWizard to prefill `path_segment` with a sanitized version of
project name column.

We have removed TYPO3 8 compatibility and added TYPO3 10 compatibility instead.
