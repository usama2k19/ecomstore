<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Document</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="css/styles.css" />

  <?php


  require_once("config.php");
  $connection = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);

  if (mysqli_connect_error()) {
    die(mysqli_connect_error());
  }

  $sql = "SELECT * FROM categories";

  $sql2 = "SELECT * FROM products limit 4";

  $result = mysqli_query($connection, $sql);

  $result1 = mysqli_query($connection, $sql2);
  ?>
</head>

<body class="bg-secondary">
  <?php
  include_once("navigation.html");
  ?>

  <div class="container pt-5">
    <div class="row">
      <div class="col-md-3">
        <div class="card">
          <div class="card-header bg-danger">
            <h3 class="text-center ">Categories</h3>
          </div>
          <div class="card-body p-0">
            <ul class="list-group">
              <?php
              while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <a class="list-group-item list-group-item-action bg-info" href="category.php?id=<?= $row['id'] ?>">
                  <?php
                  echo $row['Name']
                  ?>
                </a>
              <?php
            }
            ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="container">
          <div class="row">
            <?php
            while ($row = mysqli_fetch_assoc($result1)) {
              ?>
              <div class="col" id="home">
                <div class="card shadow-lg mb-3 mr-3" style="width: 18rem;">
                  <div class="card-header">
                    <img src="<?php echo $row['Image']; ?>" width="50px" height="200px" class="card-img-top" alt="Mobile" />
                  </div>
                  <div class="card-body">
                    <h4 class="card-title">
                      <?php
                      echo $row['Name']
                      ?>
                    </h4>
                    <h4>
                      <?php
                      echo "Rs. " . $row['Price'];
                      ?>
                    </h4>
                    <p class="card-text">
                      <?php
                      echo $row['Description']
                      ?>
                    </p>

                    <a href="productDetail.php?id=<?= $row['id'] ?>" class="btn btn-danger">Details</a>
                  </div>
                </div>
              </div>
            <?php
          }
          ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  include_once("footer.html");
  ?>
</body>

</html>