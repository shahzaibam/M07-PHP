<?php

require __DIR__ . '/inc/header.php';

$errors = [];

$request_method = $_SERVER['REQUEST_METHOD'];

if ($request_method === 'GET') {
	require __DIR__ . '/inc/get.php';
} elseif ($request_method === 'POST') {
	require __DIR__ . '/inc/post.php';
}

if ($errors) {
	require __DIR__ . '/inc/get.php';
} 


foreach ($errors as $key => $value) {
    echo "$key => $value";
}

require __DIR__ . '/inc/footer.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- <form action="info.php" method="POST">

        <input type="checkbox" name="agree" id="agree">
        <label for="agree">I agree</label>

        <input type="submit" value="submit">

    </form> -->
</body>

</html>