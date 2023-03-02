..  include:: /Includes.rst.txt


..  _configuration:

=============
Configuration
=============

Target group: **Developers, Integrators**

How to configure the extension. Try to make it easy to configure the extension.
Give a minimal example or a typical example.


Minimal Example
===============

*   It is necessary to include static template `Sponsoring (sponsoring)`

We prefer to set a Storage PID with help of TypoScript Constants:

..  code-block:: typoscript

    plugin.tx_sponsoring.persistence {
      # Define Storage PID where project records are located
      storagePid = 4
    }

..  _configuration-typoscript:

TypoScript Setup Reference
==========================

view.templateRootPaths
----------------------

Default: Value from Constants *EXT:sponsoring/Resources/Private/Templates/*

You can override our Templates with your own SitePackage extension. We prefer to change this value in TS Constants.

view.partialRootPaths
---------------------

Default: Value from Constants *EXT:sponsoring/Resources/Private/Partials/*

You can override our Partials with your own SitePackage extension. We prefer to change this value in TS Constants.

view.layoutsRootPaths
---------------------

Default: Value from Constants *EXT:sponsoring/Resources/Layouts/Templates/*

You can override our Layouts with your own SitePackage extension. We prefer to change this value in TS Constants.

persistence.storagePid
----------------------

Set this value to a Storage Folder (PID) where you have stored the project records. If you have stored Organizers and
Locations in another Storage Folder, you have to add theses PIDs here, to.

Example: 21,45,3234

settings.pidOfMaps2Plugin
-------------------------

Default: empty

Set this value to the pid where maps2 plugin is located. A link for the address will be redirected
to that page.

setting.pidOfDetailPage
------------------------

Default: 0

Often it is useful to move the detail view onto a separate page for design/layout reasons.

settings.pidOfServiceBwPage
---------------------------

Default: 0

As you can assign an organizer of Service BW API to a project, you can use this property to link such
organizers to a page where Service BW Plugin was inserted to show the organizer with its
data from API directly.

settings.pageBrowser.*
----------------------

itemsPerPage
~~~~~~~~~~~~

Amount of records on a page

_LOCAL_LANG.*.*
---------------

As an integrator you can override each key of language file:

`EXT:sponsoring/Resources/Private/Language/locallang.xlf`

Example:

..  code-block:: typoscript

    plugin.tx_sponsoring._LOCAL_LANG.de.listMyProjects = Show my projects

_CSS_DEFAULT_STYLE
------------------

This will include a default CSS Style to show a red border around input fields in Frontend,
if an sponsoring field was filled with an invalid value.

If you have your own CSS we prefer to remove this setting:

..  code-block:: typoscript

    plugin.tx_sponsoring._CSS_DEFAULT_STYLE >
