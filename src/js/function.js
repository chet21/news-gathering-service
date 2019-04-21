// function send(object, address){
//     var function_response = {};
//     $.ajax({
//         url: address,
//         type: 'post',
//         data: object,
//         success: function (response) {
//             function_response.r = response;
//         }
//     });
//     return function_response;
// }

// function enter() {
//     $('.err').html('');
//     var data = $('#enter').serializeArray();
//     $.ajax({
//         url: 'enter',
//         type: 'post',
//         data: data,
//         success: function (response) {
//             if(response !== '1'){
//                 $('.err').append('<span style="color: red; padding-left: 60px">Логін або пароль невірний</span>')
//             }else{
//                 location.reload('/');
//             }
//         }
//     });
// }

function bigSearch() {
    $('#search_news input').animate({
        width: '500px',
        marginLeft: '-250px'
    });
        // width: 500
    // });
}

(function () {
    $(window.document).scroll(function () {
        let y = window.scrollY;                // прокрутка в px
        let f = $(document).height();          // высота всей страницы
        let inn = window.innerHeight;          // высота видимой области
        if(y > 345){
            // console.log('scroll - ' + y);
            // console.log('hei - ' + inn);
            // console.log('all - ' + f);
            // console.log('----------');
            $('div > .mirror_off').removeClass('mirror_off').addClass('mirror_on');
            if((y + inn) > (f - 100)){
                $('div > .mirror_on').removeClass('mirror_on').addClass('mirror_b');
            }else{
                $('div > .mirror_b').removeClass('mirror_b').addClass('mirror_on');
            }
        }else{
            $('div > .mirror_on').removeClass('mirror_on').addClass('mirror_off');
        }
        // console.log(y)
    });
}());

(function () {
    $('.mobile_menu_ico_span').on('click', function (e) {
        // e.preventDefault;
        // $(this).toggleClass('.mobile_menu_ico_span_active');
        let h = $('.mobile_menu_content').height();

        if(h < 1){
            $('.mobile_menu_content').animate({
                height: '100px'
            }, 300);
            }else{
            $('.mobile_menu_content').animate({
                height: 0
            }, 300);
        }
    })
}());




