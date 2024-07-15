<!-- Escriba un programa que cada vez que se ejecute muestre la tirada
de dos jugadores que tiran un dado al azar cada uno y diga quién ha
ganado.
En este juego, gana el jugador que ha obtenido una puntuación más
alta que el otro jugador.
Si no gana ningún jugador, lógicamente se habrá producido un
empate. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .centroP {
            font-weight: bold;
            display: grid;
            place-items: center;
        }

        div {
            display: inline-block;
            margin: auto;
        }

        .rojo {
            border: 10px solid red;
            margin: 1px;
        }

        .azul {
            border: 10px solid blue;
            margin: 1px;
        }
    </style>
</head>
<body>
    <?php
        echo '<p>Actualice la pagina para mostrar una nueva tirada.</p>';

        $rand1=rand(1,6);
        $rand2=rand(1,6);

        echo '<div><p class="centroP">Jugador 1</p><div class="rojo"><img src="img/'.$rand1.'.svg" alt="dado1"></div></div>';
        echo '<div><p class="centroP">Jugador 2</p><div class="azul"><img src="img/'.$rand2.'.svg" alt="dado2"></div></div>';

        if ($rand1 != $rand2) {
            if ($rand1 > $rand2) {
                $ganador='Ha ganado el juegador 1.';
            } else {
                $ganador='Ha ganado el juegador 2.';
            }
            
        } else {
            $ganador='Empate.';
        }

        echo '<div><p class="centroP">Resultado</p><div style="margin: 2px;">'.$ganador.'</div></div>';
    ?>
</body>
</html>