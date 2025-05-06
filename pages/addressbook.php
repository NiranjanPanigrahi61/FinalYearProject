<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Address Book</title>
    <link href="../Bootstrap/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h3 class="mb-4">📍 Address Book</h3>

    <div id="addressList" class="mb-4"></div>

    <button id="addAddressBtn" class="btn btn-success mb-3">➕ Add New Address</button>

    <!-- Hidden Add/Edit Form -->
    <div id="addressForm" style="display: none;">
        <h4 id="formTitle">➕ Add New Address</h4>
        <form id="addressFormElement">
            <input type="hidden" id="address_id" name="address_id">
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address" rows="2" required></textarea>
            </div>
            <div class="mb-3">
                <label for="landmark" class="form-label">Landmark</label>
                <input type="text" class="form-control" id="landmark" name="landmark" required>
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" required>
            </div>
            <div class="mb-3">
                <label for="state" class="form-label">State</label>
                <input type="text" class="form-control" id="state" name="state" required>
            </div>
            <div class="mb-3">
                <label for="postalCode" class="form-label">Postal Code</label>
                <input type="text" class="form-control" id="postalCode" name="postalCode" required>
            </div>
            <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <input type="text" class="form-control" id="country" name="country" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Type</label><br>
                <input type="radio" name="type" value="Home" id="home"> <label for="home">Home</label>
                <input type="radio" name="type" value="Office" id="office" class="ms-3"> <label for="office">Office</label>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" id="cancelBtn">Cancel</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../Bootstrap/bootstrap.bundle.min.js"></script>

<script>
  const endpoint = './dbfunction/useraddressfunction.php';

  function loadAddresses() {
    $.post(endpoint, { action: 'get_all' }, function (response) {
      let res = JSON.parse(response);
      if (res.success) {
        let html = '';
        res.data.forEach(function (item) {
          html += `
            <div class="card mb-2">
              <div class="card-body">
                <h5 class="card-title">${item.type} Address</h5>
                <p class="card-text">
                  <strong>Address:</strong> ${item.delivery_address}<br>
                  <strong>Landmark:</strong> ${item.landmark}<br>
                  <strong>City:</strong> ${item.city}<br>
                  <strong>State:</strong> ${item.state}<br>
                  <strong>Pincode:</strong> ${item.pincode}<br>
                  <strong>Country:</strong> ${item.country}
                </p>
                <button class="btn btn-sm btn-primary editBtn" data-id="${item.address_id}">Edit</button>
                <button class="btn btn-sm btn-danger deleteBtn" data-id="${item.address_id}">Delete</button>
              </div>
            </div>`;
        });
        $('#addressList').html(html);
      } else {
        $('#addressList').html(`<p class="text-danger">${res.message}</p>`);
      }
    });
  }

  $(document).ready(function () {
    loadAddresses();

    $('#addAddressBtn').click(function () {
      $('#formTitle').text('➕ Add New Address');
      $('#addressFormElement')[0].reset();
      $('#address_id').val('');
      $('#addressForm').show();
      $('#addAddressBtn').hide();
    });

    $('#cancelBtn').click(function () {
      $('#addressForm').hide();
      $('#addAddressBtn').show();
    });

    $('#addressList').on('click', '.editBtn', function () {
      const id = $(this).data('id');
      $.post(endpoint, { action: 'get_single', address_id: id }, function (response) {
        const res = JSON.parse(response);
        if (res.success) {
          const d = res.data;
          $('#formTitle').text('✏️ Edit Address');
          $('#address_id').val(d.address_id);
          $('#address').val(d.delivery_address);
          $('#landmark').val(d.landmark);
          $('#city').val(d.city);
          $('#state').val(d.state);
          $('#postalCode').val(d.pincode);
          $('#country').val(d.country);
          $('input[name="type"][value="' + d.type + '"]').prop('checked', true);
          $('#addressForm').show();
          $('#addAddressBtn').hide();
        } else {
          alert(res.message);
        }
      });
    });

    $('#addressList').on('click', '.deleteBtn', function () {
      if (confirm("Are you sure you want to delete this address?")) {
        const id = $(this).data('id');
        $.post(endpoint, { action: 'delete', address_id: id }, function (response) {
          const res = JSON.parse(response);
          if (res.success) {
            loadAddresses();
          } else {
            alert(res.message);
          }
        });
      }
    });

    $('#addressFormElement').submit(function (e) {
      e.preventDefault();

      if (!$('#address').val().trim() || !$('#landmark').val().trim() ||
          !$('#city').val().trim() || !$('#state').val().trim() ||
          !$('#postalCode').val().trim() || !$('#country').val().trim() ||
          !$('input[name="type"]:checked').val()) {
        alert('Please fill all fields and select an address type.');
        return;
      }

      const action = $('#address_id').val() ? 'update' : 'add';

      const formData = {
        action: action,
        address_id: $('#address_id').val(),
        address: $('#address').val().trim(),
        landmark: $('#landmark').val().trim(),
        city: $('#city').val().trim(),
        state: $('#state').val().trim(),
        postalCode: $('#postalCode').val().trim(),
        country: $('#country').val().trim(),
        type: $('input[name="type"]:checked').val()
      };

      $.post(endpoint, formData, function (response) {
        const res = JSON.parse(response);
        if (res.success) {
          $('#addressFormElement')[0].reset();
          $('#addressForm').hide();
          $('#addAddressBtn').show();
          loadAddresses();
        } else {
          alert(res.message);
        }
      });
    });
  });
</script>

</body>
</html>
