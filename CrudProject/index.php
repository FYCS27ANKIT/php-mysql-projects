<?php
session_start();
    include 'include/header.php';
?>
<!doctype html>
<html lang="en">
    <head>
        <title>CrudProject</title>
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
        <style>
            .carousel .carousel-item{
                max-height: 675px;
            }
            .carousel-item img{
                object-fit :cover;
                max-height: 675px;
            }
        </style>
        <link rel="stylesheet" href="style.css">
    </head>

    <body style="font-family: 'Times New Roman', Times, serif;">
        <header>
        </header>
        <main>
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                <ol class="carousel-indicators">
                    <li
                        data-bs-target="#carouselId"
                        data-bs-slide-to="0"
                        class="active"
                        aria-current="true"
                        aria-label="First slide"
                    ></li>
                    <li
                        data-bs-target="#carouselId"
                        data-bs-slide-to="1"
                        aria-label="Second slide"
                    ></li>
                    <li
                        data-bs-target="#carouselId"
                        data-bs-slide-to="2"
                        aria-label="Third slide"
                    ></li>
                    <li
                        data-bs-target="#carouselId"
                        data-bs-slide-to="3"
                        aria-label="Fourth slide"
                    ></li>
                    <li
                        data-bs-target="#carouselId"
                        data-bs-slide-to="4"
                        aria-label="Fifth slide"
                    ></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img
                            src="images/12.jpg"
                            class="w-100 d-block"
                            alt="First slide"
                        />
                    </div>
                    <div class="carousel-item">
                        <img
                            src="images/11.jpg"
                            class="w-100 d-block"
                            alt="Second slide"
                        />
                    </div>
                    <div class="carousel-item">
                        <img
                            src="images/13.jpg"
                            class="w-100 d-block"
                            alt="Third slide"
                        />
                    </div>
                    <div class="carousel-item">
                        <img
                            src="images/15.jpg"
                            class="w-100 d-block"
                            alt="Fourth slide"
                        />
                    </div>
                    <div class="carousel-item">
                        <img
                            src="images/16.jpg"
                            class="w-100 d-block"
                            alt="Fifth slide"
                        />
                    </div>
                </div>
                <button
                    class="carousel-control-prev"
                    type="button"
                    data-bs-target="#carouselId"
                    data-bs-slide="prev"
                >
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button
                    class="carousel-control-next"
                    type="button"
                    data-bs-target="#carouselId"
                    data-bs-slide="next"
                >
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </main>
        <footer>
            <?php
                include 'include/footer.php';
            ?>
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
