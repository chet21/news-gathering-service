(function () {
    $(window.document).scroll(function () {
        let y = window.scrollY;                // прокрутка в px
        let f = $(document).height();          // высота всей страницы
        let inn = window.innerHeight;          // высота видимой области
        let content_h = $('#content').height();
        console.log(content_h);
        if(y > 350 && (y+inn) < content_h){
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
        }
        else if(y < 350){
            $('div > .mirror_on').removeClass('mirror_on').addClass('mirror_off');
        }
        else if((y+inn) > content_h){
            $('div > .mirror_on').removeClass('mirror_on').addClass('mirror_off');
        }

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

function change_lang(lang_init) {
    let x = lang_init.match(/[a-z]{2}/);
    if(x){
        $.ajax({
            url: '/lang',
            method: 'post',
            data: {'lang': x.input},
            success: function (response) {
                location.reload();
            }
        });
    }
}



