var detail = null;
var id_div_container = 'div_container';

$("body").on("click", ".detail", function () {
    if($(this).attr('id') == undefined)
        return false;
    
    var href = $(this).attr('href');
    $('#' + id_div_container).empty().load(href, function () { cache: false }).fadeIn('slow');
    return false;
});

// function callBack_menu(href){
//     $('#' + id_div_container).empty().load(href, function () { cache: false }).fadeIn('slow');
//     return false;
// }