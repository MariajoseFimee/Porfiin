<?php
    
    //ACTUALIZAR
    if(isset($_POST["famosoA"]) && isset($_POST["escenarioA"]) && isset($_POST["diaA"])  && isset($_POST["horaA"]) && isset($_POST["idvalue"]))
    {
        $artista = $_POST["famosoA"];
        $escenario = $_POST["escenarioA"];
        $dia = $_POST["diaA"];
        $hora = $_POST["horaA"];
        $id = $_POST["idvalue"];
        require 'database.php';

        $stmt = $conn->prepare("UPDATE itinerary SET artist_id=?, stage_id=?, day_id=?, hora_id=? WHERE itinerary_id=?");
        $stmt->bindParam(1, $artista);
        $stmt->bindParam(2, $escenario);
        $stmt->bindParam(3, $dia);
        $stmt->bindParam(4, $hora);
        $stmt->bindParam(5, $id);

        if($stmt->execute())
        {
            echo $id . " actualizado correctamente.";
        }

        $conn = null;
    }

    //ELIMINAR
    elseif(isset($_POST["id"]))
    {
        $id = $_POST["id"];
        require 'database.php';

        $stmt = $conn->prepare("DELETE FROM itinerary WHERE itinerary_id=?");
        $stmt->bindParam(1, $id);

        if($stmt->execute())
        {
            echo $id . " eliminado ";
        }

        $conn = null;
    }

    //INSERTAR
    elseif(isset($_POST["famoso"]) && isset($_POST["escenario"]) && isset($_POST["dia"]) && isset($_POST["hora"]) )
    {
        $famoso = $_POST["famoso"];
        $escenario = $_POST["escenario"];
        $dia = $_POST["dia"];
        $hora = $_POST["hora"];

        require 'database.php';

        $stmt = $conn->prepare("INSERT INTO itinerary(artist_id, stage_id, day_id,hora_id) VALUES(?,?,?,?)");
        $stmt->bindParam(1, $famoso);
        $stmt->bindParam(2, $escenario);
        $stmt->bindParam(3, $dia);
        $stmt->bindParam(4, $hora);


        if($stmt->execute())
        {
            echo $famoso . " agregado correctamente.";
        }

        $conn = null;
    }

    //MOSTRAR TODO
    else {
        require 'database.php';

        $data = $conn->query("SELECT * FROM itinerary_view")->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data);
        $conn = null; 
    }