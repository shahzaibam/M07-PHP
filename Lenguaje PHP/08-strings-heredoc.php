<?php
declare(strict_types = 1);


//Strings HEREDOC

//ejemplo 1
//-----------------------------------

$he = 'Bob';
$she = 'Alice';


$text = <<<TEXT
$he said "PHP is awesome".
"Of Course" $she agreed.

TEXT;

echo($text);


//ejemplo 2
//-----------------------------------

$title = "My site";

$header = <<<HEADER
<header>
    <h1>$title</h1>
</header>
HEADER;


echo ($header);

?>