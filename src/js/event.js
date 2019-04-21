$(document).ready(function() {
    $('#enter').keydown(function(e) {
        if(e.keyCode === 13) {
            enter();
        }
    });

    bank_runer();

});

function bank_runer() {
    let v = $('div > .bank').width();
    console.log(v);
}


