<div class="row">
    <div class="col-sm-12">
        <h4 class="pull-left page-title"><?php echo $lib_dossier;?></h4>

    </div>
</div>
<div class='row'>
    <div class='col-md-8'>
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <h3 class='panel-title'>Liste des Pieces</h3>
            </div>
            <div class='panel-body' id="piece_control">
                <table id='datatable-buttons' class='table table-striped table-bordered'>
                    <thead>
                    <tr>
<!--                        <th>id_type_piece</th>-->
<!--                        <th>id_type_dossier</th>-->
                        <th>Pieces</th>
                        <th>obligatoire</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($all_type as $value) { ?>
                        <tr>
                            <td><?php echo $value->libelle_type_piece; ?></td>
                            <td  ><?php echo ($value->obligatoire=="1")?'<i style="color:#58c9c7" class=" fa  fa-check-square-o "></i>':'<i style="color:blueviolet" class=" fa   fa-square-o "></i>';?></td>
                            <td class='actions' style='width: 1%; text-align: center; white-space: nowrap'>

                                <a href="<?php echo site_url('C_type_dossier/delete_piece_dossier/'.$value->id_dossier_piece); ?>" class='on-default btn_delete_piece' id='<?php echo $value->id_dossier_piece; ?>'>
                                    <i class='fa fa-trash-o' style='color:red'></i></a>

                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <form class="form-inline" role="form" id="frm_type_piece" method="post" action="<?php echo site_url('C_type_dossier/save_type_piece')?>">


                    <div class="form-group col-md-10">
                        <label class="sr-only" for="exampleInputPassword2">Piece</label>
                        <input type="hidden" name="id_dossier_piece" id="id_dossier_piece" value>
                        <input type="hidden" name="id_type_dossier" id="id_type_dossier" value="<?php echo $id_dossier_piece ?>">
                        <select class="form-control " style="max-width:80%" id="id_type_piece" name="id_type_piece">
                            <?php echo $select_type_piece; ?>
                        </select>
                        <div class="checkbox checkbox-primary">
                            <input id="obligatoire" name="obligatoire" type="checkbox" value="1">
                            <label for="obligatoire">
                                Obligatoire
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-2" style="text-align: right">
                        <button type="button" id="add_piece" class="btn btn-primary">Valider</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
        <div class='col-md-4'>
            <div class='panel panel-default'>
                <div class='panel-heading'>
                    <h3 class='panel-title'>Circuit </h3>
                </div>
                <div class='panel-body' id="circuit_control">
                    <table id='datatable-buttons' class='table table-striped table-bordered'>
                        <thead>
                        <tr>
<!--                            <th>id_type_dossier</th>-->
                            <th>Structure</th>
                            <th>ordre</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($all_circuit as $value) { ?>
                            <tr>
<!--                                <td>--><?php //echo $value->id_type_dossier; ?><!--</td>-->
                                <td><?php echo $value->libelle_type_structure; ?></td>
                                <td><?php echo $value->ordre; ?></td>
                                <td class='actions' style='width: 1%; text-align: center; white-space: nowrap'>

                                    <a href='<?php echo site_url('C_type_dossier/delete_circuit/'.$value->id_circuit); ?>' class='on-default btn_delete_circuit' id='<?php echo $value->id_circuit; ?>'>
                                        <i class='fa fa-trash-o' style='color:red'></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <form class="form-inline" role="form" id="frm_circuit" method="post" action="<?php echo site_url('C_type_dossier/save_circuit')?>">


                        <div class="form-group col-md-10">
                            <label class="sr-only" for="exampleInputPassword2">Piece</label>
                            <input type="hidden" name="id_circuit" id="id_circuit" value>
                            <input type="hidden" name="id_type_dossier" id="id_type_dossier" value="<?php echo $id_dossier_piece ?>">
                            <select class="form-control " style="max-width: 250px" id="id_type_structure" name="id_type_structure">
                                <?php echo $select_structure; ?>
                            </select>

                        </div>
                        <div class="form-group col-md-2" style="text-align: right">
                            <button type="button" id="add_circuit" class="btn btn-primary">Valider</button>
                            </div>
                    </form>

                </div>
            </div>
        </div>

    </div> <!-- End Row -->



<script src="<?php echo base_url(); ?>assets/js/dossier.js"></script>


