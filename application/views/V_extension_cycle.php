<style>
label{
    text-align:left;
    margin-top:5px;
}
legend {
    
    margin-top: 20px;
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
                    <div class='form-body'>
                        <div class='col-sm-12 '>
                            <fieldset>
                            <legend>Etablissement</legend>
                                <div class='clearfix'>
                                        <label class='col-lg-2'>Code etablissement</label>
                                        <div class='col-lg-2'>
                                            <input name='code_control' id='code_control'   class='form-control' type='text'  required>
                                        </div>
                                         <div class='col-lg-2'>
                                         <button type="button" id="nom_etablissement_control" class="btn waves-effect waves-light btn-primary ">Chercher</button>
                                                
                                        </div>
                                        <label class='col-lg-2'>Etablissement</label>
                                        <div class='col-lg-4'>
                                            <input type="hidden" name="id_deposant" id="id_deposant">
                                            <input readonly="readonly" name='etablissement' id='etablissement' class='form-control' type='text'  >
                                        </div>                                        
                                </div>
                                <div class='clearfix'>
                                        <br>
                                         
                                        <label class='col-lg-2'>Date d'ouverture</label>
                                        <div class='col-lg-4'>
                                            <input readonly="readonly" name='etablissement' id='etablissement' class='form-control' type='text'  >
                                        </div>
                                       <label class='col-lg-2'>N° Arrete d'ouverture</label>
                                        <div class='col-lg-4'>
                                            <input readonly="readonly" name='etablissement' id='etablissement' class='form-control' type='text'  >
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

