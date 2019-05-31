$(function () {
    /*variables*/
    let artistas = $('#artistas').offset().top;

    window.addEventListener('resize', function(){
        let artistas = $('#artistas').offset().top,
    });

    $('#enlace-artistas').on('click', function(e){
        e.preventDefault();
        $('html, body').animate({
            scrollTop: artistas
        },600);
    });
});