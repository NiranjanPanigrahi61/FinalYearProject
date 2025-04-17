<?php
require_once "../../dbfunctions/adminfunctions.php";

include_once "./AdminTopNavBar.php";
include_once "./AdminSideNavBar.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="../../Bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .form-check-input {
            width: 50px !important;
            height: 25px;
            background-color: red;
            border-color: red;
            cursor: pointer;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .form-check-input:checked {
            background-color: green;
            border-color: green;
        }

        .item-block {
            position: fixed;
            margin-top: 110px;
            margin-left: 275px;
            height: 600px;
            overflow-y: auto;
        }

        @media (max-width: 768px) {
            .item-block {
                margin-left: 0;
                margin-top: 86px;
            }
        }

        th {
            background-color: black !important;
            color: white !important;
        }

        .content-block {
            height: 500px;
            overflow-y: auto;
        }

        #suggestions {
            top: 100%;
            left: 0;
            right: 0;
            max-height: 200px;
            overflow-y: auto;
            z-index: 1050;
        }

        #suggestions li:hover {
            background-color: #f8d7da;
            cursor: pointer;
        }

        tr.highlighted td {
            box-shadow: 0 0 10px 3px #FC8F59 inset, 0 0 8px 2px #FC8F59;
            transition: box-shadow 0.3s ease-in-out;
        }

        tr.hidden-row {
            display: none;
        }
    </style>
</head>

<body>
    <?php
    $k = 1;
    $data = showItems();
    if ($data) {
    ?>
        <div class="container item-block">
            <h3>Available Items</h3>

            <form class="w-50 mb-3 position-relative d-flex align-items-end gap-1" onsubmit="return false;">
                <div class="form-floating flex-grow-1 position-relative">
                    <input type="search" class="form-control" id="searchInput" placeholder="Search items..." name="search" autocomplete="off">
                    <label for="searchInput">Search items...</label>
                    <ul id="suggestions" class="list-group position-absolute w-100"></ul>
                </div>
                <button id="searchBtn" class="btn btn-outline-danger p-3 w-25" type="button">
                    <i class="bi bi-search"></i>
                </button>
            </form>

            <div class="content-block">
                <table class="table table-striped w-75 border border-danger">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="itemTableBody">
                        <?php
                        while ($row = $data->fetch_assoc()) {
                            $status = $row['status'];
                            $isChecked = $status === 'active' ? 'checked' : '';
                        ?>
                            <tr>
                                <td><?= $k++; ?></td>
                                <td><?= $row['name']; ?></td>
                                <td><?= $row['created_at'] ?></td>
                                <td><?= $row['updated_at'] ?></td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input toggle-status" type="checkbox" role="switch" data-id="<?= $row['id']; ?>" <?= $isChecked; ?>>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php } ?>

    <script src="./../../JQuery/jquery-3.7.1.js"></script>
    <script src="../../Bootstrap/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            const $input = $('#searchInput');
            const $suggestions = $('#suggestions');
            const $rows = $('#itemTableBody tr');

            // Live filtering while typing
            $input.on('input', function() {
                const val = $(this).val().toLowerCase().trim();
                $suggestions.empty();
                $rows.removeClass('highlighted');

                if (val === '') {
                    $rows.show();
                    return;
                }

                let hasMatches = false;

                $rows.each(function() {
                    const rowText = $(this).find('td:nth-child(2)').text().toLowerCase();
                    if (rowText.includes(val)) {
                        $(this).show();
                        hasMatches = true;
                        $suggestions.append(`<li class="list-group-item list-group-item-action">${rowText}</li>`);
                    } else {
                        $(this).hide();
                    }
                });

                if (!hasMatches) {
                    $suggestions.append(`<li class="list-group-item disabled">No matches</li>`);
                }
            });

            // Suggestion click
            $suggestions.on('click', 'li', function() {
                const text = $(this).text();
                $input.val(text);
                $suggestions.empty();
                exactSearch(text);
            });

            // Button search - exact match
            $('#searchBtn').on('click', function() {
                const val = $input.val().trim();
                if (val !== '') {
                    exactSearch(val);
                }
            });

            // Enter key triggers exact match
            $input.on('keydown', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    const val = $input.val().trim();
                    if (val !== '') {
                        exactSearch(val);
                    }
                }
            });

            // Exact match search + highlight + scroll
            function exactSearch(text) {
                let found = false;
                $rows.removeClass('highlighted');

                $rows.each(function() {
                    const name = $(this).find('td:nth-child(2)').text().trim();
                    if (name.toLowerCase() === text.toLowerCase()) {
                        $rows.hide();
                        $(this).show().addClass('highlighted');
                        this.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });

                        // Optional: Remove glow after 3 seconds
                        setTimeout(() => {
                            $(this).removeClass('highlighted');
                        }, 3000);

                        found = true;
                        return false;
                    }
                });

                if (!found) {
                    alert('Exact match not found.');
                }
            }

            // Hide suggestions when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('#searchInput').length) {
                    $suggestions.empty();
                }
            });

            // Toggle status with AJAX
            $('.toggle-status').on('change', function() {
                const checkbox = $(this);
                const id = checkbox.data('id');
                const status = checkbox.is(':checked') ? 'active' : 'inactive';

                $.ajax({
                    url: '../../dbfunctions/adminfunctions.php',
                    type: 'POST',
                    data: {
                        id: id,
                        status: status
                    },
                    success: function(response) {
                        if (response !== 'success') {
                            alert("Failed to update status.");
                        }
                    },
                    error: function() {
                        alert("AJAX error occurred.");
                    }
                });
            });
        });
    </script>

</body>

</html>