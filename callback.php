<?php

include 'config.php';

$pricesql = "SELECT service_name, service_cost FROM MedicalServices";
$priceresult = $conn->query($pricesql);

$categoriesSql = "SELECT `service_id`, `service_name`, `service_cost` FROM `MedicalServices`";
$categoriesResult = $conn->query($categoriesSql);

// Проверка, была ли отправлена форма методом POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phoneNumber = $_POST["phoneNumber"];
    $name = $_POST["name"];
    $requestDate = date("Y-m-d H:i:s"); // Текущая дата и время

    // Вставка данных в таблицу CallbackRequests
    $insertSql = "INSERT INTO CallbackRequests (Name, Phone, RequestDate) 
                  VALUES ('$name', '$phoneNumber', '$requestDate')";

    // Выполнение запроса
    if ($conn->query($insertSql) === TRUE) {
        $message = "Ваш запрос успешно отправлен.";
    } else {
        $message = "Ошибка: " . $insertSql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Главная</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Forum&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <div class="header_up">
        <div class="logo_header_container">
            <img src="img/logo.svg" alt=""/>
            <a href="index.php">RoyalDent</a>
        </div>
        <div class="contact_info_header">
            <div class="adress_header">
                <img src="img/map_icon.svg" alt=""/>
                <span>г. Тверь бульвар Радищева, 44</span>
                <p>показать на карте <img src="img/move_map.svg" alt=""/></p>
            </div>
            <div class="phone_number_header">
                <img src="img/phone_icon.svg" alt=""/>
                <span>+8 975 (129) 42-33</span>
                <p>info@royaldent.ru</p>
            </div>
        </div>
        <div class="working_hours_header">
            <div>
                <img src="img/working_hour.svg" alt=""/>
            </div>
            <div class="time_working_header">
                <p>Пн-пт: 9:00–21:00</p>
                <p>Сб: 9:00–15:00</p>
                <p>Вс: Выходной</p>
                <a href=""><img src="img/vk.svg" alt=""/></a>
            </div>
        </div>
        <div class="make_appointment_header">
            <button class="make_appointment_header-btn">Записаться онлайн</button>
            <button class="make_appointment_header-call">Заказать обратный звонок</button>
        </div>
    </div>
    <hr class="header_hr"/>
    <div class="header_down">
        <div class="logo_header_container-down">
            <img src="img/logo.svg" alt="" width="20px"/>
            <p>RoyalDent</p>
        </div>
        <div class="toolbar">
                <a href="#services">Услуги</a>
                <a href="#team">Команда</a>
                <a href="#prices" id="pricesLink">Цены</a>
                <a href="#equipment">Оборудование</a>
                <a href="#news">Новости</a>
                <a href="#reviews">Отзывы</a>
        </div>
    </div>
</header>
<div class="content_order">
    <div class="price_list">
        <table>
            <thead>
                <tr>
                    <th>Название услуги</th>
                    <th>Стоимость, руб.</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($priceresult->num_rows > 0) {
                    while ($row = $priceresult->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row["service_name"] . '</td>';
                        echo '<td>' . number_format($row["service_cost"], 2) . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="2">0 результатов</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="order_block">        
        <div class="order_block-content">
            <div class="order_block-header">
                <p>Заказ обратного звонка</p>
            </div>
            <center>
                <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>
            </center>
            <form method="post" action="" class="write_info_order">
                <div class="phonenumber_block_order">
                    <p>Номер телефона</p>
                    <input type="text" name="phoneNumber" id="phoneNumber">
                </div>
                <div class="name_block_order">
                    <p>Имя</p>
                    <input type="text" name="name" id="name">
                </div>
            
                <hr class="hr">
                <div class="setup_btn_order-container">
                    <p>Нажимая “Запросить” Вы даете согласие на обработку персональных данных</p>
                    <button>Запросить</button>
                </div>
            </form>
            <div class="logo_header_container-down margin_top">
                <img src="img/logo.svg" alt="" width="20px">
                <p>RoyalDent</p>
            </div>
        </div>
    </div>
</div>
<script>
   // Появление цен с плавностью
   document.addEventListener("DOMContentLoaded", function () {
        const priceList = document.querySelector(".price_list");
        const pricesLink = document.getElementById("pricesLink");

        let isHovered = false;

        pricesLink.addEventListener("click", function (event) {
            event.preventDefault();
            isHovered = !isHovered;
            togglePriceList();
        });

        function showPriceList() {
            priceList.style.opacity = 1;
            priceList.style.display = "block";
        }

        function hidePriceList() {
            if (!isHovered) {
                priceList.style.opacity = 0;
                priceList.style.display = "none"; 
            }
        }

        function togglePriceList() {
            if (isHovered) {
                showPriceList();
            } else {
                hidePriceList();
            }
        }
    });
</script>
</body>
</html>
