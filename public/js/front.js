$(document).ready(function() {
    $("input[type='password']").attr("autocomplete", "off");

    $('#list-product-order-create_wrapper').on('change', 'input[name=order_prd_id]', function() {
        if ($(this).is(':checked')) {
            addOrder($(this));
        } else {
            removeOrder($(this));
        }
    });
    $('#list-product-order-create_wrapper').on('click', 'input[name=add_qty]', function() {
        var parent = $(this).parents('tr');
        var checkbox = parent.find('input[name=order_prd_id]');
        if (checkbox.is(':checked')) {
            addOrder(checkbox);
        }
    });
    $('#list-product-order-checkout_wrapper').on('click', 'input[name=add_qty]', function() {
        var parent = $(this).parents('tr');
        var checkbox = parent.find('input[name=checkout_prd_id]');
        addOrderCheckout(checkbox);
    });
    ;
    var selected = [];
    $('#suplier-multiple-select').change(function() {
        selected[$(this).val()] = $(this).val();
        product_order_mobile_ajax_list.fnDraw();
    });
    $('#location-multiple-select').change(function() {
        selected[$(this).val()] = $(this).val();
        product_order_mobile_ajax_list.fnDraw();
    });
    $('#categories-multiple-select').change(function() {
        selected[$(this).val()] = $(this).val();
        product_order_mobile_ajax_list.fnDraw();
    });
});
$().ready(function() {

    $.validator.addMethod("atLeastOneNum", function(value, element) {
        return /\d/.test(value);
    });
    $.validator.addMethod("atLeastOneAlphabet", function(value, element) {
        return /[a-zA-Z]/.test(value);
    });
    $.validator.addMethod("OnlyNumberAlphabet", function(value, element) {
        return /^[a-zA-Z0-9]+$/.test(value);
    });
    $.validator.addMethod("AlphaNumericSpace", function(value, element) {
        return /^[a-zA-Z0-9 ]+$/.test(value);
    });
    $.validator.addMethod("allowCharectorsName", function(value, element) {
        return /^[-a-zA-Z0-9&'._ ]+$/.test(value);
    });
    $.validator.addMethod("cost", function(value, element) {
        return /^(\d*([.,](?=\d{1}))?\d+)+((?!\2)[.,]\d\d)?$/.test(value);
    });
    $.validator.addMethod("equalWith", function(value, element, param) {
        return (isEmpty(value) && value != $('#param').val())
    });
    $.validator.addMethod("exactlyLength",
            function(value, element, params) {
                return this.optional(element) || value.length == params[1];
            },
            jQuery.validator.format("{0} should be {1} digits"));
    $("#form-reset-password").validate({
        rules: {
            password: {
                required: true,
                minlength: 7,
                atLeastOneNum: true,
                atLeastOneAlphabet: true
            },
            re_password: {
                equalTo: "#password"
            }
        },
        messages: {
            password: {
                required: "Minimum of 7 characters.  At least one must be numeric and at least one must be alpha",
                minlength: "Minimum of 7 characters.  At least one must be numeric and at least one must be alpha",
                atLeastOneNum: 'Minimum of 7 characters.  At least one must be numeric and at least one must be alpha',
                atLeastOneAlphabet: 'Minimum of 7 characters.  At least one must be numeric and at least one must be alpha'
            },
            re_password: {
                equalTo: "Passwords do not match. Please re-enter your password"
            }
        },
        errorPlacement: function(error, element) {
            var name = $(element).attr("name");
            error.appendTo($("#" + name + "_validate"));
        }
    });

    $("#form-supplier").validate({
        rules: {
            name: {
                required: true,
                minlength: 3,
            },
            email: {
                required: true,
                email: true,
                maxlength: 78,
            }
        },
        messages: {
            name: {
                required: "Minimum of 3 characters",
                minlength: "Minimum of 3 characters",
            },
            email: {
                required: "Email invalid",
                email: "Email invalid",
                maxlength: "Email invalid"
            }
        },
        errorPlacement: function(error, element) {
            var name = $(element).attr("name");
            error.appendTo($("#" + name + "_validate"));
        }
    });

    $("#form-location-update").validate({
        rules: {
            name: {
                required: true,
            },
        },
        messages: {
            name: {
                required: "Please enter location",
            },
        },
        errorPlacement: function(error, element) {
            var name = $(element).attr("name");
            error.appendTo($("#" + name + "_validate"));
        }
    });
//    $("#form-update-password").validate({
//        rules: {
//            newpass: {
//                required: true,
//                minlength: 7,
//                atLeastOneNum: true,
//                atLeastOneAlphabet: true
//            },
//            cf_newpass: {
//                equalTo: "#newpass"
//            }
//        },
//        messages: {
//            newpass: {
//                required: "Minimum of 7 characters.  At least one must be numeric and at least one must be alpha",
//                minlength: "Minimum of 7 characters.  At least one must be numeric and at least one must be alpha",
//                atLeastOneNum: 'Minimum of 7 characters.  At least one must be numeric and at least one must be alpha',
//                atLeastOneAlphabet: 'Minimum of 7 characters.  At least one must be numeric and at least one must be alpha'
//            },
//            cf_newpass: {
//                equalTo: "Passwords do not match. Please re-enter your password"
//            }
//        },
//        errorPlacement: function(error, element) {
//            var name = $(element).attr("name");
//            error.appendTo($("#" + name + "_validate"));
//        }
//    });
    $("#form-producttype-update").validate({
        rules: {
            name: {
                required: true,
            },
        },
        messages: {
            name: {
                required: "Please enter product type",
            },
        },
        errorPlacement: function(error, element) {
            var name = $(element).attr("name");
            error.appendTo($("#" + name + "_validate"));
        }
    });
    $("#form-product-update").validate({
        rules: {
            name: {
                required: true,
            },
            unit: {
                required: true,
            },
            cost: {
                required: true,
                cost: true,
            },
            qty: {
                required: true,
                digits: true,
            },
        },
        messages: {
            name: {
                required: "Please enter product",
            },
            unit: {
                required: "Please enter unit",
            },
            cost: {
                required: "Please enter validate cost",
                cost: "Please enter validate cost",
            },
            qty: {
                required: 'Please enter qty',
                digits: 'Qty invalid',
            },
        },
        errorPlacement: function(error, element) {
            var name = $(element).attr("name");
            error.appendTo($("#" + name + "_validate"));
        }
    });
    $("#register_form").validate({
        rules: {
            InputLastName: {
                required: true,
                minlength: 3,
            },
            InputFirstname: {
                required: true,
                minlength: 3,
            },
            Inputownername: {
                required: true,
                minlength: 3,
            },
            InputEmail: {
                required: true,
                email: true,
                maxlength: 78,
            },
            InputPassword: {
                required: true,
                minlength: 7,
                atLeastOneNum: true,
                atLeastOneAlphabet: true
            },
            InputRePassword: {
                equalTo: "#InputPassword"
            },
            phone: {
                digits: true,
            },
            TermOfUse: {
                required: true,
            },
            Inputsuburb: {
                required: true,
            },
            Inputpostcode: {
                required: true,
                digits: true,
            }
        },
        messages: {
            InputLastName: {
                required: 'Please enter your last name',
            },
            InputFirstname: {
                required: 'Please enter your first name',
                minlength: 3,
            },
            Inputownername: {
                required: 'Please enter your name of restaurant',
            },
            InputEmail: {
                required: "Email invalid",
                email: "Email invalid",
                maxlength: "Email invalid",
            },
            InputPassword: {
                required: "Minimum of 7 characters.  At least one must be numeric and at least one must be alpha",
                minlength: "Minimum of 7 characters.  At least one must be numeric and at least one must be alpha",
                atLeastOneNum: 'Minimum of 7 characters.  At least one must be numeric and at least one must be alpha',
                atLeastOneAlphabet: 'Minimum of 7 characters.  At least one must be numeric and at least one must be alpha'
            },
            InputRePassword: {
                equalTo: "Passwords do not match. Please re-enter your password"
            },
            phone: {
                digits: 'Please enter valid phone number',
            },
            TermOfUse: {
                required: 'Please read and accept the terms of use',
            },
            Inputsuburb: {
                required: 'Please enter suburb',
            },
            Inputpostcode: {
                required: 'Please enter postcode',
                digits: 'Please enter valid postcode number',
            }
        },
        errorPlacement: function(error, element) {
            var name = $(element).attr("name");
            error.appendTo($("#" + name + "_validate"));
        }
    });

    $("#update-account-information-form").validate({
        rules: {
            firstname: {
                required: true,
            },
            lastname: {
                required: true,
                minlength: 3,
            },
            email: {
                required: true,
                email: true,
                maxlength: 78,
            },
            phone: {
                digits: true,
            },
            name: {
                required: true,
                minlength: 3,
            },
            suburb: {
                required: true,
            },
            postcode: {
                required: true,
                digits: true,
            },
            state: {
                required: true,
            }
        },
        messages: {
            firstname: {
                required: 'Please enter your first name',
            },
            lastname: {
                required: 'Please enter your last name',
            },
            email: {
                required: "Email invalid",
                email: "Email invalid",
                maxlength: "Email invalid",
            },
            phone: {
                digits: 'Please enter valid phone number',
            },
            name: {
                required: "Please enter name of restaurant and Minimum of 3 characters",
                minlength: "Please enter name of restaurant and Minimum of 3 characters",
            },
            suburb: {
                required: 'Please enter your first name',
            },
            postcode: {
                required: 'Please enter your postcode',
                digits: 'Postcode invalid',
            },
            state: {
                required: 'Please enter your state',
            }
        },
        errorPlacement: function(error, element) {
            var name = $(element).attr("name");
            error.appendTo($("#" + name + "_validate"));
        }
    });

    $("#form-user-update").validate({
        rules: {
            firstname: {
                required: true,
            },
            lastname: {
                required: true,
            },
            email: {
                required: true,
                email: true,
                maxlength: 78,
            },
            phone: {
                digits: true,
            },
            cf_password: {
                equalTo: "#password"
            }

        },
        messages: {
            firstname: {
                required: 'Please enter your first name',
            },
            lastname: {
                required: 'Please enter your last name',
            },
            email: {
                required: "Email invalid",
                email: "Email invalid",
                maxlength: "Email invalid",
            },
            phone: {
                digits: 'Please enter valid phone number',
            },
            postcode: {
                required: 'Please enter your postcode',
                digits: 'Postcode invalid',
            },
            cf_password: {
                equalTo: "Passwords do not match. Please re-enter your password"
            }
        },
        errorPlacement: function(error, element) {
            var name = $(element).attr("name");
            error.appendTo($("#" + name + "_validate"));
        }
    });
    $("#form-contact").validate({
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
                email: true,
                maxlength: 78,
            },
            content: {
                required: true,
            }

        },
        messages: {
            name: {
                required: 'Please enter your name',
            },
            email: {
                required: "Email invalid",
                email: "Email invalid",
                maxlength: "Email invalid",
            },
            content: {
                required: 'Please enter your Message',
            },
        },
        errorPlacement: function(error, element) {
            var name = $(element).attr("name");
            error.appendTo($("#" + name + "_validate"));
        }
    });
    $("#form-about-update").validate({
        rules: {
            title: {
                required: true,
            },
            order: {
                required: true,
                digits: true,
            },
            content: {
                required: true,
            },
        },
        messages: {
            title: {
                required: "Please enter title",
            },
            order: {
                required: "Please enter order",
                digits: 'Please enter valid order',
            },
            content: {
                required: "Please enter content",
            },
        },
        errorPlacement: function(error, element) {
            var name = $(element).attr("name");
            error.appendTo($("#" + name + "_validate"));
        }
    });
    $("#form-features-update").validate({
        rules: {
            title: {
                required: true,
            },
            order: {
                required: true,
                digits: true,
            },
            content: {
                required: true,
            },
        },
        messages: {
            title: {
                required: "Please enter title",
            },
            order: {
                required: "Please enter order",
                digits: 'Please enter valid order',
            },
            content: {
                required: "Please enter content",
            },
        },
        errorPlacement: function(error, element) {
            var name = $(element).attr("name");
            error.appendTo($("#" + name + "_validate"));
        }
    });
    $("#form-contactPage-update").validate({
        rules: {
            title: {
                required: true,
            },
            content: {
                required: true,
            },
        },
        messages: {
            title: {
                required: "Please enter title",
            },
            content: {
                required: "Please enter content",
            },
        },
        errorPlacement: function(error, element) {
            var name = $(element).attr("name");
            error.appendTo($("#" + name + "_validate"));
        }
    });
    $("ul.navbar-nav li").each(function(i, element) {
        var tmp = location.href;
        if (tmp == base_url + '/session/login') {
            $(this).removeClass('active-nav');
            $(".navbar-login").addClass('active-nav');
        }
    });

    $("body").on("click", '.delete-product', function() {
        var tmp = $(this).parents('tr');
        var a = $(this).parents('tbody');
        var count_tr = $("tr", a).length;
        if (count_tr == 1) {
            var b = $(this).parents('.update-orders-content');
            b.remove();
        }
        tmp.remove();
        changeTotalPrice();
    });

    $('#popup-add-product').click(function() {
        $("#add-product-orders").dialog({
            create: function(event, ui) {
                var widget = $(this).dialog("widget");
            },
            close: function(event, ui) {

            },
            draggable: false,
            modal: true,
            width: 530,
            title: "add product",
            position: {
                my: "center",
                at: "center"
            }
        });
    });
    $(".add-product-orders").click(function(i, element) {
        var tmp = $(this).parents('tr');
        var a = $(this).parents('tbody');
        var count_tr = $("tr", a).length;
        if (count_tr == 1) {
            var b = $(this).parents('.update-orders-content');
            b.remove();
        }
        tmp.remove();
    });
    $("#btn_show_hide_nav").click(function() {
        showHideLeftNav(0);
    });
    $(".wrap-content > .main-content").click(function() {
        showHideLeftNav(1);
    });
    $(".view-order-number-hide").click(function() {
        $(this).parents('.update-orders-content').find('.view-order-header').toggle();
    });
    $(".order-toggle").click(function() {
        $(this).parents('.update-orders-content').find('.view-order-header').toggle();
    });
    $(".order-toggle-mobile").click(function() {
        $('.data-filter-mobile').toggle();
        $('.dataTables_filter').toggle();
    });
    $('#suplier-multiple-select').multiselect();
    $('#location-multiple-select').multiselect();
    $('#categories-multiple-select').multiselect();
    $(".input-add-order-checkout").click(function() {
        console.log($(this))
        var parent = $(this).parents('tr');
        var checkbox = parent.find('input[name=id_product]');
        var price = parent.find('input[name=price_checkout]').val();
        var qty = parent.find('input[name=qty]').val();
        console.log(price);
        qty = parseFloat(qty);
        var tmp = price * qty;
        tmp = format1(tmp);
        var price_each_product = parent.find('lable[name=price_each_product]').html('$' + tmp);
        parent.find('input[name=price_product]').val(tmp);
        changeTotalPrice();
        addOrder(checkbox);
    });
});


/**
 * Comment
 */
function changeTotalPrice() {
    var tmp = $('#dv-content-order');
    var total = 0;
    $('.table-order-product', tmp).each(function(index, e) {
        var a = 0;
        $('tr', $(this)).each(function() {
            var price = $(this).find('input[name=price_checkout]').val();
            var qty = $(this).find('input[class=total_product]').val();
            qty = parseFloat(qty);
            var tmp = price * qty;
            tmp = format1(tmp);
            var price_each_product = $(this).find('lable[name=price_each_product]').html('$' + tmp);
            $(this).find('input[name=price_product]').val(tmp);
        });
        $('.price_product', $(this)).each(function() {
            b = parseFloat($(this).val());
            a += b;
        });
        total += a;
        a = format1(a);
        $(this).find('input[name=tottal_price_product]').val(a);
        $('.label_total_price_product', $(this)).text('$' + a);
    });
    total = format1(total);
    $('.view-total-price-checkout').text('$' + total);
}
function format1(n) {
    return n.toFixed(2).replace(/./g, function(c, i, a) {
        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
    });
}

var supplier_manager_table = $('#supplier_manager').dataTable({
    "bProcessing": true,
    "bServerSide": true,
    "sAjaxSource": base_url + '/manager/ajax_list_supplier',
    "aoColumns": [
        {"sTitle": "Id", "iDataSort": "id", "mData": "id", "bSearchable": false},
        {"sTitle": "Name", "iDataSort": "name", "mData": "name"},
        {"sTitle": "Phone", "bSortable": false, "mData": "phone"},
        {"sTitle": "Fax", "bSortable": false, "mData": "fax"},
        {"sTitle": "Email", "iDataSort": "email", "mData": "email"},
        {"sTitle": "Method", "bSortable": false, "mData": "method", "mRender": render_method_supplier},
        {"sTitle": "", "bSortable": false, "mData": "action", "bSearchable": false, "mRender": render_action_supplier},
    ],
});
$("#supplier_manager_wrapper #supplier_manager_length").html('<div class="col-xs-6"><div class="banner-button table-header"><a class="btn btn-link" href="' + base_url + '/manager/update_supplier' + '">Add Supplier</a></div></div><div class="col-xs-6"><div class="banner-button table-header"><a class="btn btn-link" href="' + base_url + '/manager/upload_supplier_csv' + '">Upload Supplier csv</a></div></div>');

function showHideLeftNav(cls_nav) {
    if ($('.wrap-left-nav').hasClass('shiftnav-open-target') || cls_nav) {
        $('.wrap-left-nav').removeClass('shiftnav-open-target');
        $('.wrap-left-nav').addClass('shiftnav-close-target');
        $('.wrap-content').removeClass('shiftnav-open-target');
        $('.navbar-brand').show();
        $('.navbar-toggle').css('background-color', 'transparent');
        $('.navbar-toggle').css('border', '1px solid transparent');
        $('.navbar-toggle').css('border-color', '#333');
    } else {
        $('.wrap-left-nav').addClass('shiftnav-open-target');
        $('.wrap-left-nav').removeClass('shiftnav-close-target');
        $('.wrap-content').addClass('shiftnav-open-target');
        $('.navbar-brand').hide();
        $('.navbar-toggle').css('background-color', '#222');
        $('.navbar-toggle').css('border', 'none');
    }
}

function render_method_supplier(data, type, full) {
    var html = '';
    if (data == 0) {
        html = 'Email'
    } else {
        html = 'Fax'
    }
    return html;
}


/**
 * render_action
 */
function render_action_supplier(data, type, full) {
    var html = '<div class="hidden-sm hidden-xs action-buttons">';
    html += '<a href="javascript:delete_supplier(' + full.id + ')" class="red"><i class="a fa fa-trash-o bigger-130"></i></a>';
    html += '<a href="' + base_url + '/manager/update_supplier/' + full.id + '" class="red"><i class="fa fa-edit bigger-130"></i></a>';
    html += '<a href="' + base_url + '/manager/upload_product_csv/' + full.id + '" class="red"><i class="fa fa-link bigger-130"></i></a>';
    html += '</div>';
    return html;
}

/**
 * delete_supplier
 */
function delete_supplier(id) {
    var cf = confirm('Do you want delete this record?');
    if (cf) {
        $.ajax({
            url: base_url + '/manager/delete_supplier',
            type: 'POST',
            data: {'id': id},
            success: function(data) {
                supplier_manager_table.fnDraw(false);
            }
        });
    }
}

var users_manager = $('#users_manager').dataTable({
    "bLengthChange": "table-header",
    "bProcessing": true,
    "bServerSide": true,
    "sAjaxSource": base_url + '/manager/ajax_list_user',
    "aoColumns": [
        {"sTitle": "Id", "iDataSort": "id", "mData": "id", "bSearchable": false},
        {"sTitle": "Firstname", "iDataSort": "firstname", "mData": "firstname"},
        {"sTitle": "Lastname", "iDataSort": "lastname", "mData": "lastname"},
        {"sTitle": "Email", "iDataSort": "email", "mData": "email"},
        {"sTitle": "Phone", "iDataSort": "phone", "mData": "phone"},
        {"sTitle": "", "bSortable": false, "mData": "action", "bSearchable": false, "mRender": render_action_user},
    ],
});
$("#users_manager_wrapper #users_manager_length").html('<div class="banner-button table-header"><a class="btn btn-link" href="' + base_url + '/manager/update_user' + '">Add user</a></div>');

/**
 * render_action
 */
function render_action_user(data, type, full) {
    var html = '<div class="hidden-sm hidden-xs action-buttons">';
    html += '<a href="javascript:delete_user(' + full.id + ')" class="red"><i class="a fa fa-trash-o bigger-130"></i></a>';
    html += '<a href="' + base_url + '/manager/update_user/' + full.id + '" class="red"><i class="fa fa-edit bigger-130"></i></a>';
    html += '</div>';
    return html;
}
var list_orders = $('#list-orders').dataTable({
    "bLengthChange": "table-header",
    "bProcessing": true,
    "bServerSide": true,
    "sAjaxSource": base_url + '/order/ajax_list_orders',
    "aoColumns": [
        {"sTitle": "Id", "iDataSort": "orders.id", "mData": "id", "bSearchable": false},
        {"sTitle": "Name", "iDataSort": "name", "mData": "name"},
        {"sTitle": "Status", "iDataSort": "status", "mData": "status", "mRender": render_status_orders},
        {"sTitle": "$Total", "iDataSort": "total", "mData": "total"},
        {"sTitle": "Date Add", "iDataSort": "date_added", "mData": "date_added"},
        {"sTitle": "Date Edit", "iDataSort": "date_modified", "mData": "date_modified"},
        {"sTitle": "", "bSortable": false, "mData": "action", "bSearchable": false, "mRender": render_action_orders},
    ],
});
var tmp = '';
tmp += '<div class="banner-button table-header save-order-not-hidden"><a class="btn btn-link" href="' + base_url + '/order/saveOrders' + '">LIST SAVED ORDER</a></div>';
$("#list-orders_wrapper #list-orders_info").parents('.col-xs-6').html(tmp);
var tmp_2 = '';
tmp_2 +=$("#list-orders_wrapper #list-orders_filter").parents('.col-xs-6').html();
tmp_2 +='<div class="banner-button table-header save-order-hidden"><a class="btn btn-link" href="' + base_url + '/order/saveOrders' + '">LIST SAVED ORDER</a></div>';
$("#list-orders_wrapper #list-orders_filter").parents('.col-xs-6').html(tmp_2);
/**
 * render_status_orders
 */
function render_status_orders(data, type, full) {
    var html = '';
    if (full.status == 1) {
        html = '<span class="pending-order">Pendding</span>';
    }
    if (full.status == 2) {
        html = '<span class="complate-order">Completed</span><i class="fa fa-check icon-complate"></i>';
    }
    if (full.status == 3) {
        html = '<span class="pending-order">Rejected</span>';
    }
    return html;
}
/**
 * render_action
 */
function render_action_orders(data, type, full) {
    var html = '';
    if (full.view == 1) {
        html = '<div class="action-buttons">';
        html += '<a class="list-orders-action-buttons" style="" href="' + base_url + '/order/view_orders/' + full.id + '/' + full.user_id + '" class="red"><i class="fa fa-eye bigger-130"></i></a>';
        html += '<a href="' + base_url + '/order/update_orders/' + full.id + '/' + full.user_id + '" class="red"><i class="fa fa-edit bigger-130"></i></a>';
        html += '</div>';
    } else {
        html = '<div class="action-buttons">';
        html += '<a href="' + base_url + '/order/view_orders/' + full.id + '/' + full.user_id + '" class="red"><i class="fa fa-eye bigger-130"></i></a>';
        html += '</div>';
    }

    return html;
}


var list_save_orders = $('#list-save-orders').dataTable({
    "bLengthChange": "table-header",
    "bProcessing": true,
    "bServerSide": true,
    "sAjaxSource": base_url + '/order/ajax_list_save_orders',
    "aoColumns": [
        {"sTitle": "Id", "iDataSort": "orders.id", "mData": "id", "bSearchable": false},
        {"sTitle": "Name", "iDataSort": "name", "mData": "name"},
        {"sTitle": "Status", "iDataSort": "status", "mData": "status", "mRender": render_status_save_orders},
        {"sTitle": "$Total", "iDataSort": "total", "mData": "total"},
        {"sTitle": "Date Add", "iDataSort": "date_added", "mData": "date_added"},
        {"sTitle": "Date Edit", "iDataSort": "date_modified", "mData": "date_modified"},
        {"sTitle": "", "bSortable": false, "mData": "action", "bSearchable": false, "mRender": render_action_save_orders},
    ],
});
var tmp = '';
tmp += '<div class="more-order btn-back-save-order"><a class="btn btn-link" style="cursor: pointer; font-size: 18px;" onclick="history.back(1);">Back</a></div>';
$("#list-save-orders_wrapper #list-save-orders_info").parents('.col-xs-6').html(tmp);
var tmp_2 = '';
tmp_2 +='<div class="col-xs-6"><div class="more-order btn-back-save-order-hidden"><a class="btn btn-link" style="cursor: pointer; font-size: 18px;" onclick="history.back(1);">Back</a></div></div>';
$("#list-save-orders_wrapper .dataTables_paginate").parents('.col-xs-6').append(tmp_2);
/**
 * render_status_save_orders
 */
function render_status_save_orders(data, type, full) {
    var html = '<span class="pending-order">saved</span>';
    return html;
}
/**
 * render_action
 */
function render_action_save_orders(data, type, full) {
    var html = '<div class="hidden-sm hidden-xs action-buttons">';
    html += '<a href="' + base_url + '/order/update_orders/' + full.id + '" class="red"><i class="fa fa-edit bigger-130"></i></a>';
    html += '</div>';
    return html;
}

/**
 * delete_user
 */
function delete_user(id) {
    var cf = confirm('Do you want delete this record?');
    if (cf) {
        $.ajax({
            url: base_url + '/manager/delete_user',
            type: 'POST',
            data: {'id': id},
            success: function(data) {
                users_manager.fnDraw(false);
            }
        });
    }
}

var location_manager = $('#location_manager').dataTable({
    "bProcessing": true,
    "bServerSide": true,
    "sAjaxSource": base_url + '/manager/ajax_list_location',
    "aoColumns": [
        {"sTitle": "Id", "iDataSort": "id", "mData": "id", "bSearchable": false},
        {"sTitle": "Name", "iDataSort": "name", "mData": "name"},
        {"sTitle": "", "bSortable": false, "mData": "action", "bSearchable": false, "mRender": render_action_location},
    ],
});
$("#location_manager_wrapper #location_manager_length").html('<div class="banner-button table-header"><a class="btn btn-link" href="' + base_url + '/manager/update_location' + '">Add Location</a></div>');

/**
 * render_action
 */
function render_action_location(data, type, full) {
    var html = '<div class="hidden-sm hidden-xs action-buttons">';
    html += '<a href="javascript:delete_location(' + full.id + ')" class="red"><i class="a fa fa-trash-o bigger-130"></i></a>';
    html += '<a href="' + base_url + '/manager/update_location/' + full.id + '" class="red"><i class="fa fa-edit bigger-130"></i></a>';
    html += '</div>';
    return html;
}

/**
 * delete_user
 */
function delete_location(id) {
    var cf = confirm('Do you want delete this record?');
    if (cf) {
        $.ajax({
            url: base_url + '/manager/delete_location',
            type: 'POST',
            data: {'id': id},
            success: function(data) {
                location_manager.fnDraw(false);
            }
        });
    }
}


var product_type_manager = $('#product_type_manager').dataTable({
    "bProcessing": true,
    "bServerSide": true,
    "sAjaxSource": base_url + '/manager/ajax_list_product_type',
    "aoColumns": [
        {"sTitle": "Id", "iDataSort": "id", "mData": "id", "bSearchable": false},
        {"sTitle": "Name", "iDataSort": "name", "mData": "name"},
        {"sTitle": "", "bSortable": false, "mData": "action", "bSearchable": false, "mRender": render_action_product_type},
    ],
});
$("#product_type_manager_wrapper #product_type_manager_length").html('<div class="banner-button table-header"><a class="btn btn-link" href="' + base_url + '/manager/update_product_type' + '">Add Category</a></div>');
/**
 * render_action
 */
function render_action_product_type(data, type, full) {
    var html = '<div class="action-buttons">';
    html += '<a href="javascript:delete_product_type(' + full.id + ')" class="red"><i class="a fa fa-trash-o bigger-130"></i></a>';
    html += '<a href="' + base_url + '/manager/update_product_type/' + full.id + '" class="red"><i class="fa fa-edit bigger-130"></i></a>';
    html += '</div>';
    return html;
}

/**
 * delete_user
 */
function delete_product_type(id) {
    var cf = confirm('Do you want delete this record?');
    if (cf) {
        $.ajax({
            url: base_url + '/manager/delete_product_type',
            type: 'POST',
            data: {'id': id},
            success: function(data) {
                product_type_manager.fnDraw(false);
            }
        });
    }
}


var product_manager = $('#product_manager').dataTable({
    "bProcessing": true,
    "bServerSide": true,
    "sAjaxSource": base_url + '/manager/ajax_list_product',
    "aoColumns": [
        {"sTitle": "Id", "iDataSort": "id", "mData": "id", "bSearchable": false},
        {"sTitle": "Name", "iDataSort": "name", "mData": "name"},
        {"sTitle": "Unit", "iDataSort": "unit", "mData": "unit"},
        {"sTitle": "Cost", "mData": "cost", "iDataSort": "cost", "mRender": render_propduct_cost},
        {"sTitle": "Date Added", "iDataSort": "date_added", "mData": "date_added"},
        {"sTitle": "Date Modified", "iDataSort": "date_modified", "mData": "date_modified"},
        {"sTitle": "", "bSortable": false, "mData": "action", "bSearchable": false, "mRender": render_action_product},
    ],
});
$("#product_manager_wrapper #product_manager_length").html('<div class="col-xs-6"><div class="banner-button table-header"><a class="btn btn-link" href="' + base_url + '/manager/update_product' + '">Add Product</a></div></div><div class="col-xs-6"><div class="banner-button table-header"><a class="btn btn-link" href="' + base_url + '/manager/upload_product_csv' + '">Upload Product csv</a></div></div>');
/**
 * render_propduct_cost
 */
function render_propduct_cost(data, type, full) {
    return '$' + data;
}

/**
 * render_action
 */
function render_action_product(data, type, full) {
    var html = '<div class="hidden-sm hidden-xs action-buttons">';
    html += '<a href="javascript:delete_product(' + full.id + ')" class="red"><i class="a fa fa-trash-o bigger-130"></i></a>';
    html += '<a href="' + base_url + '/manager/update_product/' + full.id + '" class="red"><i class="fa fa-edit bigger-130"></i></a>';
    html += '</div>';
    return html;
}

/**
 * delete_user
 */
function delete_product(id) {
    var cf = confirm('Do you want delete this record?');
    if (cf) {
        $.ajax({
            url: base_url + '/manager/delete_product',
            type: 'POST',
            data: {'id': id},
            success: function(data) {
                product_manager.fnDraw(false);
            }
        });
    }
}
var product_update_order_ajax_list = $('#list-product-order-update').dataTable({
    "bProcessing": true,
    "bServerSide": true,
    'iDisplayLength': 25,
    'bLengthChange': false,
    "sAjaxSource": base_url + '/orderajax/ajax_list_product',
    "fnServerData": function(sSource, aoData, fnCallback) {
        $('input[name=updatesupplier]:checked').each(function(index, value) {
            aoData.push({"name": "suppliers[]", "value": $(this).val()});
        });
        $('input[name=updatelocation]:checked').each(function(index, value) {
            aoData.push({"name": "locations[]", "value": $(this).val()});
        });
        $('input[name=updateproduct_type]:checked').each(function(index, value) {
            aoData.push({"name": "product_types[]", "value": $(this).val()});
        });
        $.ajax({
            "dataType": 'json',
            "type": "POST",
            "url": sSource,
            "data": aoData,
            "success": fnCallback
        });
    },
    "fnDrawCallback": function(oSettings) {
        $(oSettings.nTHead).hide();
    },
    "aoColumns": [
        {"sTitle": "Image", "bSortable": false, "mData": "image", "mRender": render_updateorder_image},
        {"sTitle": "Name", "bSortable": false, "iDataSort": "name", "mData": "name", "mRender": render_orderproduct_name},
        {"sTitle": "Price", "bSortable": false, "iDataSort": "cost", "mData": "cost", "mRender": render_orderproduct_price},
        {"sTitle": "Qty", "bSortable": false, "mData": "cost", "iDataSort": "cost", "mRender": render_updateorder_qty},
        {"sTitle": "Action", "sClass": "table-input-order-checkbox", "bSortable": false, "mData": "action", "bSearchable": false, "mRender": render_updateorder_action},
    ],
});
function render_updateorder_image(data, type, full) {
    return '<img src="' + public_url + 'upload/' + data + '" with=50 height=50 />';
}
function render_updateorder_qty(data, type, full) {
    var html = '<input onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="qty" value="' + full.qty + '">';
    return html;
}
function render_updateorder_action(data, type, full) {
//    console.log(full);
    var html = '';
    html += '<button data-pd=\'' + JSON.stringify(full) + '\' onclick="add_products_2_order(this)">Add</button>';
    return html;
}
$('input[name=updatesupplier]').change(function() {
    product_update_order_ajax_list.fnDraw(false);
});
$('input[name=updatelocation]').change(function() {
    product_update_order_ajax_list.fnDraw(false);
});
$('input[name=updateproduct_type]').change(function() {
    product_update_order_ajax_list.fnDraw(false);
});


var product_order_mobile_ajax_list = $('#list-product-order-create-mobile').dataTable({
    "bProcessing": true,
    "sDom": '<"ui-toolbar ui-widget-header ui-corner-tl ui-corner-tr ui-helper-clearfix"lfr>t<"ui-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix"ip>T<"clear">R<C><"process_status_order">',
    "bServerSide": true,
    'iDisplayLength': 25,
    'bLengthChange': false,
    "sAjaxSource": base_url + '/orderajax/ajax_list_product',
    "fnServerData": function(sSource, aoData, fnCallback) {
        $('#suplier-multiple-select :selected').each(function(index, selected) {
            aoData.push({"name": "suppliers[]", "value": $(this).val()});
        });
        $('#location-multiple-select :selected').each(function(index, selected) {
            aoData.push({"name": "locations[]", "value": $(selected).val()});
        });
        $('#categories-multiple-select :selected').each(function(index, selected) {
            aoData.push({"name": "product_types[]", "value": $(selected).val()});
        });

        $.ajax({
            "dataType": 'json',
            "type": "POST",
            "url": sSource,
            "data": aoData,
            "success": fnCallback
        });
    },
    "fnDrawCallback": function(oSettings) {
        $(oSettings.nTHead).hide();
    },
    "aoColumns": [
        {"sTitle": "Name", "bSortable": false, "iDataSort": "name", "mData": "name", "mRender": render_orderproduct_name},
        {"sTitle": "Price", "bSortable": false, "iDataSort": "cost", "mData": "cost", "mRender": render_orderproduct_price},
        {"sTitle": "Qty", "bSortable": false, "mData": "cost", "iDataSort": "cost", "mRender": render_orderproduct_qty},
        {"sTitle": "Action", "sClass": "table-input-order-checkbox", "bSortable": false, "mData": "action", "bSearchable": false, "mRender": render_orderproduct_action},
    ],
});
var order_togg = '';
order_togg += '<div class="order-toggle-mobile">';
order_togg += '<div class="order-toggle-mobile-odd"></div>';
order_togg += '<div class="order-toggle-mobile-even"></div>';
order_togg += '<div class="order-toggle-mobile-odd"></div>';
order_togg += '<div class="order-toggle-mobile-even"></div>';
order_togg += '<div class="order-toggle-mobile-odd"></div>';
order_togg += '<div class="order-toggle-mobile-even"></div>';
order_togg += '</div>';
var check_all_order_mobile_html = '';
check_all_order_mobile_html += '<div class="cancel-vs-checkall">';
check_all_order_mobile_html += '<div class="more-order btn-order-create">';
check_all_order_mobile_html += '<a style="cursor: pointer;" onclick="history.back(1);">CANCEL</a>';
check_all_order_mobile_html += '</div>';
check_all_order_mobile_html += '<div class="check-all-order" id="check-all-order">Check All<input type="checkbox" onClick="checkAll(\'list-product-order-create-mobile\', true)" /><br/></div>';
check_all_order_mobile_html += '</div>';
$("#list-product-order-create-mobile_wrapper .dataTables_filter").parents('div .ui-toolbar').css({"background": "none", "color": "#000", "border": "none"});
$("#list-product-order-create-mobile_info").parents('div .ui-toolbar').css({"background": "none", "border": "none"});
$("#list-product-order-create-mobile_wrapper .dataTables_filter").parents('div .ui-toolbar').after(check_all_order_mobile_html);
$("#list-product-order-create-mobile_wrapper .dataTables_filter").parents('div .ui-toolbar').after(order_togg);

var process_status_order_html = '';
process_status_order_html += '<div class="banner-button btn-order-create">';
process_status_order_html += '<a href="' + base_url + '/order/checkout" class="" id=checkout>REVIEW & SEND</a>';
process_status_order_html += '</div>';
process_status_order_html += '<div class="banner-button btn-order-create">';
process_status_order_html += '<a href="' + base_url + '/order/saveNewList" class="" id=checkout>SAVE ORDER</a>';
process_status_order_html += '</div>';
$("#list-product-order-create-mobile_wrapper .process_status_order").html(process_status_order_html);

var product_order_ajax_list = $('#list-product-order-create').dataTable({
    "bProcessing": true,
    "sDom": '<"ui-toolbar ui-widget-header ui-corner-tl ui-corner-tr ui-helper-clearfix"lfr>t<"ui-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix"ip>T<"clear">R<C><"process_status_order">',
    "bServerSide": true,
    'iDisplayLength': 25,
    'bLengthChange': false,
    "sAjaxSource": base_url + '/orderajax/ajax_list_product',
    "fnServerData": function(sSource, aoData, fnCallback) {
        $('input[name=supplier]:checked').each(function(index, value) {
            aoData.push({"name": "suppliers[]", "value": $(this).val()});
        });
        $('input[name=location]:checked').each(function(index, value) {
            aoData.push({"name": "locations[]", "value": $(this).val()});
        });
        $('input[name=product_type]:checked').each(function(index, value) {
            aoData.push({"name": "product_types[]", "value": $(this).val()});
        });

        $.ajax({
            "dataType": 'json',
            "type": "POST",
            "url": sSource,
            "data": aoData,
            "success": fnCallback
        });
    },
    "fnDrawCallback": function(oSettings) {
        $(oSettings.nTHead).hide();
    },
    "aoColumns": [
        {"sTitle": "Image", "bSortable": false, "mData": "image", "mRender": render_orderproduct_image},
        {"sTitle": "Name", "bSortable": false, "iDataSort": "name", "mData": "name", "mRender": render_orderproduct_name},
        {"sTitle": "Price", "bSortable": false, "iDataSort": "cost", "mData": "cost", "mRender": render_orderproduct_price},
        {"sTitle": "Qty", "bSortable": false, "mData": "cost", "iDataSort": "cost", "mRender": render_orderproduct_qty},
        {"sTitle": "Action", "sClass": "table-input-order-checkbox", "bSortable": false, "mData": "action", "bSearchable": false, "mRender": render_orderproduct_action},
    ],
});
var process_status_order_html = '';
process_status_order_html += '<div class="more-order btn-order-create">';
process_status_order_html += '<a style="cursor: pointer;" onclick="history.back(1);">CANCEL</a>';
process_status_order_html += '</div>';
process_status_order_html += '<div class="banner-button btn-order-create">';
process_status_order_html += '<a href="' + base_url + '/order/checkout" class="" id=checkout>REVIEW & SEND</a>';
process_status_order_html += '</div>';
process_status_order_html += '<div class="banner-button btn-order-create">';
process_status_order_html += '<a href="' + base_url + '/order/saveNewList" class="" id=checkout>SAVE ORDER</a>';
process_status_order_html += '</div>';
$("#list-product-order-create_wrapper .process_status_order").html(process_status_order_html);

var check_all_order_html = '';
check_all_order_html += '<div class="check-all-order" id="check-all-order">Check All<input id="input-check-all-order" type="checkbox" onClick="checkAll(\'list-product-order-create\', true)" /><br/></div>';
$("#list-product-order-create_wrapper .dataTables_filter").parents('div .ui-toolbar').css({"float": "left", "width": "50%", "background": "none", "color": "#000", "border": "none"});
$("#list-product-order-create_info").parents('div .ui-toolbar').css({"background": "none", "border": "none"});
$("#list-product-order-create_wrapper .dataTables_filter").parents('div .ui-toolbar').after(check_all_order_html);
function checkAll(formname, checktoggle)
{
    var i = 0;
    var checkboxes = new Array();
    var sessionProduct = new Array();
    var inputALl = document.getElementById("input-check-all-order");
    var products = new Array();
    checkboxes = document.getElementById(formname).getElementsByTagName('input');
    var j = 0;
    if (inputALl.checked) {
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].type === 'checkbox') {
                if (checkboxes[i].checked != checktoggle) {
                    checkboxes[i].checked = checktoggle;
                    var parent = $(checkboxes[i]).parents('tr');
                    var checkbox = parent.find('input[name=order_prd_id]');
                    var tmp = checkbox.parents('tr');
                    var id = checkbox.val();
                    var qty = tmp.find('input[name=qty]').val();
                    sessionProduct[j] = id + "-" + qty;
                    products[id] = checkbox;
                    j++;
                }
            }
        }
        addAllOrder(sessionProduct, products);
    } else {
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].type === 'checkbox') {
                if (checkboxes[i].checked = checktoggle) {
                    checkboxes[i].checked = false;
                    var parent = $(checkboxes[i]).parents('tr');
                    var checkbox = parent.find('input[name=order_prd_id]');
                    var tmp = checkbox.parents('tr');
                    var id = checkbox.val();
                    var qty = tmp.find('input[name=qty]').val();
                    sessionProduct[j] = id;
                    products[id] = checkbox;
                    j++;
                }
            }
        }
        removeAllOrder(sessionProduct, products);
    }
}

/**
 * Comment
 */
function submit_btn_checkAll() {
    var submit = true;
    var checkboxes = new Array();
    checkboxes = document.getElementById('list-product-order-create').getElementsByTagName('input');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].type === 'checkbox') {
            if (checkboxes[i].checked != true) {
                submit = false;
            }
        }
    }
    var parent = document.getElementById('check-all-order').getElementsByTagName('input');
    if (submit) {
        parent[0].checked = true;
    }
    else {
        parent[0].checked = false;
    }
}
$('input[name=supplier]').change(function() {
    product_order_ajax_list.fnDraw();
});
$('input[name=location]').change(function() {
    product_order_ajax_list.fnDraw();
});
$('input[name=product_type]').change(function() {
    product_order_ajax_list.fnDraw();
});
/**
 * render_orderproduct_image
 */
function render_orderproduct_image(data, type, full) {
    if(data == null)
        return '<img src="' + public_url + 'upload/default_product.png" with=100 height=100/>';
    else
        return '<img src="' + public_url + 'upload/' + data + '" with=100 height=100/>';
}
/**
 * render_orderproduct_name
 */
function render_orderproduct_name(data, type, full) {
    return data;
}
/**
 * render_orderproduct_name
 */
function render_orderproduct_price(data, type, full) {
    var html = '<div class="price">' + format_money(data) + '</div>';
    html += '<div class="unit">' + full.unit + '</div>';
    return html;
}
/**
 * render_orderproduct_qty
 */
function render_orderproduct_qty(data, type, full) {
    var html = '<input onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="qty" value="' + full.qty + '">';
    if (!full.in_order) {
        html += '<input type=button name="add_qty" class="btn-order btn" disabled value="">';
    }
    else {

        html += '<input type=button name="add_qty" class="btn-order btn" value="">';
    }
    return html;
}
/**
 * render_orderproduct_action
 */
function render_orderproduct_action(data, type, full) {
    var html = '';
    if (!full.in_order) {
        html += '<input onClick="submit_btn_checkAll()" type=checkbox name="order_prd_id" value="' + full.id + '">';
    }
    else {
        html += '<input onClick="submit_btn_checkAll()" type=checkbox checked name="order_prd_id" value="' + full.id + '">';
    }
    return html;
}



var ajax_list_checkout = $('#list-product-order-checkout').dataTable({
    "bProcessing": true,
    "sDom": 'R<C><"process_status_order">T<"clear"><"ui-toolbar ui-widget-header ui-corner-tl ui-corner-tr ui-helper-clearfix"lfr>t<"ui-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix"ip>',
    "bServerSide": true,
    "bPaginate": false,
    "bInfo": false,
    'bLengthChange': false,
    "sAjaxSource": base_url + '/orderajax/ajax_list_checkout',
    "fnServerData": function(sSource, aoData, fnCallback) {
        $.ajax({
            "dataType": 'json',
            "type": "POST",
            "url": sSource,
            "data": aoData,
            "success": function(data)
            {
                fnCallback(data);
                $('#list-product-order-checkout').find('.total').text(format_money(data.totals.total));
            }
        });
    },
    "fnInitComplete": function(oSettings, json) {
        console.log(oSettings.aoData)
    },
    "aoColumns"
            : [
                {"sTitle": "Image", "bSortable": false, "mData": "image", "mRender": render_checkoutproduct_image},
                {"sTitle": "Name", "bSortable": false, "iDataSort": "name", "mData": "name", "mRender": render_checkoutproduct_name},
                {"sTitle": "Price", "bSortable": false, "iDataSort": "cost", "mData": "cost", "mRender": render_checkoutproduct_price},
                {"sTitle": "Qty", "bSortable": false, "mData": "cost", "iDataSort": "cost", "mRender": render_checkoutproduct_qty},
                {"sTitle": "Sub total", "bSortable": false, "mData": "cost", "iDataSort": "cost", "mRender": render_checkoutproduct_subtotal},
                {"sTitle": "Action", "bSortable": false, "mData": "action", "bSearchable": false, "mRender": render_checkoutproduct_action},
            ],
});
$('#list-product-order-checkout').find('.total').text(format_money());
/**
 * render_orderproduct_image
 */
function render_checkoutproduct_image(data, type, full) {
    return '<img src="' + public_url + 'upload/' + data + '" with=50 height=50/>';
}
/**
 * render_orderproduct_name
 */
function render_checkoutproduct_name(data, type, full) {
    return data;
}
/**
 * render_orderproduct_name
 */
function render_checkoutproduct_price(data, type, full) {
    var html = '<div class="price">' + format_money(data) + '</div>';
    html += '<div class="unit">' + full.unit + '</div>';
    return html;
}
function render_checkoutproduct_subtotal(data, type, full) {
    var subTotal = full.qty * full.cost;
    var html = '<div class="price">' + format_money(subTotal) + '</div>';
    return html;
}
/**
 * render_orderproduct_qty
 */
function render_checkoutproduct_qty(data, type, full) {
    var html = '<input onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="qty" value="' + full.qty + '">';
    if (!full.in_order) {
        html += '<input type=button name="add_qty" class="btn" disabled value="Update">';
    }
    else {

        html += '<input type=button name="add_qty" class="btn btn btn-success" value="Update">';
    }
    return html;
}
/**
 * render_orderproduct_action
 */
function render_checkoutproduct_action(data, type, full) {
    var html = '';
    html += '<input type=hidden name="checkout_prd_id" value="' + full.id + '">';
    html += '<a class="red" href="javascript:removeOrderCheckout(' + full.id + ')"><i class="a fa fa-trash-o bigger-130"></i></a>';
    return html;
}


function format_money(n, currency) {
    n = parseFloat(n);
    if (isEmpty(currency))
        currency = '$';
    return currency + "" + n.toFixed(2).replace(/./g, function(c, i, a) {
        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
    });
}

function isEmpty(str) {
    return (!str || 0 === str.length);
}
/**
 * addAllOrder
 */
function addAllOrder(e, p) {
    var parent = '';
    $.ajax({
        url: base_url + '/orderajax/addAllOrder',
        type: 'POST',
        dataType: "json",
        data: {'sessionProduct': e},
        success: function(data) {
            $.each(data.success, function(key, item) {
                if (p[key] != undefined) {
                    parent = p[key].parents('tr');
                    parent.find('input[name=add_qty]').attr('disabled', false);
                    parent.find('input[name=add_qty]').addClass('btn-success');
                }
            });
        }
    });
}
function removeAllOrder(e, p) {
    $.ajax({
        url: base_url + '/orderajax/removeAllOrder',
        type: 'POST',
        dataType: "json",
        data: {'id': e},
        success: function(data) {
            $.each(data.success, function(key, item) {
                if (p[key] != undefined) {
                    parent = p[key].parents('tr');
                    parent.find('input[name=add_qty]').attr('disabled', true);
                    parent.find('input[name=add_qty]').removeClass('btn-success');
                }
            });
        }
    });
}

/**
 * addOrder
 */
function addOrder(e) {
    var parent = e.parents('tr');
    var id = e.val();
    var qty = parent.find('input[name=qty]').val();
    $.ajax({
        url: base_url + '/orderajax/addOrder',
        type: 'POST',
        dataType: "json",
        data: {'id': id, qty: qty},
        success: function(data) {
            parent.find('input[name=add_qty]').attr('disabled', false);
            parent.find('input[name=add_qty]').addClass('btn-success');
        },
        error: function(xhr, status, error) {
            unCheckCheckbox(e)
        }
    });
}

function removeOrder(e) {
    var id = e.val();
    var parent = e.parents('tr');
    $.ajax({
        url: base_url + '/orderajax/removeOrder',
        type: 'POST',
        dataType: "json",
        data: {'id': id},
        success: function(data) {
            parent.find('input[name=add_qty]').attr('disabled', true);
            parent.find('input[name=add_qty]').removeClass('btn-success');
        },
        error: function(xhr, status, error) {
            checkCheckbox(e)
        }
    });
}

/**
 * addOrder
 */
function addOrderCheckout(e) {
    console.log(e);
    var parent = e.parents('tr');
    var id = e.val();
    var qty = parent.find('input[name=qty]').val();
    $.ajax({
        url: base_url + '/orderajax/addOrder',
        type: 'POST',
        dataType: "json",
        data: {'id': id, qty: qty},
        success: function(data) {

            ajax_list_checkout.fnDraw(false);
        },
        error: function(xhr, status, error) {
            unCheckCheckbox(e)
        }
    });
}

function removeOrderCheckout(id) {
    $.ajax({
        url: base_url + '/orderajax/removeOrder',
        type: 'POST',
        dataType: "json",
        data: {'id': id},
        success: function(data) {
            ajax_list_checkout.fnDraw(false);
        },
        error: function(xhr, status, error) {
            checkCheckbox(e)
        }
    });
}

/**
 * unCheckCheckbox
 */
function unCheckCheckbox(e) {
    $(e).prop('checked', false);
    $(e).attr("checked", false);
}
/**
 * unCheckCheckbox
 */
function checkCheckbox(e) {
    $(e).prop('checked', true);
    $(e).attr("checked", true);
}
var features_manager = $('#features_manager').dataTable({
    "bProcessing": true,
    "bServerSide": true,
    "sAjaxSource": base_url + '/features/ajax_list_features',
    "aoColumns": [
        {"sTitle": "Id", "iDataSort": "id", "mData": "id", "bSearchable": false},
        {"sTitle": "Image", "iDataSort": "image", "mData": "image", "mRender": render_image_features},
        {"sTitle": "", "bSortable": false, "mData": "action", "bSearchable": false, "mRender": render_action_features},
    ],
});
$("#features_manager_wrapper #features_manager_length").html('<div class="col-xs-6"><div class="banner-button table-header"><a class="btn btn-link" href="' + base_url + '/features/update_features' + '">Add Features</a></div></div>');


/**
 * render_action
 */
function render_action_features(data, type, full) {
    var html = '<div class="action-buttons">';
    html += '<a href="javascript:delete_features(' + full.id + ')" class="red"><i class="a fa fa-trash-o bigger-130"></i></a>';
    html += '<a href="' + base_url + '/features/update_features/' + full.id + '" class="red"><i class="fa fa-edit bigger-130"></i></a>';
    html += '</div>';
    return html;
}
/**
 * render_image
 */
function render_image_features(data, type, full) {
    return '<img src="' + public_url + 'upload/frontend/' + data + '" with=100 height=100 />';
}

/**
 * delete_user
 */
function delete_features(id) {
    var cf = confirm('Do you want delete this record?');
    if (cf) {
        $.ajax({
            url: base_url + '/features/delete_features',
            type: 'POST',
            data: {'id': id},
            success: function(data) {
                features_manager.fnDraw(false);
            }
        });
    }
}
var about_manager = $('#about_manager').dataTable({
    "bProcessing": true,
    "bServerSide": true,
    "sAjaxSource": base_url + '/features/ajax_list_AboutPage',
    "aoColumns": [
        {"sTitle": "Id", "iDataSort": "id", "mData": "id", "bSearchable": false},
        {"sTitle": "Image", "iDataSort": "image", "mData": "image", "mRender": render_image_aboutpage},
        {"sTitle": "", "bSortable": false, "mData": "action", "bSearchable": false, "mRender": render_action_aboutpage},
    ],
});
$("#about_manager_wrapper #about_manager_length").html('<div class="col-xs-6"><div class="banner-button table-header"><a class="btn btn-link" href="' + base_url + '/features/updateAboutPage' + '">Add About Content</a></div></div>');


/**
 * render_action
 */
function render_action_aboutpage(data, type, full) {
    var html = '<div class="action-buttons">';
    html += '<a href="javascript:delete_features(' + full.id + ')" class="red"><i class="a fa fa-trash-o bigger-130"></i></a>';
    html += '<a href="' + base_url + '/features/updateAboutPage/' + full.id + '" class="red"><i class="fa fa-edit bigger-130"></i></a>';
    html += '</div>';
    return html;
}
/**
 * render_image
 */
function render_image_aboutpage(data, type, full) {
    return '<img src="' + public_url + 'upload/frontend/' + data + '" with=100 height=100 />';
}

/**
 * delete_user
 */
function delete_features(id) {
    var cf = confirm('Do you want delete this record?');
    if (cf) {
        $.ajax({
            url: base_url + '/features/delete_features',
            type: 'POST',
            data: {'id': id},
            success: function(data) {
                about_manager.fnDraw(false);
            }
        });
    }
}
var contact_manager = $('#contact_manager').dataTable({
    "bProcessing": true,
    "bServerSide": true,
    "sAjaxSource": base_url + '/contact/ajax_list_contact',
    "aoColumns": [
        {"sTitle": "Id", "iDataSort": "id", "mData": "id"},
        {"sTitle": "Email", "iDataSort": "email", "mData": "email"},
        {"sTitle": "Message", "iDataSort": "message", "mData": "message"},
        {"sTitle": "Reply", "iDataSort": "reply", "mData": "reply", "mRender": render_contact_reply},
        {"sTitle": "", "bSortable": false, "mData": "action", "bSearchable": false, "mRender": render_action_contact},
    ],
});


/**
 * render_action
 */
function render_action_contact(data, type, full) {
    var html = '<div class="action-buttons">';
    html += '<a href="javascript:delete_contact(' + full.id + ')" class="red"><i class="a fa fa-trash-o bigger-130"></i></a>';
    html += '</div>';
    return html;
}
/**
 * render_image
 */
function render_contact_reply(data, type, full) {
    var html = "";
    if (full.reply == 0) {
        html += 'no';
    }
    else {
        html += 'yes';
    }

    return html;
}

/**
 * delete_user
 */
function delete_contact(id) {
    var cf = confirm('Do you want delete this record?');
    if (cf) {
        $.ajax({
            url: base_url + '/contact/delete_contact',
            type: 'POST',
            data: {'id': id},
            success: function(data) {
                contact_manager.fnDraw(false);
            }
        });
    }
}
tinymce.init({
    selector: "textarea:not(.textarea-no-styles)"
});