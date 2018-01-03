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
                    <h3 class="panel-title">DETAIL - AUTORISATION D'ENSEIGNEMENT OU D'EXERCER DANS LES ECOLES PRIVÉES DU SÉNÉGAL</h3>
                </div>
                <div class='panel-body'>
                <div class="container">
    <div class="row">
        <div class="">
            <div class="">
                <div class="row">
                    <div class="  col-md-2">
                        <center><img  src="<?php echo ($all_data[0]->sexe_ens=='M')? base_url().'assets/images/man.png':base_url().'assets/images/woman.png'; ?>" style=" border-radius:50%;width:80%;" alt="" class="img-rounded img-responsive" /></center>
                    </div>
                    <div class="col-md-offset-0 col-md-5">
                        <div><h1 style="color:#5e35b1"><?php echo $all_data[0]->prenom_ens.' '.$all_data[0]->nom_ens ;?></h1><hr style='padding-right:20%'></div>
                        
                        <h4> Specialite: <?php echo $all_data[0]->nom_specialite ;?></b></h4>
                        <h4>  Profil Académique: <?php echo $all_data[0]->profil_aca ;?></b></h4>
                        <h4>  Profil Professionnel: <?php echo $all_data[0]->profil_pro ;?></b></h4>
                        
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
                    <form action='C_depot/save_circuit_depot' method="post" id='form_circuit_depot'  class='form-horizontal'>
                       <div class="clearfix">
                                <input type='hidden' id="id_circuit_depot" name="id_circuit_depot" value="<?php echo $circuit_depot[0]->id_circuit_depot;?>">
                                <input type='hidden' id="id_depot" name="id_depot" value="<?php echo $circuit_depot[0]->id_depot;?>">
                                <input type='hidden' id="id_circuit" name="id_circuit" value="<?php echo $circuit_depot[0]->id_circuit;?>">
                                <label class="col-lg-12 " style="padding-top:5px;margin-bottom:-7px" for="">Action <span class="text-danger">*</span></label>

                                <div class="col-lg-12" style="padding-bottom:10px;">
                                    <!-- <div class="radio radio-inline">
                                        <input type="radio" name="etat" id="en_cours" value="en_cours" checked echo >
                                        <label for="en_cours">
                                        en cours
                                        </label>
                                    </div> -->
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
                                    
                                     <input type='submit' style="margin-left:10px" id="circuit_depot_control" class='btn btn-primary' value='Enregistrer'/>
                                    
                                </div>
                                <br>
                                </div>
                        </form>
                       <?php if($circuit_depot[0]->etat=="en_cours")
                       {
                           echo "<script>$('#form_circuit_depot').hide();</script>";
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
