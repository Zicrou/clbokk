<!-- ========== Left Sidebar Start ========== -->

<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="pull-left">
                <img src="<?php echo base_url(); ?>assets/images/users/avatar-1.jpg" alt="" class="thumb-md img-circle">
            </div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <?php
                        // Nom de l'utilisateur
                        $tab_data_ses = $this->session->lfc_jafr12_s;  ///Optimiser l'appel d tableau
                        echo $tab_data_ses['nom'];
                        ?>
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                        <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                        <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                        <li><a href="<?php  echo site_url() ?>se_deconnecter"><i class="md md-settings-power"></i> Logout</a></li>
                    </ul>
                </div>

                <p class="text-muted m-0"><?php
                      echo $tab_data_ses['profil'];
                    ?></p>
            </div>
        </div>

        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="<?php echo base_url(); ?>front-office" class="waves-effect"><i class="md md-home"></i><span> Dashboard </span></a>
                </li>
                
                
                <?php 
				//Recuperation du tableau des roles menus enregistré dans la session
				$menu_roles = $this->session->menu_roles;
				$smenu_roles = $this->session->smenu_roles;

				if(isset($menu_roles['GES_BLOC'])):?>
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="fa fa-cubes"></i><span> Blocs/Bureaux </span><span class="pull-right"><i class="md md-add"></i></span></a>

                    <ul class="list-unstyled">

                        <?php if(isset($smenu_roles['NIVEAU']['d_read'])):?>
                        <li><a href="<?php echo base_url(); ?>C_niveau" class="menu" id="menu_niveau">Les Niveaux</a></li>
                        <?php endif; ?>
						
						<?php if(isset($smenu_roles['BLOC']['d_read'])):?>
                        <li><a href="<?php echo base_url(); ?>C_bloc" class="menu" id="menu_bloc">Liste Blocs</a></li>
                        <?php endif; ?>
                        
                        <?php if(isset($smenu_roles['BUREAU']['d_read'])):?>
                        <li><a href="<?php echo base_url(); ?>C_bureau" class="menu" id="menu_bureau">Les Bureaux</a></li>
                        <?php endif; ?>
                        
                        <?php if(isset($smenu_roles['BUREAU_STR']['d_read'])):?>
                        <li><a href="<?php echo base_url(); ?>C_bureau_structure" class="menu" id="menu_bureau_structure">Bureaux Structures</a></li>
                        <?php endif; ?>

                    </ul>
                </li>
                <?php endif; ?>
				
				<?php
				if(isset($menu_roles['BAT_SALLE'])):?>
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="material-icons">&#xE0AF;</i><!--i class="md md-account-balance"></i--><span>Batiments/Salle </span><span class="pull-right"><i class="md md-add"></i></span></a>

                    <ul class="list-unstyled">
						
                        <?php if(isset($smenu_roles['TYP_BAT']['d_read'])):?>
                        <li><a href="<?php echo base_url(); ?>C_type_batiment" class="menu" id="menu_type_batiment">Type Batiment</a></li>
                        <?php endif; ?>
                        
                        <?php if(isset($smenu_roles['BAT']['d_read'])):?>
                        <li><a href="<?php echo base_url(); ?>C_batiments" class="menu" id="menu_batiments">Batiments</a></li>
                        <?php endif; ?>

                        <?php if(isset($smenu_roles['EQUIPEMENT']['d_read'])):?>
                        <li><a href="<?php echo base_url(); ?>C_type_equipement" class="menu" id="menu_type_equipement">Equipement</a></li>
                        <?php endif; ?>

                        <?php if(isset($smenu_roles['TYP_CLASSE_PHY']['d_read'])):?>
                        <li><a href="<?php echo base_url(); ?>C_type_classe_physique" class="menu" id="menu_type_classe_physique">Type classe Physique</a></li>
                        <?php endif; ?>

                        <?php if(isset($smenu_roles['CLASSE_PHY']['d_read'])):?>
                        <li><a href="<?php echo base_url(); ?>C_classe_physique" class="menu" id="menu_classe_physique">Classe Physique</a></li>
                        <?php endif; ?>

                    </ul>

                </li>
                <?php endif; ?>

                <?php if(isset($menu_roles['PARAM'])):?>
                <li class="has_sub">

                    <a href="#" class="waves-effect"><i class="md md-settings"></i><span> Paramétrages </span><span class="pull-right"><i class="md md-add"></i></span></a>

                    <ul class="list-unstyled">

                        <?php if(isset($smenu_roles['CLASSE_PEDA']['d_read'])):?>
                        <li><a href="<?php echo base_url(); ?>C_classe_pedagogiques" class="menu" id="menu_classe_pedagogique">Classe Pedagogique</a></li>
                        <?php endif; ?>
                        
                        <?php if(isset($smenu_roles['TYP_GRPMT']['d_read'])):?>
                        <li><a href="<?php echo base_url(); ?>C_type_groupement" class="menu" id="menu_type_groupement">Groupements</a></li>
                        <?php endif; ?>

                        <?php if(isset($smenu_roles['OPT']['d_read'])):?>
                        <li><a href="<?php echo base_url(); ?>C_option" class="menu" id="menu_option">Option</a></li>
                        <?php endif; ?>

                        <?php if(isset($smenu_roles['PROG']['d_read'])):?>
                        <li><a href="<?php echo base_url(); ?>C_programmes" class="menu" id="menu_programmes">Programmes</a></li>
                        <?php endif; ?>

                        <?php if(isset($smenu_roles['PROG_STR']['d_read'])):?>
                        <li><a href="<?php echo base_url(); ?>C_programmes_contenu_structure" class="menu" id="menu_programmes_contenu_structure">Programmes structure</a></li>
                        <?php endif; ?>

                    </ul>
                </li>
                <?php endif; ?>
                
                <?php if(isset($menu_roles['GES_PERS'])):?>
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="fa fa-users"></i><span> Gestion Personnel </span><span class="pull-right"><i class="md md-add"></i></span></a>

                    <ul class="list-unstyled">

                        <?php if(isset($smenu_roles['PERSONNEL']['d_read'])):?>
                        <li><a href="<?php echo base_url(); ?>C_bureau_personnel" class="menu" id="menu_bureau_personnel">Le Personnel</a></li>
                        <?php endif; ?>

                        <?php if(isset($smenu_roles['PRISE_SRV']['d_read'])):?>
                        <li><a href="<?php echo base_url(); ?>C_prise_service_personnel" class="menu" id="menu_prise_service_personnel">Prise de Services</a></li>
                        <?php endif; ?>

                    </ul>
                </li>
                <?php endif; ?>
                
                
                <?php if(isset($menu_roles['GES_ETAB'])):?>
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="material-icons">&#xE8D1;</i><!--i class="md md-braille"></i--><span> Gestion Etabliss. </span><span class="pull-right"><i class="md md-add"></i></span></a>

                    <ul class="list-unstyled">

                        <?php if(isset($smenu_roles['ETAB']['d_read'])):?>
                        <li><a href="<?php echo base_url(); ?>C_gestion_etablissement" class="menu" id="menu_gestion_etablissement">Etablissements</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>
                

                <?php if(isset($menu_roles['ETABLISSEMENT'])):?>
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="fa fa-graduation-cap"></i><span>Etablissement</span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <?php if(isset($smenu_roles['LISTE_ETABLISSMENTS']['d_read'])):?>
                        <li></li>
                        <li class="has_sub">
                                        <a href="javascript:void(0);" class="waves-effect subdrop"><span>Etablissements</span> <span class="pull-right"><i class="md md-remove"></i></span></a>
                                        <ul style="display: block;">
                                            <li><a href="<?php echo base_url(); ?>C_etablissement" class="menu" id="liste_etablissement">Liste Etablissements</a></li>
                                            <li><a href="<?php echo base_url(); ?>C_etablissement\get_etablissement_type\1" class="menu" id="liste_etablissement">Etablissements Autorises</a></li>
                                            <li><a href="<?php echo base_url(); ?>C_etablissement\get_etablissement_type\2" class="menu" id="liste_etablissement">Etablissements Non Autorises</a></li>
                                            <li><a href="<?php echo base_url(); ?>C_etablissement\get_etablissement_type\3" class="menu" id="liste_etablissement">Etablissements Reconnus</a></li>
                                            <li><a href="<?php echo base_url(); ?>C_etablissement\get_etablissement_type\4" class="menu" id="liste_etablissement">Etablissements En Instance</a></li>
                                        </ul>
                                        </li>
                        <?php endif; ?>
                        

                    </ul>
                </li>
                <?php endif; ?>

                <?php if(isset($menu_roles['ETABLISSEMENT'])):?>
                                <li class="has_sub">
                                    <a href="#" class="waves-effect"><i class="fa fa-graduation-cap"></i><span>Enseignant</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                    <ul class="list-unstyled">
                                        <?php if(isset($smenu_roles['LISTE_ENSEIGNANTS']['d_read'])):?>
                                        <li><a href="<?php echo base_url(); ?>C_enseignants" class="menu" id="liste_enseignants">Liste Enseignants</a></li>
                                        <?php endif; ?>

                                        <?php if(isset($smenu_roles['DEMANDE_AUTORISATION_ENSEIGNER']['d_read'])):?>
                                        <li><a href="<?php echo base_url(); ?>C_enseignants/demande_autorisaton" class="menu" id="Demande">Demande</a></li>
                                        <?php endif; ?>
                                        
                                    </ul>
                                </li>
                <?php endif; ?>

                <?php if(isset($menu_roles['NOMENCLATURE'])):?>
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md md-settings"></i><span> Nomenclature </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        
                        <?php if(isset($smenu_roles['ANNEE_SCOLAIRE']['d_read'])):?>
                        <li><a href="<?php echo base_url(); ?>C_annee_scolaire" class="menu" id="menu_annee_scolaire">Annee Scolaire</a></li>
                        <?php endif; ?>

                        <?php if(isset($smenu_roles['TYPE_PROFIL']['d_read'])):?>
                            <li><a href="<?php echo base_url(); ?>C_type_piece" class="menu" id="menu_type_piece">Type piece</a></li>
                        <?php endif; ?>
                        
                        <?php if(isset($smenu_roles['TYPE_DOSSIER']['d_read'])):?>
                        <li><a href="<?php echo base_url(); ?>C_type_dossier" class="menu" id="menu_type_dossier">Type Dossier</a></li>
                        <?php endif; ?>

                    </ul>
                </li>
                <?php endif; ?>

                <?php if(isset($menu_roles['SECURITE'])):?>
                    <li class="has_sub">
                        <a href="#" class="waves-effect"><i class="md md-book"></i><span> Sécurité </span><span class="pull-right"><i class="md md-add"></i></span></a>
                        <ul class="list-unstyled">

                            <?php if(isset($smenu_roles['USR']['d_read'])):?>
                                <li><a href="<?php echo base_url(); ?>C_sys_user" class="menu" id="menu_sys_users">Utilisateurs</a></li>
                            <?php endif; ?>

                            <?php if(isset($smenu_roles['MENU']['d_read'])):?>
                                <li><a href="<?php echo base_url(); ?>C_sys_menu" class="menu" id="menu_sys_menu">Menus</a></li>
                            <?php endif; ?>

                            <?php if(isset($smenu_roles['PROFIL']['d_read'])):?>
                                <li><a href="<?php echo base_url(); ?>C_sys_profil" class="menu" id="menu_sys_profils">Profils</a></li>
                            <?php endif; ?>
                                
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>

            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<?php 
unset($menu_roles, $smenu_roles, $tab_data_ses);
?>
<!-- Left Sidebar End --> 