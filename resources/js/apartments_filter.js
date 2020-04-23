if ($('#apartments_filter').length > 0) {
  apartmentsFilter();
  $(document).on('keyup', 'input[name*="number"]', function () {
    $('.card').removeClass('d-none');
    apartmentsFilter();
  });

  $(document).on('click', 'li.list-inline-item', function () {
    if ($(this).find('input[type="checkbox"]').attr('checked') == undefined) {
      $(this).find('input[name="features[]"]').attr('checked', 'checked');
      $(this).removeClass('btn-outline-dark');
      $(this).addClass('btn-info');
      apartmentsFilter();
    }
    else {
      $(this).find('input[name="features[]"]').removeAttr('checked');
      $(this).removeClass('btn-info');
      $(this).addClass('btn-outline-dark');
      apartmentsFilter();
    }
  });
}


function apartmentsFilter() {
  $('form input[name="beds_number"]').val($('#beds_number').val());
  console.log($('form input[name="beds_number"]').val());
  
  $('.card').each(function(){
    $(this).removeClass('d-none');
    if( parseInt($(this).attr('data-beds')) < $('#beds_number').val()) {
      $(this).addClass('d-none');
    }
    if( parseInt($(this).attr('data-rooms')) < $('#rooms_number').val()){
      $(this).addClass('d-none');
    }
  });
  var features = [];
  $('[type="checkbox"]').each(function(){
    if($(this).is(':checked')) {
      features.push( $(this).siblings('span').text() );
    }
  });
    $('.card').each(function(){
      for(let i = 0; i < features.length; i++) {
      if(! $(this).attr('data-features').includes(features[i]) ) {
        $(this).addClass('d-none');
      }
    }
  });
}
