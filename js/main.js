$(document).ready(function() {

    "use strict";

    document.addEventListener('DOMContentLoaded', function(){
        
        //MAPA
        var map = L.map('mapa').setView([20.582492, -101.197944], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        L.marker([20.582492, -101.197944]).addTo(map)
        .bindPopup('Aquí esta Majo.<br> LATINLIVE')
        .openPopup()
        .bindTooltip('Un Tooltip')
        .openTooltip();

    });

    $(function(){

        //Barra fija
        var windowHeight = $(window).height();
        var barraAltura = $('.barra').innerHeight();
        $(window).scroll(function(){
            var scroll = $(window).scrollTop();
            if(scroll > windowHeight) {
                $('.barra').addClass('fixed');
                $('body').css({'margin-top': barraAltura+'px'});
            } else {
                $('.barra').removeClass('fixed');
                $('body').css({'margin-top':'0px'});
            }
        });
        
        //Hamburguesa
        $('.menu-movil').on('click',function(){
            $('.navegacion-principal').slideToggle();
        });

        //Programa
        $('.programa-evento .info-conci:first').show();
        $('.menu-programa a:first').addClass('activo');

        $('.menu-programa a').on('click', function(){
            $('.menu-programa a').removeClass('activo');
            $(this).addClass('activo');
            $('.ocultar').hide();
            var enlace=$(this).attr('href');
            $(enlace).fadeIn(1000);
            return false;
        });

        //Cuenta regresiva
        $('.cuenta-regresiva').countdown('2020/03/19 16:00:00', function(event){
            $('#dias').html(event.strftime('%D'));
            $('#horas').html(event.strftime('%H'));
            $('#minutos').html(event.strftime('%M'));
            $('#segundos').html(event.strftime('%S'));
        });
            

    }); 

});