<?php
session_start();

include('../layout.php');

myHeader();
myMenu();

if (isset($_SESSION["entrado"])) {
    if ($_SESSION["entrado"] == true) {
        header("Location: ../viewEntrenador/home.php");
    }
}

?>

<body>
    <div class="container">
        <div class="login__content">
            <img src="assets/img/foot-6.jpg" alt="login image" class="login__img">

            <form action="./doLogin.php" method="post" class="login__form">
                <div>
                    <h1 class="login__title">
                        <span>Welcome</span> Back
                    </h1>
                    <p class="login__description">
                        Welcome! Please login to continue.
                    </p>
                </div>

                <div>
                    <div class="login__inputs">
                        <div>
                            <label for="input-username" class="login__label">Username</label>
                            <input type="text" placeholder="Enter your username" name="username" required class="login__input" id="input-username">
                        </div>

                        <div>
                            <label for="input-pass" class="login__label">Password</label>

                            <div class="login__box">
                                <input type="password" placeholder="Enter your password" name="pass" required class="login__input" id="input-pass">
                                <i class="ri-eye-off-line login__eye" id="input-icon" style="margin: 12px 4px 0px 0px;"></i>
                            </div>
                        </div>
                    </div>

                </div>

                <div>
                    <div class="login__buttons">
                        <button class="login__button">Log In</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <?php

        myFooter();

    ?>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>

</body>

</html>