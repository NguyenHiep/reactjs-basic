$(document).ready(function() {
    $('ul#menu>li>a[href="#"]').click(function(){
        $(this).next('ul').slideToggle("slow");
        return false;
    });
    $('#check_all').change(function(){
        $('.table input:checkbox').prop('checked', this.checked);
    });
    $('#search').keyup(function(e){
        if (e.which==13) {
            $('#post_form').submit();
        }
    });
    $('i').hover(function(){
      $(this).tooltip('show')
    });
    //Intro
    $('#start-intro').click(function(){
        var intro = introJs();
          intro.setOptions({
            steps: [
              {
                element: '#step1',
                intro: "Danh sách quản lý.",
                position: 'right'
              },
              {
                element: '#step2',
                intro: "Thanh điều hướng, cho biết vị trí trang hiện tại",
                position: 'bottom'
              },
              {
                element: '#step3',
                intro: 'Danh sách các tác vụ như thêm, xóa, sửa.',
                position: 'right'
              },
              {
                element: '#step4',
                intro: 'Danh sách các record hiện có.'
              },
              {
                element: '#step5',
                intro: 'Phân trang kết quả hiển thị, click chuột để di chuyển giữa các trang.'
              },
              {
                element: '#step6',
                intro: 'Những ghi chú giải thích cho các icon.'
              }
            ]
          });

          intro.start();
    });
    $('.js-action-select-books').select2();
    // Select2 select box js
    $('.js-action-select').select2();
    // Show tag
    $('.js-action-select-tags').select2({
      tags: true
    });
});