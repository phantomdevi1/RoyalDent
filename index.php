<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "RoyalDent";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sliderSql = "SELECT * FROM SliderData";
$sliderResult = $conn->query($sliderSql);

$servicesSql = "SELECT * FROM ServiceCategories";
$servicesResult = $conn->query($servicesSql);

$newsSql = "SELECT * FROM News";
$newsResult = $conn->query($newsSql);

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
            <p>RoyalDent</p>
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
                <a href="#prices">Цены</a>
                <a href="#equipment">Оборудование</a>
                <a href="#documents">Документы</a>
                <a href="#news">Новости</a>
                <a href="#reviews">Отзывы</a>
        </div>
    </div>
</header>

<div class="index_content">
    <div class="slider_one_index">
        <div class="slider-container">
            <div class="slider">
                <?php
                if ($sliderResult->num_rows > 0) {
                    while ($row = $sliderResult->fetch_assoc()) {
                        echo '<div class="slide" style="background-image: url(' . $row["image_path"] . ');">';
                        echo '<p class="title_slide">' . $row["title"] . '</p>';
                        echo '<p class="content_slide">' . $row["content"] . '</p>';
                        echo '<button class="make_appointment_header-btn make_appointment_slide">' . $row["button_text"] . '</button>';
                        echo '</div>';
                    }
                } else {
                    echo "0 results";
                }
                ?>
            </div>
            <button class="prev-btn"><img src="img/left_btn.svg" alt="" width="30px"></button>
            <button class="next-btn"><img src="img/right_btn.svg" alt="" width="30px"></button>
            <div class="dots-container"></div>
        </div>
    </div>
    <section id="services" class="services_index">
        <div class="cap_choose">
            <img src="img/logo.svg" alt="" width="25px"/>
            <span>Услуги</span>
        </div>

        <div class="service_content">
            <?php
            if ($servicesResult->num_rows > 0) {
                while ($row = $servicesResult->fetch_assoc()) {
                    echo '<div class="cart_service">';
                    echo '<div class="img_cart">';
                    echo '<img src="' . $row["Photo"] . '" alt="">';
                    echo '</div>';
                    echo '<div class="content_cart">';
                    echo '<p>' . $row["Name"] . '</p>';
                    echo '<img src="img/arrow_cart.svg" alt="">';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "0 results";
            }
            ?>
        </div>
    </div>
    <section id="news" class="slider_news_index">
        <div class="title_slider_news">
            <div class="cap_choose">
                <img src="img/logo.svg" alt="" width="25px"/>
                <span>Новости</span>
            </div>
            <a href="">смотреть все новости</a>
        </div>
        <div class="content_slider_news">
    <div class="slider-container">
        <div class="slider2">            
            <?php
            if ($newsResult->num_rows > 0) {
                while ($row = $newsResult->fetch_assoc()) {
                    echo '<div class="block_slider_news">';
                    echo '<img src="' . $row["image_path"] . '" alt="">';
                    echo '<p class="title_block_slider-news">' . $row["title"] . '</p>';
                    echo '<p class="content_block_slider-news">' . $row["content"] . '</p>';
                    echo '<a href="' . $row["link"] . '"><img src="img/arrow_cart.svg" alt=""></a>';
                    echo '</div>';
                }
            } else {
                echo "0 results";
            }
            ?>
            
        </div>
    </div>
</div>
        <center>
            <button><img src="img/slider2_arrow_left.svg" alt=""></button>
            <button><img src="img/slider2_arrow_right.svg" alt=""></button>
        </center>
      </section>
      <section id="team" class="choose_is_index">
        <div class="cap_choose">
            <img src="img/logo.svg" alt="" width="25px"/>
            <span> Почему выбирают нас </span>
        </div>
        <div class="content_choose">
            <div class="content_choose_up">
                <img src="img/clipboard-with-check-marks.svg" alt=""/>
                <span>Удобное расположение</span>
                <img src="img/brushing-teeth.svg" alt=""/>
                <span>Современное оборудование и материалы</span>
                <img src="img/doctor-suitcase.svg" alt=""/>
                <span>Команда опытных специалистов</span>
            </div>
            <div class="content_choose_up">
                <img src="img/dental-review.svg" alt=""/>
                <span>Все виды стоматологического лечения в одной клинике</span>
                <img src="img/pair-of-molars.svg" alt=""/>
                <span>Минимальные сроки лечения</span>
                <img src="img/molar-inside-a-shield.svg" alt=""/>
                <span>Душевная атмосфера</span>
            </div>
        </div>
      <section>
    <div class="photo_index"></div>
      <section id="reviews" class="rewiews_index">
            <!-- ... Код раздела с отзывами ... -->
        </section>
  </section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const slider = document.querySelector(".slider");
        const prevBtn = document.querySelector(".prev-btn");
        const nextBtn = document.querySelector(".next-btn");
        const dotsContainer = document.querySelector(".dots-container");

        let currentIndex = 0;
        let autoSlideInterval;

        // Добавляем точки
        for (let i = 0; i < slider.children.length; i++) {
            const dot = document.createElement("div");
            dot.classList.add("dot");
            dotsContainer.appendChild(dot);

            dot.addEventListener("click", function () {
                currentIndex = i;
                updateSlider();
                resetAutoSlide();
            });
        }

        const dots = document.querySelectorAll(".dot");

        nextBtn.addEventListener("click", function () {
            if (currentIndex < slider.children.length - 1) {
                currentIndex++;
                updateSlider();
                resetAutoSlide();
            }
        });

        prevBtn.addEventListener("click", function () {
            if (currentIndex > 0) {
                currentIndex--;
                updateSlider();
                resetAutoSlide();
            }
        });

        function updateSlider() {
            const newTransformValue = -currentIndex * 100 + "%";
            slider.style.transform = "translateX(" + newTransformValue + ")";

            // Обновляем активные точки
            dots.forEach((dot, index) => {
                dot.classList.toggle("active", index === currentIndex);
            });
        }

        // Функция для автоматического листания слайдов
        function autoSlide() {
            if (currentIndex < slider.children.length - 1) {
                currentIndex++;
            } else {
                currentIndex = 0;
            }
            updateSlider();
        }

        // Сброс интервала при ручном взаимодействии
        function resetAutoSlide() {
            clearInterval(autoSlideInterval);
            autoSlideInterval = setInterval(autoSlide, 5000);
        }

        // Запуск автоматического листания при загрузке страницы
        autoSlideInterval = setInterval(autoSlide, 5000);

        // Добавим также логику для второго слайдера
        const secondSlider = document.querySelector(".content_slider_news .slider2");
        const itemsPerPage = 4;
        let currentIndexSecondSlider = 0;

        const leftButtonNews = document.querySelector(".slider_news_index button:first-child");
        const rightButtonNews = document.querySelector(".slider_news_index button:last-child");

        rightButtonNews.addEventListener("click", function () {
            if (currentIndexSecondSlider < secondSlider.children.length - itemsPerPage) {
                currentIndexSecondSlider++;
                updateSecondSlider();
            }
        });

        leftButtonNews.addEventListener("click", function () {
            if (currentIndexSecondSlider > 0) {
                currentIndexSecondSlider--;
                updateSecondSlider();
            }
        });

        function updateSecondSlider() {
            const newTransformValue = -currentIndexSecondSlider * (100 / itemsPerPage) + "%";
            secondSlider.style.transition = "transform 0.5s ease-in-out";
            secondSlider.style.transform = "translateX(" + newTransformValue + ")";
        }
    });
</script>
<script>
        // Добавляем обработчик события для навигации
        document.addEventListener('DOMContentLoaded', function () {
            const sections = document.querySelectorAll('section');
            const toolbarLinks = document.querySelectorAll('.toolbar a');

            toolbarLinks.forEach(link => {
                link.addEventListener('click', function (event) {
                    event.preventDefault();
                    const targetId = this.getAttribute('href').substring(1);
                    const targetSection = document.getElementById(targetId);

                    if (targetSection) {
                        sections.forEach(section => section.classList.remove('scrolling'));
                        targetSection.classList.add('scrolling');

                        // Прокрутка к выбранной секции
                        window.scrollTo({
                            top: targetSection.offsetTop,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>
