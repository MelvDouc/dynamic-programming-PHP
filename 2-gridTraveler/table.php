<?php
include "./gridTraveler.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style.css">
  <title>Grid Traveler</title>
</head>

<body>

  <?php
  $m = 18;
  $n = 18;
  $grid = getGrid($m, $n);
  ?>
  <table>
    <?php for ($i = 0; $i <= $m; $i++) : ?>
      <tr>
        <?php for ($j = 0; $j <= $n; $j++) : ?>
          <td><?= $grid[$i][$j] ?></td>
        <?php endfor; ?>
      </tr>
    <?php endfor; ?>
  </table>


</body>

</html>