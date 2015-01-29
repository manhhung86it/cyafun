$(document).ready(function() {
//    js cho phan nap the cyafun
    $("#tabs-form-payment form:not(:first)").hide();
    $("#tab-menu div input:not(:first)").prop('checked', false);
    $("#tab-menu div input:first").prop('checked', true);
    $("#tab-menu div input").click(function() {
        var active = $(this).val();
        $("#tab-menu div input").prop('checked', false);
        $(this).prop('checked', true);
        $("#tabs-form-payment form").hide();
        $(active).fadeIn();
    });
    $("#mobile").submit(function() {
        var data = $(this).serialize();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: base_url + '/response/mobile',
            data: data,
            success: function(data) {
                if (data.m_Status == 1) {
                    var url = base_url + '/payment/mobilePayment';
                    $(location).attr('href', url);
                }
            }
        });
        return false;
    });
    $("#pm").submit(function() {
        var data = $(this).serialize();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: base_url + '/response/pm',
            data: data,
            success: function(data) {
                if (data.message == 'Success') {
                    if (data.data.nextstep == 2) {
                        var url = base_url + '/payment/pmPayment';
                        $(location).attr('href', url);
                    }
                }
            }
        });
        return false;
    });
    $("#other").submit(function() {
        var data = $(this).serialize();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: base_url + '/response/other',
            data: data,
            success: function(data) {
                if (data.message == 'Success') {
                    if (data.data.nextstep == 2) {
                        var url = base_url + '/payment/otherPayment';
                        $(location).attr('href', url);
                    }
                }
            }
        });
        return false;
    });

    //    end js cho phan nap the cyafun

    $("input[type='password']").attr("autocomplete", "off");

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

    $("#form-update-password").validate({
        rules: {
            oldpass: {
                required: true,
                minlength: 7,
                atLeastOneNum: true,
                atLeastOneAlphabet: true
            },
            newpass: {
                required: true,
                minlength: 7,
                atLeastOneNum: true,
                atLeastOneAlphabet: true
            },
            cf_newpass: {
                equalTo: "#newpass"
            }
        },
        messages: {
            oldpass: {
                required: "Minimum of 7 characters.  At least one must be numeric and at least one must be alpha",
                minlength: "Minimum of 7 characters.  At least one must be numeric and at least one must be alpha",
                atLeastOneNum: 'Minimum of 7 characters.  At least one must be numeric and at least one must be alpha',
                atLeastOneAlphabet: 'Minimum of 7 characters.  At least one must be numeric and at least one must be alpha'
            },
            newpass: {
                required: "Minimum of 7 characters.  At least one must be numeric and at least one must be alpha",
                minlength: "Minimum of 7 characters.  At least one must be numeric and at least one must be alpha",
                atLeastOneNum: 'Minimum of 7 characters.  At least one must be numeric and at least one must be alpha',
                atLeastOneAlphabet: 'Minimum of 7 characters.  At least one must be numeric and at least one must be alpha'
            },
            cf_newpass: {
                equalTo: "Passwords do not match. Please re-enter your password"
            }
        },
        errorPlacement: function(error, element) {
            var name = $(element).attr("name");
            error.appendTo($("#" + name + "_validate"));
        }
    });
    $("#register_form").validate({
        rules: {
            InputDisplayName: {
                required: true,
                minlength: 3,
            },
            InputUsername: {
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
            TermOfUse: {
                required: true,
            },
        },
        messages: {
            InputDisplayName: {
                required: 'Please enter name',
            },
            InputUsername: {
                required: 'Please enter user name',
                minlength: 3,
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
            TermOfUse: {
                required: 'Please read and accept the terms of use',
            },
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
            us_username: {
                required: true,
            },
            us_name_display: {
                required: true,
            },
            us_fullname: {
                required: true,
            },
            us_email: {
                required: true,
                email: true,
                maxlength: 78,
            }

        },
        messages: {
            us_username: {
                required: 'Please enter your first name',
            },
            us_name_display: {
                required: 'Please enter your last name',
            },
            us_fullname: {
                required: 'Please enter your last name',
            },
            us_email: {
                required: "Email invalid",
                email: "Email invalid",
                maxlength: "Email invalid",
            },
            postcode: {
                required: 'Please enter your postcode',
                digits: 'Postcode invalid',
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

// phan quan ly user trong cyafun
var users_manager = $('#users_manager').dataTable({
    "bLengthChange": "table-header",
    "bProcessing": true,
    "bServerSide": true,
    "sAjaxSource": base_url + '/manager/ajax_list_user',
    "aoColumns": [
        {"sTitle": "Id", "iDataSort": "us_id", "mData": "us_id", "bSearchable": false},
        {"sTitle": "Name", "iDataSort": "us_username", "mData": "us_username"},
        {"sTitle": "Name display", "iDataSort": "us_name_display", "mData": "us_name_display"},
        {"sTitle": "Email", "iDataSort": "us_email", "mData": "us_email"},
        {"sTitle": "Balance", "iDataSort": "us_balance", "mData": "us_balance"},
        {"sTitle": "Status", "iDataSort": "us_status", "mData": "us_status"},
        {"sTitle": "", "bSortable": false, "mData": "action", "bSearchable": false, "mRender": render_action_user},
    ],
});
$("#users_manager_wrapper #users_manager_length").html('<div class="banner-button table-header"><a class="btn btn-link" href="' + base_url + '/manager/update_user' + '">Add user</a></div>');

/**
 * render_action
 */
function render_action_user(data, type, full) {
    var html = '<div class="hidden-sm hidden-xs action-buttons">';
    html += '<a href="javascript:delete_user(' + full.us_id + ')" class="red"><i class="a fa fa-trash-o bigger-130"></i></a>';
    html += '<a href="' + base_url + '/manager/update_user/' + full.us_id + '" class="red"><i class="fa fa-edit bigger-130"></i></a>';
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
            data: {'us_id': id},
            success: function(data) {
                users_manager.fnDraw(false);
            }
        });
    }
}
// ket thuc phan quan ly user trong cyafun

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
    forced_root_block: "",
    force_br_newlines: true,
    force_p_newlines: false,
    selector: "textarea:not(.textarea-no-styles)"
});