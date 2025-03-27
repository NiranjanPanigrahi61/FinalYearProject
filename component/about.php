<?php include_once "../component/user_nav.php"; ?>

<style>
    .about-banner {
        background: url('https://via.placeholder.com/1200x400') no-repeat center center/cover;
        height: 400px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
    }
    
    .about-banner h1 {
        font-size: 50px;
    }

    /* Card Styling */
    .card {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        cursor: pointer;
        height: 100%; /* Ensures all cards have the same height */
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    /* Ensure equal card height */
    .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        flex-grow: 1;
    }
</style>

<div class="about-banner fs-5 d-flex flex-column justify-content-center align-items-center text-white text-center min-vh-50" style="background-image: url('../assets/about_bg.jpg'); background-size: cover; background-position: center;">
    <h1>About Us</h1>
</div>

<div class="container py-5">
    <section>
        <h2 class="text-center mb-4">Welcome to Silicon New Baking</h2>
        <p class="lead text-center">
            Silicon New Baking is your go-to destination for delightful baked goods and customizable cakes. Founded in
            2024 by three passionate MCA students, Subhendu Behera, Niranjan Panigrahi, and Biswabishal Senapati, we aim
            to bring joy to your special moments with our wide range of bakery products.
        </p>
    </section>

    <section class="mt-5">
        <!-- all the lists are links -->
        <h3>What We Offer</h3>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <a href="<?= BASE_URL ?>pages/Customize.php" class="text-decoration-none text-dark">Customizable cakes for every occasion</a>
            </li>
            <li class="list-group-item">
                <a href="bakery_products.php" class="text-decoration-none text-dark">Freshly baked bread, biscuits, cookies, and other bakery delights</a>
            </li>
            <li class="list-group-item">
                <a href="services.php" class="text-decoration-none text-dark">Friendly service and attention to detail in all our offerings</a>
            </li>
        </ul>
    </section>

    <section class="team-section">
        <h3 class="text-center mb-4">Meet Our Founders</h3>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <a href="http://www.linkedin.com/in/subhendu-behera-107474256" class="text-decoration-none">
                    <div class="card h-100">
                        <img src="../assets/subhendu1.jpg" class="card-img-top" alt="Subhendu Behera">
                        <div class="card-body">
                            <h5 class="card-title">Subhendu Behera</h5>
                            <p class="card-text">A tech enthusiast with a passion for baking and creating innovative
                                solutions for the modern bakery experience.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col">
                <a href="https://www.linkedin.com/in/niranjan-panigrahi56/" class="text-decoration-none">
                    <div class="card h-100">
                        <img src="../assets/niranjan1.jpg" class="card-img-top" alt="Niranjan Panigrahi">
                        <div class="card-body">
                            <h5 class="card-title">Niranjan Panigrahi</h5>
                            <p class="card-text">Combining creativity and dedication, Niranjan brings a unique touch to
                                every baked creation.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col">
                <a href="https://www.linkedin.com/in/biswabishalsenapati21" class="text-decoration-none">
                    <div class="card h-100">
                        <img src="../assets/biswa1.jpg" class="card-img-top" alt="Biswabishal Senapati">
                        <div class="card-body">
                            <h5 class="card-title">Biswabishal Senapati</h5>
                            <p class="card-text">Driven by a love for quality and detail, Biswabishal ensures every product
                                meets our high standards.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
</div>

<?php include_once "../component/footer.php"; ?>
