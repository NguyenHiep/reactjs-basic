"use strict";

$(document).ready(function () {
  ajaxSetup();
  var elemBody    = $('body'),
      datatables  = getSelector('datatables'),
	  objDataTables = elemBody.find(datatables).eq(0);
      loadDatatables(objDataTables);
});
function ajaxSetup() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}
function getSelector(str) {
    var selector = '[data-provide~="'+ str +'"]';
    if ( str.indexOf('$ ') == 0 ) {
        selector = str.substr(2);
    }
    return selector;
}

function loadDatatables(obj) {
    var self  = $('#' + obj.attr('id')),
        limit = $(self).data('pagelength'),
        url   = $(self).data('ajax');
    if (typeof url != 'undefined') {
        window.Tables = $(self).DataTable({
            pageLength: limit,
            aaSorting: [],
            processing: true,
            serverSide: true,
            ajax: url,
            autoWidth: false,
        });
    } else {
        window.Tables = $(self).DataTable({
            pageLength: 25,
            aaSorting: [],
            autoWidth: false
        });
    }
}

function deleteItem (that) {
    var $this = $(that),
        tr    = $this.parents('tr'),
        url   = $this.data('ajax-url'),
        type  = $this.data('type'),
        table = window.Tables,
        mess  = 'Are you sure to hide this record?';
    if (typeof type === 'undefined') {
        mess = 'Are you sure to delete this record?';
    }
    console.log(tr);
    if (confirm(mess)) {
        $.ajax({
            type: 'DELETE',
            url: url,
            dataType: 'json',
            success: function (res) {
                if (res.status === 'success') {
                    alert(res.message);
                    table.row(tr)
                        .remove()
                        .draw();
                } else {
                    alert(res.message);
                    table.draw();
                }
            },
            error: function (res) {
                var mess = 'Sorry it appears there was a problem deleting this';
                if (res.responseJSON.message) {
                    mess = res.responseJSON.message;
                }
                alert(mess);
            }
        });
    }
};