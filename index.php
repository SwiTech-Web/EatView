<?php
session_start();
require 'Database.php';
$society = "Switech";
$db = Database::connect();
$statement = $db->prepare('SELECT id_company FROM company WHERE company_name = ?');
$statement->execute(array($society));
$id = $statement->fetch();
Database::disconnect();
?>
<!doctype html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title><?=$society;?></title>

</head>
<body>

<div class="main-menu position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
    <div class="col-md-5 p-lg-5 mx-auto my-5"></div>
    <div class="product-device shadow-sm d-none d-md-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
</div>


<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
  <?php
  $db = Database::connect();
  $statement = $db->query("SELECT * FROM menu where id_company = '$id[0]'");
  $i = 0;
  while($menu = $statement->fetch())
  {
  if ($i == 0) {
  echo '<div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">';
    echo '<div class="my-3 py-3">';
        echo '<h2 class="display-5">' . $menu['title'] . '</h2>';
        echo '<p class="lead">' . $menu['description'] . '</p>';
    echo '</div>';
    echo '<div class="plat-bg bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;background-image: url("img/' . $menu['img'] . '.png");">';
        echo '<a class="btn btn-outline-light font-weight-bold" style="margin-top: 250px; border: 3px solid white;" href="ar.html">Visualisez</a>';
    echo '</div>';
  echo '</div>';
  $i = $i + 1;
  } else if($i == 1) {
    echo '<div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">';
      echo '<div class="my-3 py-3">';
          echo '<h2 class="display-5">' . $menu['title'] . '</h2>';
          echo '<p class="lead">' . $menu['description'] . '</p>';
      echo '</div>';
      echo '<div class="plat-bg bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;background-image: url("img/' . $menu['img'] . '.png");">';
          echo '<a class="btn btn-outline-dark font-weight-bold" style="margin-top: 250px; border: 3px solid black;" href="#">Visualisez</a>';
      echo '</div>';
    echo '</div>';
  $i = $i - 1;
  }

  }
  ?>
</div>

<footer class="bg-dark container py-5 text-center">
    <div class="row">
        <div class="col-12 col-md">
            <svg class="text-center" style="color: aliceblue" xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
            <small class="d-block mb-3 mt-3" style="color: aliceblue">&copy; Developed by Switech Digital Agency - 2020</small>
        </div>
    </div>
</footer>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="../../assets/js/vendor/popper.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>
<script src="../../assets/js/vendor/holder.min.js"></script>
<script>
    Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
    });
</script>
</body>
</html>
