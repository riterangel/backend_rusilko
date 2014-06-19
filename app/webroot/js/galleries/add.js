(function ($) {
    $(document).ready(function (e) {
        //Validacion de formulario
        $('#form_gallery').validate({
            rules: {
                "data[Gallery][name_key]": {
                    required: true
                }
            },
            messages: {
                "data[Gallery][name_key]": {
                    required: 'Name requerido'
                }
            }
        });
    });
})(jQuery);