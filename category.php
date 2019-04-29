<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <?php


    require_once("config.php");

    $id = $_GET['id'];
    $connection = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);

    if (mysqli_connect_error()) {
        die(mysqli_connect_error());
    }

    $sql = "SELECT * FROM products where category_id = $id ";



    $result = mysqli_query($connection, $sql);

    ?>

</head>

<body class="bg-secondary">
    <?php
    include_once("navigation.html");
    ?>

    <div class="container pt-5">
        <div class="row">

            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                ?>

                <div class="col-md-4">
                    <div class="card shadow m-4" style="width: 18rem;">
                        <div class="card-header">
                            <img src="<?php echo $row['Image']; ?>" width="50px" height="200px" class="card-img-top" alt="Mobile">
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

                            <a href="productDetail.php?id=<?= $row['id'] ?>" class="btn btn-primary">Details</a>

                        </div>
                    </div>
                </div>
            <?php
        }
        ?>


        </div>
    </div>
    <?php
    include_once("footer.html");
    ?>

</body>

</html>