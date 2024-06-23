<?php
require_once('../../../includes/config.php');

try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch the service_id and today filter from GET request
    $service_id = isset($_GET['service_id']) ? $_GET['service_id'] : 'All';
    $today = isset($_GET['today']) && $_GET['today'] === 'true' ? true : false;

    // Asia/Manila timezone
    $timezone = new DateTimeZone('Asia/Manila');
    $now = new DateTime('now', $timezone);
    $current_date = $now->format('Y-m-d');

    // Base SQL query
    $sql = "SELECT 
                a.appointment_id,
                u.first_name,
                u.last_name,
                s.service_name,
                DATE_FORMAT(CONVERT_TZ(a.appointment_date, '+00:00', '+08:00'), '%M %d, %Y <br> (%W)') as formatted_date,
                TIME_FORMAT(a.appointment_time, '%h:%i %p') as formatted_time,
                a.notes,
                a.request_image,
                a.status,
                a.completed
            FROM tbl_Appointments as a
            JOIN tbl_Services as s ON a.service_id = s.service_id
            LEFT JOIN tbl_Users as u ON a.user_id = u.user_id";

    // Filter by service_id if not 'All'
    if ($service_id !== 'All') {
        $sql .= " WHERE a.service_id = :service_id";
    }

    // Additional filter for today's appointments
    if ($today) {
        $sql .= " AND DATE(CONVERT_TZ(a.appointment_date, '+00:00', '+08:00')) = :current_date";
    }

    $stmt = $pdo->prepare($sql);

    // Bind service_id parameter if not 'All'
    if ($service_id !== 'All') {
        $stmt->bindParam(':service_id', $service_id, PDO::PARAM_STR);
    }

    // Bind current_date parameter for today's filter
    if ($today) {
        $stmt->bindParam(':current_date', $current_date, PDO::PARAM_STR);
    }

    $stmt->execute();

    $appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Convert binary request_image to base64 before JSON encoding
    foreach ($appointments as &$appointment) {
        if ($appointment['request_image'] !== null) {
            $appointment['request_image'] = base64_encode($appointment['request_image']);
        }
    }

    header('Content-Type: application/json');
    echo json_encode(array("status" => "success", "process" => "read appointments", "data" => $appointments));

} catch (PDOException $e) {
    echo json_encode(array("status" => "error", "message" => $e->getMessage(), "process" => "read appointments"));
}
?>
