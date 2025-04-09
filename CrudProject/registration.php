<!doctype html>
<html lang="en">
    <head>
        <title>Login</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
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
            <?php
                include 'dbcon.php';
                include 'include/header.php';
                if($_SERVER['REQUEST_METHOD']=='POST'){
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $password = $_POST['pass'];
                    $username = $_POST['username'];

                    $sql = $con->prepare('INSERT INTO User(name,email, Username, password) VALUES (?, ?, ?, ?)');
                    $sql->bind_param('ssss',$name,$email, $username,$password);
                    if($sql->execute()){
                        header('location: login.php');
                    }else{
                        echo "error" . $sql->error;
                    }
                }
            ?>
        </header>
        <main>
            <div
                class="container d-flex justify-content-center con"
            >
                <div class="card shadow mt-4 p-4 px-5" >
                    <h4 class="loginhead text-center mt-1">Registration form</h4>
                    <div
                        class="container mt-2"
                    >
                    <form action="" method="post">
                            <div class="mb-3">
                            <label for="" class="form-label">Enter name</label>
                            <input
                                type="text"
                                class="form-control"
                                name="name"
                                id=""
                                aria-describedby="helpId"
                                placeholder="Enter name"
                                required
                            />
                            </div>
                            <div class="mb-3">
                            <label for="" class="form-label">Enter email</label>
                            <input
                                type="email"
                                class="form-control"
                                name="email"
                                id=""
                                aria-describedby="helpId"
                                placeholder="Enter email"
                            />
                            </div>
                            <div class="mb-3">
                            <label for="" class="form-label">Enter username</label>
                            <input
                                type="text"
                                class="form-control"
                                name="username"
                                id=""
                                aria-describedby="helpId"
                                placeholder="Enter username"
                                required
                            />
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Enter password</label>
                                <input
                                type="password"
                                class="form-control"
                                name="pass"
                                id=""
                                placeholder="Enter password"
                                />
                            </div>
                            <button
                                type="submit"
                                class="btn1 btn-primary mt-2 mb-2"
                            >
                                Submit
                            </button>
                            <button
                                type="reset"
                                class="btn1 btn-primary"
                            >
                                Reset
                            </button>
                    </form>
                </div>
                <p class="text-center mt-3">Already have account ? Click here to <a href="login.php">Login !</a></p>
                </div>
            </div>
        </main>
        <footer>
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
