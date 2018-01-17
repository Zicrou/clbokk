$("body").on("click",'#notification_autorisation',function () {
    var id_div_container = 'div_container';
    var href = $(this).attr('href');
    $('#' + id_div_container).empty().load(href, function () { cache: false }).fadeIn('slow');
    $('#notification_control').click();
    return false;
});
$("body").on("click",'#circuit_depot_control',function () {
    
    if($('#form_circuit_depot').valid())
        {
            var formulaire = $("#form_circuit_depot");
            $.ajax({
                url: formulaire.attr('action'),
                type: 'POST',
                data: formulaire.serialize(),
                dataType: 'text',
                success: function(data) {
                    $('#div_container').empty().html(data);
                    actualise_notification()
                },
                error: function(jqXHR) {
                    content.html(jqXHR.responseText);
                    content.show();
                }
            })
            return false;
        }
});
function actualise_notification()
{
    $.ajax({
        url: 'C_depot/nbr_depot',
        type: 'GET',
        dataType: 'text',
        success: function(data) {
            
            $('.nbr_notification_control').empty().html(data);
        },
        error: function(jqXHR) {
            content.html(jqXHR.responseText);
            content.show();
        }
    })
}

$("body").on("click",'#nom_etablissement_control',function () {
    var code=$('#code_control').val();
    if(code.length>0)
    {
        $.ajax({
            url: 'C_etablissement/get_nom_etablissement/'+$('#code_control').val(),
            type: 'GET',
            dataType: 'text',
            success: function(data) { 
                result=JSON.parse(data) ;      
                $('#id_deposant').val(result.id);
                $('#etablissement').val(result.nom);
            },
            error: function(jqXHR) {
                $('#id_deposant').val('');
                $('#etablissement').val('');
            }
        })
    }
    else{
        $('#id_deposant').val('');
                $('#etablissement').val('');
    }
});

$("body").on("click",'#info_etablissement_control',function () {
    var code=$('#code_control').val();
    if(code.length>0)
    {
        $.ajax({
            url: 'C_etablissement/get_nom_etablissement/'+$('#code_control').val(),
            type: 'GET',
            dataType: 'text',
            success: function(data) { 
                result=JSON.parse(data) ;      
                $('#id_deposant').val(result.id);
                $('#etablissement').val(result.nom);
                $('#date_ouverture').val(result.date_ouverture);
                $('#arrete_ouverture').val(result.arrete_ouverture);
            },
            error: function(jqXHR) {
                $('#id_deposant').val('');
                $('#etablissement').val('');
                $('#date_ouverture').val('');
                $('#arrete_ouverture').val('');
            }
        })
    }
    else{
        $('#id_deposant').val('');
                $('#etablissement').val('');
    }
});

  $("body").on("click", "#autorisation_control",function(){
        if($('#form_autorisation').valid())
        {
            var formulaire = $("#form_autorisation");
            var form = $("#form_autorisation")[0];
            $.ajax({
                url: formulaire.attr('action'),
                type: 'POST',
                enctype: 'multipart/form-data',
                data: new FormData(form),
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#div_container').empty().html(data);
                    actualise_notification();
                },
                error: function(jqXHR) {
                    content.html(jqXHR.responseText);
                    content.show();
                }
        })
    return false;
        }
        //$('#form_autorisation').submit()
  });

  $("body").on("click", "#transfert_control",function(){
        if($('#form_transfert').valid())
        {
            var formulaire = $("#form_transfert");
            var form = $("#form_transfert")[0];
            $.ajax({
                url: formulaire.attr('action'),
                type: 'POST',
                enctype: 'multipart/form-data',
                data: new FormData(form),
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#div_container').empty().html(data);
                    actualise_notification();
                },
                error: function(jqXHR) {
                    content.html(jqXHR.responseText);
                    content.show();
                }
        })
    return false;
        }
        //$('#form_autorisation').submit()
  });

  
  