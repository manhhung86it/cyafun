function add_products_2_order(node_info) {
    var pd_info = $(node_info).data("pd");
    var supplier = {id: pd_info.supplier, name: pd_info.s_name, method: pd_info.method};
    var product = pd_info;

    if ($('div').hasClass('sp_' + supplier.id)) {
        if ($('tr').hasClass('pd_' + product.id)) {
            var pd_quanlity = $('div.sp_' + supplier.id + ' table tbody tr.pd_' + product.id + ' .total_product').val();
            pd_quanlity++;
            $('div.sp_' + supplier.id + ' table tbody tr.pd_' + product.id + ' .total_product').val(pd_quanlity)
        } else {
            $('div.sp_' + supplier.id + ' table.table-order-product tbody').append(build_pd_html(product,supplier));
        }
        changeTotalPrice();
    } else {
        var no_sp = $("div.update-orders-content").length + 1;
        var block_sp_html = '<div class="update-orders-content sp_' + supplier.id + '"><div class="view-order-number">#' + no_sp + '</div>';
        block_sp_html += build_sp_html(supplier);
        block_sp_html += '<div><table id="" class="table-view-orders table table-striped table-bordered table-hover table-order-product">' +
                '<thead> <tr>' +
                '<th class="total" colspan="2">Image</th>' +
                '<th class="total" colspan="2">Name</th>' +
                '<th class="total" colspan="2">Price</th>' +
                '<th class="total" colspan="2">Qty</th>  ' +
                '<th>Action</th>' +
                '<th class="total" colspan="2">Sub total</th>' +
                '</tr></thead>' +
                '<tbody>' + build_pd_html(product,supplier) + '</tbody>' +
                '<tfoot><tr><td class="total" colspan="8"></td><td class="total" colspan="2">Total</td><td class="total" colspan="2"><div class="price"><input type="hidden" name="tottal_price_product" value="' + product.cost + '"><lable  class="label_total_price_product" >$' + parseFloat(product.cost).toFixed(2) + '</lable></div></td></tr></tfoot>' +
                '</table></div>';
        block_sp_html += '</div>';
        $('#dv-content-order').append(block_sp_html);
        changeTotalPrice();
    }
}

function build_pd_html(pd_info,supplier) {
    var pd_html = '<tr class="pd_' + pd_info.id + '">' +
            '<td class="total" colspan="2"><img src="' + public_url + 'upload/default.jpg" with="50" height="50/"><input type=hidden name="supplier_id[]" value="' + supplier.id + '"></td>' +
            '<td class="total" colspan="2">' + pd_info.name + '<input type=hidden name="prd_name[]" value="' + pd_info.name + '"></td>' +
            '<td class="total" colspan="2"><input type="hidden" name="price_prd[]" value="' + pd_info.cost + '"><input type=hidden name="price_checkout" value="' + pd_info.cost + '"><div class="price">$' + parseFloat(pd_info.cost).toFixed(2) + '</div><div class="unit">' + pd_info.unit + '</div></td>' +
            '<td class="total" colspan="2"><input class="total_product" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" name="total_product[]" value="1">' +
            '<input type=button onclick="changeTotalPrice()" name="add_qty" class="input-update-order btn-checkout btn" value=""></td>' +
            '<td class="total" colspan="2"><input type="hidden" name="checkout_prd_id[]" value="' + pd_info.id + '"><a class="red delete-product"><i class="a fa fa-trash-o bigger-130"></i></a></td>' +
            '<td class="total" colspan="2"><div class="price"><input type="hidden" class="price_product"ttt name="price_product" value="' + pd_info.cost + '"><lable name="price_each_product">$' + parseFloat(pd_info.cost).toFixed(2) + '</lable></div></td>' +
            '</tr>';
    return pd_html;
}

function build_sp_html(sp_info) {
    var method_name = "Email";
    if (sp_info.method) {
        method_name = "Fax";
    }
    var sp_html = '<div class="view-order-header">' +
            '<table id="" class="table-view-orders table table-striped table-bordered table-hover">' +
            '<thead><tr><th class="middle">Supplier</th><th class="middle">Method</th></tr></thead>' +
            '<tbody><tr><td class="middle">' + sp_info.name + '</td><td class="middle">' + method_name + '</td></tr></tbody>' +
            '</table>' +
            '</div>';
    return sp_html;
}
