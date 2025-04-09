<?php
// Database connection
session_start();
include 'include/header.php';
include 'dbcon.php';
if(!isset($_SESSION['user_id'])){
    header("location:login.php");
}

$sql = "SELECT name, description, mrp, offer, image FROM Product";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .addbutton {
            background-color: #007BFF; 
            margin-bottom:0px 0px 5px 0px;
            width: 15%;
            float : right;
            padding: 6px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        .addbutton a{
            text-decoration : none;
            color : #fff;
            font-size : 16px;
        }
        .addbutton:hover {
            background-color: #0056b3;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
            border: 1px solid rgb(30, 27, 27);
            transform: translateY(-2px);
        }
    </style>
</head>
<body style="font-family: 'Times New Roman', Times, serif;">
<div class="container my-5">
    <button class="addbutton"><a href="addproject.php">Add Product</a></button>
    <h1 class="mb-4 text-center border-bottom border-2 border-dark">Product List</h1>
    <div class="row">
        <?php
        if ($result->num_rows > 0) {
            // Loop through each product
            while ($row = $result->fetch_assoc()) {
                $finalPrice = $row['offer'] ?: $row['mrp'];
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['name']; ?></h5>
                            <p class="card-text">
                                <?php echo substr($row['description'], 0, 100) . '...'; ?>
                            </p>
                            <p class="card-text">
                                <strong>Price:</strong>
                                <?php if ($row['offer']) { ?>
                                    <span class="text-muted text-decoration-line-through">$<?php echo $row['mrp']; ?></span>
                                    <span class="text-success">$<?php echo $row['offer']; ?></span>
                                <?php } else { ?>
                                    $<?php echo $row['mrp']; ?>
                                <?php } ?>
                            </p>
                            <a href="#" class="btn btn-primary w-100">Buy Now</a>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p class='text-center'>No products available.</p>";
        }
        ?>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Close the database connection
$con->close();
?>
