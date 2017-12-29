<!-- Page-Title -->
<div class='row'>
    <div class='col-sm-12' style='margin-bottom: 30px'>
        <button type='button' id='btn_add' class='btn btn-primary'>Nouveau <span class='m-l-5'><i class='fa fa-plus-square'></i></span></button>
    </div>
</div>


<div class='row'>
    <div class='col-md-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <h3 class='panel-title'>Liste des </h3>
            </div>
            <div class='panel-body'>
                <table id='datatable-buttons' class='table table-striped table-bordered' >
                    <thead>
                    <tr>
                        <th>prenom_ens</th>
                        <th>nom_ens</th>
                        <th>sexe_ens</th>
                        <th>date_nais_ens</th>
                        <th>numero_autorisation</th>
                        <th>profil_aca</th>
                        <th>profil_pro</th>
<!--                        <th>css</th>-->
<!--                        <th>ipres</th>-->
<!--                        <th>ipm</th>-->
                        <th>code_specialite</th>
                        <th>etat_ens</th>
                        <th>statut_ens</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($all_data as $value) { ?>

                        <tr>
                            <td><?php echo $value->prenom_ens; ?></td>
                            <td><?php echo $value->nom_ens; ?></td>
                            <td><?php echo $value->sexe_ens; ?></td>
                            <td><?php echo $value->date_nais_ens; ?></td>
                            <td><?php echo $value->numero_autorisation; ?></td>
                            <td><?php echo $value->profil_aca; ?></td>
                            <td><?php echo $value->profil_pro; ?></td>
<!--                            <td>--><?php //echo $value->css; ?><!--</td>-->
<!--                            <td>--><?php //echo $value->ipres; ?><!--</td>-->
<!--                            <td>--><?php //echo $value->ipm; ?><!--</td>-->
                            <td><?php echo $value->code_specialite; ?></td>
                            <td><?php echo $value->etat_ens; ?></td>
                            <td><?php echo $value->statut_ens; ?></td>
                            <td class='actions' style='width: 1%; text-align: center; white-space: nowrap'>
				<a href='#' class='on-default btn_edit' id='<?php echo $value->id_ens; ?>'>
					<i class='fa fa-pencil'></i></a>
				&nbsp;
				<a href='#' class='on-default btn_delete' id='<?php echo $value->id_ens; ?>'>
					<i class='fa fa-trash-o' style='color:red'></i></a>
				&nbsp;
				<a href='#' class='on-default btn_edit' id='<?php echo $value->id_ens; ?>'>
					<i class='fa fa-eye' style='color:#CCCCCC'></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div> <!-- End Row -->


<!-- sample modal content -->
<div id='modal_form' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='modal_formLabel'
     aria-hidden='true'>
    <form action='#' id='form' class='form-horizontal'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'> X </button>
                    <h4 class='modal-title' id='modal_formLabel'>Title</h4>
                </div>
                <div class='modal-body'>
                    <input type='hidden' id='id_ens' name='id_ens'/>

                    <div class='form-body'>
                        <div class='form-group'>
                            <label class='control-label col-md-3'>ien_ens</label>

                            <div class='col-md-9'>
                                <input name='ien_ens' id='ien_ens'
                                       class='form-control' type='text' required>
                            </div>
                        </div>
					
                        <div class='form-group'>
                            <label class='control-label col-md-3'>prenom_ens</label>

                            <div class='col-md-9'>
                                <input name='prenom_ens' id='prenom_ens'
                                       class='form-control' type='text' required>
                            </div>
                        </div>
					
                        <div class='form-group'>
                            <label class='control-label col-md-3'>nom_ens</label>

                            <div class='col-md-9'>
                                <input name='nom_ens' id='nom_ens'
                                       class='form-control' type='text' required>
                            </div>
                        </div>
					
                        <div class='form-group'>
                            <label class='control-label col-md-3'>sexe_ens</label>

                            <div class='col-md-9'>
                                <input name='sexe_ens' id='sexe_ens'
                                       class='form-control' type='text' required>
                            </div>
                        </div>
					
                        <div class='form-group'>
                            <label class='control-label col-md-3'>date_nais_ens</label>

                            <div class='col-md-9'>
                                <input name='date_nais_ens' id='date_nais_ens'
                                       class='form-control' type='text' required>
                            </div>
                        </div>
					
                        <div class='form-group'>
                            <label class='control-label col-md-3'>numero_autorisation</label>

                            <div class='col-md-9'>
                                <input name='numero_autorisation' id='numero_autorisation'
                                       class='form-control' type='text' required>
                            </div>
                        </div>
					
                        <div class='form-group'>
                            <label class='control-label col-md-3'>profil_aca</label>

                            <div class='col-md-9'>
                                <input name='profil_aca' id='profil_aca'
                                       class='form-control' type='text' required>
                            </div>
                        </div>
					
                        <div class='form-group'>
                            <label class='control-label col-md-3'>profil_pro</label>

                            <div class='col-md-9'>
                                <input name='profil_pro' id='profil_pro'
                                       class='form-control' type='text' required>
                            </div>
                        </div>
					
                        <div class='form-group'>
                            <label class='control-label col-md-3'>css</label>

                            <div class='col-md-9'>
                                <input name='css' id='css'
                                       class='form-control' type='text' required>
                            </div>
                        </div>
					
                        <div class='form-group'>
                            <label class='control-label col-md-3'>ipres</label>

                            <div class='col-md-9'>
                                <input name='ipres' id='ipres'
                                       class='form-control' type='text' required>
                            </div>
                        </div>
					
                        <div class='form-group'>
                            <label class='control-label col-md-3'>ipm</label>

                            <div class='col-md-9'>
                                <input name='ipm' id='ipm'
                                       class='form-control' type='text' required>
                            </div>
                        </div>
					
                        <div class='form-group'>
                            <label class='control-label col-md-3'>code_specialite</label>

                            <div class='col-md-9'>
                                <input name='code_specialite' id='code_specialite'
                                       class='form-control' type='text' required>
                            </div>
                        </div>
					
                        <div class='form-group'>
                            <label class='control-label col-md-3'>etat_ens</label>

                            <div class='col-md-9'>
                                <input name='etat_ens' id='etat_ens'
                                       class='form-control' type='text' required>
                            </div>
                        </div>
					
                        <div class='form-group'>
                            <label class='control-label col-md-3'>statut_ens</label>

                            <div class='col-md-9'>
                                <input name='statut_ens' id='statut_ens'
                                       class='form-control' type='text' required>
                            </div>
                        </div>
					
                    </div>
                </div>
                <div class='modal-footer'>
                    <input type='submit' class='btn btn-primary' value='Enregistrer'/>
                    <button type='button' class='btn btn-default' data-dismiss='modal'>Fermer</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </form>
</div><!-- /.modal -->


<script type='text/javascript'>
    
        $(document).ready(function () {
            $('#datatable-buttons').managing_ajax({
                //id_menu: 'menu_enseignants', //id du menu dans le fichier navigation_bar
                id_modal_form: 'modal_form', //id du modal qui contient le formulaire

                id_form: 'form', //id du formulaire
                url_submit: '<?php echo site_url('C_enseignants/save')?>', //url du save (données envoyés par post)

                title_modal_add: 'Nouveau ', //Title du modal à l'ouverture en mode ajout
                focus_add: 'libelle_type_statut_etablissement', //l'emplacement du focus en mode ajout

                title_modal_edit: 'Edition ', //Title du modal à l'ouverture en mode edit
                focus_edit: 'libelle_type_statut_etablissement',//l'emplacement du focus en mode edit

                url_edit: '<?php echo site_url('C_enseignants/get_record')?>', //url le fonction qui recupére la données de la ligne
                url_delete: '<?php echo site_url('C_enseignants/delete')?>', //url de la fonction supprimé
            });
        });
   
</script>
