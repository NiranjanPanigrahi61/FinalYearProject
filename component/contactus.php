<?php include_once "../component/user_nav.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us - Bakery Delight</title>
    <link rel="stylesheet" href="../Bootstrap/bootstrap.min.css" />
    <style>
        /* Custom Button Style */
        .btn-custom {
            background: linear-gradient(45deg, #D02964, #fc8f59);
            /* Gradient color */
            color: white;
            /* Text color */
            border: none;
            /* No border */
            padding: 10px 20px;
            /* Padding */
            font-size: 16px;
            /* Font size */
            font-weight: bold;
            /* Bold text */
            border-radius: 5px;
            /* Rounded corners */
            transition: all 0.3s ease;
            /* Smooth transition for hover effect */
        }

        /* Hover effect */
        .btn-custom:hover {
            background: linear-gradient(45deg, #fc8f59, #D02964);
            /* Reverse gradient on hover */
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
            /* Subtle shadow on hover */
            transform: translateY(-2px);
            /* Slight upward movement on hover */
        }

        /* Focus effect */
        .btn-custom:focus {
            outline: none;
            /* Remove default focus outline */
            box-shadow: 0 0 0 3px rgba(240, 144, 94, 0.5);
            /* Subtle focus outline */
        }
    </style>
</head>

<body class="bg-body text-body">

    <!-- Section 1: Get in Touch -->
    <div class="container-fluid py-2"
        style="background-image: url('../assets/contactus.jpg'); background-size: cover; background-position: center;">
        <h2 class="text-center fw-bold" style="color: #D02964;">Contact Us</h2>
        <div class="row justify-content-start">
            <div class="col-md-6 col-lg-5 px-5 py-4">
                <h4 class="fw-bold" style="color: #D02964;">Get in Touch</h4>
                <p style="color: #D02964;"><strong>Address:</strong> Sector 4, Bhubaneswar, India</p>
                <p style="color: #D02964;"><strong>Phone:</strong> +91 7208946835</p>
                <p style="color: #D02964;"><strong>Email:</strong> bakery@gmail.com</p>
                <p style="color: #D02964;"><strong>Opening Hours:</strong> Mon-Sat: 8am - 8pm, Sun: 10am - 6pm</p>
            </div>
        </div>
    </div>

    <!-- Section 2: Contact Form -->
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="w-80 mx-auto p-4 rounded" style="background-color: #FCEFF4;">
                    <h2 class="mb-4 text-center" style="color: #D02964;">Have a Query?</h2>
                    <form>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control bg-white" id="name" placeholder="Name"
                                style="color: #D02964;">
                            <label for="name" class="fw-semibold" style="color: #D02964;">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control bg-white" id="email" placeholder="Email"
                                style="color: #D02964;">
                            <label for="email" class="fw-semibold" style="color: #D02964;">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control bg-white" placeholder="Message" id="message"
                                style="height: 150px; color: #D02964;"></textarea>
                            <label for="message" class="fw-semibold" style="color: #D02964;">Message</label>
                        </div>
                        <button type="submit" class="btn btn-custom w-100">Send Message</button> <!-- Custom Button -->
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Section 3: Map -->
    <div class="row mb-5">
        <h2 class="text-center" style="color: #D02964;">Find Us</h2> <!-- Centered and colored heading -->
        <div class="col-12">
            <h4 class="text-center text-white mb-3">Find Us on the Map</h4>
            <div class="ratio ratio-16x9 rounded shadow">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3555.6899659091905!2d85.80376107501212!3d20.35067728113433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a1908e064769e73%3A0x9288172f3a98c7a4!2sSilicon%20University!5e1!3m2!1sen!2sin!4v1744912725833!5m2!1sen!2sin"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.querySelector("form");

        form.addEventListener("submit", function (e) {
            const name = document.getElementById("name").value.trim();
            const email = document.getElementById("email").value.trim();
            const message = document.getElementById("message").value.trim();

            const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            const namePattern = /^[a-zA-Z\s'-]+$/;

            let errors = [];

            if (!namePattern.test(name)) {
                errors.push("Please enter a valid name (letters only).");
            }

            if (!emailPattern.test(email)) {
                errors.push("Please enter a valid email address.");
            }

            if (message.length < 10) {
                errors.push("Message must be at least 10 characters long.");
            }

            if (errors.length > 0) {
                e.preventDefault();
                alert(errors.join("\n"));
            }
        });
    });
</script>


    <script src="../Bootstrap/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php include_once "../component/footer.php"; ?>