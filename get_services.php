<?php
include 'config.php';

if(isset($_GET['category_id'])) {
    $categoryId = $_GET['category_id'];

    // Запрос на получение услуг по выбранной категории
    $servicesSql = "SELECT * FROM MedicalServices WHERE category_id = '$categoryId'";
    $servicesResult = $conn->query($servicesSql);

    $services = array();
    if ($servicesResult->num_rows > 0) {
        while ($row = $servicesResult->fetch_assoc()) {
            $service = array(
                'service_id' => $row['service_id'],
                'service_name' => $row['service_name']
            );
            array_push($services, $service);
        }
    }

    // Возвращаем данные в формате JSON
    echo json_encode($services);
}
?>
