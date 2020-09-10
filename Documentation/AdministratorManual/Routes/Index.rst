.. include:: ../../Includes.txt

Routes
======

With TYPO3 9 you have the possibility to configure RouteEnhancers

Example Configuration
---------------------

.. code-block:: yaml

   routeEnhancers:
     SponsoringPlugin:
       type: Extbase
       extension: Sponsoring
       plugin: Sponsoring
       routes:
         -
           routePath: '/first-sponsoring-page'
           _controller: 'Project::list'
         -
           routePath: '/show/{project_title}'
           _controller: 'Project::show'
           _arguments:
             project_title: project
       requirements:
         project_title: '^[a-zA-Z0-9\-]+\-[0-9]+$'
       defaultController: 'Project::list'
       aspects:
         project_title:
           type: PersistedAliasMapper
           tableName: tx_sponsoring_domain_model_project
           routeFieldName: path_segment
