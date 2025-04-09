<?php
session_start();
include 'include/header.php';
include 'dbcon.php';

$user_id = '';
$name = '';
$email = '';
$username = '';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM User WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
        $username = $row['Username'];
    } else {
        echo "User not found.";
        exit();
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];

    $update_query = "UPDATE User SET name = ?, email = ?, username = ? WHERE id = ?";
    $stmt = $con->prepare($update_query);
    $stmt->bind_param("sssi", $name, $email, $username, $user_id);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>User updated successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Failed to update user.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
    />
    <style>
        .card{
            width: 50%;
        }
        @media only screen and (width<768px){
            .card{
                width: 100%;
            }
        }
    </style>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container d-flex justify-content-center mt-4">
    <div class="card shadow mt-5 p-4 px-5">
    <h2><?php echo "Hi " . $username;?></h2>
    <form method="POST" action="" class="mt-3">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($user_id); ?>">
        
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
        </div>
        
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
        </div>
        
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" required>
        </div>
        <div
            class="row justify-content-center align-items-center g-2"
        >
            <div class="col-sm-12 col-md-6 col-lg-6">
                <button type="submit" class="btn1 btn-primary">Update</button>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <input type="button" class="btn1 btn-secondary" value="Cancel" onclick="window.location.href='index.php';">
            </div>
        </div>
    </form>
    </div>
</div>

<script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous">
</script>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous">
</script>
</body>
</html>
