/**
 * Created by Boba on 23/01/16.
 */
$(function(){
    $(document).on('keyup', '.autocomplete', function(){
        var href = $(this).data('src');
        var data = $(this).val();
        var elm = $(this);
        if(data.length>=2)
            $.ajax({
                type: 'GET',
                url: href,
                data: {'nameVille' :data},
                success:function(data){
                    elm.parent().find('.autocomplete_list').html(data);
                    elm.parent().find('.autocomplete_list').show();
                },
                error: function(){
                    console.log('error');
                }
            })
    });
    $(document).on('click', '.autocomplete_list li', function(){
        var trajetIds = $('#trajetId').val();
        var obj =  $(this).data("value");
        if($(this).parent().hasClass('forinput')){
            $(this).parents('.relative').find('input[type="hidden"]').attr('value', obj);
            $(this).parents('.relative').find('input.autocomplete').val($(this).html());
        }else{
            trajetIds = trajetIds == '' ? obj : trajetIds + '_' + obj;
            $('#trajet_container').prepend('<span class="itemTrajet">' +$(this).html() + '&nbsp;&nbsp;&nbsp;<a href="#" class="supprimerVille">x</a></span>');
            $(this).parents().siblings('.autocomplete').val('');
            $('#trajetId').val(trajetIds);
        }
        $(this).parent().hide();
    })
    $(document).on('click', '.supprimerVille', function(){
        $(this).parent().remove();
    })

    $(document).on('click', '.detailAction', function(e){
        e.preventDefault();
        displayDialog($(this));
    });
    $('#menu').tabs();
    $('#ajouter a').click(function(e){
        e.preventDefault();
        displayDialog($(this));
    });
    $('.datepicker').datepicker();
    $('#toogleArrive').click(function(){
        $(this).hide();
        $('#arriverEndroit').fadeToggle();
    })
});
function displayDialog(elem){
    var href = elem.attr('href');
    $('.wrapperDetail').show();
    $.ajax({
        type: 'GET',
        url: href,
        success:function(data){
            $('.displayDetail').html(data);
        },
        error: function(){
            console.log('error');
        }
    })
    return false;
}