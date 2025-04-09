<?php
include '../dbcon.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Get the image file name from the database
    $sql = "SELECT image FROM Product WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $image = $row['image'];

        $deleteSql = "DELETE FROM Product WHERE id = ?";
        $deleteStmt = $con->prepare($deleteSql);
        $deleteStmt->bind_param("i", $id);
        
        if ($deleteStmt->execute()) {
            // If image exists, delete it from the server
            $imagePath = "uploads/" . $image; // Assuming images are stored in the 'uploads' folder
            if (file_exists($imagePath)) {
                unlink($imagePath); // Delete the image file
            }

            // Redirect to the product list page (index.php or whatever page you use)
            header("Location: productmanagement.php");
            exit;
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        echo "Product not found.";
    }
} else {
    echo "Invalid request.";
}

// Close the database connection
$con->close();
?>

?>