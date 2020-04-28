// ↓ pezzo di codice che si attiverà se e solo se, è presente almeno un elemento con id #apartments_filter
if ($('#apartments_filter').length > 0) {

  // ↓ snippet per salvare il valore del raggio selezionato dall'utente nella sezione dei filtri
  $('select option').each(function(){
    if( $(this).val() == $('[name="old_selected_rad"]').val() ) {
      $(this).attr('selected', 'selected');
    }
  });
  
  // ↓ snippet che colora il background delle features, al caricamento della pagina
  $('li.list-inline-item').each(function(){
    if($(this).find('input[type="checkbox"]').is(':checked')) {
      $(this).removeClass('btn-outline-dark');
      $(this).addClass('btn-info');
    }
  });
  apartmentsFilter();

  // ↓ snippet che fa partire il filtro sugli appartamenti, al keyup dei cambi input con nome contentente la stringa 'number'
  $(document).on('keyup', 'input[name*="number"]', function () {
    apartmentsFilter();
  });

  // ↓ snippet per colorare il background delle features, al click
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

// ↓ snippet per colorare il background delle features selezionate al refresh della pagina
if (performance.navigation.type == 1) {
  $('li.list-inline-item').each(function(){
    if($(this).find('input[type="checkbox"]').is(':checked')) {
      $(this).removeClass('btn-outline-dark');
      $(this).addClass('btn-info');
    }
  });
}

// ↓ funzione che filtra gli appartamenti visibili sulla pagina a seconda degli input selezionati dall'utente
function apartmentsFilter() {
  var ready = false;
  $('.card').each(function(){
    $(this).removeClass('cards-animation');
  });
  ready = true;
  if( ready ){
    setTimeout(function(){
      $('.card').each(function(){
        $(this).addClass('cards-animation');
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
    },50);
  }
}
