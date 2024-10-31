<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сайт</title>
    <link rel="stylesheet" href="style/preload.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/adaptiv.css">
</head>
<body>
<div id="preloader" class="prepoader">
    <div class="preloader__loader">
        <div class="loadingio-spinner-rolling-rgt21mmte5b">
            <div class="ldio-y5b95icznu9">
                <img src="popup/logo_fon.png" alt="" style="width: 76px; margin-top: 71px;margin-left: 59px;">
                <div></div>
            </div>
        </div>
    </div>
</div>
<!-- Заголовок-->
<div class="header" id="header">
    <div class="header-logo">
        <img src="popup/logo_fon.png" alt="Логотип">
    </div>
    <div class="header-menu" id="header-menu" style="text-align: center;">
        <!-- Здесь ваше меню -->
        <a href="tel:88006008131">8 (800) 600-81-31</a>
        <a href="tel:88125039323">8 (812) 503-93-23</a>
        <a href="info@mltech.shop">info@mltech.shop</a>
    </div>
    <div>
        <button class="header-button" id="header-button">Заказать</button>
    </div>
</div>
<div class="container">
    <form id="form" class="form" autocomplete="off">
        <div class="form__input-box">
            <input class="form__input-inp" type="text" id="name" name="name" placeholder="Имя и Фамилия" autocomplete="off">
        </div>
        <div class="form__input-box">
            <input class="form__input-inp" type="tel" id="tel" name="tel" placeholder="+7(___) ___-__-__"
                   autocomplete="off">
        </div>
        <div class="form__input-box">
            <input class="form__input-inp" id="checkbox" type="checkbox" name="checkbox">
            <label for="checkbox">Я даю свое согласие на обработку моих персональных данных в соответствии с
                <a href="#">Согласием на обработку персональных данных</a></label>
        </div>
        <div>
            <button class="form__btn" type="submit">Заказать</button>
        </div>
        <div class="cl-btn-2">
            <div>
                <div class="leftright"></div>
                <div class="rightleft"></div>
            </div>
        </div>
    </form>
</div>
<div id="message" class="message">Ваш заказ оформлен. Мы с вами свяжемся в ближайшее время</div>
<div class="basic">
                <div class="video" id="video">
                    <video autoplay muted class="bgvideo" id="bgvideo">
                        <source src="video.mp4" type="video/mp4">
                    </video>
                </div>
    <!--Слайдер-->
    <div class="slider-active" id="slider-active">
        <div class="slider" id="slider1">
            <?php
            $imageFolder1 = 'slider2'; // Замените на реальный путь к папке
            $images1 = scandir($imageFolder1);
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            $slideCounter = 0; // Счетчик для data-name

            foreach ($images1 as $image1) {
                $ext1 = strtolower(pathinfo($image1, PATHINFO_EXTENSION));
                if (is_file($imageFolder1 . '/' . $image1) && in_array($ext1, $allowedExtensions)) {
                    $dataName = $slideCounter . '_' . $image1;
                    echo "<div class='slide' data-name='$dataName'>
    <img src='$imageFolder1/$image1' loading='lazy' alt=''>
</div>";
                    $slideCounter++;
                }
            }
            ?>
        </div>
    </div>
    <div class="content" id="content">
        <h1 class="content-title">
            MLT
        </h1>
        <div class="content-description">
            Универсальные сервера <strong>U1</strong> и <strong>U2</strong> произведенные в России
        </div>
    </div>
    <div class="button" id="button">
        <button class="button_btn" id="button_btn">Заказать</button>
    </div>
</div>
JavaScript скрипт
<script src="script/preload.js"></script>
<script type="module">
    // Выбираем все слайдеры на странице
    let video = document.getElementById('bgvideo');
    let video_del = document.getElementById('video');
    const slider_active = document.getElementById('slider-active');
    const header_menu = document.getElementById('header-menu');
    const header = document.getElementById('header');
    const preloader = document.getElementById('preloader');
    video.playbackRate = 1.8;
    video.addEventListener("ended", (event) => {
        slider_active.style.opacity = '1';
        video_del.style.opacity = '0';
        header.style.top = '0';
        header.style.opacity = '1';
        content.style.bottom = '-100px';
        content.style.opacity = '1';
        preloader.style.opacity = '0';
    });
    $('.header-button').on('click', function () {
        $('.container').css('display', 'block');
    });

    $('.button_btn').on('click', function () {
        $('.container').css('display', 'block');
    });

    $('.cl-btn-2').on('click', function () {
        $('.container').css('display', 'none');
    });

    let selector = document.querySelector("#tel")
    let im = new Inputmask("+7(999) 999-99-99")
    im.mask(selector)

    let validation = new JustValidate("form")

    validation.addField("#name", [
        {
            rule: "required",
            errorMessage: "Введите имя и фамилию!"
        },
        {
            rule: "minLength",
            value: 2,
            errorMessage: "Минимум 2 символа!"
        }
    ]).addField("#tel", [
        {
            validator: (value) => {
                const phone = selector.inputmask.unmaskedvalue()
                return Boolean(Number(phone) && phone.length > 0)
            },
            errorMessage: 'Введите телефон'
        },
        {
            validator: (value) => {
                const phone = selector.inputmask.unmaskedvalue()
                return Boolean(Number(phone) && phone.length === 10)
            },
            errorMessage: 'Введите телефон полностью'
        }
    ]).addField("#checkbox", [
        {
            rule: "required",
            errorMessage: "Для продолжения, примите пользовательское соглашение!"
        }
    ]).onSuccess(async function () {
        let data = {
            name: document.getElementById("name").value,
            tel: selector.inputmask.unmaskedvalue()
        }

        console.log(data);

        let response = await fetch("mail.php", {
            method: "POST",
            body: JSON.stringify(data),
            headers: {
                "Content-Type": "application/json; charset=UTF-8"
            }
        })
        let result = await response.text()
        $('.message').css('display', 'block');
        $('.container').css('display', 'none');
        $('#name').val('');
        $('#tel').val('');
        // alert(result)
    })
    const sliders = document.querySelectorAll('.slider');
    const content = document.getElementById('content');
    const vid = document.getElementById('video');
    const button = document.getElementById('button_btn');

    // Создаем массив для отслеживания текущего слайда в каждом слайдере
    let currentSlideIndexes = new Array(sliders.length).fill(0);
    console.log(currentSlideIndexes);
    // Определяем направление автопрокрутки (вперед или назад)
    let autoScrollDirection = 'forward';
    // Определяем текущий шаг (начинаем с 0)
    let currentStep = 0;
    const stopSteps = [1, 14, 21, 51, 69, 81, 92, 109, 121, 134, 149, 168, 185, 213, 252, 300];

    // const stopSteps = [1, 14, 21, 51, 69, 81, 92, 109, 144, 177, 194, 222, 308];

    // const stopSteps = [1, 14, 21, 51, 69, 81, 92, 109, 115, 126, 159, 176, 204, 291];
    // Шаги для каждого слайдера
    const scrollSteps = [300];

    // Функция для переключения слайдов в слайдере
    function switchSlide(sliderIndex, direction) {
        const currentSlide = sliders[sliderIndex].children[currentSlideIndexes[sliderIndex]];
        currentSlide.style.opacity = 0;
        if (direction === 'forward' && currentSlideIndexes[sliderIndex] < sliders[sliderIndex].children.length - 1) {
            currentSlideIndexes[sliderIndex]++;
        } else if (direction === 'backward' && currentSlideIndexes[sliderIndex] > 0) {
            currentSlideIndexes[sliderIndex]--;
        }
        const nextSlide = sliders[sliderIndex].children[currentSlideIndexes[sliderIndex]];
        nextSlide.style.opacity = 1;
    }

    // Функция для автопрокрутки слайдов

    let lastWheel = new Date();
    let b = new Date();
    window.addEventListener('wheel', (event) => {
        if (autoScrollDirection === 'stop') {
            if (event.deltaY > 0 && currentStep > 0 && currentStep < 300) {
                if (new Date - lastWheel < 2200) return
                header_menu.style.opacity = '0';
                header_menu.style.transition = '0.5s all ease-out'
                content.style.opacity = '0';
                content.style.bottom = '-100px';
                content.style.transition = '0.5s all ease-out';
                autoScrollDirection = 'forward';
                currentStep++;
                lastWheel = new Date();
                console.log(currentStep);
            } else if (event.deltaY < 0 && currentStep > 12) {
                if (new Date - b < 2200) return
                autoScrollDirection = 'backward';
                currentStep--;
                b = new Date();
                console.log(currentStep);
                button.style.opacity = '0';
                header_menu.style.opacity = '0';
                content.style.opacity = '0';
            }
        }
    });


    // Функция для запуска автопрокрутки
    function startAutoScrolling() {
        for (let i = 0; i < sliders.length; i++) {
            setInterval(() => {
                if (autoScrollDirection === 'forward' && currentStep < scrollSteps[i]) {
                    autoScroll(i, scrollSteps[i]);
                } else if (autoScrollDirection === 'backward' && currentStep > 0) {
                    autoScroll(i, scrollSteps[i]);
                }
            }, 135);
        }
    }

    function autoScroll(sliderIndex, maxStep) {
        if (autoScrollDirection === 'forward' && currentStep < maxStep) {
            switchSlide(sliderIndex, 'forward');
            currentStep++;
            if (currentStep === 300) {
                button.style.opacity = '1';
                header_menu.style.opacity = '1';
            }
        } else if (autoScrollDirection === 'backward' && currentStep > 0) {
            switchSlide(sliderIndex, 'backward');
            if (currentStep === 13) {
                header_menu.style.transition = '4s all ease-out';
                header_menu.style.opacity = '1';
                content.style.opacity = '1';
                content.style.transition = '4s all ease-out';
            }
            currentStep--;
        }
        if (stopSteps.includes(currentStep)) {
            autoScrollDirection = 'stop';
        }
    }

    // Запускаем автопрокрутку после задержки
    setTimeout(startAutoScrolling, 0);
    let c = new Date();
    let v = new Date();
    let event = null;
    document.addEventListener("touchstart", function (e) {
        event = e;
    });
    window.addEventListener('touchmove', (e) => {
        if (event) {
            if (autoScrollDirection === 'stop') {
                if ((e.touches[0].pageY - event.touches[0].pageY) < 0 && currentStep > 0 && currentStep < 300) {
                    if (new Date - c < 2200) return
                    console.log('По мне ведут пальцем вниз');
                    header_menu.style.opacity = '0';
                    header_menu.style.transition = '0.5s all ease-out'
                    content.style.opacity = '0';
                    content.style.bottom = '-100px';
                    content.style.transition = '0.5s all ease-out';
                    autoScrollDirection = 'forward';
                    currentStep++;
                    c = new Date();
                    console.log(currentStep);
                } else if ((e.touches[0].pageY - event.touches[0].pageY) > 0 && currentStep > 12) {
                    if (new Date - v < 2200) return
                    autoScrollDirection = 'backward';
                    currentStep--;
                    console.log(currentStep);
                    v = new Date();
                    console.log('По мне ведут пальцем вверх');
                    button.style.opacity = '0';
                    header_menu.style.opacity = '0';
                    content.style.opacity = '0';
                }
            }
        }
    })

    document.addEventListener("touched", function (e) {
        event = null;
    });
</script>
<script src="script/jquery-3.6.3.min.js"></script>
<script src="script/inputmask.min.js"></script>
<script src="script/just-validate.min.js"></script>
</body>
</html>
