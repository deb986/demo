<?php
echo " C program <br>";
exec("./a.out 'test test'", $out);
print_r($out);
echo "<br><br> JAVA Progrma <br>";
exec("java hello", $out1);
print_r($out1);
?>