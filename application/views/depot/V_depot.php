                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Inbox</h4>
                            </div>
                        </div>

                        <div class="row">
                        
                            <!-- Left sidebar -->
                            <div class="col-lg-3 col-md-4">
                            <a href="#" class="btn btn-danger waves-effect waves-light btn-block">Compose</a>
                                <div class="panel panel-default">
                                    <div class="panel-body p-0 m-t-20">
                                        <div class="list-group mail-list">
                                          <a href="<?php echo base_url(); ?>C_depot\get_dossier_depots_en_cours\1" class="list-group-item no-border type_dossier_control"><i class="fa fa-graduation-cap"></i> Autorisation d'enseignement <b>(8)</b></a>
                                          <a href="<?php echo base_url(); ?>C_depot\get_dossier_depots_en_cours\1" class="list-group-item no-border type_dossier_control"><i class="fa ion-ribbon-b"></i>  Autorisation d'enseignement <b>(8)</b></a>
                                          <a href="<?php echo base_url(); ?>C_depot\get_dossier_depots_en_cours\3" class="list-group-item no-border type_dossier_control"><i class="fa fa-truck"></i> Transfert Etablissment</a>
                                          <a href="<?php echo base_url(); ?>C_depot\get_dossier_depots_en_cours\4" class="list-group-item no-border type_dossier_control"><i class="fa fa-file-text-o m-r-5"></i>Reconnaissance Etablissment<b>(20)</b></a>
                                          <a href="<?php echo base_url(); ?>C_depot\get_dossier_depots_en_cours\5" class="list-group-item no-border type_dossier_control"><i class="fa fa-paper-plane-o m-r-5"></i>Extension Cycle</a>
                                          <a href="<?php echo base_url(); ?>C_depot\get_dossier_depots_en_cours\6" class="list-group-item no-border type_dossier_control"><i class="fa fa-trash-o m-r-5"></i>Extension Classe dans Cycle <b>(354)</b></a>
                                          <a href="<?php echo base_url(); ?>C_depot\get_dossier_depots_en_cours\7" class="list-group-item no-border type_dossier_control"><i class="fa fa-trash-o m-r-5"></i>Demande d'ouverture etablissement <b>(354)</b></a>
                                        </div>
                                    </div>
                                </div> 
                                <div class="panel-heading p-0">
                                    <h3 class="panel-title m-t-40">Légende</h3>
                                </div>
                                <div class="panel panel-default p-0 p-t-20 m-t-20">
                                    <div class="panel-body p-0">
                                        <div class="list-group no-border">
                                          <a href="#" class="list-group-item no-border"><span class="fa fa-circle text-warning pull-right"></span>en attente</a>
                                          <a href="#" class="list-group-item no-border"><span class="fa fa-circle text-pink pull-right"></span>a traité</a>
                                          <a href="#" class="list-group-item no-border"><span class="fa fa-circle text-success pull-right"></span>en cours</a>
                                        </div>
                                    </div>
                                </div>                               
                            </div>
                            <!-- End Left sidebar -->
                        
                            <!-- Right Sidebar -->
                            <div class="col-lg-9 col-md-8">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="btn-toolbar" role="toolbar">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary waves-effect waves-light"><i class="fa fa-external-link"></i><span> Ajouter </span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- End row -->
                                
                                <div class="panel panel-default m-t-20">
                                    <div class="panel-body" id="depot_control">
                                        <div class="">
                                            <table class="table table-hover mails" id="datatable-buttons" >
                                            <thead>
                                                <tr>
                                                
                                                    <th><?php echo $titre;?></th>
                                                    <th>Date</th>
                                                    <th>Position</th>
                                                    <th>Validation</th>
                                                </tr>
                                            </thead>
                                                <tbody>
                                                <?php foreach ($liste_depot as $depot) {
                                                    $style_etat=""; 
                                                    switch ($depot->etat) {
                                                        case "a_traité":
                                                            $style_etat="text-pink ";
                                                            break;
                                                        case "en_cours":
                                                            $style_etat="text-success";
                                                            break;
                                                        case "en_attente":
                                                            $style_etat="text-warning";
                                                            break;
                                                    }
                                                    ?>
                                                    
                                                    <tr style="cursor:pointer" onclick="alert('bien')">
                                                        <td><?php echo '<span class="fa fa-circle full-right '.$style_etat.'"></span> &nbsp;'.$depot->nom; ?></td>
                                                        <td><?php echo date_parse_en2fr($depot->date_depot); ?></td>                                
                                                                                        
                                                        <td><?php echo $depot->position; ?></td>
                                                        <td style="width:30px;">
                                                       <a   href='C_depot\detail_depot\<?php echo $depot->id_depot; ?>' id='<?php echo $depot->id_depot; ?>'   class=" detail btn-role btn btn-inverse waves-effect waves-light btn-xs m-b-5">
                                                        <i class="fa fa-cog fa-lg  "></i><span> Valider</span></a>
                                                        </td> 
                                                    </a>                               
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>                                            
                                        </div>                                        
                                    </div> <!-- panel body -->
                                </div> <!-- panel -->
                            </div> <!-- end Col-9 -->
                        
                        </div><!-- End row -->
                        <script type='text/javascript'>  
                                               
                                                    $(document).ready(function () {
                                                        $('#datatable-buttons').DataTable({
                                                            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Tout"]],
                                                            pageLength: 25,
                                                            language: langageFrDataTable(),
                                                            });                            
                                                    });                      
                                                

                                                $(".type_dossier_control").find("*").off();
                                                $(".type_dossier_control").off('click');
                                                $("body").on("click", ".type_dossier_control",function () {
                                                    
                                                            var href = $(this).attr('href');
                                                            //$('#depot_control').empty().load(href, function () { cache: false }).fadeIn('fast');
                                                            $.ajax({
                                                                url: href,
                                                                type: 'GET',
                                                                dataType: 'html',
                                                                success: function(data) { 
                                                                    $('#depot_control').empty().html(data);
                                                                    //$(".type_dossier_control").RemoveClass("active");
                                                                    $(this).addClass("active");
                                                                }
                                                            })
                                                            
                                                            return false;
                                                });  
                                                                                          
                                        </script>