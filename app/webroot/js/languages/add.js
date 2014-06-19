(function ($) {
    $(document).ready(function (e) {
        //Validacion de formulario
        $('#form_language').validate({
            rules: {
                "data[Language][name]": {
                    required: true
                },
                "data[Language][short_name]": {
                    required: true
                }
            },
            messages: {
                "data[Language][name]": {
                    required: 'Name requerido'
                },
                "data[Language][short_name]": {
                    required: 'Short Name requerido'
                }
            }
        });
    });
})(jQuery);