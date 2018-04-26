<div class='row'>
 <div class='col-sm-12'>
    <div class='panel panel-default' >
        <div class='panel-heading'>
            <h3 class="panel-title">DEMANDE D'OUVERTURE D'ETABLISSEMENT</h3>
        </div>
        <div class='panel-body'>
        <table id='datatable-buttons' class='table table-striped table-bordered'>
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Date de depot</th>
                        <th>Etat</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($all_data as $value) { ?>
                                        <tr>
                                            <td><?php echo $value->nom; ?></td>
                                            <td><?php echo date_parse_en2fr($value->date_depot); ?></td>                                
                                            <!-- <td><?php //echo $value->etat; ?></td>                                 -->
                                            <td><?php echo ($value->etat=="1")?'<span style="font-size:12px" class="label label-warning">Demande d\'enquete</span>':'<span style="font-size:12px" class="label label-danger">Validation</span>' ; ?></td>                                
                                            <td style="width:30px;">
                                            <a  href='C_depot\detail_suivit_etablissement\<?php echo $value->id_depot."\\".$value->etat; ?>' id='<?php echo $value->id_depot; ?>'   class=" vue_control btn-role btn btn-inverse waves-effect waves-light btn-xs m-b-5">
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
<div class="modal fade bd-example-modal-lg" tabindex="-1" id="modal_control" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" id="modal_content_control">
      ...
    </div>
  </div>
</div>