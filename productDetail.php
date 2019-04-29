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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php


    require_once("config.php");

    $id = $_GET['id'];
    $connection = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);

    if (mysqli_connect_error()) {
        die(mysqli_connect_error());
    }

    $sql = "SELECT * FROM products where id = $id";

    $result = mysqli_query($connection, $sql);
    ?>

</head>

<body class="bg-secondary">
    <?php
    include_once("navigation.html");
    ?>

    <div class="container py-5">
        <div class="row">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-md-12">

                    <div class="row">
                        <div class="col-md-5">
                            <img src="<?php echo $row['Image']; ?>" width="100px" height="500px" class="card-img-top" alt="">
                        </div>
                        <div class="col-md-7">
                            <h1>
                                <?php
                                echo $row['Description']
                                ?>
                            </h1>
                            Rating &nbsp;
                            <?php
                            echo $row['Rating']
                            ?>

                            <p>
                                Brand:
                                <?php
                                echo $row['Brand']
                                ?>
                            </p>
                            <h2>
                                Rs.
                                <?php
                                echo $row['Price']
                                ?>
                            </h2>
                            <h4>
                                Quantity :
                                <?php
                                echo $row['Quantity']
                                ?>
                            </h4>
                            <button class="btn btn-info round shadow mr-4 mt-4">Buy Now</button>
                            <button class="btn btn-info round shadow mt-4">Add To Cart</button>
                        </div>
                    </div>

                </div>

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