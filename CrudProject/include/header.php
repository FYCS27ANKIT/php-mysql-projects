
<nav
    class="navbar navbar-expand-sm navbar-light bg-secondry shadow-sm"
>
    <div class="container">
        <a class="navbar-brand" href="#">CRUD-Project</a>
        <button
            class="navbar-toggler d-lg-none"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavId"
            aria-controls="collapsibleNavId"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#" aria-current="page"
                        >Home
                        <span class="visually-hidden">(current)</span></a
                    >
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <?php  if(isset($_SESSION['user_id']))
                    { ?>
                        	<li class="nav-item dropdown">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    id="dropdownId"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                    >Profile</a
                                >
                                <div
                                    class="dropdown-menu"
                                    aria-labelledby="dropdownId"
                                >
                                    <a class="dropdown-item" href="updateuser.php"
                                        >Profile</a
                                    >
                                    <a class="dropdown-item" href="logout.php"
                                        >Logout</a
                                    >
                                </div>
                            </li>
					<?php } else { ?>
						<li class="nav-item"> <a class="nav-link" href="login.php">Login/Register</a> </li>
				<?php } ?>
            </ul>
        </div>
    </div>
</nav>
