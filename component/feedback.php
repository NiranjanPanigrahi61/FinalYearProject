<?php include_once "../component/user_nav.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Feedback - Bakery Delight</title>
    <link rel="stylesheet" href="../Bootstrap/bootstrap.min.css" />
    <style>
        /* Custom Button Style */
        .btn-custom {
            background: linear-gradient(45deg, #D02964, #fc8f59);
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background: linear-gradient(45deg, #fc8f59, #D02964);
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
            transform: translateY(-2px);
        }

        .btn-custom:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(240, 144, 94, 0.5);
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

                    <!-- Alert Box -->
                    <div id="formAlert" class="alert alert-danger d-none" role="alert"
                        style="color: #D02964; background-color: #ffe5ec; border-color: #f7a1b3;">
                    </div>

                    <form id="feedbackForm">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control bg-white" id="name" placeholder="Name"
                                style="color: #D02964;" />
                            <label for="name" class="fw-semibold" style="color: #D02964;">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control bg-white" id="email" placeholder="Email"
                                style="color: #D02964;" />
                            <label for="email" class="fw-semibold" style="color: #D02964;">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control bg-white" placeholder="Message" id="message"
                                style="height: 150px; color: #D02964;"></textarea>
                            <label for="message" class="fw-semibold" style="color: #D02964;">Message</label>
                        </div>
                        <button type="submit" class="btn btn-custom w-100">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="../Bootstrap/bootstrap.bundle.min.js"></script>

    <!-- Validation Script -->
    <script>
        document.getElementById("feedbackForm").addEventListener("submit", function (e) {
            const name = document.getElementById("name").value.trim();
            const email = document.getElementById("email").value.trim();
            const message = document.getElementById("message").value.trim();
            const alertBox = document.getElementById("formAlert");

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
                errors.push("Message should be at least 10 characters long.");
            }

            if (errors.length > 0) {
                e.preventDefault();
                alertBox.innerHTML = errors.join("<br>");
                alertBox.classList.remove("d-none");
            } else {
                alertBox.classList.add("d-none");
            }
        });
    </script>

</body>

</html>

<?php include_once "../component/footer.php"; ?>
