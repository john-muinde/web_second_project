<?php
/*
Variables are used to store data, like string of text, numbers, etc.
A variable is a "container" for storing information.
They are case sensitive.
They should only have letters, numbers, and underscores.
They should start with a letter or an underscore.
They cannot start with a number.
Keywords are not case sensitive.
*/

echo "Hello World!<br>";

$present = true;
$num = 10;
$float = 10.5;
$string = "Hello World!";
$null = null;

echo var_dump($present);

echo "<br>" ;
echo var_dump($num) ;
echo "<br>" ;

echo var_dump($float) ;
echo "<br>" ;

echo var_dump($string) ;
echo "<br>" ;
echo var_dump($null) ;

// arrays
/*
Indexed arrays - access array elements by their index
Associative arrays - access array elements by their key
 */

$names = array("John", "Doe", "Jane");
foreach($names as $name) {
    echo "<div>". $name . "<div/>";
}

$studentsWithAge = array("John"=>20, "Doe"=>25, "Jane"=>22);

foreach($studentsWithAge as $name => $age) {
    echo "<div>". $name . " is " . $age . " years old" . "<div/>";
}

for($i = 1; $i < 4; $i++) {
    echo "<h1> Chapter $i <h1/>";
    echo "<button> Button $i <button/>";
}
