function signin() {
    $('#enter_form').keydown(function(e) {
        if(e.keyCode === 13) {
            let data = $('#enter_form').serializeArray();
            console.log(data);
            // $.ajax({
            //     url: '/enter/reques',
            //     method: 'post',
            //     data: {}
            // });
        }
    });
}