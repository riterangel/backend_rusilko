(function($) {
    $(document).ready(function(e) {
        $("#table_galleries").dataTable({
            "aoColumns":[
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": false, "bSearchable" : false}
            ],
            "aaSorting": [[0, "desc" ]],
            "oLanguage": {
                "sUrl": "/js/es_BO.txt"
            },
            "sPaginationType": "full_numbers",
            "bFilter": true
        });
    });
}) (jQuery);