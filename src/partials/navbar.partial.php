<?php
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">My Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
                <a class="nav-link" href="/list_product.php">Discover</a>
                <a class="nav-link" href="#">Contact us</a>
                <?php
                if ($user === false) { ?>
                    <a class="nav-link" href="/register.php">Register</a>
                    <a class="nav-link" href="/login.php">Login</a>
                <?php } else { ?>
                    <a class="nav-link" href="/actions/logout.php">Log OUT</a>
                <?php } ?>
                <!-- <a class="nav-link disabled" aria-disabled="true">Disabled</a> -->
            </div>
        </div>
    </div>
</nav>
