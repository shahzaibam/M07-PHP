<?php

function redirect_to(string $url):void {
    header("Location:" . $url);
    exit;
}

function redirect_with(string $url, array $variable):void {
    foreach ($variable as $key => $value) {
        $_SESSION[$key]= $value;
    }

    redirect_to($url);
}

?>