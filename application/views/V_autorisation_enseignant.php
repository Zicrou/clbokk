<!-- <style>
label{
    text-align:left;
}
</style> -->
<div class='row'>
    <div class='col-md-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <h3 class='panel-title'>Liste des Pieces</h3>
            </div>
            <div class='panel-body' id="piece_control">
    <form action='#' id='form' class='form-horizontal'>
        
                    <input type='hidden' id='id_ens' name='id_ens'/>

                    <div class='form-body'>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <label class='control-label col-md-3'>ien</label>

                            <div class='col-md-9'>
                                <input name='ien_ens' id='ien_ens'
                                       class='form-control' type='text' required>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label class='control-label col-md-3'>prenom</label>

                            <div class='col-md-9'>
                                <input name='prenom_ens' id='prenom_ens'
                                       class='form-control' type='text' required>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label class='control-label col-md-3'>nom</label>

                            <div class='col-md-9'>
                                <input name='nom_ens' id='nom_ens'
                                       class='form-control' type='text' required>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label class='control-label col-md-3'>sexe</label>

                            <div class='col-md-9'>
                                <input name='sexe_ens' id='sexe_ens'
                                       class='form-control' type='text' required>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label class='control-label col-md-3'>date de naissance</label>

                            <div class='col-md-9'>
                                <input name='date_nais_ens' id='date_nais_ens'
                                       class='form-control' type='text' required>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label class='control-label col-md-3'>numero autorisation</label>

                            <div class='col-md-9'>
                                <input name='numero_autorisation' id='numero_autorisation'
                                       class='form-control' type='text' required>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label class='control-label col-md-3'>profil academique</label>

                            <div class='col-md-9'>
                                <input name='profil_aca' id='profil_aca'
                                       class='form-control' type='text' required>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <label class='control-label col-md-3'>profil professionnel</label>

                            <div class='col-md-9'>
                                <input name='profil_pro' id='profil_pro'
                                       class='form-control' type='text' required>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label class='control-label col-md-3'>css</label>

                            <div class='col-md-9'>
                                <input name='css' id='css'
                                       class='form-control' type='text' required>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label class='control-label col-md-3'>ipres</label>

                            <div class='col-md-9'>
                                <input name='ipres' id='ipres'
                                       class='form-control' type='text' required>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label class='control-label col-md-3'>ipm</label>

                            <div class='col-md-9'>
                                <input name='ipm' id='ipm'
                                       class='form-control' type='text' required>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label class='control-label col-md-3'>specialite</label>

                            <div class='col-md-9'>
                                <input name='code_specialite' id='code_specialite'
                                       class='form-control' type='text' required>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label class='control-label col-md-3'>etat</label>

                            <div class='col-md-9'>
                                <input name='etat_ens' id='etat_ens'
                                       class='form-control' type='text' required>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label class='control-label col-md-3'>statut</label>

                            <div class='col-md-9'>
                                <input name='statut_ens' id='statut_ens'
                                       class='form-control' type='text' required>
                            </div>
                        </div>

                    </div>
                    
                    </div>
                    <div class='col-md-12'>
                    <fieldset   >
                        <legend>Pieces Jointes</legend>
                        <?php
                        
                         foreach ($piece as $value) { ?>
                            <label class="custom-file">
                                <input type="file" id="pj_1" class="custom-file-input" accept="image/jpeg,image/gif,image/png,application/pdf" />
                                <span class="custom-file-control"></span>
                            </label>
                        <?php } ?>
                        </fieldset>
                    </div>
                </div>
                
                <div class='modal-footer'>
                    <input type='submit' class='btn btn-primary' value='Enregistrer'/>
                    <button type='button' class='btn btn-default' data-dismiss='modal'>Fermer</button>
                </div>

    </form>

</div>
        </div>
    </div>
</div>