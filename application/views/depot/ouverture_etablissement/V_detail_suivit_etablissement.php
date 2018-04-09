<?php
$form='';
	$form1='<form action="C_depot/save_traitement_suivit_dossier" method="post" id="form_circuit_depot"  class="form-inline">
    <label class="col-lg-12 " style="padding-top:5px;margin-bottom:7px" for="">Avis </label>
    <div class="form-group">
        <input type="hidden" id="id_circuit_depot" name="id_circuit_depot" value="'.$circuit_depot[0]->id_circuit_depot.'">
        <input type="hidden" id="id_depot" name="id_depot" value="'.$circuit_depot[0]->id_depot.'">
        <input type="hidden" id="etat" name="etat" value="'.$etat.'">
        <div class="col-lg-12" id="avis_control">
            <div class="radio radio-inline">
				<input type="radio" name="avis" id="favorable" value="F" checked>
				<label for="favorable">
                     Favorable
                </label>
            </div>
            <div class="radio radio-inline">
				<input type="radio" name="avis" id="defavorable" value="D">
				<label for="defavorable">
					Defavoravle
				</label>
            </div>
        </div>
    </div>&nbsp;
    <div class="form-group">
		<label class="sr-only" for="exampleInputEmail2">Numero de lettre</label>
		 &nbsp;<input type="text" class="form-control" id="numero_lettre" name="numero_lettre" placeholder="Numero de lettre" data-msg-required="Le Numero de dossier est obligatoire." required>
    </div>                                                     
    <input type="submit" style="margin-left:10px"  id="suivit_control" class="btn btn-primary" value="Enregistrer"/>
    <br>
</form>';

$form2='<form action="C_depot/save_traitement_suivit_dossier" method="post" id="form_circuit_depot"  class="form-inline">
<label class="col-lg-12 " style="padding-top:5px;margin-bottom:7px" for="">Avis IA Favorable</label>
<div class="form-group">
    <input type="hidden" id="id_circuit_depot" name="id_circuit_depot" value="'.$circuit_depot[0]->id_circuit_depot.'">
    <input type="hidden" id="id_depot" name="id_depot" value="'.$circuit_depot[0]->id_depot.'">
    <input type="hidden" id="etat" name="etat" value="'.$etat.'">
</div>&nbsp;
<div class="form-group m-l-10" >
	<label class="sr-only" for="numero_arrete">Arrete: </label>&nbsp;<input type="text" name="numero_arrete" placeholder="Numero arrete"  class="form-control arrete_control " required>
</div>&nbsp;
<div class="form-group m-l-10">
	<label class="sr-only" for="date_arrete">date :</label><input type="date" name="date_arrete" id="date_arrete"  class="form-control arrete_control" required value="'.date('Y-m-d').'">
</div>                                                       
<input type="submit" style="margin-left:10px"  id="suivit_control" class="btn btn-primary" value="Enregistrer"/>
<br>
</form>';

$form3='<form action="C_depot/save_traitement_suivit_dossier" method="post" id="form_circuit_depot"  class="form-inline">
<label class="col-lg-12 " style="padding-top:5px;margin-bottom:7px" for="">Avis IA Defavorable</label>
<div class="form-group">
    <input type="hidden" id="id_circuit_depot" name="id_circuit_depot" value="'.$circuit_depot[0]->id_circuit_depot.'">
    <input type="hidden" id="id_depot" name="id_depot" value="'.$circuit_depot[0]->id_depot.'">
    <input type="hidden" id="etat" name="etat" value="'.$etat.'">
</div>&nbsp;
<div class="form-group">
	<label class="sr-only" for="exampleInputEmail2">Numero de lettre</label>
	 &nbsp;<input type="text" class="form-control" id="numero_lettre" name="numero_lettre" placeholder="Numero de lettre" data-msg-required="Le Numero de dossier est obligatoire." required>
</div>                                                      
<input type="submit" style="margin-left:10px"  id="suivit_control" class="btn btn-primary" value="Enregistrer"/>
<br>
</form>';
$form4='<form action="C_depot/save_traitement_suivit_dossier" method="post" id="form_circuit_depot"  class="form-inline">
<div class="form-group">
    <input type="hidden" id="id_circuit_depot" name="id_circuit_depot" value="'.$circuit_depot[0]->id_circuit_depot.'">
    <input type="hidden" id="id_depot" name="id_depot" value="'.$circuit_depot[0]->id_depot.'">
    <input type="hidden" id="etat" name="etat" value="'.$etat.'">
</div>&nbsp;                                                   
<input type="submit" style="margin-left:10px"  id="suivit_control" class="btn btn-primary" value="Archiver"/>
<br>
</form>';
$form5='<form action="C_depot/save_traitement_suivit_dossier" method="post" id="form_circuit_depot"  class="form-inline">
<div class="form-group">
    <input type="hidden" id="id_circuit_depot" name="id_circuit_depot" value="'.$circuit_depot[0]->id_circuit_depot.'">
    <input type="hidden" id="id_depot" name="id_depot" value="'.$circuit_depot[0]->id_depot.'">
    <input type="hidden" id="etat" name="etat" value="'.$etat.'">
</div>&nbsp;                                                   
<input type="submit" style="margin-left:10px"  id="suivit_control" class="btn btn-primary" value="Archiver"/>
<br>
</form>';

	switch ($etat) {
		case 1:
			$form=$form1;
            break;
        case 2:
			$form=$form2;
            break;
        case 3:
			$form=$form3;
			break;
        case 4:
			$form=$form4;
			break;
        case 5:
			$form=$form5;
			break;
    }
?>
<div class='row'>
    <div class='col-sm-12'>
       
    </div>
</div>                
<div class='row'>
    <div class="col-md-12">                    
        <h3 class="portlet-title">
            
        </h3>
        <div class="  col-md-12"><br>
            
            <div class="col-md-offset-0 col-md-12">
                <div><h4 >Detail du dossier</h4></div>                                                        
            </div>
            <div class="col-md-offset-0 col-md-12">
            <h4><?php echo $all_data[0]->nom ;?></h4>
                <p> <strong> Etablissemet: </strong><?php echo $all_data[0]->responsable ;?></b></p>
                <p> <strong> Responsable: </strong><?php echo $all_data[0]->responsable ;?></b></p>
                                                            <?php
                                                                $jour=($all_data[0]->jour_ouverture>0)?str_pad($all_data[0]->jour_ouverture, 2, "0", STR_PAD_LEFT):'___';
                                                                $mois=($all_data[0]->mois_ouverture>0)?str_pad($all_data[0]->mois_ouverture, 2, "0", STR_PAD_LEFT):'___';
                                                                $date_ouverture=($all_data[0]->annee_ouverture>0)?$jour."/".$mois."/".$all_data[0]->annee_ouverture :'___/___/_____';
                                                            ?>
                                                            <p> <strong> Date ouverture: </strong><?php echo $date_ouverture ;?></b></p>
                                                            <p> <strong> Statut: </strong><?php echo  $all_data[0]->statut;?></b></p>
                                                            <p> <strong> Date depot: </strong><?php echo date_parse_en2fr($all_data[0]->date_depot) ;?><br></p>
                                                            <?php foreach($circuit_Precedent as $circuit)
                                                            {
                                                                echo 'Traité par '. $circuit->libelle_type_structure .' le '.date_parse_en2fr($circuit->date_traitement).'<br>';
                                                            }?>
                                                            
                                                            <?php 
                                                            $arrete="";
                                                            foreach($suivit_depot as $suivit)
                                                            {
                                                                
                                                                $historique="";
                                                                switch ($suivit->etat) {
                                                                    case 1:
                                                                    $historique= "DEP Demande d'enquette";
                                                                        break;
                                                                    case 2:
                                                                    $historique= "IA Avis favoravle";
                                                                        break;
                                                                    case 3:
                                                                    $historique= "IA Avis defavoravle";
                                                                        break;
                                                                    case 4:
                                                                    $historique= "DEP Arrete d'ouverture";
                                                                    $arrete=$all_data[0]->numero_autorisation;
                                                                        break;
                                                                    case 5:
                                                                    $historique= "DEP Lettre de recomadation";
                                                                        break;                                                                    
                                                                }
                                                                echo $historique.' le '.date_parse_en2fr($suivit->date_suivit).'<br>';
                                                                
                                                            }
                                                            echo (strlen($arrete)>0)? 'Arrete : '.$arrete:'';
                                                            ?>
                                                            
            </div>
            <div class="col-md-offset-0 col-md-12">
            <?php echo $form; ?>
                                                    <?php if($this->session->lfc_jafr12_s['id_type_structure']!=2 || $etat=!2)
                                                        {
                                                            echo "<script>$('#avis_control').hide();</script>";
                                                        }
                                                        if($this->session->lfc_jafr12_s['id_type_structure']!=1 || $etat=!3 ||$avis=!"1")
                                                        {
                                                            echo "<script>$('#arrete_control').hide();</script>";
                                                        }
                                                    ?>
                                                    <br>
                                                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>                                 
    </div>
</div>

                        
                        
          
                
