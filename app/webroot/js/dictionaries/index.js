(function($) {
    $(document).ready(function(e) {
        $("#table_dictionaries").dataTable({
            "aoColumns":[
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": false, "bSearchable" : false}
            ],
            "aaSorting": [[0, "asc" ]],
            "oLanguage": {
                "sUrl": "/js/es_BO.txt"
            },
            "sPaginationType": "full_numbers",
            "bFilter": true
        });

    });
}) (jQuery);