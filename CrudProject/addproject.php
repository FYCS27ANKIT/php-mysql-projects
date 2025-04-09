<?php
    session_start();
    include 'include/header.php';
    include 'dbcon.php';
    if(!isset($_SESSION['user_id'])){
	    header("location:login.php");
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $pname = $_POST['pname'];
        $price = $_POST['price'];
        $o_price = $_POST['o_price'];
        $pdesc = $_POST['pdesc'];
        $pimage = $_FILES['pimage']['name'];
        $tmp_name = $_FILES['pimage']['tmp_name'];
        $folder = "images/".$pimage;
        move_uploaded_file($tmp_name, $folder);
        $stmt = $con->prepare("INSERT INTO Product (name,description, mrp, offer, image) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $pname, $pdesc, $price, $o_price, $folder);
        $stmt->execute();
        $stmt->close();
        $con->close();
        header("location:products.php");
    }
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Products</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <header>
        </header>
        <main>
            <div
                class="container"
            >
                <center>
                    <h4 class="border-bottom border-3 border-dark w-50 my-3">Add Project</h4>

                <div
                    class="row justify-content-center align-items-center g-2 p-3"
                >
                    <div class="col-sm-12 col-md-8 col-lg-6">
                
                <div class="card shadow p-4" align-center">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div
                            class="row justify-content-center align-items-center text-start g-2"
                        >
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="pname"
                                        id=""
                                        aria-describedby="helpId"
                                        placeholder="enter product name"
                                        require
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Upload image</label>
                                    <input
                                        type="file"
                                        class="form-control"
                                        name="pimage"
                                        acccept="image/*"
                                        id=""
                                        placeholder=""
                                        aria-describedby="fileHelpId"
                                        require
                                    />
                                </div>
                            </div>
                        </div>
                        <div
                            class="row justify-content-center align-items-center g-2 text-start"
                        >
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Enter price</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="price"
                                        id=""
                                        aria-describedby="helpId"
                                        placeholder="enter price"
                                        require
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Offer price</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="o_price"
                                        id=""
                                        aria-describedby="helpId"
                                        placeholder="offer price"
                                        require
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="pdesc" id="" rows="4" require></textarea>
                        </div>
                        <div
                            class="row justify-content-center align-items-center g-2"
                        >
                            <div class="col-md-6">
                                <button
                                    type="submit"
                                    class="btn1 btn-primary"
                                >
                                    Submit
                                </button>
                            </div>
                            <div class="col-md-6">
                                <button
                                    type="reset"
                                    class="btn1 btn-primary"
                                >
                                    Reset
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
                </div>
                </center>
            </div>
            
        </main>
        <footer>
            <!-- <?php
                include 'include/footer.php';
            ?> -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
