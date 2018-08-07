$(document).ready(function(){
    $("#eliminar").click(function(){
        ['p', 'h1', 'h2', 'h3', 'h4', 'li', 'input'].forEach(function (e) {
            $('body').find(e).each(function () {
                $(this).remove();
            })
        })

    });
});