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

function search_view() {
    $('#search_news input').animate({
        width: '500px',
        marginLeft: '-250px'
    });
    // width: 500
    // });
}