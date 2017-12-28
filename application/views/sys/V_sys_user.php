<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Liste des utilisateurs</h3>
            </div>
            <div class="panel-body">
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>IEN</th>
                        <th>Prenom Nom</th>
                        <th>Email</th>
                        <th>Profil</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($user_data as $user)
					{ ?>
                        <tr>
                            <td><?=$user->ien; ?></td>
                            <td><?=$user->prenom_nom; ?></td>
                            <td><?=$user->email; ?></td>
                            <td><?=$user->profil; ?></td>
                        </tr>
                    <?php
                    }
					?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div> <!-- End Row -->


<script type="text/javascript">
$(document).ready(function ()
{
	$('#datatable-buttons').managing_ajax(
	{
		id_menu: 'menu_sys_user', //id du menu dans le fichier de (navigation) dans notre cas left_side_bar

	});
});
  
</script>