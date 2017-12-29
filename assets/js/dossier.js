
var detail = null;
var id_div_container = 'div_container';

$("body").on("click", ".detail", function () {
    if($(this).attr('id') == undefined)
        return false;
    
    var href = $(this).attr('href');
    $('#' + id_div_container).empty().load(href, function () { cache: false }).fadeIn('slow');
    return false;
});


$('#frm_type_piece').find("*").off();
$('#frm_type_piece').off('click');
$('#frm_circuit').find("*").off();
$('#frm_circuit').off('click');
$('.btn_delete_piece').find("*").off();
$('.btn_delete_piece').off('click');
$('.btn_delete_circuit').find("*").off();
$('.btn_delete_circuit').off('click');

$(".btn_delete_piece").click(function () {


    href=$(this).attr('href');
    $('#piece_control').empty().load(href, function () { cache: false }).fadeIn('slow');
    return false;
});

$(".btn_delete_circuit").click(function () {

    href=$(this).attr('href');
    $('#circuit_control').empty().load(href, function () { cache: false }).fadeIn('slow');
    return false;
});
$('#add_piece').click(function () {
    if($('#id_type_piece').val()<1)
        return false;
    save_piece_dossier();
    return false;
});

$('#add_circuit').click(function () {
    if($('#id_type_structure').val()<1)
        return false;

    save_circuit();
    return false;
});

function save_piece_dossier(){
    var formulaire = $("#frm_type_piece");
    $.ajax({
        url: formulaire.attr('action'),
        type: 'POST',
        data: formulaire.serialize(),
        dataType: 'text',
        success: function(data) {
            $('#piece_control').empty().html(data);
        },
        error: function(jqXHR) {
            // affichage réponse serveur
            content.html(jqXHR.responseText);
            content.show();
        }
    })
}

function save_circuit(){
    var formulaire = $("#frm_circuit");
    $.ajax({
        url: formulaire.attr('action'),
        type: 'POST',
        data: formulaire.serialize(),
        dataType: 'text',
        success: function(data) {
            $('#circuit_control').empty().html(data);
        },
        error: function(jqXHR) {
            // affichage réponse serveur
            content.html(jqXHR.responseText);
            content.show();
        }
    })
}