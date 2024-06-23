<?php
require_once('../../includes/config.php');

try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $landing_id = 1; // Replace with your actual landing_id or retrieve dynamically

    $sql = "SELECT l.*, 
                   c.avail_day, 
                   TIME_FORMAT(c.avail_start_time, '%h:%i %p') as avail_start_time, 
                   TIME_FORMAT(c.avail_end_time, '%h:%i %p') as avail_end_time
            FROM tbl_Landing AS l
            LEFT JOIN tbl_ClinicHours AS c ON l.landing_id = c.landing_id
            WHERE l.landing_id = :landing_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':landing_id', $landing_id, PDO::PARAM_INT);
    $stmt->execute();
    
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($data as &$row) {
        // Check if about_us_image is a URL or binary data
        if (filter_var($row['about_us_image'], FILTER_VALIDATE_URL)) {
            // It's already a URL, do nothing
        } else {
            // Convert binary data to base64 and prepend data URI
            $row['about_us_image'] = 'data:image/png;base64,' . base64_encode($row['about_us_image']);
        }

        // Check if main_image is a URL or binary data
        if (filter_var($row['main_image'], FILTER_VALIDATE_URL)) {
            // It's already a URL, do nothing
        } else {
            // Convert binary data to base64 and prepend data URI
            $row['main_image'] = 'data:image/png;base64,' . base64_encode($row['main_image']);
        }
    }
    
    header('Content-Type: application/json');
    echo json_encode(array("status" => "success", "process" => "read landing", "data" => $data));
    
} catch (PDOException $e) {
    echo json_encode(array("status" => "error", "message" => $e->getMessage(), "process" => "read landing"));
}
?>
