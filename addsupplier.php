<?php
include 'nav.php';
include 'includes/config.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sup_name = ucwords(strtolower($_POST['sup_name']));
    $sup_country = ucwords(strtolower($_POST['sup_country']));
    $sup_num = $_POST['sup_num'];
    $sup_brand = ucwords(strtolower($_POST['sup_brand']));

        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO suppliers (sup_name, sup_country, sup_num, sup_brand) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $sup_name, $sup_country, $sup_num, $sup_brand);

        if ($stmt->execute()) {
            $message = "Supplier successfully added to the database!";
            header("Location: supplier.php?message=$message");
            exit();
        } else {
            $message = "Error adding supplier: " . $conn->error;
            // Log the error instead of echoing it
        }

        $stmt->close();
        $conn->close();
    }
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/addsupplier.css">
    <title>Add New Supplier</title>
</head>

<body>
    <div class="top-nav">
        <h1>Add New Supplier</h1>
        <div class="user_and_date">
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

<div class="container">
    <form name="addSupplierForm" class="form" method="POST" onsubmit="return validateForm()" action="addsupplier.php">
        <button class="close-btn" onclick="window.location.href='supplier.php'">&times;</button>
        <h4>Add New Supplier</h4>
        <div class="input-box">
            <label>Supplier Name</label>
            <input type="text" name="sup_name" placeholder="Enter supplier name" required>
        </div>
        <div class="input-box">
            <label>Country</label>
            <input type="text" name="sup_country" placeholder="Enter country" required>
        </div>
        <div class="input-box">
            <label>Phone Number</label>
            <input type="text" name="sup_num" placeholder="Enter phone number" required>
        </div>
        <div class="input-box">
            <label>Brand</label>
            <input type="text" name="sup_brand" placeholder="Enter brand" required>
        </div>
        <button type="submit">Submit</button>
    </form>
</div>

<script>
    function validateForm() {
        var supName = document.forms["addSupplierForm"]["sup_name"].value;
        var supCountry = document.forms["addSupplierForm"]["sup_country"].value;
        var supNum = document.forms["addSupplierForm"]["sup_num"].value;
        var supBrand = document.forms["addSupplierForm"]["sup_brand"].value;

        if (supName.match(/\d/)) {
            alert("Supplier name must not contain any digits.");
            return false;
        }

        if (supCountry.match(/\d/)) {
            alert("Country must not contain any digits.");
            return false;
        }

        if (!supNum.match(/^\d{11}$/)) {
            alert("Phone number must contain exactly 11 digits and no other characters.");
            return false;
        }

        return true;
    }
</script>
</body>

</html>
