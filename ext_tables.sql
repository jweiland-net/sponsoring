#
# Table structure for table 'tx_sponsoring_domain_model_project'
#
CREATE TABLE tx_sponsoring_domain_model_project (
  name varchar(255) DEFAULT '' NOT NULL,
  path_segment varchar(2048) DEFAULT '' NOT NULL,
  number varchar(255) DEFAULT '' NOT NULL,
  contact_person varchar(255) DEFAULT '' NOT NULL,
  telephone varchar(255) DEFAULT '' NOT NULL,
  email varchar(255) DEFAULT '' NOT NULL,
  organizer_type tinyint(1) unsigned DEFAULT '0' NOT NULL,
  organisationseinheit int(11) unsigned DEFAULT '0' NOT NULL,
  organizer_manuell varchar(255) DEFAULT '' NOT NULL,
  application_deadline date DEFAULT NULL,
  promotion_type varchar(255) DEFAULT '' NOT NULL,
  promotion_value varchar(255) DEFAULT '' NOT NULL,
  images int(11) unsigned NOT NULL default '0',
  description text NOT NULL,
  files int(11) unsigned DEFAULT '0',
  links int(11) unsigned DEFAULT '0',
);

#
# Table structure for table 'tx_sponsoring_domain_model_link'
#
CREATE TABLE tx_sponsoring_domain_model_link (
  title varchar(255) DEFAULT '' NOT NULL,
  link varchar(255) DEFAULT '' NOT NULL,
);
