<?php
    
    //ACTUALIZAR
    if(isset($_POST["famosoBb"]) && isset($_POST["escenarioBb"]) && isset($_POST["diaBb"]) && isset($_POST["horaBb"]) && isset($_POST["idvalue"]))
    {
        $artistaB = $_POST["famosoBb"];
        $escenarioB = $_POST["escenarioBb"];
        $diaB = $_POST["diaBb"];
        $horaB = $_POST["horaBb"];
        $id = $_POST["idvalue"];
        require 'database.php';

        $stmt = $conn->prepare("UPDATE meet SET artist_id=?, stage_id=?, day_id=?, hora_id=? WHERE meet_id=?");
        $stmt->bindParam(1, $artistaB);
        $stmt->bindParam(2, $escenarioB);
        $stmt->bindParam(3, $diaB);
        $stmt->bindParam(4, $horaB);
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

        $stmt = $conn->prepare("DELETE FROM meet WHERE meet_id=?");
        $stmt->bindParam(1, $id);

        if($stmt->execute())
        {
            echo $id . " eliminado ";
        }

        $conn = null;
    }

    //INSERTAR
    elseif(isset($_POST["famosoB"]) && isset($_POST["escenarioB"]) && isset($_POST["diaB"]) && isset($_POST["horaB"]) )
    {
        $famosoB = $_POST["famosoB"];
        $escenarioB = $_POST["escenarioB"];
        $diaB = $_POST["diaB"];
        $horaB = $_POST["horaB"];

        require 'database.php';

        $stmt = $conn->prepare("INSERT INTO meet(artist_id, stage_id, day_id, hora_id) VALUES(?,?,?,?)");
        $stmt->bindParam(1, $famosoB);
        $stmt->bindParam(2, $escenarioB);
        $stmt->bindParam(3, $diaB);
        $stmt->bindParam(4, $horaB);

        if($stmt->execute())
        {
            echo $famosoB . " agregado correctamente.";
        }

        $conn = null;
    }

    //MOSTRAR TODO
    else {
        require 'database.php';

        $data = $conn->query("SELECT * FROM meet_view")->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data);
        $conn = null; 
    }