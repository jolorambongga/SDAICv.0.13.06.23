<?php

require_once('../../../includes/config.php');

try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $landing_id = 1;
    

    $sql = "UPDATE tbl_Landing 
            SET ;";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':landing_id', $landing_id, PDO::PARAM_INT);

    $stmt->execute();


    header('Content-Type: application/json');
    echo json_encode(array("status" => "success", "process" => "update landing", "data" => $data));

} catch (PDOException $e) {

    header('Content-Type: application/json');
    echo json_encode(array("status" => "error", "message" => $e->getMessage(), "process" => "update landing", "data" => $data));

}
