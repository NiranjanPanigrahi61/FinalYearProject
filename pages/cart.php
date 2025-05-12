<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id'])) {
    header("location:/UserLogin.php");
    exit(0);
}

require_once __DIR__ . '/../dbfunctions/cartFunction.php';
include_once __DIR__ . "/../component/user_nav.php";
$cartItems = cartDetails();

$userId = $_SESSION['user_id'];

global $conn;
$addressQry = "SELECT a.delivery_address, a.id FROM address a JOIN user u ON a.userid = u.userid WHERE u.userid = ?";
$addressStmt = $conn->prepare($addressQry);
$addressStmt->bind_param("i", $userId);
$addressStmt->execute();
$addressResult = $addressStmt->get_result();
$userAddress = $addressResult->fetch_assoc()['delivery_address'] ?? 'Address not available';
$addressId = $addressRow['id'] ?? null;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Cart</title>
    <link href="./../Bootstrap/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .cart-card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        .fixed-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 0.5rem;
        }

        @media (max-width: 576px) {
            .fixed-image {
                height: 100px;
            }

            .card-title {
                font-size: 1.1rem;
            }

            .card-text {
                font-size: 0.9rem;
            }
        }

        .btn-custom {
            background-color: #D02964 !important;
            color: white !important;
        }

        .btn-custom:hover {
            background-color: #ED555A !important;
        }

        .quantity-btn {
            background-color: #D02964 !important;
            color: white !important;
            border: none;
            width: 32px;
            height: 32px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            transition: 0.2s ease;
        }

        .quantity-btn:hover {
            background-color: #ED555A !important;
            transform: scale(1.05);
        }

        .summary-card {
            background-color: #ffffff;
            border: none;
            border-radius: 1rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.07);
        }
    </style>
</head>

<body>
    <?php include_once __DIR__ . "/../component/user_nav.php"; ?>

    <div class="container mt-5">
        <h2 class="mb-4 text-center fw-bold" style="color:#D02964;">Your Cart</h2>
        <?php if (!empty($cartItems)) : ?>
            <?php foreach ($cartItems as $item) :
                $isCake = isset($item['weight']) && isset($item['size']);
            ?>
                <div class="card cart-card mb-4 p-3" data-product-id="<?= $item['productid'] ?>" data-product-type="<?= $item['table_name'] ?>">
                    <div class="row g-3 align-items-center">
                        <div class="col-4 col-md-3">
                            <img src="<?= htmlspecialchars($item['image']) ?>" class="fixed-image" alt="<?= htmlspecialchars($item['product_name']) ?>">
                        </div>
                        <div class="col-md-6 col-8">
                            <div class="card-body py-2 px-1">
                                <h2 class="card-title mb-2"><?= htmlspecialchars($item['product_name']) ?></h2>
                                <h5 class="card-text mb-1">Price: ₹<?= number_format($item['price'], 2) ?></h5>
                                <?php if ($isCake): ?>
                                    <p class="card-text mb-1">Weight: <?= htmlspecialchars($item['weight']) ?></p>
                                    <p class="card-text mb-1">Size: <?= htmlspecialchars($item['size']) ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-md-3 col-12 d-flex flex-column align-items-start align-items-md-end justify-content-center gap-2">
                            <div class="d-flex align-items-center gap-1">
                                <button class="btn btn-sm px-2 rounded-circle quantity-btn decrease-btn"> - </button>
                                <span class="mx-2 fw-bold quantity-value">1</span>
                                <button class="btn btn-sm px-2 rounded-circle quantity-btn increase-btn"> + </button>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
            <!-- Order Summary -->
            <div class="container mt-5 mb-5">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6">
                        <div class="card summary-card p-4">
                            <h2 class="text-center mb-3 fw-bold">Order Summary</h2>
                            <h5 class="text-center mb-4">
                                <strong>Total Price:</strong> ₹<span id="total-price"></span>
                            </h5>
                            <h6>Shipping Address:</h6>
                            <p><?= htmlspecialchars($userAddress) ?></p>

                            <button type="submit" class="btn btn-custom w-100 py-2 shadow-sm mt-3" id="order_btn">
                                <b>Order</b>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="alert alert-warning text-center">Your cart is empty.</div>
        <?php endif; ?>
    </div>

    <!-- Order Confirmation Modal -->
    <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderModalLabel">Confirm Your Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Total Price:</strong> ₹<span id="modal-total-price"></span></p>
                    <p><strong>Delivery to:</strong></p>
                    <p><?= htmlspecialchars($userAddress) ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-custom" id="paymentBtn">Pay Now</button>
                </div>
            </div>
        </div>
    </div>

    <?php include_once "../component/footer.php"; ?>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script src="./../Bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../JQuery/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function calculateTotalPrice() {
            let total = 0;

            $('.cart-card').each(function() {
                let priceText = $(this).find('.card-text:contains("Price")').text();
                let price = parseFloat(priceText.replace(/[^0-9.]/g, ''));

                let quantity = parseInt($(this).find('.quantity-value').text()) || 1;

                total += price * quantity;
            });

            $('#total-price').text(total.toFixed(2));
        }

        $(document).ready(function() {
            calculateTotalPrice(); // Initial load

            $('.increase-btn').click(function() {
                let $container = $(this).closest('.d-flex');
                let $quantitySpan = $container.find('.quantity-value');
                let quantity = parseInt($quantitySpan.text());
                quantity++;
                $quantitySpan.text(quantity);
                calculateTotalPrice(); // Update total
            });

            $('.decrease-btn').click(function() {
                let $container = $(this).closest('.d-flex');
                let $quantitySpan = $container.find('.quantity-value');
                let quantity = parseInt($quantitySpan.text());

                if (quantity === 1) {
                    let productId = $(this).closest('.cart-card').data('product-id');

                    $.ajax({
                        url: '../dbfunctions/removeFromCart.php',
                        type: 'POST',
                        data: {
                            product_id: productId
                        },
                        success: function(response) {
                            let res = JSON.parse(response);
                            if (res.status === 'success') {
                                location.reload(); // Item removed, reload page
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: res.message,
                                    confirmButtonColor: '#D02964'
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("AJAX Error:", error);
                        }
                    });
                } else {
                    quantity--;
                    $quantitySpan.text(quantity);
                    calculateTotalPrice(); // Update total
                }
            });
            $('#order_btn').click(function() {
                const totalPrice = $('#total-price').text();
                $('#modal-total-price').text(totalPrice);
                const orderModal = new bootstrap.Modal(document.getElementById('orderModal'));
                orderModal.show();
            });

            // Example confirm button click handler (you can add your order submission here)
            $('#paymentBtn').click(function() {
                const totalPrice = $('#total-price').text();
                const addressId = $('#address-id').val();
                const quantities = [];

                $('.cart-card').each(function() {
                    const productId = $(this).data('product-id');
                    const quantity = parseInt($(this).find('.quantity-value').text());
                    const priceText = $(this).find('.card-text:contains("Price")').text();
                    const price = parseFloat(priceText.replace(/[^0-9.]/g, '')); // Extract numeric price
                    const productType = $(this).data('product-type');

                    quantities.push({
                        product_id: productId,
                        product_type: productType,
                        quantity: quantity,
                        price: price
                    });
                });
                $.ajax({
                    url: '../Razorpay/order.php',
                    method: 'POST',
                    data: {
                        total_price: totalPrice
                    },
                    success: function(data) {
                        var response = JSON.parse(data);
                        var options = {
                            "key": response.key, // Injected securely from .env
                            "amount": response.amount,
                            "currency": "INR",
                            "name": "VELVET CRUST",
                            "description": "Payment For order",
                            "order_id": response.id,
                            "handler": function(paymentResult) {
                                // Once payment is successful, update the order status in the database
                                $.ajax({
                                    url: '../dbfunctions/orderTable.php', // New PHP script to handle successful payment
                                    method: 'POST',
                                    data: {
                                        payment_id: paymentResult.razorpay_payment_id,
                                        order_id: response.id,
                                        address_id: addressId,
                                        quantities: JSON.stringify(quantities)
                                    },
                                    success: function(updateResponse) {
                                        console.log(updateResponse);

                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Payment Successful',
                                            text: 'Your Order is now confirmed!',
                                            confirmButtonColor: '#D02964'
                                        }).then(() => {
                                            // Redirect or refresh if needed
                                           window.location.href = 'productPage.php?id=all'; // Change this if you have a thank you page
                                        });
                                        // You can also close modal or do any other UI updates here
                                    },
                                    error: function() {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Error',
                                            text: 'There was an error updating your order.',
                                            confirmButtonColor: '#D02964'
                                        });
                                    }
                                });
                            },
                            "prefill": {
                                "name": response.name,
                                "email": response.email,
                                "contact": response.phone
                            },
                            "theme": {
                                "color": "#D02964"
                            }
                        };

                        var rzp = new Razorpay(options);
                        rzp.open();
                        $('#orderModal').modal('hide');

                    }
                });
            });

        });
    </script>

</body>

</html>