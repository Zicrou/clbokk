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
    <form action='C_enseignants/save_autorisation' method="post" id='form_autorisation' enctype="multipart/form-data" class='form-horizontal'>
    <fieldset   >
                        <legend>informations personnelles</legend>
                    <input type='hidden' id='id_ens' name='id_ens'/>

                    <div class='form-body'>
                    <div class='col-sm-6 '>
                        <div class='clearfix'>
                                <label class='col-lg-12'>CNI</label>
                                <div class='col-lg-12'>
                                    <input name='cni' id='cni'
                                        class='form-control' type='text' min="1000000000000" max="999999999999999999999999999999" required>
                                </div>
                        </div>

                        <div class='clearfix'>
                            <label class='col-lg-12'>Prenom <span class="text-danger">*</span></label>

                            <div class='col-lg-12'>
                            <select style="display:none" name='statut_ens' id='statut_ens'  class='form-control' >
                                    <option value='NF' >Non Fonctionnaire</option>
                                </select>
                            <input name='ien_ens' id='ien_ens'
                                       class='form-control' type='hidden' required>
                                <input name='prenom_ens' id='prenom_ens' data-msg-required="Le Prenom est obligatoire."
                                       class='form-control' type='text' required>
                            </div>
                        </div>

                        <div class='clearfix'>
                            <label class='col-lg-12'>Nom <span class="text-danger">*</span></label>

                            <div class='col-lg-12'>
                                <input name='nom_ens' id='nom_ens' data-msg-required="Le Nom est obligatoire."
                                       class='form-control' type='text' required>
                            </div>
                        </div>

                        
                        <div class="clearfix">

                                    <label class="col-lg-12 " style="padding-top:5px;margin-bottom:-7px" for="">Sexe <span class="text-danger">*</span></label>

                                    <div class="col-lg-12" style="padding-bottom:10px;">
                                        <div class="radio radio-inline">
                                            <input type="radio" name="sexe_ens" id="sex_1" value="M" checked="">
                                            <label for="sex_1">
                                                Marculin
                                            </label>
                                        </div>
                                        <div class="radio radio-inline">
                                            <input type="radio" name="sexe_ens" id="sex_2" value="F">
                                            <label for="sex_2">
                                                Feminin
                                            </label>
                                        </div>
                                        
                                    </div>
                                    <br>
                                </div>
                        <div class='clearfix'>
                            <label class='col-lg-12'>Date de Naissance <span class="text-danger" >*</span></label>

                            <div class='col-lg-12'>
                                <input name='date_nais_ens' id='date_nais_ens' data-msg-required="Le Date de naissance est obligatoire." 
                                       class='form-control' onchange="verif_date($(this).val())" type='date'  required>
                                       <div class="error" id="date_nais_ens-error"></div>
                            </div>
                        </div>

                       

                        <div class='clearfix'>
                            <label class='col-lg-12'>Profil Academique</label>

                            <div class='col-lg-12'>
                                <input name='profil_aca' id='profil_aca' 
                                       class='form-control' type='text' >
                            </div>
                        </div>
                    </div>
                    <div class='col-sm-6'>
                        <div class='clearfix'>
                            <label class='col-lg-12'>Profil Professionnel</label>

                            <div class='col-lg-12'>
                                <input name='profil_pro' id='profil_pro'
                                       class='form-control' type='text' >
                            </div>
                        </div>

                        <div class='clearfix'>
                            <label class='col-lg-12'>CSS</label>

                            <div class='col-lg-12'>
                                <input name='css' id='css'
                                       class='form-control' type='text' >
                            </div>
                        </div>

                        <div class='clearfix'>
                            <label class='col-lg-12'>IPRES</label>

                            <div class='col-lg-12'>
                                <input name='ipres' id='ipres' 
                                       class='form-control' type='text' >
                            </div>
                        </div>

                        <div class='clearfix'>
                            <label class='col-lg-12'>IPM</label>

                            <div class='col-lg-12'>
                                <input name='ipm' id='ipm'
                                       class='form-control' type='text' >
                            </div>
                        </div>

                        <div class='clearfix'>
                            <label class='col-lg-12'>Specialite <span class="text-danger">*</span></label>

                            <div class='col-lg-12'>
                            <select   class='form-control' name='code_specialite' id='code_specialite' data-msg-required="La Specialite est obligatoire." required>
                                <?php echo $select_specialite?>
                            </select>
                            </div>
                        </div>

                        

                        

                    </div>
                    
                    </div>
                   
                    </fieldset >
                    
                    <fieldset   >
                        <legend>Pieces Jointes</legend>
                        <?php
                        
                         foreach ($piece as $value) {?>
                            <div class='clearfix'>
                              <label class='col-md-12'><?php echo $value->libelle_type_piece ; echo ($value->obligatoire==1)?' <span class="text-danger">*</span>':'';?></label>
                                <div class='col-md-12'>
                                <div id="error-container-<?php echo 'pj_'.$value->id_type_piece ;?>"></div>
                                    <div class="col-md-10 " style="margin-left:0px;padding-left:0px;">
                                                   
                                                        <input type="text" readonly="readonly" class="form-control" name="<?php echo 'pj_'.$value->id_type_piece.'_control' ;?>"  id="<?php echo 'pj_'.$value->id_type_piece.'_control' ;?>" <?php echo ($value->obligatoire==1)?'data-msg-required="'.$value->libelle_type_piece.' obligatoire." required':'';?>  >
                                                        
                                                    
                                                </div>
                                                <div class="col-md-2">
                                                <button type="button" data-id="<?php echo 'pj_'.$value->id_type_piece ;?>" class="btn waves-effect waves-light btn-primary file">Parcourir</button>
                                        </div>                 
                                    <label class="custom-file">
                                        <input style="display:none" type="file" name="<?php echo 'pj_'.$value->id_type_piece ;?>" id="<?php echo 'pj_'.$value->id_type_piece ;?>" class="custom-file-input" accept="image/jpeg,image/gif,image/png,application/pdf" onchange="set_input($(this).attr('id'));"  />
                                        
                                    </label>
                                </div>
                            </div>
                        <?php } ?>
                        </fieldset>
                    </div>
                
                
                <div class='modal-footer'>
                    <input type='submit' id="autorisation_control" class='btn btn-primary' value='Enregistrer'/>
                    <button type='button' class='btn btn-default' data-dismiss='modal'>Fermer</button>
                </div>
                </div>
    </form>

</div>
        </div>
    </div>
</div>
<script type='text/javascript'>
    
        $(document).ready(function () {
          
            $('.file').find("*").off();
            $('.file').off('click');
            $(".file").click(function(){
                var input_file=$(this).attr("data-id");
                $('#'+input_file).click();                
            });

            
            
        });
        function set_input(id)
            {
                var str=$('#'+id).val();
                var file_name=str.replace("C:\\fakepath\\", " ");
                $('#'+id+'_control').val(file_name);
                $('#'+id+'_control').change();
            }
            // jQuery.validator.addMethod("date_nais_ens", function(value, element){
            // var date_jour=new Date();
            // var date_nais=new Date(value);
            // annee_saisie=date_nais.getFullYear()
            
            // annee_en_cours=date_jour.getFullYear();
            // if(annee_saisie<(annee_en_cours-18))
            // {
            //     return true;
            // }
            // else
            // {
            //     return false;
            // }
            //     }, "wrong nic number");
        function verif_date(txtDate)
        {
            var date_jour=new Date();
            var date_nais=new Date(txtDate);
            annee_saisie=date_nais.getFullYear()
            annee_en_cours=date_jour.getFullYear();
            if(annee_saisie>(annee_en_cours-18))
            {
                $('#date_nais_ens-error').empty().html("<b>erreur</b>");
            }
            else{
                $('#date_nais_ens-error').empty();
            }
            //alert(annee_en_cours);
        }
   
</script>