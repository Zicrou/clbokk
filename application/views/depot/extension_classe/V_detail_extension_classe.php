<style>
    iframe{
    width:100%;
    border:solid 1px #ccc;
    height:900px;
    align:center;
    }

</style>
<div class='row'>
    <div class='col-sm-12'>
       
    </div>
</div>                
                    <div class='row'>
                        <div class="col-md-4">

                            <div class="portlet">
                                            <div class="portlet-heading portlet-default " >
                                                <h3 class="portlet-title">
                                                DETAIL - EXTENSION CYCLE
                                                </h3>
                                                    <div class="portlet-widgets">
                                                        <!-- <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a> -->
                                                        <span class="divider"></span>
                                                        <a data-toggle="collapse" data-parent="#accordion1" href="#bg-info" class="" aria-expanded="true"><i class="ion-minus-round"></i></a>
                                                        <!-- <span class="divider"></span>
                                                        <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a> -->
                                                    </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div id="bg-info" class="panel-collapse collapse in" aria-expanded="true" style="">
                                                <div class="list-group no-border">
                                                <div class="row">
                                                <div class="  col-md-12"><br>
                                                    <div class="  col-md-2">
                                                        <center><img  src="<?php echo base_url().'assets/images/man.png';?>" style=" border-radius:50%;width:80%;" alt="" class="img-rounded img-responsive" /></center>
                                                    </div>
                                                    <div class="col-md-offset-0 col-md-10">
                                                        <div><h4 style="color:#5e35b1"><?php echo $all_data[0]->nom ;?></h4></div>
                                                        
                                                    </div>
                                                    <div class="col-md-offset-0 col-md-12">
                                                    <hr style='margin-top:5px;'>
                                                        <p> Responsable: <?php echo $all_data[0]->responsable ;?></b></p>
                                                        <?php
                                                            $jour=($all_data[0]->jour_ouverture>0)?str_pad($all_data[0]->jour_ouverture, 2, "0", STR_PAD_LEFT):'___';
                                                            $mois=($all_data[0]->mois_ouverture>0)?str_pad($all_data[0]->mois_ouverture, 2, "0", STR_PAD_LEFT):'___';
                                                            $date_ouverture=($all_data[0]->annee_ouverture>0)?$jour."/".$mois."/".$all_data[0]->annee_ouverture :'___/___/_____';
                                                        ?>
                                                        <p>  Date ouverture: <?php echo $date_ouverture ;?></b></p>
                                                        <p>  Statut: <?php echo  $all_data[0]->statut;?></b></p>
                                                        <p> Date depot: <?php echo date_parse_en2fr($all_data[0]->date_depot) ;?><br></p>
                                                        <?php foreach($circuit_Precedent as $circuit)
                                                        {
                                                            echo $circuit->libelle_type_structure .'le '.date_parse_en2fr($circuit->date_traitement).'<br>';
                                                        }?>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            
                                            </div>
                                            </div>
                            </div>

                            <div class="portlet">
                                            <div class="portlet-heading portlet-default">
                                                <h3 class="portlet-title">
                                                    liste des pieces
                                                </h3>
                                                    <div class="portlet-widgets">
                                                        <span class="divider"></span>
                                                        <a data-toggle="collapse" data-parent="#accordion1" href="#bg-success" class="" aria-expanded="true"><i class="ion-minus-round"></i></a>
                                                       
                                                    </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div id="bg-success" class="panel-collapse collapse in" aria-expanded="true" style="">
                                                <div class="list-group no-border">
                                                             <?php foreach($piece_joint as $piece) 
                                                            {   
                                                                $type_file_class=($piece->extension==".pdf")?'fa fa-file-pdf-o text-danger':'fa fa-file-image-o text-info';
                                                                echo '<a href="'.base_url().'uploads/'.$piece->id_piece_joint.$piece->extension.'" target="pdf" class="list-group-item no-border" ><span style="padding-right:7px"  class="'.$type_file_class.'"></span>'.$piece->libelle_type_piece.'</a>';
                                                            
                                                            }
                                                        ?>
                                                </div>
                                            </div>
                            </div>
                                    <!-- <div class="panel panel-default p-0 p-t-20 m-t-20">
                                        <div class="panel-body p-0">
                                            <div class="list-group no-border">
                                            <a href="#" class="list-group-item no-border"><span class="fa fa-circle text-info pull-left"></span>Titre de propriété ou un contrat de location ou de bail légaliser d'au moins de trois (3) mois. *</a>
                                            <a href="#" class="list-group-item no-border"><span class="fa fa-circle text-warning pull-left"></span>Titre de propriété ou un contrat de location ou de bail légaliser d'au moins de trois (3) mois. *</a>
                                            </div>
                                        </div>
                                    </div> -->
                        </div>
                        <!-- <?php //foreach($piece_joint as $piece) 
                            // {
                            //     $type_file_chemin=($piece->extension==".pdf")?base_url().'assets/images/pdf.png':base_url().'assets/images/img.png';
                            //     echo'<div>'.substr($piece->libelle_type_piece, 0, 5);                            
                                
                            //     echo '<a href="./uploads/'.$piece->id_piece_joint.$piece->extension.'" target="pdf"><img  src="'.$type_file_chemin.'"/></a></div>';
                            
                            // }
                            
                        ?>-->
                        
                        <div class="col-md-8">
                        
                        <div class="panel panel-border panel-purple">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">Panel Purple</h3> 
                                    </div>
                                    
                                
                                                    <br>
                                                    <form action='C_depot/save_depot_extension_classe' method="post" id='form_circuit_depot'  class='form-inline'>
                                                        <label class="col-lg-12 " style="padding-top:5px;margin-bottom:7px" for="">Action <span class="text-danger">*</span></label>
                                                        <div class="form-group">
                                                                    <input type='hidden' id="id_circuit_depot" name="id_circuit_depot" value="<?php echo $circuit_depot[0]->id_circuit_depot;?>">
                                                                    <input type='hidden' id="id_depot" name="id_depot" value="<?php echo $circuit_depot[0]->id_depot;?>">
                                                                    <input type='hidden' id="id_circuit" name="id_circuit" value="<?php echo $circuit_depot[0]->id_circuit;?>">
                                                                    <input type='hidden' id="id_deposant" name="id_deposant" value="<?php echo $all_data[0]->id_deposant;?>">
                                                                    
                                                                    <div class="col-lg-12" style="">
                                                                    
                                                                        <div class="radio radio-inline">
                                                                            <input type="radio" name="etat" id="traité" value="traité" checked>
                                                                            <label for="traité">
                                                                            traité
                                                                            </label>
                                                                        </div>
                                                                        <div class="radio radio-inline">
                                                                            <input type="radio" name="etat" id="rejeté" value="rejeté">
                                                                            <label for="rejeté">
                                                                            rejeté
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                            </div>&nbsp;
                                                            <div class="form-group">
                                                                        <label class="sr-only" for="exampleInputEmail2">Numero de dossier</label>
                                                                        &nbsp;<input type="text" class="form-control" id="code_traitement" name="code_traitement" placeholder="Numero de dossier" data-msg-required="Le Numero de dossier est obligatoire." required>
                                                            </div>
                                                            <input type='submit' style="margin-left:10px" id="circuit_depot_control" class='btn btn-primary' value='Enregistrer'/>
                                                            <br>
                                                    </form>
                                                    <?php if($circuit_depot[0]->etat!="a_traité")
                                                    {
                                                        echo "<script>$('#form_circuit_depot').hide();</script>";
                                                    }?>
                                                    <br>
                                    <div class="panel-body">
                                        <iframe align="center" name='pdf'  src="<?php echo (isset($piece_joint[0]))?base_url().'uploads/'.$piece_joint[0]->id_piece_joint.$piece_joint[0]->extension:'';?>"></iframe>
                                    </div>
                        </div> 
                                </div>
                    <div>
                
