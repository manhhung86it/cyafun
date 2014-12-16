$('#dashboard3').on('change', '#outlet_chosen_all', function() {
        if ($(this).is(':checked')) {
            checkCheckbox($('input[name="outlet_chosen"]'));
            showHightcharsTemplate3();
        } else {
            uncheckCheckbox($('input[name="outlet_chosen"]'));
            showHightcharsTemplate3();
        }
    });
    $('#dashboard3').on('change', '#product_chosen_all', function() {
        if ($(this).is(':checked')) {
            checkCheckbox($('input[name="product_chosen"]'));
            showHightcharsTemplate3();
        } else {
            uncheckCheckbox($('input[name="product_chosen"]'));
            showHightcharsTemplate3();
        }
    });
    $('#dashboard3').on('change', '#traffic_source_all', function() {
        if ($(this).is(':checked')) {
            checkCheckbox($('input[name="traffic_source"]'));
            showHightcharsTemplate3();
        } else {
            uncheckCheckbox($('input[name="traffic_source"]'));
            showHightcharsTemplate3();
        }
    });
    $('#dashboard3').on('change', '#traffic_type_all', function() {
        if ($(this).is(':checked')) {
            checkCheckbox($('input[name="traffic_type"]'));
            showHightcharsTemplate3();
        } else {
            uncheckCheckbox($('input[name="traffic_type"]'));
            showHightcharsTemplate3();
        }
    });
    $('#dashboard3').on('change', 'input[name="product_chosen"]', function() {
        uncheckCheckbox($('#product_chosen_all'));
        if ($('input[name="product_chosen"]').not(':checked').length == 0)
            checkCheckbox($('#product_chosen_all'));
        showHightcharsTemplate3();
    });
    $('#dashboard3').on('change', 'input[name="outlet_chosen"]', function() {
        uncheckCheckbox($('#outlet_chosen_all'));
        if ($('input[name="outlet_chosen"]').not(':checked').length == 0)
            checkCheckbox($('#outlet_chosen_all'));
        showHightcharsTemplate3();
    });
    $('#dashboard3').on('change', 'input[name="traffic_source"]', function() {
        uncheckCheckbox($('#traffic_source_all'));
        if ($('input[name="traffic_source"]').not(':checked').length == 0)
            checkCheckbox($('#traffic_source_all'));
        showHightcharsTemplate3();
    });
    $('#dashboard3').on('change', 'input[name="traffic_type"]', function() {
        uncheckCheckbox($('#traffic_type_all'));
        if ($('input[name="traffic_type"]').not(':checked').length == 0)
            checkCheckbox($('#traffic_type_all'));
        showHightcharsTemplate3();
    });
    $('#dashboard4').on('change', '#outlet_chosen_all', function() {
        if ($(this).is(':checked')) {
            checkCheckbox($('input[name="outlet_chosen"]'));
            showHightcharsTemplate4();
        } else {
            uncheckCheckbox($('input[name="outlet_chosen"]'));
            showHightcharsTemplate4();
        }
    });
    $('#dashboard4').on('change', '#product_chosen_all', function() {
        if ($(this).is(':checked')) {
            checkCheckbox($('input[name="product_chosen"]'));
            showHightcharsTemplate4();
        } else {
            uncheckCheckbox($('input[name="product_chosen"]'));
            showHightcharsTemplate4();
        }
    });
    $('#dashboard4').on('change', '#traffic_source_all', function() {
        if ($(this).is(':checked')) {
            checkCheckbox($('input[name="traffic_source"]'));
            showHightcharsTemplate4();
        } else {
            uncheckCheckbox($('input[name="traffic_source"]'));
            showHightcharsTemplate4();
        }
    });
    $('#dashboard4').on('change', '#traffic_type_all', function() {
        if ($(this).is(':checked')) {
            checkCheckbox($('input[name="traffic_type"]'));
            showHightcharsTemplate4();
        } else {
            uncheckCheckbox($('input[name="traffic_type"]'));
            showHightcharsTemplate4();
        }
    });
    $('#dashboard4').on('change', 'input[name="product_chosen"]', function() {
        uncheckCheckbox($('#product_chosen_all'));
        if ($('input[name="product_chosen"]').not(':checked').length == 0)
            checkCheckbox($('#product_chosen_all'));
        showHightcharsTemplate4();
    });
    $('#dashboard4').on('change', 'input[name="outlet_chosen"]', function() {
        uncheckCheckbox($('#outlet_chosen_all'));
        if ($('input[name="outlet_chosen"]').not(':checked').length == 0)
            checkCheckbox($('#outlet_chosen_all'));
        showHightcharsTemplate4();
    });
    $('#dashboard4').on('change', 'input[name="traffic_source"]', function() {
        uncheckCheckbox($('#traffic_source_all'));
        if ($('input[name="traffic_source"]').not(':checked').length == 0)
            checkCheckbox($('#traffic_source_all'));
        showHightcharsTemplate4();
    });
    $('#dashboard4').on('change', 'input[name="traffic_type"]', function() {
        uncheckCheckbox($('#traffic_type_all'));
        if ($('input[name="traffic_type"]').not(':checked').length == 0)
            checkCheckbox($('#traffic_type_all'));
        showHightcharsTemplate4();
    });
    
    
    function save_my_change() {
    var product_chosen = new Array();
    var outlet_chosen = new Array();
    var traffic_source = new Array();
    var traffic_type = new Array();
    var countries = new Array();
    var campaigns = new Array();
    var regions = new Array();
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();
    var sortTraffic = 0;
    var sortType2 = 0;
    var share_name = $('input[name="share_name"]').val();
    var share_id = $('#remember_my_changes').attr('rel');

    var order = 'id';
    try {
        sortTraffic = $('#traffic_source_sort').attr('rel');
    }
    catch (err) {
    }
    try {
        sortType2 = $('#traffic_type2_sort').attr('rel');
    }
    catch (err) {
    }


    $.each($('input[name="product_chosen"]:checked'), function(index, value) {
        product_chosen[index] = $(this).val();
    });
    $.each($('input[name="outlet_chosen"]:checked'), function(index, value) {
        outlet_chosen[index] = $(this).val();
    });
    $.each($('input[name="traffic_source"]:checked'), function(index, value) {
        traffic_source[index] = $(this).val();
    });
    $.each($('input[name="traffic_type"]:checked'), function(index, value) {
        traffic_type[index] = $(this).val();
    });

    $.each($('input[name="country"]:checked'), function(index, value) {
        countries[index] = $(this).val();
    });
    $.each($('input[name="campaign"]:checked'), function(index, value) {
        campaigns[index] = $(this).val();
    });
    $.each($('input[name="region"]:checked'), function(index, value) {
        regions[index] = $(this).val();
    });

    $.ajax({
        url: base_url + 'index.php/ajax/save_my_change',
        type: 'POST',
        dataType: "json",
        data: {'countries': countries, 'campaigns': campaigns, 'regions': regions,'outlet_id': outlet_chosen, 'product_id': product_chosen, 'traffic_id': traffic_source, 'traffic_type_id': traffic_type, 'start_date': start_date, 'end_date': end_date, 'order': order, 'sortTraffic': sortTraffic, 'sortType2': sortType2, 'share_name': share_name, 'share_id': share_id},
        success: function(data) {
            if (data.msg == 'success') {
                get_all_remember();
                $('#result').html('<div class="alert-block alert-success" style="padding: 5px 10px; margin: 0px 0px 5px;">Save success</div>')
            } else {
                $('#result').html('<div class="alert-block alert-warning" style="padding: 5px 10px; margin: 0px 0px 5px;">' + data.content + '</div>')
            }
        }
    });


}