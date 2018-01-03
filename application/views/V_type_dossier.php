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
                <h3 class='panel-title'>Type Dossier </h3>
            </div>
            <div class='panel-body'>
                <table id='datatable-buttons' class='table table-striped table-bordered'>
                    <thead>
                    <tr>
                        <th>libelle type dossier</th>
                        <th>niveau</th>
                        <th>Debut</th>
                        <th>Fin</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($all_data as $value) {
                        $niveau="";
                        switch ($value->niveau) {
                            case 1:
                                $niveau="Enseignant";
                                break;
                            case 2:
                                $niveau="Enseignant retraité";
                                break;
                            case 3:
                                $niveau="Etablissement";
                                break;
                            case 4:
                                $niveau="Personnel";
                                break;
                        }
                        ?>
                        <tr>
                            <td><?php echo $value->libelle_type_dossier; ?></td>
                            <td><?php echo $niveau; ?></td>
                            <td><?php echo $value->jour_debut.' - '.strftime('%b',strtotime($value->mois_debut.'/01/2000')); ?></td>
<!--                            <td>--><?php //echo $value->mois_debut; ?><!--</td>-->
                            <td><?php echo $value->jour_fin.' - '.strftime('%b',strtotime($value->mois_fin.'/01/2000')); ?></td>
                            <td class='actions' style='width: 1%; text-align: center; white-space: nowrap'>
				<a href='#' class='on-default btn_edit' id='<?php echo $value->id_type_dossier; ?>'>
					<i class='fa fa-pencil'></i></a>
				&nbsp;
				<a href='#' class='on-default btn_delete' id='<?php echo $value->id_type_dossier; ?>'>
					<i class='fa fa-trash-o' style='color:red'></i></a>
				&nbsp;
				<a href='C_type_dossier\parametre_dossier\<?php echo $value->id_type_dossier; ?>' class='on-default detail' id='<?php echo $value->id_type_dossier; ?>'>
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
                    <input type='hidden' id='id_type_dossier' name='id_type_dossier'/>

                    <div class='form-body'>
                        <div class='form-group'>
                            <label class='control-label col-md-3'>Type de dossier</label>

                            <div class='col-md-9'>
                                <input name='libelle_type_dossier' id='libelle_type_dossier'
                                       class='form-control' type='text' required>
                            </div>
                        </div>
					
                        <div class='form-group'>
                            <label class='control-label col-md-3'>Niveau</label>
                            <!-- <div class='col-md-9'>
                                <input name='niveau' id='niveau'
                                       class='form-control' type='text' required>
                            </div> -->
                            <div class='col-md-9'>
                                <select  class='form-control' name='niveau' id='niveau'>
                                            <option value='1'>Enseignant</option>
                                            <option value='2'>Enseignant retraité</option>
                                            <option value='3'>Etablissement</option>
                                            <option value='4'>Personnel</option>
                                </select>
                            </div>
                        </div>
					
                        <div class='form-group'>
                            <label class='control-label col-md-3'>Jour debut</label>

                            <div class='col-md-9'>
                                <input name='jour_debut' id='jour_debut'
                                       class='form-control' type='number' min=1 max=31  required>
                            </div>
                        </div>
					
                        <div class='form-group'>
                            <label class='control-label col-md-3'>Mois debut</label>

                            <div class='col-md-9'>
                                <input name='mois_debut' id='mois_debut' type='number' min=1 max=12
                                       class='form-control' type='text' required>
                            </div>
                        </div>
					
                        <div class='form-group'>
                            <label class='control-label col-md-3'>Jour fin</label>

                            <div class='col-md-9'>
                                <input name='jour_fin' id='jour_fin'
                                       class='form-control' type='number' min=1 max=31 required>
                            </div>
                        </div>
					
                        <div class='form-group'>
                            <label class='control-label col-md-3'>Mois fin</label>

                            <div class='col-md-9'>
                                <input name='mois_fin' id='mois_fin'
                                       class='form-control' type='number' min=1 max=12 required>
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

        //TableManageButtons.init();
        $(document).ready(function () {
            $('#datatable-buttons').managing_ajax({
                id_menu: 'menu_type_dossier', //id du menu dans le fichier navigation_bar
                id_modal_form: 'modal_form', //id du modal qui contient le formulaire

                id_form: 'form', //id du formulaire
                url_submit: '<?php echo site_url('C_type_dossier/save')?>', //url du save (donn�es envoy�s par post)

                title_modal_add: 'Nouveau ', //Title du modal � l'ouverture en mode ajout
                focus_add: 'libelle_type_statut_etablissement', //l'emplacement du focus en mode ajout

                title_modal_edit: 'Edition ', //Title du modal � l'ouverture en mode edit
                focus_edit: 'libelle_type_statut_etablissement',//l'emplacement du focus en mode edit

                url_edit: '<?php echo site_url('C_type_dossier/get_record')?>', //url le fonction qui recup�re la donn�es de la ligne
                url_delete: '<?php echo site_url('C_type_dossier/delete')?>', //url de la fonction supprim�
            });
        });

</script>
<script src="<?php echo base_url(); ?>assets/js/dossier.js"></script>