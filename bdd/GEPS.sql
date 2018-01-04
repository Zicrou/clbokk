ALTER TABLE `enseignants` ADD `cni` VARCHAR( 30 ) NOT NULL AFTER `ien_ens` ;
ALTER TABLE `circuit` ADD `archiver` BOOLEAN NOT NULL ;
ALTER TABLE `circuit` CHANGE `archiver` `archiver` TINYINT( 1 ) NOT NULL DEFAULT '0';
ALTER TABLE `type_dossier_piece` ADD `archiver` BOOLEAN NOT NULL DEFAULT FALSE 
ALTER TABLE `etablissement` ADD `arrete_ouverture` VARCHAR( 50 ) NULL ,
ADD `jour_ouverture` TINYINT( 1 ) NULL ,
ADD `mois_ouverture` TINYINT( 1 ) NULL ,
ADD `annee_ouverture` SMALLINT( 3 ) NULL ,
ADD `niveau_enseignemett` VARCHAR( 30 ) NULL ,
ADD `chef_etablissement` VARCHAR( 200 ) NULL ,
ADD `mail` VARCHAR( 200 ) NULL ,
ADD `longitude` FLOAT NULL ,
ADD `latitude` FLOAT NULL ,
ADD `localisation_administrative` VARCHAR( 200 ) NULL ,
ADD `cycle` VARCHAR( 50 ) NULL ,
ADD `numero_autorisation` VARCHAR( 30 ) NULL ,
ADD `Numero_reconnaissance` VARCHAR( 30 ) NULL ,
ADD `jour_reconnaissance` TINYINT( 1 ) NULL ,
ADD `mois_reconnaissance` TINYINT( 1 ) NULL ,
ADD `annee_reconnaissance` SMALLINT( 3 ) NULL 