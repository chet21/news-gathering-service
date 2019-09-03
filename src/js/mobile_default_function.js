
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

