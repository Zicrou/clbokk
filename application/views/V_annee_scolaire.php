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
                <table id='datatable-buttons' class='table table-striped table-bordered'>
                    <thead>
                    <tr>
                        <th>annee</th>
                        <th>libelle_annee</th>
                        <th>en_cours</th>
                        <th>etat_annee</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($all_data as $value) { ?>
                        <tr>
                            <td><?php echo $value->annee; ?></td>
                            <td><?php echo $value->libelle_annee; ?></td>
                            <td><?php echo ($value->en_cours==1)?'En cours':'Archiver'; ?></td>
                            <td  ><?php echo ($value->etat_annee)?'<i style="color:#58c9c7" class=" fa fa-check "></i>':'<i style="color:red" class=" fa  fa-folder-o "></i>';?></td>
                            <td class='actions' style='width: 1%; text-align: center; white-space: nowrap'>
				<a href='#' class='on-default btn_edit' id='<?php echo $value->code_annee_scolaire; ?>'>
					<i class='fa fa-pencil'></i></a>
				&nbsp;
				<a href='#' class='on-default btn_delete' id='<?php echo $value->code_annee_scolaire; ?>'>
					<i class='fa fa-trash-o' style='color:red'></i></a>
				&nbsp;
				<a href='#' class='on-default btn_edit' id='<?php echo $value->code_annee_scolaire; ?>'>
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
                    <input type='hidden' id='code_annee_scolaire' name='code_annee_scolaire'/>

                    <div class='form-body'>
                        <div class='form-group'>
                            <label class='control-label col-md-3'>annee</label>

                            <div class='col-md-9'>
                                <input name='annee' id='annee'
                                       class='form-control' type='text' required>
                            </div>
                        </div>
					
                        <div class='form-group'>
                            <label class='control-label col-md-3'>libelle_annee</label>

                            <div class='col-md-9'>
                                <input name='libelle_annee' id='libelle_annee'
                                       class='form-control' type='text' required>
                            </div>
                        </div>
					
                        <div class='form-group'>
                            <label class='control-label col-md-3'>en_cours</label>

                            <div class='col-md-9'>
                                <!-- <input name='en_cours' id='en_cours'
                                       class='form-control' type='text' required> -->
                                       <select class='form-control' name='en_cours' id='en_cours'>
                                        <option value='1'>En cours</option>
                                        <option value='-1'>Archiver</option>
                                       </select>
                            </div>
                        </div>
					
                        <!-- <div class='form-group'>
                            <label class='control-label col-md-3'>etat_annee</label>

                            <div class='col-md-9'>
                                <input name='etat_annee' id='etat_annee'
                                       class='form-control' type='text' required>
                            </div>
                        </div> -->
                            <div class="form-group" style="">
                            
                            <div class="checkbox checkbox-primary"  class='col-md-8'>
                                                    <input id="etat_annee" value="1" name="etat_annee" type="checkbox">
                                                    <label for="etat_annee">
                                                        Afficher
                                                    </label>
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
                //id_menu: 'menu_annee_scolaire', //id du menu dans le fichier navigation_bar
                id_modal_form: 'modal_form', //id du modal qui contient le formulaire

                id_form: 'form', //id du formulaire
                url_submit: '<?php echo site_url('C_annee_scolaire/save')?>', //url du save (donn�es envoy�s par post)

                title_modal_add: 'Nouveau ', //Title du modal � l'ouverture en mode ajout
                focus_add: 'libelle_type_statut_etablissement', //l'emplacement du focus en mode ajout

                title_modal_edit: 'Edition ', //Title du modal � l'ouverture en mode edit
                focus_edit: 'libelle_type_statut_etablissement',//l'emplacement du focus en mode edit

                url_edit: '<?php echo site_url('C_annee_scolaire/get_record')?>', //url le fonction qui recup�re la donn�es de la ligne
                url_delete: '<?php echo site_url('C_annee_scolaire/delete')?>', //url de la fonction supprim�
            });
        });

</script>
