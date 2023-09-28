<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table border="1">
    <?php

    function szorzotabla(): void
    {
        $color = "light";
        $kek = 1;
        for ($i = 1; $i <= 10; $i++) {
            echo "<tr>";
            for ($j = 1; $j <= 10; $j++) {


                $szorzat = $i * $j;
                if ($kek == $j) {
                    echo "<td style='background-color: lightblue;'>$szorzat</td>";
                }else{
                    echo "<td>$szorzat</td>";
                }
            }
            echo "</tr>";
            $kek += 1;
        }
    }
    szorzotabla();
    ?>
</table>
</body>
</html>
