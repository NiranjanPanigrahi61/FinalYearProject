<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Products</title>
    <link rel="stylesheet" href="../Bootstrap/bootstrap.min.css">
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }
        .head p {
            font-size: 1.5rem;
            color: #FC8F59;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .head h3 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #222;
        }
        .card{
            margin-top: 15px;
            margin-bottom: 15px; 
        }

         .card-text {
            font-family: 'Poppins', sans-serif;
         } 

        .card-body {
            background-color: #f3f1ed;
        }

        .card {
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
            border-color: #f23232;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="container mt-5 text-center" id="container">
        <div class="row justify-content-center border border-danger-subtle rounded" style="background-color: #D02964;">
            <div class="col-12 ">
                <div class="head" >
                    <p class=" fw-bold">You'll love</p>
                    <h3 class="text-white fw-bold">OUR PRODUCTS</h3>
                </div>
            </div>
        </div>
        <div class="row mt-2" id="card">
            <!-- cakes -->
            <div class="col-md-3">
                <div class="card h-70">
                    <img src="../assets/cake3.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Cakes</h5>
                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                        <a href="#" class="btn btn-danger">View More</a>
                    </div>
                </div>
            </div>

            <!-- Bread -->
            <div class="col-md-3">
                <div class="card h-70">
                    <img src="../assets/bread.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Bread</h5>
                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                        <a href="#" class="btn btn-danger">View More</a>
                    </div>
                </div>
            </div>

            <!-- Pastries -->
            <div class="col-md-3">
                <div class="card h-70">
                    <img src="../assets/pastries.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Pastries</h5>
                        <!-- <p class="card-text">Every bite is a taste of culinary excellence</p> -->
                        <a href="#" class="btn btn-danger">View More</a>
                    </div>
                </div>
            </div>

            <!-- Brownies -->
            <div class="col-md-3">
                <div class="card h-70">
                    <img src="../assets/brownie1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Brownies</h5>
                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                        <a href="#" class="btn btn-danger">View More</a>
                    </div>
                </div>
            </div>

            <!-- Cookies -->
            <div class="col-md-3">
                <div class="card h-70">
                    <img src="../assets/cookie.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Cookies</h5>
                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                        <a href="#" class="btn btn-danger">View More</a>
                    </div>
                </div>
            </div>

            <!-- sandwich -->
            <div class="col-md-3">
                <div class="card h-70">
                    <img src="../assets/sandwich.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Sandwich</h5>
                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                        <a href="#" class="btn btn-danger">View More</a>
                    </div>
                </div>
            </div>

            <!-- Burger -->
            <div class="col-md-3">
                <div class="card h-70">
                    <img src="../assets/burger.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Burger</h5>
                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                        <a href="#" class="btn btn-danger">View More</a>
                    </div>
                </div>
            </div>

            <!-- Muffins & Donuts -->
            <div class="col-md-3">
                <div class="card h-70">
                    <img src="../assets/Donuts.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"> Donuts</h5>
                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                        <a href="#" class="btn btn-danger">View More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../Bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>
