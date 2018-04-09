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
                ?>
                <?php if(isset($menu_roles['ETABLISSEMENT'])):?>
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="fa  md-account-balance"></i><span>Etablissement</span><span class="pull-right"><i class="md md-add"></i></span></a>
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
                        <?php if(isset($smenu_roles['SUIVIT_OUVERTURE']['d_read'])):?>
                                        <li><a href="<?php echo base_url(); ?>C_depot/get_suivit_depot_ouverture_structure" class="menu" id="Demande">Validation Demande</a></li>
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

                                        
                                        <?php if(isset($smenu_roles['LISTE_DEMANDE']['d_read'])):?>
                                        <li><a href="<?php echo base_url(); ?>C_depot/get_depots" class="menu" id="Demande">Validation Demande</a></li>
                                        <?php endif; ?>
                                        
                                        
                                        
                                    </ul>
                                </li>
                <?php endif; ?>

                <?php if(isset($menu_roles['NOMENCLATURE'])):?>
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md md-book"></i><span> Nomenclature </span><span class="pull-right"><i class="md md-add"></i></span></a>
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
                <?php if(isset($menu_roles['DEPOT'])):?>
                    <li class="has_sub">
                        <a href="#" class="waves-effect"><i class="md md-assignment"></i><span> Depot </span><span class="pull-right"><i class="md md-add"></i></span></a>
                        <ul class="list-unstyled">
                        <?php if(isset($smenu_roles['DEPOT_ENSEIGNANT']['d_read'])):?>
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect subdrop"><span>Liste</span> <span class="pull-right"><i class="md md-remove"></i></span></a>
                                <ul style="display: block;">                                    
                                    <li><a href="<?php echo base_url(); ?>C_depot\get_depot_ouverture_etablissement" class="menu" id="depot_transfert_etablissement">Demande ouverture etablissement</a></li> 
                                    <li><a href="<?php echo base_url(); ?>C_depot\get_depots" class="menu" id="Depot_autorisation">Demande Autorisation</a></li>
                                    <li><a href="<?php echo base_url(); ?>C_depot\get_depot_trasfert" class="menu" id="depot_transfert_etablissement">Demande Transfert</a></li>
                                    <li><a href="<?php echo base_url(); ?>C_depot\get_depot_reconnaissance" class="menu" id="depot_reconnaissance">Demande reconnaissance</a></li>
                                    <li><a href="<?php echo base_url(); ?>C_depot\get_depot_extension_cycle" class="menu" id="depot_extension_cycle">Demande extension cycle</a></li>
                                    <li><a href="<?php echo base_url(); ?>C_depot\get_depot_extension_classe" class="menu" id="depot_transfert_etablissement">Demande extension classe</a></li>
                                </ul>
                        </li>
                        <?php endif; ?>
                        <?php if(isset($smenu_roles['DEPOT_ETABLISSEMENT']['d_read'])):?>
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect subdrop"><span>Nouveau</span> <span class="pull-right"><i class="md md-remove"></i></span></a>
                                <ul style="display: block;">
                                        <li><a href="<?php echo base_url(); ?>C_etablissement\demande_ouverture" class="menu" id="ouverture_etablissement">Demande ouverture etablissement</a></li>
                                        <li><a href="<?php echo base_url(); ?>C_enseignants\demande_autorisaton" class="menu" id="Demande">Autorisation d'enseignement</a></li>
                                        <li><a href="<?php echo base_url(); ?>C_etablissement\demande_transfert" class="menu" id="transfert_etablissement">Demande transfert</a></li> 
                                        <li><a href="<?php echo base_url(); ?>C_etablissement\demande_reconnaissance" class="menu" id="reconnaissance_etablissement">Demande de reconnaissance</a></li>
                                        <li><a href="<?php echo base_url(); ?>C_etablissement\demande_extension_cycle" class="menu" id="extension_cycle_etablissement">Demande extension cycle</a></li>
                                        <li><a href="<?php echo base_url(); ?>C_etablissement\demande_extension_classe" class="menu" id="extension_classe_etablissement">Demande extension classe</a></li>
                                        <li><a href="<?php echo base_url(); ?>C_depot\get_depots_en_cours" class="menu" id="extension_classe_etablissement">depot</a></li>
                                </ul>
                        </li>
                        <?php endif; ?>                                
                        </ul>
                    </li>
                    
                <?php endif; ?>
                <?php if(isset($menu_roles['SECURITE'])):?>
                    <li class="has_sub">
                        <a href="#" class="waves-effect"><i class="md md-settings"></i><span> Sécurité </span><span class="pull-right"><i class="md md-add"></i></span></a>
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