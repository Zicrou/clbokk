<style>
label{
    text-align:left;
    margin-top:5px;
}
legend {
    
    margin-top: 20px;;
    color: #5e35b1 ;
    border-color:#5e35b1 ;
    }
    fieldset{
        margin-bottom:35px;
        
    }


</style>
<div class='row'>
    <div class='col-md-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <h3 class='panel-title'> &nbsp</h3>
            </div>
            <div class='panel-body' id="piece_control">
            <form action='C_depot/save_ouverture_etablissement' method="post" id='form_transfert' enctype="multipart/form-data" class='form-horizontal'>
                    <div class='form-body'>
                        <div class='col-sm-12 '>
                            <fieldset>
                            
                            <legend>Etablissement</legend>
                            <div class='col-sm-6 '>				
                                        <div class='clearfix'> <br>
                                            <label class=' col-md-3'>Nom</label>
                                            <div class='col-md-9'>
                                                <input name='nom' id='nom'
                                                    class='form-control' type='text' required>
                                            </div>
                                        </div>
                                    
                                        <div class='clearfix'> <br>
                                            <label class=' col-md-3'>Statut Religieux</label>

                                            <div class='col-md-9'>
                                                <select class="form-control" name="statut_religieux" id="statut_religieux" data-msg-required="Le statut est obligatoire." required="">
                                                    <?php echo $select_statut_religieux ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class='clearfix'> <br>
                                        
                                            <label class=" col-md-3">Date Creation </label>

                                            <div class="col-md-2">
                                                <input name="jour_creation" id="jour_creation" class="form-control" type="number" min="0" max="31" placeholder="jj" value="<?php echo date('d') ?>">
                                            </div>
                                            <span class="col-md-1"> __</span>
                                            <div class="col-md-2">
                                                <input name="mois_creation" id="mois_creation" class="form-control" type="number" min="0" max="12" placeholder="mm" value="<?php echo date('m') ?>">
                                            </div>
                                            <label class="col-md-1"> __</label>
                                            <div class="col-md-3">
                                                <input name="annee_creation" id="annee_creation" class="form-control" type="number" min="0" max="2070" placeholder="AAAA" value="<?php echo date('Y') ?>">
                                            </div>
                                        
                                            
                                        </div>
                                        <div class='clearfix'> <br>
                                            <label class=' col-md-3'>Telephone</label>

                                            <div class='col-md-9'>
                                                <input name='telephone' id='telephone' placeholder data-mask="9 999 99 99"
                                                    class='form-control' type='text' required>
                                            </div>
                                        </div>
                                    
                                        <div class='clearfix'> <br>
                                            <label class=' col-md-3'>Mail</label>

                                            <div class='col-md-9'>
                                                <input name='mail' id='mail'
                                                    class='form-control' type='email' required>
                                            </div>
                                        </div>
                                    
                                        
                                    </div>
                                    <div class='col-sm-6 '>
                                        
                                    
                                        <div class='clearfix'> <br>
                                            <label class=' col-md-3'>Cycle</label>

                                            <div class='col-md-9'>
                                                <select name='id_cycle' id='id_cycle' class='form-control' type='text' required>
                                                    <?php echo $select_cycle ;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class='clearfix'> <br>
                                            <label class=' col-md-3'>Region</label>

                                            <div class='col-md-9'>
                                                <select name='region' id='region' class='form-control' type='text' required>
                                                    <?php echo $select_region ;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class='clearfix'> <br>
                                            <label class=' col-md-3'>Departement</label>

                                            <div class='col-md-9'>
                                                <select name='departement' id='departement' class='form-control' type='text' required>
                                                    <?php echo $select_departement ;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class='clearfix'> <br>
                                            <label class=' col-md-3'>Commune</label>

                                            <div class='col-md-9'>
                                                <select name='id_atlas' id='id_atlas' class='form-control' type='text' required>
                                                    <?php echo $select_commune ;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class='clearfix'> <br>
                                            <label class=' col-md-3'>Adresse</label>

                                            <div class='col-md-9'>
                                                <input name='adresse' id='adresse'
                                                    class='form-control' type='text' required>
                                            </div>
                                        </div>
                                </div>
                            
                            
                            <div class='col-sm-6 '>
                            <legend>Declarant Responsable - Directeur technique</legend>
                                    <div class='clearfix'> <br>
                                        <label class=' col-md-3'>Prenom</label>

                                        <div class='col-md-9'>
                                            <input name='prenom_declarant' id='prenom_declarant'
                                                class='form-control' type='text' required>
                                        </div>
                                    </div>
                                
                                    <div class='clearfix'> <br>
                                        <label class=' col-md-3'>Nom</label>

                                        <div class='col-md-9'>
                                            <input name='nom_declarant' id='nom_declarant'
                                                class='form-control' type='text' required>
                                        </div>
                                    </div>
                                    <div class="clearfix"><br>

                                        <label class="col-lg-3 "  for="">Sexe <span class="text-danger">*</span></label>

                                        <div class="col-lg-9">
                                            <div class="radio radio-inline">
                                                <input type="radio" name="sexe_declarant" id="sex_1" value="M" checked="">
                                                <label for="sex_1">
                                                    Marculin
                                                </label>
                                            </div>
                                            <div class="radio radio-inline">
                                                <input type="radio" name="sexe_declarant" id="sex_2" value="F">
                                                <label for="sex_2">
                                                    Feminin
                                                </label>
                                            </div>
                                            <label for="sex" class="error"></label>
                                        </div>
                                    </div>
                                
                                    <div class='clearfix'> <br>
                                            <label class=' col-md-3'>Diplome</label>

                                            <div class='col-md-9'>
                                                <input name='dipl_declarant' id='dipl_declarant'
                                                    class='form-control' type='text' required>
                                            </div>
                                        </div>
                                        <div class="clearfix"><br>

                                    <label class="col-lg-3 "  for="">Directeur technique </label>

                                    <div class="col-lg-9">
                                        <div class="radio radio-inline">
                                            <input type="radio" name="dt_directeur_technique" id="lui" class="dt-radio-control" value="L" checked="">
                                            <label for="lui">
                                                Lui-même
                                            </label>
                                        </div>
                                        <div class="radio radio-inline">
                                            <input type="radio" name="dt_directeur_technique"  id="autre" class="dt-radio-control"  value="A">
                                            <label for="autre">
                                                Un Autre
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                    </div>
                                   
                            
                            
                            <div class='col-sm-6'  >
                            <legend>Directeur technique</legend>
                            
                                    <div class='clearfix'> <br>
                                        <label class=' col-md-3'>Prenom</label>

                                        <div class='col-md-9'>
                                            <input name='dt_prenom_declarant' id='dt_prenom_declarant'
                                                class='form-control dt-control' type='text' required>
                                        </div>
                                    </div>
                                
                                    <div class='clearfix'> <br>
                                        <label class=' col-md-3'>Nom</label>

                                        <div class='col-md-9'>
                                            <input name='dt_nom_declarant' id='dt_nom_declarant'
                                                class='form-control dt-control' type='text' required>
                                        </div>
                                    </div>
                                    <div class="clearfix"><br>

                                    <label class="col-lg-3 "  for="">Sexe <span class="text-danger">*</span></label>

                                    <div class="col-lg-9">
                                        <div class="radio radio-inline">
                                            <input type="radio" name="dt_sexe_declarant" id="dt_sex_1" value="M" class="dt-control" checked="">
                                            <label for="dt_sex_1">
                                                Marculin
                                            </label>
                                        </div>
                                        <div class="radio radio-inline">
                                            <input type="radio" name="dt_sexe_declarant" id="dt_sex_2" value="F" class="dt-control">
                                            <label for="dt_sex_2">
                                                Feminin
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                                    <div class='clearfix'> <br>
                                        <label class=' col-md-3'>Diplome</label>

                                        <div class='col-md-9 dt-control'>
                                            <input name='dt_dipl_declarant' id='dt_dipl_declarant'  class='dt-control form-control' type='text' required>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset   >
                            <legend>Pieces Jointes</legend>
                                <?php
                                
                                foreach ($piece as $value) {?>
                                    <div class='clearfix'>
                                    <label class='col-md-12'><?php echo $value->libelle_type_piece ; echo ($value->obligatoire==1)?' <span class="text-danger">*</span>':'';?></label>
                                        <div class='col-md-12'>
                                        <div id="error-container-<?php echo 'pj_'.$value->id_type_piece ;?>"></div>
                                            <div class="col-md-9 " style="margin-left:0px;padding-left:0px;">
                                                        
                                                                <input type="text" readonly="readonly" class="form-control" name="<?php echo 'pj_'.$value->id_type_piece.'_control' ;?>"  id="<?php echo 'pj_'.$value->id_type_piece.'_control' ;?>" <?php echo ($value->obligatoire==1)?'data-msg-required="'.$value->libelle_type_piece.' obligatoire." required':'';?>  >
                                                                
                                                            
                                                        </div>
                                                        <div class="col-md-3">
                                                        <button type="button" data-id="<?php echo 'pj_'.$value->id_type_piece ;?>" class="btn waves-effect waves-light btn-primary file">Parcourir</button>
                                                        <i style="color:#58c9c7;font-size:24px;padding-left:12px;padding-right:12px;vertical-align: middle;display:none" class=" fa  fa-check " id="<?php echo 'pj_'.$value->id_type_piece.'_V' ;?>"></i>
                                                        <button style="display:none" type="button" data-id="<?php echo 'pj_'.$value->id_type_piece ;?>" class="btn btn-icon waves-effect waves-light btn-danger display:none" id="<?php echo 'pj_'.$value->id_type_piece.'_D'?>" onclick="reset_file($(this).attr('data-id'))"> <i class="fa fa-remove"></i> </button>
                                        
                                                </div>                 
                                            <label class="custom-file">
                                                <input style="display:none" type="file" name="<?php echo 'pj_'.$value->id_type_piece ;?>" id="<?php echo 'pj_'.$value->id_type_piece ;?>" class="custom-file-input" accept="image/jpeg,image/gif,image/png,application/pdf" onchange="set_input($(this).attr('id'),this);" />
                                                
                                            </label>
                                        </div>
                                    </div>
                                <?php } ?>
                            </fieldset>
                                    
                    <div class='modal-footer'>
                        <input type='submit' id="transfert_control" class='btn btn-primary' value='Enregistrer'/>
                        <button type='button' class='btn btn-default' data-dismiss='modal'>Fermer</button>
                    </div>
                    </div>
            </form>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/js/jquery.chained.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#departement").chained("#region");
        $("#id_atlas").chained("#departement");
        $('.file').find("*").off();
            $('.file').off('click');
            $(".file").click(function(){
                    
                
                var input_file=$(this).attr("data-id");
                $('#'+input_file).click();                
            });
            $(".dt-control").attr('disabled','disabled');
            $(".dt-radio-control").click(function(){
                if($(this).val()=='L')
                {
                    $(".dt-control").attr('disabled','disabled');
                    $("#dt_prenom_declarant").val('');
                    $("#dt_nom_declarant").val('');
                    $("#dt_dipl_declarant").val('');
                }
                else
                $(".dt-control").removeAttr('disabled');
                
            });
        });
        function set_input(id,file)
            {
                ext =$('#'+id).val().split('.').pop().toLowerCase();
                
                if(file.files[0].size>300000)
                {
                    $.Notification.notify('error','bottom left','Piece jointe', 'Ce fichier est trop lourd')
                    $('#'+id+'_V').css('display','none');
                    $('#'+id+'_D').css('display','none');
                }
                else if($.inArray(ext, ['gif','jpg','png','PNG','jpeg','JPEG','pdf']) == -1)
                {
                    $.Notification.notify('error','bottom left','Piece jointe', 'pas pris en compte')
                    $('#'+id+'_V').css('display','none');
                    $('#'+id+'_D').css('display','none');
                }
                else{
                    var str=$('#'+id).val();
                    var file_name=str.replace("C:\\fakepath\\", " ");
                    $('#'+id+'_control').val(file_name);
                    $('#'+id+'_control').change();
                    $('#'+id+'_V').css('display','inline');
                    $('#'+id+'_D').css('display','inline');
                }
                
                //alert(file.files[0].type);
            }
            function reset_file(id)
            {
                $('#'+id+'_V').css('display','none');
                $('#'+id+'_D').css('display','none');           
                $('#'+id).val('');
                $('#'+id+'_control').val('');
            }
   
  
   
    

</script>