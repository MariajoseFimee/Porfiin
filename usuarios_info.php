<?php
    
    //ACTUALIZAR
    if(isset($_POST["InputNombre"]) && isset($_POST["idvalue"]) && isset($_POST["InputPassword"]))
    {
        $nombre = $_POST["InputNombre"];
        $id = $_POST["idvalue"];
        $passwords = $_POST["InputPassword"];
        require 'database.php';

        $stmt = $conn->prepare("UPDATE users SET user_name=?, passwords=? WHERE users_id=?");
        $stmt->bindParam(1, $nombre);
        $stmt->bindParam(2, $passwords);
        $stmt->bindParam(3, $id);

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

        $stmt = $conn->prepare("DELETE FROM users WHERE users_id=?");
        $stmt->bindParam(1, $id);

        if($stmt->execute())
        {
            echo $id . " eliminado ";
        }

        $conn = null;
    }

    //INSERTAR
    elseif(isset($_POST["exampleInputNombre"]) && isset($_POST["exampleInputPassword"]))
    {
        $nombre = $_POST["exampleInputNombre"];
        $passwords = $_POST["exampleInputPassword"];
        require 'database.php';

        $stmt = $conn->prepare("INSERT INTO users(user_name,passwords) VALUES(?,?)");
        $stmt->bindParam(1, $nombre);
        $stmt->bindParam(2, $passwords);

        if($stmt->execute())
        {
            echo $nombre . " agregado correctamente.";
        }

        $conn = null;
    }

    //MOSTRAR TODO
    else {
        require 'database.php';

        $data = $conn->query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data);
        $conn = null; 
    }