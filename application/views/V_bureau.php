<!-- Page-Title -->
<?php btn_add_action('BUREAU')?>
<style>
.type_bloc{
	font-weight:bold;
	font-style:italic;
}
</style>
<div class="row">
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Liste des bureaux</h3>
            </div>
            <div class="panel-body">
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Code bureau</th>
                        <th>Niveau (Bloc)</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($all_data as $value): ?>
                        <tr>
                            <td><?php echo $value->code_bureau; ?></td>
                            <td><?php echo $value->libelle_niveau; ?> (<span class="type_bloc"><?php echo $value->code_bloc ?></span>)</td>
                            <td class="actions" style="width: 1%; text-align: center; white-space: nowrap">
                            	<?php btn_edit_action($value->id_bureau, 'BUREAU')?>
                                &nbsp;
                                <?php btn_delete_action($value->id_bureau, 'BUREAU')?>
                                
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div> <!-- End Row -->


<!-- sample modal content -->
<div id="modal_form" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_formLabel" aria-hidden="true">
    <form action="#" id="form" class="form-horizontal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="modal_formLabel">Title</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_bureau" name="id_bureau"/>

                    <div class="form-body">
                        
                        <?php 
						$cur_bloc = 0;
						$select_bloc = '';
						$select_niv = ''; 
						//var_dump($bloc_niv_data);
						
						foreach($bloc_niv_data as $bloc)
						{
							$id_bloc = $bloc->id_bloc;
							$code_bloc = $bloc->code_bloc;
							$id_bloc_niveau = $bloc->id_bloc_niveau;
							$lib_niv = $bloc->libelle_niveau;
							
							if($cur_bloc != $id_bloc)
							{
								///Select bloc
								$select_bloc .= "<option value='$id_bloc'>$code_bloc</option>";
								$cur_bloc = $id_bloc;
							}
															
							//Select niveau
							$select_niv .= "<option class='$id_bloc' value='$id_bloc_niveau'>$lib_niv</option>";
						}
						?>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3">Bloc</label>

                            <div class="col-md-9">
                            
                            <select name="id_bloc" id="id_bloc" class="form-control" required>
                            	<option value="">-----</option>
                                <?php echo $select_bloc; ?>
                            </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3">Niveau</label>

                            <div class="col-md-9">
                            <select name="id_bloc_niveau" id="id_bloc_niveau" class="form-control" required>
								<option value="">-----</option>
                                <?php echo $select_niv; ?>
                            </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3">Code bureau</label>

                            <div class="col-md-9">
                                <input name="code_bureau" id="code_bureau"
                                       class="form-control" type="text" required>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Enregistrer"/>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </form>
</div><!-- /.modal -->


<script src="<?php echo base_url(); ?>assets/js/jquery.chained.js?v=1.0.0" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
$(document).ready(function () {
	$('#datatable-buttons').managing_ajax({
		id_menu: 'menu_bureau', //id du menu dans le fichier navigation_bar
		id_modal_form: 'modal_form', //id du modal qui contient le formulaire

		id_form: 'form', //id du formulaire
		url_submit: "<?php echo site_url('C_bureau/save')?>", //url du save (données envoyés par post)

		title_modal_add: 'Ajout bureau', //Title du modal à l'ouverture en mode ajout
		focus_add: 'id_bloc', //l'emplacement du focus en mode ajout

		title_modal_edit: 'Editer un bureau', //Title du modal à l'ouverture en mode edit
		focus_edit: 'code_bureau',//l'emplacement du focus en mode edit

		url_edit: "<?php echo site_url('C_bureau/get_record')?>", //url le fonction qui recupére la données de la ligne
		url_delete: "<?php echo site_url('C_bureau/delete')?>", //url de la fonction supprimé
	});
	
	$.fn.afterAdd = function(args){
		$("#id_bloc_niveau").chained("#id_bloc");
	};
	
	$.fn.afterEdit = function(args){
		$("#id_bloc_niveau").chained("#id_bloc");
	};
	
});
</script>