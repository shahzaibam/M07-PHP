<nav class="menu-loggedIn">
    <ul>
        <li>
            <a href="index.php" style="color: white;">Log Out</a>
        </li>
        <?php
            if(isset($_SESSION["rol"])) {
                echo $_SESSION["rol"];
            }
        ?>
    </ul>
</nav>


<footer  style="position: fixed; bottom: 0; background-color: black; width: 100%" >
    <h1 style="color: white;">Designed by SHAHZAIB</h1>
</footer>
