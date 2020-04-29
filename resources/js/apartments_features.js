// CREATE + // EDIT

if ($('#apartment-create').length > 0 || $('#apartment-edit').length > 0) {
    // script toggle class on checked feature input

    $(document).ready(function () {
        $('li.list-inline-item').find('input[type="checkbox"]').filter("[checked]").each(function () {
            $(this).parent().removeClass('btn-outline-dark');
            $(this).parent().addClass('btn-info');
        })
    });

    // script per cambiare focus degli input con il tasto Enter

    $('form input').on('keydown', function (event) {
        if (event.which == 13) {
            var inputs = $(this).parents("form").find(":input");
            if (inputs[inputs.index(this) + 1] != null) {
                inputs[inputs.index(this) + 1].focus();
            }
            event.preventDefault();
        }
    });

    // script per checkare elementi anche cliccando sul nome

    $('form li.list-inline-item').on('click', function () {
        // ho inserito due condizioni perché per alcuni browser, attr è undefined, per altri è false, così facendo la condizione funzionerà sempre
        if ($(this).find('input[type="checkbox"]').attr('checked') == undefined || $(this).find('input[type="checkbox"]').attr('checked') == false) {
            $(this).find('input[name="features[]"]').attr('checked', 'checked');
            $(this).removeClass('btn-outline-dark');
            $(this).addClass('btn-info');
        } else {
            $(this).find('input[name="features[]"]').removeAttr('checked');
            $(this).removeClass('btn-info');
            $(this).addClass('btn-outline-dark');
        }
    });

    // script per prevenire l 'immissione di input non numerici negli input type="number"

    $(document).on('focus', 'input[type="number"]', function () {
        var thisInput = $(this);
        $(this).on('keypress', function (e) {
            if (!(e.which < 58 && e.which > 47)) {
                e.preventDefault();
            }
        });
    });

    // script per vedere l 'anteprima dell'immagine caricata
    $('input[type="file"]').on('change', function (event) {
        var output = document.getElementById('featured_image_preview');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function () {
            URL.revokeObjectURL(output.src);
            if ($('#apartment-create').length > 0){
                $('#featured_image_preview').removeClass('d-none');
            }
        }
    });
    
}


