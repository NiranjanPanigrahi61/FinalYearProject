<?php include_once "../component/user_nav.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Feedback - Bakery Delight</title>
    <link rel="stylesheet" href="../Bootstrap/bootstrap.min.css" />

    <!-- Include jQuery first -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Include SweetAlert2 for alerts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
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
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="w-80 mx-auto p-4 rounded" style="background-color: #FCEFF4;">
                    <h2 class="mb-4 text-center" style="color: #D02964;">We Value Your Feedback</h2>
                    <h4 class="mb-4 text-center" style="color: #D02964;">Let us know how we can improve!</h4>

                    <form id="feedbackForm">
                        <div class="form-floating mb-3">
                            <input type="text" id="name" class="form-control bg-white" placeholder="Name" />
                            <label for="name" style="color: #D02964;">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" id="email" class="form-control bg-white" placeholder="Email" />
                            <label for="email" style="color: #D02964;">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea id="message" class="form-control bg-white" style="height: 150px;" placeholder="Message"></textarea>
                            <label for="message" style="color: #D02964;">Message</label>
                        </div>
                        <button type="submit" class="btn btn-custom w-100">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Include Bootstrap JS -->
    <script src="../Bootstrap/bootstrap.bundle.min.js"></script>
    <!-- Your custom script that uses jQuery -->
    <script>
        $("#feedbackForm").on("submit", function (e) {
            e.preventDefault();

            const name = $("#name").val().trim();
            const email = $("#email").val().trim();
            const message = $("#message").val().trim();

            const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            const namePattern = /^[a-zA-Z\s'-]+$/;
            // Client-side validation
            if (!namePattern.test(name)) {
                Swal.fire('Invalid Name', 'Please enter a valid name.', 'warning');
                return;
            }

            if (!emailPattern.test(email)) {
                Swal.fire('Invalid Email', 'Please enter a valid email.', 'warning');
                return;
            }

            if (message.length < 10) {
                Swal.fire('Message Too Short', 'Please enter at least 10 characters.', 'warning');
                return;
            }

            // AJAX request
            $.ajax({
                url: "../dbfunctions/feedbackfunction.php",
                type: "POST",
                dataType: "json", // <--- ADD THIS
                data: { name: name, email: email, message: message },
                success: function (data) {
                    console.log(data); // You'll now see an object, not a raw string

                    if (data.notLoggedIn) {
                        Swal.fire('Not Logged In', data.message, 'warning');
                    } else if (data.success) {
                        $("#feedbackForm")[0].reset();
                        Swal.fire('Thank You!', data.message, 'success');
                    } else {
                        Swal.fire('Error', data.message || 'An error occurred.', 'error');
                    }
                },
                error: function (xhr, status, err) {
                    Swal.fire('Error', 'AJAX failed: ' + err, 'error');
                }
            });


        });
    </script>
</body>

</html>
<?php include_once "../component/footer.php"; ?>