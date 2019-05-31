$(document).ready(function(){

    // ********** USUARIOS ********** //
    $("#recargar").click(function(event){

        event.preventDefault();
        $.ajax({
            url: "usuarios_info.php",
            data: {},
            dataType: 'json',
            success: function(data)
            {
                var str = "";

                $.each(data, function(i, item){
                    str += '<div class="table-wrapper" role="alert">'+
                              item.user_name + '&nbsp <a href="usuarios_editar.php?nombre=' + encodeURIComponent(item.user_name) + ' &id='+ item.users_id + '&password='+encodeURIComponent(item.passwords)+'"><i class="fas fa-pencil-alt"></i></a>' +
                              '&nbsp <a href="#" id="'+ item.users_id + '" class="alert-link delete-link"><i class="fas fa-trash-alt"></i></a>' +  
                        '</div>';
                });
                $("#obtenertodo").html(str);
            }
        });
    });


    $(function(){
        $(document).on('click', '.delete-link',function(){
            var id=$(this).attr('id');
            $.ajax({
                type: "POST",
                url: "usuarios_info.php",
                data: {'id':id},
                success: function(data)
                {
                    $("#respuesta").show(3000).html(data).delay(2000).fadeOut(1000);
                    $("#recargar").trigger("click");
                }
            });

        });
    });

    $("#formulario").submit(function(event){
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "usuarios_info.php",
            data: $("#formulario").serialize(),
            success: function(data)
            {
                $("#respuesta").show(3000).html(data).delay(2000).fadeOut(1000);
                $("#recargar").trigger("click");
            }
        });
    });

    $("#editarnombre").submit(function(event){
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "usuarios_info.php",
            data: $("#editarnombre").serialize(),
            success: function(data)
            {
                $("#respuesta").show(3000).html(data).delay(2000).fadeOut(1000);
            }
        });
    });

    // ********** ADMINISTRADORES ********** //
    $("#recargar2").click(function(event){

        event.preventDefault();
        $.ajax({
            url: "admins_info.php",
            data: {},
            dataType: 'json',
            success: function(data)
            {
                var str = "";

                $.each(data, function(i, item){
                    str += '<div class="table-wrapper" role="alert">'+
                              item.admin_name + '&nbsp <a href="admins_editar.php?nombre=' + encodeURIComponent(item.admin_name) + ' &id='+ item.admins_id + ' &password='+encodeURIComponent(item.passwords)+'"><i class="fas fa-pencil-alt"></i></a>' +
                              '&nbsp <a href="#" id="'+ item.admins_id + '" class="alert-link delete-link2"><i class="fas fa-trash-alt"></i></a>' +  
                        '</div>';
                });
                $("#obtenertodo2").html(str);
            }
        });
    });


    $(function(){
        $(document).on('click', '.delete-link2',function(){
            var id=$(this).attr('id');
            $.ajax({
                type: "POST",
                url: "admins_info.php",
                data: {'id':id},
                success: function(data)
                {
                    $("#respuesta2").show(3000).html(data).delay(2000).fadeOut(1000);
                    $("#recargar2").trigger("click");
                }
            });

        });
    });

    $("#formulario2").submit(function(event){
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "admins_info.php",
            data: $("#formulario2").serialize(),
            success: function(data)
            {
                $("#respuesta2").show(3000).html(data).delay(2000).fadeOut(1000);
                $("#recargar2").trigger("click");
            }
        });
    });

    $("#editarnombre2").submit(function(event){
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "admins_info.php",
            data: $("#editarnombre2").serialize(),
            success: function(data)
            {
                $("#respuesta2").show(3000).html(data).delay(2000).fadeOut(1000);
            }
        });
    });

    // ********** ARTISTAS ********** //
    $("#recargar5").click(function(event){

        event.preventDefault();
        $.ajax({
            url: "artistas_info.php",
            data: {},
            dataType: 'json',
            success: function(data)
            {
                var str = "";

                $.each(data, function(i, item){
                    str += '<div class="table-wrapper" role="alert">'+
                              item.descr + '&nbsp <a href="artistas_editar.php?nombre=' + encodeURIComponent(item.descr) + ' &id='+ item.artist_id + '"><i class="fas fa-pencil-alt"></i></a>' +
                              '&nbsp <a href="#" id="'+ item.artist_id + '" class="alert-link delete-link5"><i class="fas fa-trash-alt"></i></a>' +  
                        '</div>';
                });
                $("#obtenertodo5").html(str);
            }
        });
    });


    $(function(){
        $(document).on('click', '.delete-link5',function(){
            var id=$(this).attr('id');
            $.ajax({
                type: "POST",
                url: "artistas_info.php",
                data: {'id':id},
                success: function(data)
                {
                    $("#respuesta5").show(3000).html(data).delay(2000).fadeOut(1000);
                    $("#recargar5").trigger("click");
                }
            });

        });
    });

    $("#formulario5").submit(function(event){
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "artistas_info.php",
            data: $("#formulario5").serialize(),
            success: function(data)
            {
                $("#respuesta5").show(3000).html(data).delay(2000).fadeOut(1000);
                $("#recargar5").trigger("click");
            }
        });
    });

    $("#editarnombre5").submit(function(event){
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "artistas_info.php",
            data: $("#editarnombre5").serialize(),
            success: function(data)
            {
                $("#respuesta5").show(3000).html(data).delay(2000).fadeOut(1000);
            }
        });
    });
    
    // ********** EVENTOS ********** //
    $("#recargar3").click(function(event){

        event.preventDefault();
        $.ajax({
            url: "eventos_info.php",
            data: {},
            dataType: 'json',
            success: function(data)
            {
                var str = "";

                $.each(data, function(i, item){
                    str += '<div class="table-wrapper" role="alert">'+ item.azul + '---' + item.verde +'---'+ item.rojo +'---'+item.hora +
                    '&nbsp <a href="eventos_editar.php?id=' + item.platano + '&eventosnombre='+encodeURIComponent(item.azul)+'"><i class="fas fa-pencil-alt"></i></a>' +
                                  '&nbsp <a href="#" id="'+ item.platano + '" class="alert-link delete-link3"><i class="fas fa-trash-alt"></i></a>' + 
                        '</div>';
                });
                $("#obtenertodo3").html(str);
            }
        });
    });


    $(function(){
        $(document).on('click', '.delete-link3',function(){
            var id=$(this).attr('id');
            $.ajax({
                type: "POST",
                url: "eventos_info.php",
                data: {'id':id},
                success: function(data)
                {
                    $("#respuesta3").show(3000).html(data).delay(2000).fadeOut(1000);
                    $("#recargar3").trigger("click");
                }
            });

        });
    });

    $("#formulario3").submit(function(event){
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "eventos_info.php",
            data: $("#formulario3").serialize(),
            success: function(data)
            {
                $("#respuesta3").show(3000).html(data).delay(2000).fadeOut(1000);
                $("#recargar3").trigger("click");
            }
        });
    });

    $("#editarnombre3").submit(function(event){
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "eventos_info.php",
            data: $("#editarnombre3").serialize(),
            success: function(data)
            {
                $("#respuesta3").show(3000).html(data).delay(2000).fadeOut(1000);
            }
        });
    });

        // ********** ESCENARIOS ********** //
        $("#recargar7").click(function(event){

            event.preventDefault();
            $.ajax({
                url: "escenarios_info.php",
                data: {},
                dataType: 'json',
                success: function(data)
                {
                    var str = "";
    
                    $.each(data, function(i, item){
                        str += '<div class="table-wrapper" role="alert">'+
                                  item.stage_name + '&nbsp <a href="escenarios_editar.php?nombre=' + encodeURIComponent(item.stage_name) + ' &id='+ item.stage_id + '"><i class="fas fa-pencil-alt"></i></a>' +
                                  '&nbsp <a href="#" id="'+ item.stage_id + '" class="alert-link delete-link7"><i class="fas fa-trash-alt"></i></a>' +  
                            '</div>';
                    });
                    $("#obtenertodo7").html(str);
                }
            });
        });
    
    
        $(function(){
            $(document).on('click', '.delete-link7',function(){
                var id=$(this).attr('id');
                $.ajax({
                    type: "POST",
                    url: "escenarios_info.php",
                    data: {'id':id},
                    success: function(data)
                    {
                        $("#respuesta7").show(3000).html(data).delay(2000).fadeOut(1000);
                        $("#recargar7").trigger("click");
                    }
                });
    
            });
        });
    
        $("#formulario7").submit(function(event){
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: "escenarios_info.php",
                data: $("#formulario7").serialize(),
                success: function(data)
                {
                    $("#respuesta7").show(3000).html(data).delay(2000).fadeOut(1000);
                    $("#recargar7").trigger("click");
                }
            });
        });
    
        $("#editarnombre7").submit(function(event){
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: "escenarios_info.php",
                data: $("#editarnombre7").serialize(),
                success: function(data)
                {
                    $("#respuesta7").show(3000).html(data).delay(2000).fadeOut(1000);
                }
            });
        });

        // ********** MEET&GREET ********** //
        $("#recargar6").click(function(event){

            event.preventDefault();
            $.ajax({
                url: "meet_info.php",
                data: {},
                dataType: 'json',
                success: function(data)
                {
                    var str = "";
                    
                    $.each(data, function(i, item){
                        str += '<div class="table-wrapper" role="alert">'+ item.adriana +'---'+ item.sebas +'---'+ item.tian +'---'+ item.hhh +
                        '&nbsp <a href="meet_editar.php?id=' + item.IDM +'&meetnombre='+encodeURIComponent(item.adriana)+'"><i class="fas fa-pencil-alt"></i></a>' +
                                  '&nbsp <a href="#" id="'+ item.IDM + '" class="alert-link delete-link6"><i class="fas fa-trash-alt"></i></a>' +     
                        '</div>';
                    });


                    $("#obtenertodo6").html(str);
                }
            });
        });
    
    
        $(function(){
            $(document).on('click', '.delete-link6',function(){
                var id=$(this).attr('id');
                $.ajax({
                    type: "POST",
                    url: "meet_info.php",
                    data: {'id':id},
                    success: function(data)
                    {
                        $("#respuesta6").show(3000).html(data).delay(2000).fadeOut(1000);
                        $("#recargar6").trigger("click");
                    }
                });
    
            });
        });
    
        $("#formulario6").submit(function(event){
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: "meet_info.php",
                data: $("#formulario6").serialize(),
                success: function(data)
                {
                    $("#respuesta6").show(3000).html(data).delay(2000).fadeOut(1000);
                    $("#recargar6").trigger("click");
                }
            });
        });
    
        $("#editarnombre6").submit(function(event){
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: "meet_info.php",
                data: $("#editarnombre6").serialize(),
                success: function(data)
                {
                    $("#respuesta6").show(3000).html(data).delay(2000).fadeOut(1000);
                }
            });
        });

        // ********** HISTORIAL USUARIO ********** //
        $(function(){
            $(document).on('click', '.histdelete',function(){
                var id=$(this).attr('id');
                $.ajax({
                    type: "POST",
                    url: "historial_info.php",
                    data: {'id':id},
                    success: function(data)
                    {
                        $("#histrespuesta").show(3000).html(data).delay(2000).fadeOut(1000);
                        $("#histrecargar").trigger("click");
                    }
                });
    
            });
        });

        $(function(){
            $(document).on('click', '.histmeet',function(){
                var id=$(this).attr('id');
                $.ajax({
                    type: "POST",
                    url: "historial_info.php",
                    data: {'hist':id},
                    success: function(data)
                    {
                        $("#histrespuesta").show(3000).html(data).delay(2000).fadeOut(1000);
                        $("#histrecargar").trigger("click");
                    }
                });
    
            });
        });

        // ********** HISTORIALES********** //
        $("#recargarh").click(function(event){

            event.preventDefault();
            $.ajax({
                url: "h_info.php",
                data: {},
                dataType: 'json',
                success: function(data)
                {
                    var str = "";
                    
                    $.each(data, function(i, item){
                        str += '<div class="table-wrapper" role="alert">'+ item.Nombre +'---'+ item.Descr +'---'+ item.Dia +
                        '&nbsp <a href="#" id="'+ item.hid + '" class="alert-link delete-h"><i class="fas fa-trash-alt"></i></a>' +     
                        '</div>';
                    });


                    $("#obtenertodoh").html(str);
                }
            });
        });

        $(function(){
            $(document).on('click', '.delete-h',function(){
                var id=$(this).attr('id');
                $.ajax({
                    type: "POST",
                    url: "h_info.php",
                    data: {'id':id},
                    success: function(data)
                    {
                        $("#respuestah").show(3000).html(data).delay(2000).fadeOut(1000);
                        $("#recargarh").trigger("click");
                    }
                });
    
            });
        });

        $("#recargarm").click(function(event){

            event.preventDefault();
            $.ajax({
                url: "m_info.php",
                data: {},
                dataType: 'json',
                success: function(data)
                {
                    var str = "";
                    
                    $.each(data, function(i, item){
                        str += '<div class="table-wrapper" role="alert">'+ item.usuario +'---'+ item.Famoso +'---'+ item.escenario +'---'+ item.dia +'---'+ item.hrs +
                        '&nbsp <a href="#" id="'+ item.id_meet_user + '" class="alert-link delete-m"><i class="fas fa-trash-alt"></i></a>' +     
                        '</div>';
                    });


                    $("#obtenertodom").html(str);
                }
            });
        });

        $(function(){
            $(document).on('click', '.delete-m',function(){
                var id=$(this).attr('id');
                $.ajax({
                    type: "POST",
                    url: "m_info.php",
                    data: {'id':id},
                    success: function(data)
                    {
                        $("#respuestam").show(3000).html(data).delay(2000).fadeOut(1000);
                        $("#recargarm").trigger("click");
                    }
                });
    
            });
        });
    
});