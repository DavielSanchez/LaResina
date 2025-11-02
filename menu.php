<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>La Resina Restaurante | Menu</title>
    <meta name="description" content="Descubre nuestro delicioso menú en La Resina">
    <meta name="keywords" content="restaurante, menú, comida, La Resina">

    <link href="assets/img/logo.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">

    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="index-page">

    <?php include './includes/header.php'; ?>
    <?php include './includes/menu-data.php'; ?>

    <main class="main">
        <section id="menu" class="menu section">

            <div class="container section-title" data-aos="fade-up">
                <h2>Nuestro Menú</h2>
                <p><span>Descubre</span> <span class="description-title">El Menú de La Resina</span></p>
            </div>

            <div class="container">

                <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                    <?php 
                    $first = true;
                    foreach($menu_categories as $category_id => $category): 
                    ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $first ? 'active show' : ''; ?>" 
                               data-bs-toggle="tab" 
                               data-bs-target="#menu-<?php echo $category_id; ?>">
                                <h4><?php echo $category['name']; ?></h4>
                            </a>
                        </li>
                    <?php 
                    $first = false;
                    endforeach; 
                    ?>
                </ul>

                <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

                    <?php 
                    $first = true;
                    foreach($menu_categories as $category_id => $category): 
                    ?>
                        <div class="tab-pane fade <?php echo $first ? 'active show' : ''; ?>" 
                             id="menu-<?php echo $category_id; ?>">
                            
                            <div class="tab-header text-center">
                                <p>Menú</p>
                                <h3><?php echo $category['name']; ?></h3>
                            </div>
                            
                            <div class="row gy-5">
                                <?php foreach($category['items'] as $item): ?>
                                    <div class="col-lg-4 menu-item">
                                        <a href="assets/img/menu/<?php echo $item['image']; ?>" class="glightbox">
                                            <img src="assets/img/menu/<?php echo $item['image']; ?>" 
                                                 class="menu-img img-fluid" 
                                                 alt="<?php echo $item['alt']; ?>">
                                        </a>
                                        <h4><?php echo $item['name']; ?></h4>
                                        <p class="ingredients">
                                            <?php echo $item['ingredients']; ?>
                                        </p>
                                        <p class="price"><?php echo $item['price']; ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            
                        </div>
                    <?php 
                    $first = false;
                    endforeach; 
                    ?>

                </div>
            </div>
        </section>
    </main>

    <?php include './includes/footer.php'; ?>

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