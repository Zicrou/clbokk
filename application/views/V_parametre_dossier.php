<div class="row">
    <div class="col-sm-12">
        <h4 class="pull-left page-title"><?php echo $id;?></h4>

    </div>
</div>
<!-- Page-Title -->
<div class='row'>
    <div class='col-sm-12' style='margin-bottom: 30px'>
        <button type='button' id='btn_add' class='btn btn-info'>Nouveau <span class='m-l-5'><i class='fa fa-plus-square'></i></span></button>
    </div>
</div>


<div class='row'>
<div class='col-md-6'>
    <div class='panel panel-default'>
        <div class='panel-heading'>
            <h3 class='panel-title'>Liste des </h3>
        </div>
            <div class='panel-body'>
            </div>
    </div>
    </div>
    <div class='col-md-6'>
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <h3 class='panel-title'>Liste des </h3>
            </div>
            <div class='panel-body'>
                <table id='datatable-buttons' class='table table-striped table-bordered'>
                    <thead>
                    <tr>
                        <th>id_type_dossier</th>
                        <th>id_type_structure</th>
                        <th>ordre</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($all_circuit as $value) { ?>
                        <tr>
                            <td><?php echo $value->id_type_dossier; ?></td>
                            <td><?php echo $value->id_type_structure; ?></td>
                            <td><?php echo $value->ordre; ?></td>
                            <td class='actions' style='width: 1%; text-align: center; white-space: nowrap'>
				<a href='#' class='on-default btn_edit' id='<?php echo $value->id_circuit; ?>'>
					<i class='fa fa-pencil'></i></a>
				&nbsp;
				<a href='#' class='on-default btn_delete' id='<?php echo $value->id_circuit; ?>'>
					<i class='fa fa-trash-o' style='color:red'></i></a>
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
                    <input type='hidden' id='id_circuit' name='id_circuit'/>

                    <div class='form-body'>
                        <div class='form-group'>
                            <label class='control-label col-md-3'>id_type_dossier</label>

                            <div class='col-md-9'>
                                <input name='id_type_dossier' id='id_type_dossier'
                                       class='form-control' type='text' required>
                            </div>
                        </div>
					
                        <div class='form-group'>
                            <label class='control-label col-md-3'>id_type_structure</label>

                            <div class='col-md-9'>
                                <input name='id_type_structure' id='id_type_structure'
                                       class='form-control' type='text' required>
                            </div>
                        </div>
					
                        <div class='form-group'>
                            <label class='control-label col-md-3'>ordre</label>

                            <div class='col-md-9'>
                                <input name='ordre' id='ordre'
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



