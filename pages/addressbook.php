<?php
include '../dbfunctions/dbconnect.php';

if (!isset($_SESSION['user_id'])) {
    die("Access denied. Please log in.");
}
$userid = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Saved Addresses</title>
  <link rel="stylesheet" href="../Bootstrap/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    body {
      background-color: #f8f9fa;
    }
    .address-card {
      max-width: 500px; /* Reduced width */
      margin: 0 auto 1rem auto; /* Center aligned with bottom margin */
      border: 1px solid #ced4da;
      border-radius: 0.4rem;
      box-shadow: 0 1px 3px rgba(0,0,0,0.05);
      padding: 0.8rem; /* Slightly reduced padding */
      background-color: #ffffff;
      font-size: 0.9rem; /* Slightly smaller font */
    }
    .address-type {
      font-weight: 600;
      color: #0d6efd;
    }
    .add-address-btn {
      text-align: center;
      color: #0d6efd;
      cursor: pointer;
      padding: 0.6rem;
      border: 1px solid #0d6efd;
      margin-bottom: 1rem;
      border-radius: 0.4rem;
      transition: background-color 0.3s ease;
      font-size: 0.95rem;
    }
    .add-address-btn:hover {
      background-color: #e9f0fc;
    }
    #addressFormDiv {
      background-color: #ffffff;
      padding: 1.2rem;
      border-radius: 0.5rem;
      border: 1px solid #dee2e6;
      margin-top: 1rem;
      max-width: 600px;
      margin-left: auto;
      margin-right: auto;
    }
</style>


</head>
<body>

<div class="container py-4">
  <h4 class="mb-4 text-primary">📍 Saved Addresses</h4>
  <div id="addressContainer" class="mb-4"></div>

  <div id="addressFormDiv" class="card p-4 shadow d-none mb-4">
    <div class="d-flex justify-content-between align-items-center">
      <h5 id="formTitle">Add Delivery Address</h5>
      <button type="button" id="closeFormBtn" class="btn-close"></button>
    </div>
    <form id="addressForm">
      <input type="hidden" name="action" value="addAddress">
      <input type="hidden" name="id" value="">

      <div class="mb-2">
        <label class="form-label">Delivery Address</label>
        <textarea name="delivery_address" class="form-control form-control-sm"></textarea>
      </div>
      <div class="mb-2">
        <label class="form-label">Landmark</label>
        <input type="text" name="landmark" class="form-control form-control-sm">
      </div>
      <div class="row">
        <div class="col-md-6 mb-2">
          <label class="form-label">City</label>
          <input type="text" name="city" class="form-control form-control-sm">
        </div>
        <div class="col-md-6 mb-2">
          <label class="form-label">State</label>
          <input type="text" name="state" class="form-control form-control-sm">
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-2">
          <label class="form-label">Pincode</label>
          <input type="text" name="pincode" class="form-control form-control-sm">
        </div>
        <div class="col-md-6 mb-2">
          <label class="form-label">Country</label>
          <input type="text" name="country" class="form-control form-control-sm">
        </div>
      </div>
      <div class="mb-2">
        <label class="form-label">Type</label>
        <select name="type" class="form-select form-select-sm">
          <option value="">Select Type</option>
          <option value="Home">Home</option>
          <option value="Office">Office</option>
          <option value="College">College</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary btn-sm">💾 Save Address</button>
      <button type="button" id="cancelFormBtn" class="btn btn-outline-secondary btn-sm ms-2">❌ Cancel</button>
    </form>
  </div>

  <div id="addAddressBtn" class="add-address-btn">
    <strong>➕ Add New Address</strong>
  </div>
</div>

<script>
$(document).ready(function () {
  const loadAddresses = () => {
    $.post('../dbfunctions/useraddress.php', { action: 'getAddress' }, function(data) {
      $('#addressContainer').html(data);
    });
  };
  loadAddresses();

  $('#addAddressBtn').click(function () {
    resetForm();
    $('#formTitle').text('Add Delivery Address');
    $('#addressForm input[name="action"]').val('addAddress');
    $('#addressForm button[type="submit"]').text('💾 Save Address');
    $('#addressFormDiv').removeClass('d-none');
    $(this).hide();
  });

  $('#closeFormBtn, #cancelFormBtn').click(function() {
    $('#addressFormDiv').addClass('d-none');
    $('#addAddressBtn').show();
  });

  $('#addressContainer').on('click', '.edit-btn', function() {
    const id = $(this).data('id');
    $.post('../dbfunctions/useraddress.php', { action: 'getAddressDetails', id }, function(data) {
      const address = JSON.parse(data);
      $('textarea[name="delivery_address"]').val(address.delivery_address);
      $('input[name="landmark"]').val(address.landmark);
      $('input[name="city"]').val(address.city);
      $('input[name="state"]').val(address.state);
      $('input[name="pincode"]').val(address.pincode);
      $('input[name="country"]').val(address.country);
      $('select[name="type"]').val(address.type);
      $('input[name="id"]').val(address.id);
      $('#formTitle').text('Edit Delivery Address');
      $('#addressForm input[name="action"]').val('updateAddress');
      $('#addressForm button[type="submit"]').text('💾 Update Address');
      $('#addressFormDiv').removeClass('d-none');
      $('#addAddressBtn').hide();
    });
  });

  $('#addressForm').on('submit', function (e) {
    e.preventDefault();

    const delivery = $('textarea[name="delivery_address"]').val().trim();
    const landmark = $('input[name="landmark"]').val().trim();
    const city = $('input[name="city"]').val().trim();
    const state = $('input[name="state"]').val().trim();
    const pincode = $('input[name="pincode"]').val().trim();
    const country = $('input[name="country"]').val().trim();
    const type = $('select[name="type"]').val();

    const nameRegex = /^[a-zA-Z\s]{2,}$/;
    const pincodeRegex = /^\d{6}$/;

    if (!delivery) {
      Swal.fire("Validation Error", "Please enter delivery address", "error");
      return;
    }
    if (!landmark) {
      Swal.fire("Validation Error", "Please enter landmark", "error");
      return;
    }
    if (!city || !nameRegex.test(city)) {
      Swal.fire("Validation Error", "Please enter a valid city (only letters)", "error");
      return;
    }
    if (!state || !nameRegex.test(state)) {
      Swal.fire("Validation Error", "Please enter a valid state (only letters)", "error");
      return;
    }
    if (!pincode || !pincodeRegex.test(pincode)) {
      Swal.fire("Validation Error", "Please enter a valid 6-digit pincode", "error");
      return;
    }
    if (!country || !nameRegex.test(country)) {
      Swal.fire("Validation Error", "Please enter a valid country (only letters)", "error");
      return;
    }
    if (!type) {
      Swal.fire("Validation Error", "Please select address type", "error");
      return;
    }

    $.ajax({
      url: '../dbfunctions/useraddress.php',
      method: 'POST',
      data: $(this).serialize(),
      success: function () {
        Swal.fire({
          title: "Success!",
          text: "Address saved successfully",
          icon: "success",
          timer: 1500,
          showConfirmButton: false
        });
        resetForm();
        loadAddresses();
      },
      error: function() {
        Swal.fire("Error", "Failed to save address", "error");
      }
    });
  });

  $('#addressContainer').on('click', '.delete-btn', function () {
    const id = $(this).data('id');
    Swal.fire({
      title: "Delete Address?",
      text: "Are you sure you want to delete this address?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "Cancel"
    }).then(result => {
      if (result.isConfirmed) {
        $.post('../dbfunctions/useraddress.php', { action: 'deleteAddress', id }, function () {
          Swal.fire({
            title: "Deleted!",
            text: "Address has been deleted",
            icon: "success",
            timer: 1500,
            showConfirmButton: false
          });
          loadAddresses();
        });
      }
    });
  });

  function resetForm() {
    $('#addressForm')[0].reset();
    $('#addressForm input[name="id"]').val('');
    $('#addressForm input[name="action"]').val('addAddress');
    $('#addressForm button[type="submit"]').text('💾 Save Address');
    $('#addressFormDiv').addClass('d-none');
    $('#addAddressBtn').show();
  }
});
</script>

</body>
</html>
