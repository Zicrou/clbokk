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

<script src="<?php echo base_url(); ?>assets/js/dossier.js"></script>