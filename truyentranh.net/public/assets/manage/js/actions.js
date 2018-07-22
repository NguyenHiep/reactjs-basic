"use strict";
$(document).ready(function () {
  ajaxSetup();
  var elemBody    = $('body'),
      datatables  = getSelector('datatables'),
	  objDataTables = elemBody.find(datatables).eq(0);
      loadDatatables(objDataTables);
      getBooksTool();
    $(document).on('change', 'input[name=leech_type]', function () {
        getBooksTool();
    });
    $(document).on('change', 'select[name=book_id]', function () {
        var self = $(this);
        var url = self.data('ajax-url');
        $.ajax({
            type: 'GET',
            url: url,
            data: {
              book_id : self.val()
            },
            dataType: 'json',
            success: function (res) {
                if (res.result === 'success') {
                    var resutl = $('#info-books-ajax');
                    var html = '<div class="media media-followuser">'+
                                    '<div class="media-left">'+
                                        '<a href="javascript:;">'+
                                            '<img src="'+ BASE_URL + '/'+PATH_IMAGE_THUMBNAIL_BOOK + res.data.image+'" alt="'+res.data.name+'" class="image_follow" />'+
                                        '</a>'+
                                    '</div>'+
                                    '<div class="media-body">'+
                                        '<a href="javascript:;" title="'+res.data.name+'">'+
                                        '<h4 class="manga-newest">'+res.data.name+'</h4>'+
                                        '</a>'+
                                        '<div class="description-user">'+
                                            '<span>Tên khác:</span> '+res.data.name_dif+'<br/>'+
                                            '<span>Tác giả:</span> '+res.data.author+'<br/>'+
                                            '<div><strong>Nội dung:</strong> '+res.data.content+' </div><br/>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>';
                    resutl.html(html);
                }
            },
            error: function (res) {
                var mess = 'Book items errors';
                if (res.responseJSON.message != 'undefined') {
                    mess = res.responseJSON.message;
                }
                alert(mess);
            }
        });
    });
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
}
function getBooksTool() {
    var elemBody        = $('body'),
        leech_type      = parseInt(elemBody.find('input[name=leech_type]:checked').val()),
        content_chapter = elemBody.find('.content-chapters').eq(0),
        content_books   = elemBody.find('.content-books').eq(0);
        content_chapter.addClass('hide');
        content_books.addClass('hide');
        switch (leech_type){
            case 1:
                content_chapter.removeClass('hide');
                break;
            case 2: content_books.removeClass('hide');
        }
}