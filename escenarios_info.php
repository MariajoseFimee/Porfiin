
<?php
    
    //ACTUALIZAR
    if(isset($_POST["InputNombre"]) && isset($_POST["idvalue"]))
    {
        $nombre = $_POST["InputNombre"];
        $id = $_POST["idvalue"];
        require 'database.php';

        $stmt = $conn->prepare("UPDATE stage SET stage_name=? WHERE stage_id=?");
        $stmt->bindParam(1, $nombre);
        $stmt->bindParam(2, $id);

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

        $stmt = $conn->prepare("DELETE FROM stage WHERE stage_id=?");
        $stmt->bindParam(1, $id);

        if($stmt->execute())
        {
            echo $id . " eliminado ";
        }

        $conn = null;
    }

    //INSERTAR
    elseif(isset($_POST["exampleInputNombre"]))
    {
        $nombre = $_POST["exampleInputNombre"];
        require 'database.php';

        $stmt = $conn->prepare("INSERT INTO stage(stage_name) VALUES(?)");
        $stmt->bindParam(1, $nombre);

        if($stmt->execute())
        {
            echo $nombre . " agregado correctamente.";
        }

        $conn = null;
    }

    //MOSTRAR TODO
    else {
        require 'database.php';

        $data = $conn->query("SELECT stage_id, stage_name FROM stage")->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data);
        $conn = null; 
    }