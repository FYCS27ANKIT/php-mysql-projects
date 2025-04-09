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
    <?php
        include 'dbcon.php';
        session_start();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['pass'];
        
            if (empty($email) || empty($password)) {
                $error = "Please fill in all fields.";
            } else {
                $stmt = $con->prepare("SELECT id, password FROM User WHERE email = ?");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();
        
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    if ($password==$row['password']) {
                        $_SESSION['user_id'] = $row['id'];
                        $_SESSION['email'] = $email;
                        header("Location: index.php");
                        exit;
                    } else {
                        $error = "Invalid email or password.";
                    }
                } else {
                    $error = "Invalid email or password.";
                }
                $stmt->close();
            }
        }
        $con->close();          
    ?>
    <body>
        <header>
        </header>
        <main>
            <div
                class="container d-flex justify-content-center mt-4"
            >
                <div class="card shadow mt-5 p-4 px-5">
                    <h4 class="loginhead text-center mt-1">Login Form</h4>
                    <div
                        class="container mt-2"
                    >
                    <?php if (isset($error)): ?>
                        <p style="color: red;"><?php echo $error; ?></p>
                    <?php endif; ?>
                    <form  method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">Enter email</label>
                            <input
                                type="email"
                                class="form-control"
                                name="email"
                                id=""
                                aria-describedby="helpId"
                                placeholder="Enter your email"
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
                                class="btn1 btn-primary mt-3 mb-2"
                            >
                                Submit
                            </button>
                            <button
                                type="reset"
                                class="btn1 btn-primary "
                            >
                                Reset
                            </button>
                            <p class="text-center"></p>
                    </form>
                </div>
                <p class="text-center mt-3">Already have account ? Click here to <a href="registration.php">Sign Up</a></p>
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
