// frontend/assets/css/js/script.js
// - Gọi ajax khi click Thêm vào giỏ
$(document).ready(function() {
    // Gọi sk click khi click Thêm vào giỏ
    $('.add-to-cart').click(function () {
       // Cần lấy ra id sp đang click, dựa vào
        //thuộc tính data-id đã khai báo
        var product_id = $(this).attr('data-id');
        // Gọi ajax để thêm sp với id trên vào giỏ
        $.ajax({
            url: 'index.php?controller=cart&action=add',
            method: 'GET',
            data: {
                product_id: product_id
            },
            success: function(data) {
                // console.log(data);
                // Hiển thị kết quả cho user
                //search tab Elements class=ajax-message
                $('.ajax-message')
                    .html('Thêm sp vào giỏ thành công')
                    .addClass('ajax-message-active');
                // Chỉ hiển thị message trong 3s
                // Hàm setTimeout chạy sau 1 khoảng gian
                setTimeout(function(){
                    $('.ajax-message')
                        .removeClass('ajax-message-active');
                }, 3000);

                // - Tăng số lượng giỏ hàng lên 1
                // Lấy ra số lượng hiện tại
                var cart_total = $('.cart-amount').html();
                // Tăng số lượng lên 1
                cart_total++;
                // Set lại kết quả mới số lượng hiện tại
                $('.cart-amount').html(cart_total);
                // TEmplate còn có trên mobile
                $('.cart-amount-mobile').html(cart_total);
            }
        });
    });
});