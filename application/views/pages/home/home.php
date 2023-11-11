<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIM Bengkel Garasinos | Home</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="<?= base_url('assets/css/home.css') ?>">
</head>

<body>
    <nav class="navbar">
        <ul class="nav">
            <li>
                <a href="#service">Our Service</a>
            </li>
            <li>
                <a href="#location">Location</a>
            </li>
            <li>
                <a href="#contact">Contact</a>
            </li>
            <li>
                <a href="login">Login</a>
            </li>
        </ul>
    </nav>
    <main>
        <section class="section-hero" style="background-image: url('<?= base_url('assets/img/_.jpeg') ?>');">
            <div class="hero">
                <img src="<?= base_url('assets/img/logo3.PNG') ?>" alt="Logo" class="hero-logo">
                <div class="hero-text">
                    WELCOME TO GARASINOS
                </div>
                <a href="#service" class="hero-btn">Our Service</a>
            </div>
        </section>
        <section class="section-service" id="service">
            <h2>OUR SERVICE</h2>
            <div class="service">
                <div class="service-point">
                    <div class="service-icon">
                        <img width="48" height="48" src="https://img.icons8.com/material-outlined/48/car-service.png" alt="car-service" />
                    </div>
                    <p class="service-text">Repair</p>
                </div>
                <div class="service-point">
                    <div class="service-icon">
                        <img width="48" height="48" src="https://img.icons8.com/material-outlined/48/fill-color.png" alt="fill-color" />
                    </div>
                    <p class="service-text">Repaint</p>
                </div>
                <div class="service-point">
                    <div class="service-icon">
                        <img width="48" height="48" src="https://img.icons8.com/material-outlined/48/car.png" alt="car" />
                    </div>
                    <p class="service-text">Restore</p>
                </div>
                <div class="service-point">
                    <div class="service-icon">
                        <img width="48" height="48" src="https://img.icons8.com/material-outlined/48/f1-race-car-top-veiw.png" alt="f1-race-car-top-veiw" />
                    </div>
                    <p class="service-text">Modify</p>
                </div>
                <div class="service-point">
                    <div class="service-icon">
                        <img width="48" height="48" src="https://img.icons8.com/material-outlined/48/flat-tire.png" alt="flat-tire" />
                    </div>
                    <p class="service-text">Spare Parts</p>
                </div>
            </div>
        </section>
        <section class="section-location" id="location" style="background-image: url('<?= base_url('assets/img/chessboard.jpeg') ?>');">
            <h2>LOCATION</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.41210216059!2d106.74252817578223!3d-6.340637862038488!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ef2266d34f2d%3A0x5e7bff48b7dfae28!2sGARASINOS!5e0!3m2!1sid!2sid!4v1699603375010!5m2!1sid!2sid" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>
        <section class="section-contact" id="contact">
            <h2>CONTACT</h2>
            <div class="contact">
                <a href="#">
                    <img src="<?= base_url('assets/logo/facebook.svg') ?>" alt="logo facebook">
                </a>
                <a href="#">
                    <img src="<?= base_url('assets/logo/whatsapp.svg') ?>" alt="logo whatsapp">
                </a>
                <a href="#">
                    <img src="<?= base_url('assets/logo/instagram.svg') ?>" alt="logo instagram">
                </a>
            </div>
        </section>
    </main>
</body>

</html>