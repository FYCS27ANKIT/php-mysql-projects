<?php
include '../dbcon.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "delete from user where id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header("Location: usermanagement.php");
        exit;
    } else {
        echo "Error deleting record: " . $con->error;
    }
} else {
    echo "Invalid id.";
}
?>    