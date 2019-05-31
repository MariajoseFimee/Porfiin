<?php

    //ELIMINAR
    if(isset($_POST["id"]))
    {
        $id = $_POST["id"];
        require 'database.php';

        $sql3 = "SELECT ticket_id FROM history WHERE history_id=?";
        $stmt3 = $conn->prepare($sql3, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $stmt3 -> bindParam(1, $id);
        $stmt3 -> execute();
        $row = $stmt3->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);
        $num = $row[0];

        $stmt = $conn->prepare("DELETE FROM history WHERE history_id=?");
        $stmt->bindParam(1, $id);

        if($stmt->execute())
        {
            echo $id . " eliminado ";
        }

        $num2 = $conn->prepare("UPDATE ticket SET disp=disp+(1) WHERE ticket_id=($num)");
        $num2->execute();

        $conn = null;
    }

    //MOSTRAR TODO
    else {
        require 'database.php';

        $data = $conn->query("SELECT * FROM u_history_view")->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data);
        $conn = null; 
    }