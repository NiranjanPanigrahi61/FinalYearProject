<?php include_once "../component/user_nav.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Bakery Delight</title>
    <link rel="stylesheet" href="../Bootstrap/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4 text-white">Contact Us</h2>
        <div class="row">
            <div class="col-md-6 p-4 bg-danger text-white rounded shadow">
                <h4>Get in Touch</h4>
                <p><strong>Address:</strong> 123 Bakery St, Sweet Town, USA</p>
                <p><strong>Phone:</strong> +1 234 567 890</p>
                <p><strong>Email:</strong> contact@bakerydelight.com</p>
                <p><strong>Opening Hours:</strong> Mon-Sat: 8am - 8pm, Sun: 10am - 6pm</p>
            </div>
            <div class="col-md-6">
                <img src="../assets/contact_us.jpg" alt="Contact Us" class="img-fluid rounded shadow">
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6 p-4 bg-danger text-white rounded shadow">
                <h4>Send a Message</h4>
                <form>
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" placeholder="Enter your name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea class="form-control" rows="4" placeholder="Enter your message"></textarea>
                    </div>
                    <button type="submit" class="btn w-100 fw-bolder" style="background-color: #fc8f59">Send Message</button>
                </form>
            </div>
            <div class="col-md-6">
                <h4 class="text-white text-center">Find Us on the Map</h4>
                <div class="ratio ratio-16x9 rounded shadow">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.83543450937!2d144.9537363159045!3d-37.81627974202127!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf5779f4c0f1b2a2!2sBakery!5e0!3m2!1sen!2sus!4v1630982028369!5m2!1sen!2sus" 
                        allowfullscreen loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
    <script src="../Bootstrap/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php include_once "../component/footer.php"; ?>
