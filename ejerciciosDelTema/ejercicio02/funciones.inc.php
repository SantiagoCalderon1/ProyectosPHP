<?php
function intercambiarValores(&$a, &$b)
{
    $aux = $a;
    $a = $b;
    $b = $aux;
}

function mostarValores($a, $b)
{
    echo "<p>El valor de a es : $a <br>  El valor de b es : $b</p>";

    intercambiarValores($a, $b);

    echo "<p>El valor de a ahora es : $a <br>  El valor de b ahora es : $b</p>";
}

function cuenta($num1, $num2)
{
    $menor = min($num1, $num2);
    $mayor = max($num1, $num2);

    if ($menor == $num1) {
        for ($i = $menor; $i <= $mayor; $i++) {
            echo htmlspecialchars($i);
            if ($i != $mayor) {
                echo  htmlspecialchars(" , ");
            }
        }
    } else {
        for ($i = $mayor; $i >= $menor; $i--) {
            echo htmlspecialchars($i);
            if ($i != $menor) {
                echo  htmlspecialchars(" , ");
            }
        }
    }
    /**
     * se usa htmlspecialchars() para proteger el código de posibles ataques 
     * de inyección de HTML o XSS.
     * Que no pasará en mi caso, pero voy probando cosas
     */
}

function saludo($nombre)
{
    echo "<p>Hola, Te llamas ", htmlspecialchars($nombre), "</p>";
    /**
     * se usa htmlspecialchars() para proteger el código de posibles ataques 
     * de inyección de HTML o XSS.
     * Que no pasará en mi caso, pero voy probando cosas
     */
}
