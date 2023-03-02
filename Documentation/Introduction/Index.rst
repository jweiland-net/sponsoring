..  include:: /Includes.rst.txt


..  _introduction:

============
Introduction
============

..  _what-it-does:

What does it do?
================

With `sponsoring` you can create, manage and display projects/promotions like
f.e. a competition.

*   Create projects with its ID, description and contact person
*   Assign an Organizer to a project

   *   Organizer can be a simple text-field
   *   You can choose an organizer out of Service BW API (EXT:service_bw2)

*   Assign project to a promotion which is based on sys_category in TYPO3
*   Add one or more images
*   Choose from one of the default promotion types like `Money` and `Service`
    and add it to promotion value.

Currently `sponsoring` has a hard-coded dependency to EXT:service_bw2. That's why
it will only work for BW in germany.
