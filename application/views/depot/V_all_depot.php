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
                                                            $style_etat="text-pink";
                                                            break;
                                                        case "en_cours":
                                                            $style_etat="text-success";
                                                            break;
                                                        case "en_attente":
                                                            $style_etat="text-pink ";
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
                                        <script type='text/javascript'>  
                                                $(document).ready(function () {
                                                    $('#datatable-buttons').DataTable({
                                                        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Tout"]],
                                                        pageLength: 25,
                                                        language: langageFrDataTable(),
                                                        });                            
                                                });                                            
                                        </script>                                    
                        