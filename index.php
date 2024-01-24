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

$reviewsSql = "SELECT ID, Name, Rating, Comment, Date FROM Reviews";
$reviewsResult = $conn->query($reviewsSql);

$pricesql = "SELECT service_name, service_cost FROM MedicalServices";
$priceresult = $conn->query($pricesql);

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
                <span>г. Тверь бульвар Радищева, 44</span><br>
                <a href="#map">показать на карте <img src="img/move_map.svg" alt=""/></a>
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
            <button class="make_appointment_header-btn"><a href="order.php">Записаться онлайн</a></button>
            <a href="callback.php" class="make_appointment_header-call">Заказать обратный звонок</a>
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

<div class="index_content">
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
                    echo '<a href="order.php"><img src="img/arrow_cart.svg" alt=""></a>';
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
            <a href="https://rg.ru/tema/obshestvo/zdorovje">смотреть все новости</a>
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
            <button class="btn_slider2"><img src="img/slider2_arrow_left.svg" alt=""></button>
            <button class="btn_slider2"><img src="img/slider2_arrow_right.svg" alt=""></button>
        </center>
      </section>
      <section id="equipment" class="choose_is_index">
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
            <div class="slider_choose">
              <div class="big-slide">
                  <!-- Большая фотография -->
                  <img src="img/img1_slider3.jpg" alt="Big Image">
              </div>
              <div class="small-slides">
                  <!-- Маленькие фотографии -->
                  <div class="small-slide active"><img src="img/img2_slider3.jpg" alt="Small Image 1"></div>
                  <div class="small-slide"><img src="img/img3_slider3.jpg" alt="Small Image 2"></div>
                  <div class="small-slide"><img src="img/img4_slider3.jpg" alt="Small Image 3"></div>
                  <div class="small-slide"><img src="img/img5_slider3.jpg" alt="Small Image 4"></div>
                  <div class="small-slide"><img src="img/img6_slider3.jpg" alt="Small Image 5"></div>
                  <div class="small-slide"><img src="img/img7_slider3.jpg" alt="Small Image 6"></div>
              </div>
            </div>
        </div>
        </section>

      <section id="reviews" class="rewievs_index">
            <div class="title_reviews_index">
            <div class="cap_choose">
                <img src="img/logo.svg" alt="" width="25px"/>
                <span>Отзывы</span>
            </div>
            </div>
            <div class="slider-reviews">
              <div class="content_reviews_index">
            <?php     
                if ($reviewsResult->num_rows > 0) {
                  while ($row = $reviewsResult->fetch_assoc()) {
                      echo '<div class="reviews_block_index">';
                      echo '<p>' . $row["Name"] . '</p>';
                      echo '<p>' . $row["Date"] . '</p>';
                      $rating = $row["Rating"];
                      echo '<div class="rating">';
                      for ($i = 1; $i <= 5; $i++) {
                        $starClass = ($i <= $rating) ? 'active_star' : 'star';
                        echo '<img class="star ' . $starClass . '" src="img/' . $starClass . '.svg" alt="Star">';
                      }
                      
                      echo '<p>' . $row["Comment"] . '</p>';
                      echo '</div>';
                      echo '</div>';
                  }
            } else {
                echo "0 results";
            }
            ?>           
              </div>
              <center>
            <button class="btn_slider2"><img src="img/slider2_arrow_left.svg" alt=""></button>
            <button class="btn_slider2"><img src="img/slider2_arrow_right.svg" alt=""></button>
        </center>
          </div>              
        </section>
  <section id="team" class="team_section">
            <img src="img/team.svg" alt="">
  </section>

  <footer>
    <div class="info_footer">
      <div class="cap_choose cap_choose_footer">
                <img src="img/logo.svg" alt="" width="25px"/>
                <span>Контакты</span>
      </div>
      <div class="info_footer_up">
        <div class="number_footer">
          <span>Телефон:</span>
          <p>+8 975 (129) 42-33</p>
          <p>+8 975 (128) 42-33</p>
          <p>+8 975 (127) 42-33</p>
        </div>
        <div class="working_footer">
        <span>Режим работы</span>
        <div class="content_working_footer">
          <p>Пн-пт: 9:00 – 21:00</p>
          <p>Сб: 9:00 – 15:00</p>
          <p>Вс: Выходной</p>
          </div>
      </div>    
    </div>
    <div class="info_footer_center">
      <span>Адрес:</span>
      <p>170100 г.Тверь, ул. бульвар Радищева д. 44</p>
    </div>
    <div class="btn_container_footer">
        <div class="writing_reviews">
            <button class="make_appointment_header-btn"><a href="reviews.php">Оставить отзыв</a></button>
            <a href="mailto:info@royaldent.ru" class="mail_footer">info@royaldent.ru</a>
        </div>
        <div class="record_appointment_container">
        <button class="make_appointment_header-btn make_appointment_footer"><a href="order.php">Записаться онлайн</a></button>
        <p></p>
        <div class="payment_method">
            <img src="img/portmone.svg" alt="">
            <img src="img/visa.svg" alt="">
            <img src="img/mastercard.svg" alt="">
            <img src="img/mir.svg" alt="">
        </div>
        </div>
    </div>
    </div>
    <section class="map_footer" id="map">
    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A1ed253e02ca8409a59f4a6a269ba3e37bfae0bd4d8012e2f6e6aa0450fb38fe5&amp;width=800&amp;height=600&amp;lang=ru_RU&amp;scroll=true"></script>
    </section>
  </footer>

<script>
  //первый  слайдер
    document.addEventListener("DOMContentLoaded", function () {
    const slider = document.querySelector(".slider");
    const prevBtn = document.querySelector(".prev-btn");
    const nextBtn = document.querySelector(".next-btn");
    const dotsContainer = document.querySelector(".dots-container");

    let currentIndex = 0;
    let autoSlideInterval;

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

        dots.forEach((dot, index) => {
            dot.classList.toggle("active", index === currentIndex);
        });
    }

    function autoSlide() {
        if (currentIndex < slider.children.length - 1) {
            currentIndex++;
        } else {
            currentIndex = 0;
        }
        updateSlider();
    }

    function resetAutoSlide() {
        clearInterval(autoSlideInterval);
        autoSlideInterval = setInterval(autoSlide, 5000);
    }

    autoSlideInterval = setInterval(autoSlide, 5000);

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



//слайдер галлереи
document.addEventListener("DOMContentLoaded", function () {
    const bigSlide = document.querySelector(".big-slide");
    const smallSlides = document.querySelectorAll(".small-slide");

    let currentIndexChoose = 0;

    function updateChooseSlides() {
        bigSlide.querySelector("img").src = "img/img" + (currentIndexChoose + 1) + "_slider3.jpg";
    }

    function nextChooseSlide() {
        currentIndexChoose = (currentIndexChoose + 1) % smallSlides.length;
        bigSlide.style.opacity = 0; 
        setTimeout(function () {
            updateChooseSlides();
            bigSlide.style.opacity = 1; 
        }, 500); 
    }

    setInterval(nextChooseSlide, 5000);

    smallSlides.forEach((slide, index) => {
        slide.addEventListener("click", function () {
            currentIndexChoose = index;
            updateChooseSlides();
        });
    });

    updateChooseSlides();
});

//слайдер отзывов
document.addEventListener("DOMContentLoaded", function () {
    const reviewsSlider = document.querySelector(".slider-reviews .content_reviews_index");
    const prevBtnReviews = document.querySelector(".slider-reviews .btn_slider2:first-child");
    const nextBtnReviews = document.querySelector(".slider-reviews .btn_slider2:last-child");

    let currentIndexReviews = 0;
    const itemsPerPage = 3;

    nextBtnReviews.addEventListener("click", function () {
        if (currentIndexReviews < reviewsSlider.children.length - itemsPerPage) {
            currentIndexReviews++;
            updateReviewsSlider();
        }
    });

    prevBtnReviews.addEventListener("click", function () {
        if (currentIndexReviews > 0) {
            currentIndexReviews--;
            updateReviewsSlider();
        }
    });

    function updateReviewsSlider() {
        const newTransformValue = -currentIndexReviews * (100 / itemsPerPage) + "%";
        reviewsSlider.style.transition = "transform 0.5s ease-in-out";
        reviewsSlider.style.transform = "translateX(" + newTransformValue + ")";
    }
});
</script>

    <script>

      //плавные переходы
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

                        window.scrollTo({
                            top: targetSection.offsetTop,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });

    </script>

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
