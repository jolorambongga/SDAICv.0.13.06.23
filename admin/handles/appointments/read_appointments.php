<?php
require_once('../../../includes/config.php');

try {
    // Check if PDO connection is successfully established in config.php
    if (!isset($pdo)) {
        throw new PDOException("PDO connection is not set.");
    }

    // Set PDO attributes for error handling
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

    // Initialize where clause array and bind params array
    $whereClauses = [];
    $bindParams = [];

    // Filter by service_id if not 'All'
    if ($service_id !== 'All') {
        $whereClauses[] = "a.service_id = :service_id";
        $bindParams['service_id'] = $service_id;
    }

    // Additional filter for today's appointments
    if ($today) {
        $whereClauses[] = "a.appointment_date = :current_date";
        $bindParams['current_date'] = $current_date;
    }

    // Construct the WHERE clause
    if (!empty($whereClauses)) {
        $sql .= " WHERE " . implode(" AND ", $whereClauses);
    }

    $stmt = $pdo->prepare($sql);

    // Bind parameters
    foreach ($bindParams as $paramName => $paramValue) {
        $stmt->bindParam(':' . $paramName, $paramValue, PDO::PARAM_STR);
    }

    $stmt->execute();

    $appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Convert binary request_image to base64 before JSON encoding
    foreach ($appointments as &$appointment) {
        if ($appointment['request_image'] !== null) {
            $appointment['request_image'] = base64_encode($appointment['request_image']);
        }
    }

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode(array("status" => "success", "process" => "read appointments", "data" => $appointments, "today" => $today, "service" => $service_id, "current date" => $current_date));

} catch (PDOException $e) {
    // Handle PDO exceptions
    echo json_encode(array("status" => "error", "message" => $e->getMessage(), "process" => "read appointments"));
}
?>
