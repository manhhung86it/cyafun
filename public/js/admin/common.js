var historyLog = new Array();
var timeoutHandle;
$(document).ready(function() {
    $('#dashboard').on('change', '#outlet_chosen_all', function() {
        if ($(this).is(':checked')) {
            checkCheckbox($('input[name="outlet_chosen"]'));
            showHightcharsTemplate1();
            removeShare();
        } else {
            uncheckCheckbox($('input[name="outlet_chosen"]'));
            showHightcharsTemplate1();
            removeShare();
        }
    });
    $('#dashboard').on('change', '#product_chosen_all', function() {
        if ($(this).is(':checked')) {
            checkCheckbox($('input[name="product_chosen"]'));
            showHightcharsTemplate1();
            removeShare();
        } else {
            uncheckCheckbox($('input[name="product_chosen"]'));
            showHightcharsTemplate1();
            removeShare();
        }
    });
    $('#dashboard').on('change', '#traffic_source_all', function() {
        if ($(this).is(':checked')) {
            checkCheckbox($('input[name="traffic_source"]'));
            showHightcharsTemplate1();
            removeShare();
        } else {
            uncheckCheckbox($('input[name="traffic_source"]'));
            showHightcharsTemplate1();
            removeShare();
        }
    });
    $('#dashboard').on('change', '#traffic_type_all', function() {
        if ($(this).is(':checked')) {
            checkCheckbox($('input[name="traffic_type"]'));
            showHightcharsTemplate1();
            removeShare();
        } else {
            uncheckCheckbox($('input[name="traffic_type"]'));
            showHightcharsTemplate1();
            removeShare();
        }
    });
    $('#dashboard').on('change', '#country_all', function() {
        if ($(this).is(':checked')) {
            checkCheckbox($('input[name="country"]'));
            showHightcharsTemplate1();
            removeShare();
        } else {
            uncheckCheckbox($('input[name="country"]'));
            showHightcharsTemplate1();
            removeShare();
        }
    });
    $('#dashboard').on('change', '#region_all', function() {
        if ($(this).is(':checked')) {
            checkCheckbox($('input[name="region"]'));
            showHightcharsTemplate1();
            removeShare();
        } else {
            uncheckCheckbox($('input[name="region"]'));
            showHightcharsTemplate1();
            removeShare();
        }
    });
    $('#dashboard').on('change', '#campaign_all', function() {
        if ($(this).is(':checked')) {
            checkCheckbox($('input[name="campaign"]'));
            showHightcharsTemplate1();
            removeShare();
        } else {
            uncheckCheckbox($('input[name="campaign"]'));
            showHightcharsTemplate1();
            removeShare();
        }
    });
    $('#dashboard').on('change', 'input[name="product_chosen"]', function() {
        uncheckCheckbox($('#product_chosen_all'));
        if ($('input[name="product_chosen"]').not(':checked').length == 0)
            checkCheckbox($('#product_chosen_all'));
        showHightcharsTemplate1();
        removeShare();
    });
    $('#dashboard').on('change', 'input[name="outlet_chosen"]', function() {
        uncheckCheckbox($('#outlet_chosen_all'));
        if ($('input[name="outlet_chosen"]').not(':checked').length == 0)
            checkCheckbox($('#outlet_chosen_all'));
        showHightcharsTemplate1();
        removeShare();
    });
    $('#dashboard').on('change', 'input[name="traffic_source"]', function() {
        uncheckCheckbox($('#traffic_source_all'));
        if ($('input[name="traffic_source"]').not(':checked').length == 0)
            checkCheckbox($('#traffic_source_all'));
        showHightcharsTemplate1();
        removeShare();
    });
    $('#dashboard').on('change', 'input[name="traffic_type"]', function() {
        uncheckCheckbox($('#traffic_type_all'));
        if ($('input[name="traffic_type"]').not(':checked').length == 0)
            checkCheckbox($('#traffic_type_all'));
        showHightcharsTemplate1();
        removeShare();
    });
    $('#dashboard').on('change', 'input[name="country"]', function() {
        uncheckCheckbox($('#country_all'));
        if ($('input[name="country"]').not(':checked').length == 0)
            checkCheckbox($('#country_all'));
        showHightcharsTemplate1();
        removeShare();
    });
    $('#dashboard').on('change', 'input[name="region"]', function() {
        uncheckCheckbox($('#region_all'));
        if ($('input[name="region"]').not(':checked').length == 0)
            checkCheckbox($('#region_all'));
        showHightcharsTemplate1();
        removeShare();
    });
    $('#dashboard').on('change', 'input[name="campaign"]', function() {
        uncheckCheckbox($('#campaign_all'));
        if ($('input[name="campaign"]').not(':checked').length == 0)
            checkCheckbox($('#campaign_all'));
        showHightcharsTemplate1();
        removeShare();
    });

    $('#share').on('click', function() {
        $('#shareModal').modal();
        $('#shareModal').on('show.bs.modal', function(e) {
            $('#result').html('');
            $('input[name=share_name]').val('');
        });
    });

    $('.content-box').on('click', '#outlet_chosen_sort', function() {
        var e = $(this);
        var order_by = 'name';
        update_sort_location_status(e, order_by)

    });
    $('.content-box').on('click', '#registrations_sort', function() {
        var e = $(this);
        var order_by = 'registrations';
        update_sort_location_status(e, order_by)

    });
    $('.content-box').on('click', '#redemptions_sort', function() {
        var e = $(this);
        var order_by = 'redemptions';
        update_sort_location_status(e, order_by)

    });
    $('.content-box').on('click', '#purchases_sort', function() {
        var e = $(this);
        var order_by = 'purchases';
        update_sort_location_status(e, order_by)

    });
//    $('.content-box').on('click', '#traffic_source_sort', function() {
//        console.log('123');return false;
//        var e = $(this);
//        var order_by = 'traffic';
//        update_sort_traffic_source_status(e, order_by)
//
//    });

    $('#save_share_btn').on('click', function() {
        save_my_change();
    });

    $('#remember_result').on('click', '.remember_value', function() {
        var id = $(this).attr('rel');
        $('#remember_my_changes').html($(this).text() + ' <i class="glyphicon glyphicon-chevron-down"></i>');
        $('#remember_my_changes').attr('rel', id);
        $.ajax({
            url: base_url + 'index.php/ajax/get_remember_value',
            type: 'POST',
            dataType: "json",
            data: {'id': id},
            success: function(data) {
                updateSidebar(data.start_date, data.end_date, data.outlet_id, data.product_id, data.traffic_id, data.traffic_type_id, data.countries, data.regions, data.campaigns);
                showHightcharsTemplate1();
            }
        });
    });

    $('#export').on('click', function() {
        $('#exportModal').on('show.bs.modal', function(e) {
            $('#result').html('');
            $('input[name=export_name]').val('');
            $('input[name=export_name]').attr('readonly', false);
            $('#result_export').html('');
            var share_id = $('#remember_my_changes').attr('rel');
            if (share_id != 0) {
                $('input[name=export_name]').val($('#remember_my_changes').text());
                $('input[name=export_name]').attr('readonly', true);
            }
        });
        $('#exportModal').modal();


    });


    $('#exportModal').on('click', '#save_export_btn', function() {
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
        var export_name = $('input[name="export_name"]').val();
        var share_id = $('#remember_my_changes').attr('rel');
        if (export_name.trim().length == 0) {
            $('#result_export').html('<div class="alert-block alert-warning" style="padding: 5px 10px; margin: 0px 0px 5px;">Please input export name</div>')
            return false;
        }
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
//        $('#exportModal').modal('hide');
        $('#save_export_btn').attr('disabled', true);
        $.ajax({
            url: base_url + 'index.php/ajax/export_report',
            type: 'POST',
            data: {'countries': countries, 'campaigns': campaigns, 'regions': regions, 'outlet_id': outlet_chosen, 'product_id': product_chosen, 'traffic_id': traffic_source, 'traffic_type_id': traffic_type, 'start_date': start_date, 'end_date': end_date, 'name': export_name, 'share_id': share_id},
            dataType: "json",
            success: function(data) {
                $('#save_export_btn').attr('disabled', false);
                var html = '';
                if (data.status == 'error') {
                    $('#result_export').html('<div class="alert-block alert-warning" style="padding: 5px 10px; margin: 0px 0px 5px;">' + data.msg + '</div>')
                } else {
                    $('#result_export').html('<div class="alert-block alert-success" style="padding: 5px 10px; margin: 0px 0px 5px;">' + data.msg + '</div>')
                }

            }
        });
    });

    $('#refresh').on('click', function() {
        uncheckCheckbox($('#product_chosen_all'));

        $.each($('input[name="outlet_chosen"]'), function(index, value) {
            checkCheckbox($(this))
        });
        checkCheckbox($('#outlet_chosen_all'));

        $.each($('input[name="product_chosen"]'), function(index, value) {
            checkCheckbox($(this))
        });
        checkCheckbox($('#product_chosen_all'));

        $.each($('input[name="traffic_source"]'), function(index, value) {
            checkCheckbox($(this))
        });
        checkCheckbox($('#traffic_source_all'));

        $.each($('input[name="traffic_type"]'), function(index, value) {
            checkCheckbox($(this))
        });
        checkCheckbox($('#traffic_type_all'));

        $.each($('input[name="country"]'), function(index, value) {
            checkCheckbox($(this))
        });
        checkCheckbox($('#country_all'));

        $.each($('input[name="campaign"]'), function(index, value) {
            checkCheckbox($(this))
        });
        checkCheckbox($('#campaign_all'));

        $.each($('input[name="region"]'), function(index, value) {
            checkCheckbox($(this))
        });
        checkCheckbox($('#region_all'));

        $("#date_create").dateRangeSlider("min", min_date);
        $("#date_create").dateRangeSlider("max", max_date);
        $('#remember_my_changes').html('Remember my changes <i class="glyphicon glyphicon-chevron-down"></i>');
        $('#remember_my_changes').attr('rel', 0);
        showHightcharsTemplate1();
    });

    $('#rotate_back').on('click', function() {
        var rel = $('#rotate_back').attr('rel');
        if (rel == 0)
            return false;
        var historyLastIndex = parseInt(historyLog.length) - 2;
        var historyLast = historyLog[historyLastIndex];
        var product_chosen = historyLast[0];
        var outlet_chosen = historyLast[1];
        var traffic_source = historyLast[2];
        var traffic_type = historyLast[3];
        var start_date = historyLast[4];
        var end_date = historyLast[5];
        var sortTraffic = historyLast[6];
        var sortType2 = historyLast[7];
        var remember_id = historyLast[8];
        var countries = historyLast[9];
        var regions = historyLast[10];
        var campaigns = historyLast[11];

        updateSidebar(start_date, end_date, outlet_chosen, product_chosen, traffic_source, traffic_type, countries, regions, campaigns);
        if (remember_id == 0) {
            $('#remember_my_changes').html('Remember my changes <i class="glyphicon glyphicon-chevron-down"></i>');
            $('#remember_my_changes').attr('rel', 0);
        } else {
            var text = $('.remember_value[rel=' + remember_id + ']').text();

            if (!isEmpty(text)) {
                $('#remember_my_changes').html(text + ' <i class="glyphicon glyphicon-chevron-down"></i>');
                $('#remember_my_changes').attr('rel', remember_id);
            } else {
                $('#remember_my_changes').html('Remember my changes <i class="glyphicon glyphicon-chevron-down"></i>');
                $('#remember_my_changes').attr('rel', 0);
            }
        }
        showHightcharsTemplate1(1);

        historyLog.splice(historyLastIndex, 2);
        var len = parseInt(historyLog.length);
        if (len == 0) {
            $('#rotate_back').attr('rel', 0);
        }
    });
});

function removeShare() {
    $('#remember_my_changes').html('Remember my changes <i class="glyphicon glyphicon-chevron-down"></i>');
    $('#remember_my_changes').attr('rel', 0);
}

function updateSidebar(start_date, end_date, outlet_id, product_id, traffic_id, traffic_type_id, countries, regions, campaigns) {
    $('#start_date').val(start_date);
    $('#end_date').val(end_date);
    var dateList = start_date.split(" ");
    var date = dateList[0].split("/");
    var time = dateList[1].split(":");
    $("#date_create").dateRangeSlider("min", new Date(date[2], parseInt(date[0]) - 1, date[1], time[0], time[1], time[2]));


    var dateListEnd = end_date.split(" ");
    var dateEnd = dateListEnd[0].split("/");
    var timeEnd = dateListEnd[1].split(":");
    $("#date_create").dateRangeSlider("max", new Date(dateEnd[2], parseInt(dateEnd[0]) - 1, dateEnd[1], timeEnd[0], timeEnd[1], timeEnd[2]));

    uncheckCheckbox($('#product_chosen_all'));
    uncheckCheckbox($('#outlet_chosen_all'));
    uncheckCheckbox($('#traffic_source_all'));
    uncheckCheckbox($('#traffic_type_all'));
    uncheckCheckbox($('#country_all'));
    uncheckCheckbox($('#region_all'));
    uncheckCheckbox($('#campaign_all'));

    uncheckCheckbox($('input[name=product_chosen]'));
    uncheckCheckbox($('input[name=outlet_chosen]'));
    uncheckCheckbox($('input[name=traffic_source]'));
    uncheckCheckbox($('input[name=traffic_type]'));
    uncheckCheckbox($('input[name=country]'));
    uncheckCheckbox($('input[name=region]'));
    uncheckCheckbox($('input[name=campaign]'));

    $.each(outlet_id, function(index, value) {
        checkCheckbox($('input[name=outlet_chosen][value=' + value + ']'))
    });
    if ($('input[name="outlet_chosen"]').not(':checked').length == 0)
        checkCheckbox($('#outlet_chosen_all'));

    $.each(product_id, function(index, value) {
        checkCheckbox($('input[name=product_chosen][value=' + value + ']'))
    });
    if ($('input[name="product_chosen"]').not(':checked').length == 0)
        checkCheckbox($('#product_chosen_all'));


    $.each(traffic_id, function(index, value) {
        checkCheckbox($('input[name=traffic_source][value=' + value + ']'))
    });
    if ($('input[name="traffic_source"]').not(':checked').length == 0)
        checkCheckbox($('#traffic_source_all'));

    $.each(traffic_type_id, function(index, value) {
        checkCheckbox($('input[name=traffic_type][value=' + value + ']'))
    });
    if ($('input[name="traffic_type"]').not(':checked').length == 0)
        checkCheckbox($('#traffic_type_all'));

    $.each(countries, function(index, value) {
        checkCheckbox($('input[name=country][value=' + value + ']'))
    });
    if ($('input[name="country"]').not(':checked').length == 0)
        checkCheckbox($('#country_all'));

    $.each(regions, function(index, value) {
        checkCheckbox($('input[name=region][value=' + value + ']'))
    });
    if ($('input[name="region"]').not(':checked').length == 0)
        checkCheckbox($('#region_all'));

    $.each(campaigns, function(index, value) {
        checkCheckbox($('input[name=campaign][value=' + value + ']'))
    });
    if ($('input[name="campaign"]').not(':checked').length == 0)
        checkCheckbox($('#campaign_all'));
}

Array.prototype.last = function() {
    return this[this.length - 1];
}


/**
 * get_all_remember
 */
function get_all_remember() {
    $.ajax({
        url: base_url + 'index.php/ajax/get_all_remember',
        dataType: "json",
        success: function(data) {
            var html = '';
            $.each(data, function(index, value) {
                html += '<li><a href="javascript:void(0)" class="remember_value" rel="' + value.id + '">' + value.name + '</a></li>'
            });
            $('#remember_result').html(html);

        }
    });
}


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
        data: {'countries': countries, 'campaigns': campaigns, 'regions': regions, 'outlet_id': outlet_chosen, 'product_id': product_chosen, 'traffic_id': traffic_source, 'traffic_type_id': traffic_type, 'start_date': start_date, 'end_date': end_date, 'order': order, 'sortTraffic': sortTraffic, 'sortType2': sortType2, 'share_name': share_name, 'share_id': share_id},
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

/**
 * update_sort_location_status
 */
function update_sort_location_status(e, order_by) {
    var sortCurrent = e.attr('rel');
    var sort = getNextValueSort(sortCurrent);
    var parents = e.parents('thead');
    $.each(parents.find('a'), function(index, value) {
        $(this).attr('rel', '0');
        if ($(this).hasClass('glyphicon-sort-by-attributes-alt')) {
            $(this).removeClass('glyphicon-sort-by-attributes-alt');
        }
        $(this).addClass('glyphicon-sort-by-attributes');
    });
    e.attr('rel', sort);
    if (sort == 'desc') {
        e.addClass('glyphicon-sort-by-attributes-alt');
    }

    var product_chosen = new Array();
    var outlet_chosen = new Array();
    var traffic_source = new Array();
    var traffic_type = new Array();
    var countries = new Array();
    var campaigns = new Array();
    var regions = new Array();
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();
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
    load_location_info(product_chosen, outlet_chosen, traffic_source, traffic_type, start_date, end_date, order_by, sort, countries, regions, campaigns)
}

/**
 * update_sort_traffic_source_status
 */
function update_sort_traffic_source_status(e) {
    var sortCurrent = e.attr('rel');
    var order_by = 'traffic';
    var sort = getNextValueSort(sortCurrent);
    e.attr('rel', sort);
    if (sort == 'desc') {
        e.addClass('glyphicon-sort-by-attributes-alt');
    }

    var product_chosen = new Array();
    var outlet_chosen = new Array();
    var traffic_source = new Array();
    var traffic_type = new Array();
    var countries = new Array();
    var campaigns = new Array();
    var regions = new Array();
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();
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

    trafficSource(product_chosen, outlet_chosen, traffic_source, traffic_type, start_date, end_date, order_by, sort, countries, regions, campaigns)
}

/**
 * update_sort_traffic_type2_status
 */
function update_sort_traffic_type2_status(e) {
    var sortCurrent = e.attr('rel');
    var order_by = 'traffic';
    var sort = getNextValueSort(sortCurrent);
    e.attr('rel', sort);
    if (sort == 'desc') {
        e.addClass('glyphicon-sort-by-attributes-alt');
    }

    var product_chosen = new Array();
    var outlet_chosen = new Array();
    var traffic_source = new Array();
    var traffic_type = new Array();
    var countries = new Array();
    var campaigns = new Array();
    var regions = new Array();
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();
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
    trafficType2(product_chosen, outlet_chosen, traffic_source, traffic_type, start_date, end_date, order_by, sort, countries, regions, campaigns)
}

function getNextValueSort(sortCurrent) {
    var sort;
    switch (sortCurrent) {
        case '0':
            sort = 'asc';
            break;
        case 'asc':
            sort = 'desc';
            break;
        default:
            sort = 0;
    }
    return sort;
}

/**
 * Comment
 */
function uncheckCheckbox(e) {
    $(e).prop('checked', false);
    $(e).attr("checked", false);
}

/**
 * check
 */
function checkCheckbox(e) {
    $(e).prop('checked', true);
    $(e).attr("checked", true);
}


function statusDistributionHightchars(category, data) {
    $('#status_distribution').highcharts({
        chart: {
            type: 'column',
        },
        title: {
            text: ''
        },
        xAxis: {
            series: {
                borderColor: '#303030',
                borderWidth: '2'
            },
            categories: category
        },
        yAxis: {
            gridLineWidth: 0,
            minorGridLineWidth: 0,
            lineColor: '#ccc',
            lineWidth: 1,
            min: 0,
            title: {
                text: 'Number of contacts'
            },
            stackLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                }
            }
        },
        legend: {
            align: 'right',
            x: -70,
            verticalAlign: 'top',
            y: 20,
            floating: true,
            backgroundColor: '#ccc' || '#000',
            borderColor: '#CCC',
            borderWidth: 1,
            shadow: false
        },
        credits: {
            enabled: false
        },
        exporting: {enabled: false},
        tooltip: {
            formatter: function() {
//                    return '<b>' + this.x + '</b><br/>' +
//                            this.series.name + ': ' + this.y + '<br/>' +
//                            'Total: ' + this.point.stackTotal;

                return 'Product chosen: ' + '<b>' + this.series.name + '</b><br/>' +
                        this.x + ': ' + '<b>' + this.y + '</b><br/>'
            }
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: true,
                    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                    style: {
                        textShadow: '0 0 0 black, 0 0 0 black',
                    }
                }
            }
        },
        series: data,
    });
}


function trafficSourceHightchars(data) {
    $('#traffic_source').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: ''
        },
        exporting: {enabled: false},
        xAxis: {
            series: {
                borderColor: '#303030',
                borderWidth: '2'
            },
            type: 'category',
            labels: {
                rotation: -90,
                align: 'right',
                style: {
                    fontSize: '10px',
                    color: '#000',
                }
            }
        },
        yAxis: {
            gridLineWidth: 0,
            minorGridLineWidth: 0,
            lineColor: '#ccc',
            lineWidth: 1,
            min: 0,
            title: {
                text: '<div class="number_of_signup">Number of Signups <a href="javascript:void(0)" title="Sort" onclick="update_sort_traffic_source_status($(this))" id="traffic_source_sort" class="glyphicon ' + data.class + '" rel="' + data.sort + '"></a></div>',
                useHTML: true,
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
//            pointFormat: 'Population in 2008: <b>{point.y:.1f} millions</b>',
            formatter: function() {
//                    return '<b>' + this.x + '</b><br/>' +
//                            this.series.name + ': ' + this.y + '<br/>' +
//                            'Total: ' + this.point.stackTotal;
                return 'Traffic Source: ' + '<b>' + this.key + '</b><br/>' +
                        'Registrations: ' + '<b>' + this.y + '</b><br/>'
            }
        },
        credits: {
            enabled: false
        },
        series: [{
                name: 'Population',
                data: data.msg,
                dataLabels: {
                    enabled: true,
                    rotation: -90,
                    color: '#000',
                    align: 'top',
                    x: 4,
                    y: -4,
                    style: {
                        fontSize: '10px',
                    }
                }
            }]
    });
}

function trafficType2Hightchars(data) {
    $('#traffic_type2').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: ''
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: 0,
                align: 'center',
                style: {
                    fontSize: '10px',
                    color: '#000',
                }
            }
        },
        exporting: {enabled: false},
        yAxis: {
            gridLineWidth: 0,
            minorGridLineWidth: 0,
            lineColor: '#ccc',
            lineWidth: 1,
            min: 0,
            title: {
                text: '<div class="number_of_signup">Number of Signups <a href="javascript:void(0)" title="Sort" onclick="update_sort_traffic_type2_status($(this))" id="traffic_type2_sort" class="glyphicon ' + data.class + '" rel="' + data.sort + '"></a></div>',
                useHTML: true,
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
//            pointFormat: 'Population in 2008: <b>{point.y:.1f} millions</b>',
            formatter: function() {
//                    return '<b>' + this.x + '</b><br/>' +
//                            this.series.name + ': ' + this.y + '<br/>' +
//                            'Total: ' + this.point.stackTotal;
                return 'Traffic Type 2: ' + '<b>' + this.key + '</b><br/>' +
                        'Registrations: ' + '<b>' + this.y + '</b><br/>'
            }
        },
        credits: {
            enabled: false
        },
        series: [{
                name: 'Population',
                data: data.msg,
                dataLabels: {
                    enabled: true,
                    rotation: 0,
                    color: '#000',
                    align: 'top',
                    x: 0,
                    y: -4,
                    style: {
                        fontSize: '10px',
                    }
                }
            }]
    });
}

function statusDistribution(product_chosen, outlet_chosen, traffic_source, traffic_type, start_date, end_date, countries, regions, campaigns) {
    $.ajax({
        url: base_url + 'index.php/ajax/users',
        type: 'POST',
        data: {'countries': countries, 'regions': regions, 'campaigns': campaigns, 'outlet_id': outlet_chosen, 'product_id': product_chosen, 'traffic_id': traffic_source, 'traffic_type_id': traffic_type, 'start_date': start_date, 'end_date': end_date},
        dataType: "json",
        success: function(data) {
            statusDistributionHightchars(data.category, data.msg);
        }
    });
}

function trafficType2(product_chosen, outlet_chosen, traffic_source, traffic_type, start_date, end_date, order, sort, countries, regions, campaigns) {
    if (isEmpty(order))
        order = 'id';
    if (isEmpty(sort))
        sort = 0;

    $.ajax({
        url: base_url + 'index.php/ajax/traffic_type2',
        type: 'POST',
        data: {'countries': countries, 'regions': regions, 'campaigns': campaigns, 'outlet_id': outlet_chosen, 'product_id': product_chosen, 'traffic_id': traffic_source, 'traffic_type_id': traffic_type, 'start_date': start_date, 'end_date': end_date, 'order': order, 'sort': sort},
        dataType: "json",
        success: function(data) {
            trafficType2Hightchars(data);
        }
    });
}

function trafficSource(product_chosen, outlet_chosen, traffic_source, traffic_type, start_date, end_date, order, sort, countries, regions, campaigns) {
    if (isEmpty(order))
        order = 'id';
    if (isEmpty(sort))
        sort = 0;

    $.ajax({
        url: base_url + 'index.php/ajax/traffic_source',
        type: 'POST',
        data: {'countries': countries, 'regions': regions, 'campaigns': campaigns, 'outlet_id': outlet_chosen, 'product_id': product_chosen, 'traffic_id': traffic_source, 'traffic_type_id': traffic_type, 'start_date': start_date, 'end_date': end_date, 'order': order, 'sort': sort},
        dataType: "json",
        success: function(data) {
            trafficSourceHightchars(data);
        }
    });
}

/**
 * load_location_info
 */
function load_location_info(product_chosen, outlet_chosen, traffic_source, traffic_type, start_date, end_date, order, sort, countries, regions, campaigns) {
    if (isEmpty(order))
        order = 'id';
    if (isEmpty(sort))
        sort = 0;
    $.ajax({
        url: base_url + 'index.php/ajax/load_location_info',
        data: {'countries': countries, 'regions': regions, 'campaigns': campaigns, 'outlet_id': outlet_chosen, 'product_id': product_chosen, 'traffic_id': traffic_source, 'traffic_type_id': traffic_type, 'start_date': start_date, 'end_date': end_date, 'order': order, 'sort': sort},
        success: function(data) {
            $('#locations').html(data);
        }
    });
}

function isEmpty(str) {
    return (!str || 0 === str.length);
}

function load_location_rate_info(product_chosen, outlet_chosen, traffic_source, traffic_type, start_date, end_date, countries, regions, campaigns) {
    $.ajax({
        url: base_url + 'index.php/ajax/load_location_rate_info',
        data: {'countries': countries, 'regions': regions, 'campaigns': campaigns, 'outlet_id': outlet_chosen, 'product_id': product_chosen, 'traffic_id': traffic_source, 'traffic_type_id': traffic_type, 'start_date': start_date, 'end_date': end_date},
        success: function(data) {
            $('#locations').html(data);
        }
    });
}


/**
 * showHightcharsTemplate1
 */

function showHightcharsTemplate1(history) {
    if (isEmpty(history))
        history = true;
    else
        history = false;
    if (timeoutHandle) {
        clearTimeout(timeoutHandle);
        timeoutHandle = null;
    }
    timeoutHandle = setTimeout(function() {
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
        var remember_id = $('#remember_my_changes').attr('rel');

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
        var historyLength = parseInt(historyLog.length);
        if (historyLength > 0) {
            $('#rotate_back').attr('rel', 1);
        }
//        var history = new Array(product_chosen, outlet_chosen, traffic_source, traffic_type, start_date, end_date, sortType2);;
        if (history == true)
            historyLog[historyLength] = new Array(product_chosen, outlet_chosen, traffic_source, traffic_type, start_date, end_date, sortTraffic, sortType2, remember_id, countries, regions, campaigns);
//
//        var MultiArray = new Array();
//        MultiArray[0] = new Array('Beryl', 'asdasda');
//        console.log(MultiArray);

        load_location_info(product_chosen, outlet_chosen, traffic_source, traffic_type, start_date, end_date, 'id', 0, countries, regions, campaigns);
        statusDistribution(product_chosen, outlet_chosen, traffic_source, traffic_type, start_date, end_date, countries, regions, campaigns);
        trafficSource(product_chosen, outlet_chosen, traffic_source, traffic_type, start_date, end_date, 'id', sortTraffic, countries, regions, campaigns);
        trafficType2(product_chosen, outlet_chosen, traffic_source, traffic_type, start_date, end_date, 'id', sortType2, countries, regions, campaigns);
    }, 1000);
}


/**
 * showHightcharsTemplate3
 */
function showHightcharsTemplate3() {
    if (timeoutHandle) {
        clearTimeout(timeoutHandle);
        timeoutHandle = null;
    }
    timeoutHandle = setTimeout(function() {
        var product_chosen = new Array();
        var outlet_chosen = new Array();
        var traffic_source = new Array();
        var traffic_type = new Array();
        var countries = new Array();
        var campaigns = new Array();
        var regions = new Array();
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();
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
        load_location_rate_info(product_chosen, outlet_chosen, traffic_source, traffic_type, start_date, end_date, countries, regions, campaigns);
        statusDistribution(product_chosen, outlet_chosen, traffic_source, traffic_type, start_date, end_date, countries, regions, campaigns);
    }, 1000);
}

function showHightcharsTemplate4() {
    if (timeoutHandle) {
        clearTimeout(timeoutHandle);
        timeoutHandle = null;
    }
    timeoutHandle = setTimeout(function() {
        var product_chosen = new Array();
        var outlet_chosen = new Array();
        var traffic_source = new Array();
        var traffic_type = new Array();
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();
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
        trafficSource(product_chosen, outlet_chosen, traffic_source, traffic_type, start_date, end_date);
        trafficType2(product_chosen, outlet_chosen, traffic_source, traffic_type, start_date, end_date);
    }, 1000);
}
/*
 * Date Format 1.2.3
 * (c) 2007-2009 Steven Levithan <stevenlevithan.com>
 * MIT license
 *
 * Includes enhancements by Scott Trenda <scott.trenda.net>
 * and Kris Kowal <cixar.com/~kris.kowal/>
 *
 * Accepts a date, a mask, or a date and a mask.
 * Returns a formatted version of the given date.
 * The date defaults to the current date/time.
 * The mask defaults to dateFormat.masks.default.
 */

var dateFormat = function() {
    var token = /d{1,4}|m{1,4}|yy(?:yy)?|([HhMsTt])\1?|[LloSZ]|"[^"]*"|'[^']*'/g,
            timezone = /\b(?:[PMCEA][SDP]T|(?:Pacific|Mountain|Central|Eastern|Atlantic) (?:Standard|Daylight|Prevailing) Time|(?:GMT|UTC)(?:[-+]\d{4})?)\b/g,
            timezoneClip = /[^-+\dA-Z]/g,
            pad = function(val, len) {
        val = String(val);
        len = len || 2;
        while (val.length < len)
            val = "0" + val;
        return val;
    };
    // Regexes and supporting functions are cached through closure
    return function(date, mask, utc) {
        var dF = dateFormat;
        // You can't provide utc if you skip other args (use the "UTC:" mask prefix)
        if (arguments.length == 1 && Object.prototype.toString.call(date) == "[object String]" && !/\d/.test(date)) {
            mask = date;
            date = undefined;
        }

// Passing date through Date applies Date.parse, if necessary
        date = date ? new Date(date) : new Date;
        if (isNaN(date))
            throw SyntaxError("invalid date");
        mask = String(dF.masks[mask] || mask || dF.masks["default"]);
        // Allow setting the utc argument via the mask
        if (mask.slice(0, 4) == "UTC:") {
            mask = mask.slice(4);
            utc = true;
        }

        var _ = utc ? "getUTC" : "get",
                d = date[_ + "Date"](),
                D = date[_ + "Day"](),
                m = date[_ + "Month"](),
                y = date[_ + "FullYear"](),
                H = date[_ + "Hours"](),
                M = date[_ + "Minutes"](),
                s = date[_ + "Seconds"](),
                L = date[_ + "Milliseconds"](),
                o = utc ? 0 : date.getTimezoneOffset(),
                flags = {
            d: d,
            dd: pad(d),
            ddd: dF.i18n.dayNames[D],
            dddd: dF.i18n.dayNames[D + 7],
            m: m + 1,
            mm: pad(m + 1),
            mmm: dF.i18n.monthNames[m],
            mmmm: dF.i18n.monthNames[m + 12],
            yy: String(y).slice(2),
            yyyy: y,
            h: H % 12 || 12,
            hh: pad(H % 12 || 12),
            H: H,
            HH: pad(H),
            M: M,
            MM: pad(M),
            s: s,
            ss: pad(s),
            l: pad(L, 3),
            L: pad(L > 99 ? Math.round(L / 10) : L),
            t: H < 12 ? "a" : "p",
            tt: H < 12 ? "am" : "pm",
            T: H < 12 ? "A" : "P",
            TT: H < 12 ? "AM" : "PM",
            Z: utc ? "UTC" : (String(date).match(timezone) || [""]).pop().replace(timezoneClip, ""),
            o: (o > 0 ? "-" : "+") + pad(Math.floor(Math.abs(o) / 60) * 100 + Math.abs(o) % 60, 4),
            S: ["th", "st", "nd", "rd"][d % 10 > 3 ? 0 : (d % 100 - d % 10 != 10) * d % 10]
        };
        return mask.replace(token, function($0) {
            return $0 in flags ? flags[$0] : $0.slice(1, $0.length - 1);
        });
    };
}();
// Some common format strings
dateFormat.masks = {
    "default": "ddd mmm dd yyyy HH:MM:ss",
    shortDate: "m/d/yy",
    mediumDate: "mmm d, yyyy",
    longDate: "mmmm d, yyyy",
    fullDate: "dddd, mmmm d, yyyy",
    shortTime: "h:MM TT",
    mediumTime: "h:MM:ss TT",
    longTime: "h:MM:ss TT Z",
    isoDate: "yyyy-mm-dd",
    isoTime: "HH:MM:ss",
    isoDateTime: "yyyy-mm-dd'T'HH:MM:ss",
    isoUtcDateTime: "UTC:yyyy-mm-dd'T'HH:MM:ss'Z'"
};
// Internationalization strings
dateFormat.i18n = {
    dayNames: [
        "Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat",
        "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"
    ],
    monthNames: [
        "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec",
        "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
    ]
};
// For convenience...
Date.prototype.format = function(mask, utc) {
    return dateFormat(this, mask, utc);
};