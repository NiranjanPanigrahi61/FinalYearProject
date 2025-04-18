<?php include_once "../component/user_nav.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback - Bakery Delight</title>
    <link rel="stylesheet" href="../Bootstrap/bootstrap.min.css">
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

<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="w-80 mx-auto p-4 rounded" style="background-color: #FCEFF4;">
                    <h2 class="mb-4 text-center" style="color: #D02964;">We Value Your Feedback</h2>
                    <h4 class="mb-4 text-center" style="color: #D02964;">Let us know how we can improve!</h4>
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

</body>

</html>
<?php include_once "../component/footer.php"; ?>