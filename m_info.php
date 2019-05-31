<?php

    //ELIMINAR
    if(isset($_POST["id"]))
    {
        $id = $_POST["id"];
        require 'database.php';

        $stmt = $conn->prepare("DELETE FROM meet_user WHERE meet_user_id=?");
        $stmt->bindParam(1, $id);

        if($stmt->execute())
        {
            echo $id . " eliminado ";
        }
        
        $num2 = $conn->prepare("UPDATE ticket SET disp=disp+(1) WHERE ticket_id=(5)");
        $num2->execute();

        $conn = null;
    }

    //MOSTRAR TODO
    else {
        require 'database.php';

        $data = $conn->query("SELECT * FROM meet_view_user")->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data);
        $conn = null; 
    }