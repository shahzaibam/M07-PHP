<?php
$data = [];

//open the file
$filename = "datos.csv";
$f = fopen($filename, 'r');

if ($f == false) {
    die('Error opening the file ' . $filename);
}

// read each line in CSV file at a time
while (($row = fgetcsv($f)) !== false) {
    $data[] = $row;
}

echo ("<pre>");

print_r($data);

echo ("</pre>");


// close the file
fclose($f);


?>

<body>
    <form action="getDatos.php" method="post">

        <input type="text" name="nombre">
        <input type="password" name="password">

        <input type="submit">
    </form>
</body>