<div class='row'>
 <div class='col-sm-12'>
    <div class='panel panel-default' >
        <div class='panel-heading'>
            <h3 class="panel-title">AUTORISATION D'ENSEIGNEMENT OU D'EXERCER DANS LES ECOLES PRIVÉES DU SÉNÉGAL</h3>
        </div>
        <div class='panel-body'>
        <table id='datatable-buttons' class='table table-striped table-bordered'>
                    <thead>
                    <tr>
                        <th>Prenom</th>
                        <th>Nom</th>
                        <th>Date de depot</th>
                        <th>Etat</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($all_data as $value) { ?>
                                        <tr>
                                            <td><?php echo $value->prenom_ens; ?></td>
                                            <td><?php echo $value->nom_ens; ?></td>
                                            <td><?php echo date_parse_en2fr($value->date_depot); ?></td>                                
                                            <td><?php echo ($value->etat=="en_cours")?'<span style="font-size:12px" class="label label-warning">'.str_replace('_',' ',$value->etat).'</span>':'<span style="font-size:12px" class="label label-danger">'.str_replace('_',' ',$value->etat).'</span>' ; ?></td>                                
                                            <td style="width:30px;">
                                            <a  href='C_depot\detail_depot\<?php echo $value->id_depot; ?>' id='<?php echo $value->id_depot; ?>'   class=" detail btn-role btn btn-inverse waves-effect waves-light btn-xs m-b-5">
                             <i class="fa fa-cog fa-lg  "></i><span> Valider</span></a>
                                            </td>                                
                                        </tr>
                                    <?php } ?>
                        </div>
                    </tbody>
        </table>
    </div>
 </div>
 </div>
 <div class='row'>
 <script type='text/javascript'>
  
        $(document).ready(function () {
            $('#datatable-buttons').managing_ajax({
                });
    
    });
    
    
</script>
<script src="<?php echo base_url(); ?>assets/js/dossier.js"></script>