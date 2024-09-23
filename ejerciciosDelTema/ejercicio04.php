<?php 
$nota1 = rand(1,10);
$nota2 = rand(1,10);

$mayor;

if ($nota1 > $nota2) {
    $mayor = $nota1;
}else{
    $mayor = $nota2;
}

echo  "La nota mayor es: $mayor";

?>