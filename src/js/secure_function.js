function signin() {
    // $('#enter_form #enter_button').keydown(function(e) {
    //     if(e.keyCode === 13) {
            let error =  $('#response_errors');
            let data = $('#enter_form').serializeArray();
            $.ajax({
                url: '/signin/request',
                method: 'post',
                data: data,
                success: function (response) {

                    error.html('');

                    if(response > 0){
                        setTimeout(function () {
                            error.append('<h1 style="color: forestgreen">вхід до системи</h1>')
                        },3000);
                        location.replace('/dashboard');
                    }else{
                        error.append('<h1 style="color: darkred">помилкка авторизації</h1>')
                    }
                }
            });
        // }
    // });
}

function out() {
    $.ajax({
        url: '/out',
        method: 'post',
        data: {},
        success: function () {
            location.replace('/signin');
        }
    });
}