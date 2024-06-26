<?php include 'nav.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/sales.css">
    <title>Manage Sales</title>
</head>

<body>
<div class=" top-nav">
        <h1>Manage Sales</h1>
        <div class=user_and_date>
            <div class="dropdown">
                <div class="username">Avril Abelarde</div>
                <div class="dropdown-content">
                    <a href="profile.php">Profile</a>
                    <a href="#">Settings</a>
                </div>
            </div>
            <div class="date">April 14, 2024</div>
        </div>
    </div>

    <div class="group_names">
        <div class="group_content">
        <div class="title_and_button">
            <h2>Sales</h2>
            <button type="button" onclick="location.href='#'">Print
            </button>
            </div>
            <table class="group_table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>Size</th>
                    <th>Quantity</th>
                    <th>Total Sale</th>
                    <th>Arrive Date</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Fuji</td>
                    <td>75</td>
                    <td>15</td>
                    <td>22,150</td>
                    <td>2024-04-08</td>
                </tr>
                </tbody>
            </table>
        </div>

</body>
</html>