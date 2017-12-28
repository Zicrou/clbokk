

<?php btn_add_action(); ?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Liste des validations par fonction</h3>
            </div>
            <div class="panel-body">
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 20%">Fonction validateur</th>
                        <th>Fonction</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($all_data as $value) { ?>
                        <tr>
                            <td><?php echo $value->id_function_v; ?></td>
                            <td><?php echo $value->id_function; ?></td>
                            <td class="actions" style="width: 1%; text-align: center; white-space: nowrap">
                                <?php btn_edit_action($value->id_function_validator); ?>
                                <?php btn_delete_action($value->id_function_validator); ?>
                                <?php btn_show_action($value->id_function_validator); ?>
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
<div id="modal_form" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_formLabel"
     aria-hidden="true">
    <form action="#" id="form" class="form-horizontal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="modal_formLabel">Title</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_function_typeInstitution_validator"
                           name="id_function_typeInstitution_validator"/>

                    <div class="form-body">

                        <div class="form-group">
                            <label class="control-label col-md-4">Type ce structure</label>
                            <div class="col-md-8">
                                <select name="id_categorie" id="id_categorie" class="form-control" required>
                                    <?php echo $select_cat; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Fonction validateur</label>
                            <div class="col-md-8">
                                <select name="id_function_v" id="id_function_v" class="form-control" required>
                                    <?php echo $select_function; ?>
                                </select>
                            </div>
                        </div>

                        <div class="panel panel-border panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Fonctions</h3>
                            </div>
                            <div class="panel-body" style="padding-top: 0;">

                                <div class="col-md-12">
                                    <select name="my_multi_select[]"  multiple="multiple" id="my_multi_select" class="multi-select" required>
                                        <?php foreach ($data_function as $value) {  ?>
                                            <option value="<?php echo $value->id_function; ?>"><?php echo $value->descFunction; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

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




<script type="text/javascript">

    $(document).ready(function () {

        $('#datatable-buttons').managing_ajax({
            id_modal_form: 'modal_form',

            id_form: 'form',
            url_submit: "<?php echo site_url('C_validator_function/save')?>",

            title_modal_add: 'Nouvelle configuration',
            focus_add: 'id_categorie',

            title_modal_edit: 'Edition de la configuration',
            focus_edit: 'id_categorie',

            url_edit: "<?php echo site_url('C_validator_function/get_record')?>",
            url_delete: "<?php echo site_url('C_validator_function/delete')?>",
        });


        $('#my_multi_select').multiSelect({
            selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='Rechercher...'>",
            selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='Rechercher...'>",
            afterInit: function (ms) {
                var that = this,
                    $selectableSearch = that.$selectableUl.prev(),
                    $selectionSearch = that.$selectionUl.prev(),
                    selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                    selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                    .on('keydown', function (e) {
                        if (e.which === 40) {
                            that.$selectableUl.focus();
                            return false;
                        }
                    });

                that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                    .on('keydown', function (e) {
                        if (e.which == 40) {
                            that.$selectionUl.focus();
                            return false;
                        }
                    });

            },
            afterSelect: function () {
                this.qs1.cache();
                this.qs2.cache();
            },
            afterDeselect: function () {
                this.qs1.cache();
                this.qs2.cache();
            }
        });






    });

</script>



















