<style>
    iframe{
    width:100%;
    border:solid 1px #ccc;
    height:700px;
    align:center;
    }
</style>
<div class='row'>
    <div class='col-sm-12'>
        <div class='panel panel-default' >
                <div class='panel-heading'>
                    <h3 class="panel-title">DETAIL - TRANSFERT</h3>
                </div>
                <div class='panel-body'>
                <div class="container">
    <div class="row">
        <div class="">
            <div class="">
                <div class="row">
                    <div class="  col-md-2">
                        <center><img  src="<?php echo base_url().'assets/images/man.png';?>" style=" border-radius:50%;width:80%;" alt="" class="img-rounded img-responsive" /></center>
                    </div>
                    <div class="col-md-offset-0 col-md-5">
                        <div><h1 style="color:#5e35b1"><?php echo $all_data[0]->nom ;?></h1><hr style='padding-right:20%'></div>
                        
                        <h4> Responsable: <?php echo $all_data[0]->responsable ;?></b></h4>
                        <?php
                            $jour=($all_data[0]->jour_ouverture>0)?str_pad($all_data[0]->jour_ouverture, 2, "0", STR_PAD_LEFT):'___';
                            $mois=($all_data[0]->mois_ouverture>0)?str_pad($all_data[0]->mois_ouverture, 2, "0", STR_PAD_LEFT):'___';
                            $date_ouverture=($all_data[0]->annee_ouverture>0)?$jour."/".$mois."/".$all_data[0]->annee_ouverture :'___/___/_____';
                        ?>
                        <h4>  Date ouverture: <?php echo $date_ouverture ;?></b></h4>
                        <h4>  Statut: <?php echo  $all_data[0]->statut;?></b></h4>
                        
                        
                    </div>
                    <div class="col-md-5">
                        <h4> Date depot: <?php echo date_parse_en2fr($all_data[0]->date_depot) ;?><br></h4>
                        <?php foreach($circuit_Precedent as $circuit)
                        {
                            echo $circuit->libelle_type_structure .'le '.date_parse_en2fr($circuit->date_traitement).'<br>';
                        }?>
                        
                    </div>
                </div>
                <div class='row'>
                    <div class="col-md-12">
                    <br>
                    <form action='C_depot/save_depot_transfert' method="post" id='form_circuit_depot'  class='form-inline'>
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
                                <div class="form-group m-l-10" >
                                    <label class="sr-only" for='numero_arrete'>arrete: </label>&nbsp;<input type='text' name='numero_arrete' placeholder="Numero arrete"  class="form-control arrete_control " required>
                                </div>&nbsp;
                                <div class="form-group m-l-10">
                                    <label class="sr-only" for='date_arrete'>date :</label><input type='date' name='date_arrete' id='date_arrete'  class="form-control arrete_control" required placeholder="date">
                                    
                                </div>
                                <input type='submit' style="margin-left:10px" id="circuit_depot_control" class='btn btn-primary' value='Enregistrer'/>
                                <br>
                        </form>
                       <?php if($circuit_depot[0]->etat!="a_traité")
                       {
                           echo "<script>$('#form_circuit_depot').hide();</script>";
                       }?>
                       <?php if($this->session->lfc_jafr12_s['id_type_structure']!=1)
                       {
                           echo "<script>$('.arrete_control').hide();</script>";
                       }?>
                        <br>
                    </div>
                </div>
                <div class='row'>
                    <div class="col-md-1">
                    <?php foreach($piece_joint as $piece)
                        {
                            $type_file_chemin=($piece->extension==".pdf")?base_url().'assets/images/pdf.png':base_url().'assets/images/img.png';
                            echo'<div>'.substr($piece->libelle_type_piece, 0, 5);                            
                            
                            echo '<a href="./uploads/'.$piece->id_piece_joint.$piece->extension.'" target="pdf"><img  src="'.$type_file_chemin.'"/></a></div>';  
                        }
                        
                    ?>
                    </div>
                    <div class="col-md-10">
                        <iframe align="center" name='pdf'></iframe>
                    </div>
                <div>
            </div>
        </div>
    </div>
</div>