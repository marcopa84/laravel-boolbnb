$('#apartments_filter').on('change', function(){
    $('.card').each(function(){
        $(this).removeClass('d-none');
    });
    // console.log($('.card').first().attr('data-features').);
    $('.card').each(function() {
        // console.log($(this));
        if( $(this).attr('data-beds') < $('#beds_number').val()) {
            $(this).addClass('d-none');
        }
        if( $(this).attr('data-rooms') < $('#rooms_number').val()){
            $(this).addClass('d-none');
        }
        
    });

});
    $('li input[type="checkbox"]').each(function () {
        $(this).on('click', function(){
        if ($(this).find('input[type="checkbox"]').attr('checked') == undefined) {
            console.log($(this).children().attr('checked') == undefined);
            $(this).find('span').text();
            console.log($(this).find('span').text());
        }
        });

    });

