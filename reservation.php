<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>La Resina Restaurante | Reservaciones</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <link href="assets/img/logo.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">

    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="index-page">

    <?php include 'includes/header.php'; ?>

    <main class="main">
        
        <?php include './includes/reservation/reservationForm.php'; ?>

        <!-- Información adicional -->
        <section class="reservation-info section light-background">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h3>Información Importante</h3>
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <i class="bi bi-clock icon"></i>
                                <h5>Horario</h5>
                                <p>Lun-Sáb: 11AM - 11PM<br>Dom: 12PM - 10PM</p>
                            </div>
                            <div class="col-md-4">
                                <i class="bi bi-telephone icon"></i>
                                <h5>Teléfono</h5>
                                <p>+1 809 832 2567</p>
                            </div>
                            <div class="col-md-4">
                                <i class="bi bi-info-circle icon"></i>
                                <h5>Políticas</h5>
                                <p>Confirmación en 24h <br> Cancelación con anticipación</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>

    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <script src="assets/js/main.js"></script>

</body>

</html>
