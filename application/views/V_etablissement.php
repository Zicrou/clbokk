<!-- Page-Title -->
<?php btn_add_action('LISTE_ETABLISSMENTS')?>


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
                        <th>Code</th>
                        <th>Nom</th>
                        <th>Status</th>
                        <th>Responsable</th>
                        <th>Date Creation</th>
                        <th>Adresse</th>
                        <th>Telephone</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($all_data as $value) { ?>
                        <tr>
                            <td><?php echo $value->code; ?></td>
                            <td><?php echo $value->nom; ?></td>
                            <td><?php echo $value->status; ?></td>
                            <td><?php echo $value->responsable; ?></td>
                            <?php
                            $jour=($value->jour_creation>0)?str_pad($value->jour_creation, 2, "0", STR_PAD_LEFT):'___';
                            $mois=($value->mois_creation>0)?str_pad($value->mois_creation, 2, "0", STR_PAD_LEFT):'___';
                            ?>
                            <td><?php echo ($value->annee_creation>0)?$jour."/".$mois."/".$value->annee_creation :'___/___/_____'; ?></td>
                            <td><?php echo $value->adresse; ?></td>
                            <td><?php echo $value->telephone; ?></td>
                            <td class='actions' style='width: 1%; text-align: center; white-space: nowrap'>
				<a href='#' class='on-default btn_edit' id='<?php echo $value->id; ?>'>
					<i class='fa fa-pencil'></i></a>
				&nbsp;
				<a href='#' class='on-default btn_delete' id='<?php echo $value->id; ?>'>
					<i class='fa fa-trash-o' style='color:red'></i></a>
				&nbsp;
				<a href='#' class='on-default btn_edit' id='<?php echo $value->id; ?>'>
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
                    <input type='hidden' id='id' name='id'/>

                    <div class='form-body'>
                        <div class='form-group'>
                            <label class='control-label col-md-3'>Code</label>

                            <div class='col-md-9'>
                                <input name='code' id='code'
                                       class='form-control' type='text' data-msg-required='le code  est obligatoire' required>
                            </div>
                        </div>
					
                        <div class='form-group'>
                            <label class='control-label col-md-3'>Nom</label>

                            <div class='col-md-9'>
                                <input name='nom' id='nom'
                                       class='form-control' type='text' data-msg-required='le nom est obligatoire' required>
                            </div>
                        </div>
					
                        <div class='form-group'>
                            <label class='control-label col-md-3'>Status</label>

                            <div class='col-md-9'>
                                <input name='status' id='status'
                                       class='form-control' type='text' data-msg-required='le status  est obligatoire' required>
                            </div>
                        </div>
					
                        <div class='form-group'>
                            <label class='control-label col-md-3'>Responsable</label>

                            <div class='col-md-9'>
                                <input name='responsable' id='responsable'
                                       class='form-control' type='text' data-msg-required='le resposable  est obligatoire' required>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label class='control-label col-md-3'>Date Creation </label>

                            <div class='col-md-2'>
                                <input name='jour_creation' id='jour_creation'
                                       class='form-control' type='number' min=0 max=31 placeholder='jj'>
                            </div>
                            <span class='col-md-1'> __</span>
                            <div class='col-md-2'>
                                <input name='mois_creation' id='mois_creation'
                                       class='form-control' type='number' min=0 max=12 placeholder='mm'>
                            </div>
                            <label class='col-md-1'> __</label>
                            <div class='col-md-3'>
                                <input name='annee_creation' id='annee_creation'
                                       class='form-control' type='number' min=0 max=2070 placeholder='AAAA' >
                            </div>
                            <div class='col-md-3'>
                            </div>
                            <div id='date_error' class='col-md-9'>
                            </div>
                            </div>
                            <div class='form-group'>
                            <label class='control-label col-md-3'>Adresse</label>

                            <div class='col-md-9'>
                                <input name='adresse' id='adresse'
                                       class='form-control' type='text'  >
                            </div>
                        
                        </div>
                        <div class='form-group'>
                            <label class='control-label col-md-3'>Telephone</label>

                            <div class='col-md-9'>
                                <input name='telephone' id='telephone'
                                       class='form-control' type='text'  >
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

<script src="<?php echo base_url(); ?>assets/pages/jquery.wizard-init.js" type="text/javascript"></script>
<script type='text/javascript'>
    
        $(document).ready(function () {
            $('#datatable-buttons').managing_ajax({
                //id_menu: 'menu_gestion_eleve', //id du menu dans le fichier navigation_bar
                id_modal_form: 'modal_form', //id du modal qui contient le formulaire

                id_form: 'form', //id du formulaire
                url_submit: '<?php echo site_url('C_etablissement/save')?>', //url du save (donn�es envoy�s par post)

                title_modal_add: 'Nouveau ', //Title du modal � l'ouverture en mode ajout
                focus_add: 'code', //l'emplacement du focus en mode ajout

                title_modal_edit: 'Edition ', //Title du modal � l'ouverture en mode edit
                focus_edit: 'code',//l'emplacement du focus en mode edit

                url_edit: '<?php echo site_url('C_etablissement/get_record')?>', //url le fonction qui recup�re la donn�es de la ligne
                url_delete: '<?php echo site_url('C_etablissement/delete')?>', //url de la fonction supprim�
            });
            $.fn.beforeSave = function (args) {
                $('#date_error').empty();
                jour=$('#jour_creation').val();
                mois=$('#mois_creation').val();
                annee=$('#annee_creation').val();
                if (jour>0 && mois>0 && annee>0)
                {                    
                    date=jour+'/'+mois+'/'+annee;
                    if(!isDate(date))
                    {
                        $('#date_error').html('<span class="text-danger"><b>La date est Incorrecte </b></span>');
                        return false;
                    }
                }
                function isDate(txtDate)
                    {
                    var currVal = txtDate;
                    if(currVal == '')
                        return false;
                    
                    //Declare Regex  
                    var rxDatePattern = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/; 
                    var dtArray = currVal.match(rxDatePattern); // is format OK?

                    if (dtArray == null)
                        return false;
                    
                    //Checks for mm/dd/yyyy format.
                    dtMonth = dtArray[3];
                    dtDay= dtArray[1];
                    dtYear = dtArray[5];

                    if (dtMonth < 1 || dtMonth > 12)
                        return false;
                    else if (dtDay < 1 || dtDay> 31)
                        return false;
                    else if ((dtMonth==4 || dtMonth==6 || dtMonth==9 || dtMonth==11) && dtDay ==31)
                        return false;
                    else if (dtMonth == 2)
                    {
                        var isleap = (dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0));
                        if (dtDay> 29 || (dtDay ==29 && !isleap))
                            return false;
                    }
                    return true;
                    }
            };

        });
        
   
</script>
