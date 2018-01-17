<?php
$ins=get_instance();
function btn_add_action($smenu_code)
{
	$ins=get_instance();
    $tab_smrole = $ins->session->smenu_roles;
	
	if(isset($tab_smrole[$smenu_code]['d_add']))
	{
		echo '<div class="row">
                <div class="col-sm-12" style="margin-bottom: 30px">
                    <button type="button" id="btn_add" class="btn btn-primary">Ajouter <span lass="m-l-5"><i
                                class="fa fa-plus-square"></i></span></button>
                </div>
            </div>';
	}
}


function btn_edit_action($id, $smenu_code)
{
	$ins=get_instance();
    $tab_smrole = $ins->session->smenu_roles;
	if(isset($tab_smrole[$smenu_code]['d_upd']))
	{
		echo '<a href="#" class="on-default btn_edit"
          id="'.$id.'"><i class="fa fa-pencil"></i></a>&nbsp;';
	}
}



function btn_delete_action($id, $smenu_code)
{
	
	$ins=get_instance();
	$tab_smrole = $ins->session->smenu_roles;
	if(isset($tab_smrole[$smenu_code]['d_del']))
	{
		echo '<a href="#" class="on-default btn_delete"
          id="'.$id.'"><i class="fa fa-trash-o" style="color:red"></i></a>&nbsp;';
	}
}


function btn_show_action($id, $smenu_code)
{
	$ins=get_instance();
    $tab_smrole = $ins->session->smenu_roles;
	if(isset($tab_smrole[$smenu_code]['d_read']))
	{
		echo '<a href="#" class="on-default btn_edit"
           id="'.$id.'"><i class="fa fa-eye" style="color:#CCCCCC"></i></a>';
	}
}
unset($tab_smrole);

function format_date($value)
{

    if($value == NULL)
        return '';
    else
        return date('d/m/Y', strtotime($value));

}

/*
* @$table: 		Tableau dans lequel on fait la recherche
* @$to_find: 	Param�tre de recherche
* @$colonne:  	Colonne sur le sous tableaux
* @$cle:		La colonne du tableau associatif
*/

function multi_array_search($table, $to_find, $colonne, $cle)
{
	$val = $table[array_search($to_find, array_column($table, $colonne))][$cle];
	return $val;
}

