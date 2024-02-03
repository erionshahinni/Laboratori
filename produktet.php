<?php
session_start();

$hide = "hide"; 

if (isset($_SESSION['username']) && $_SESSION['role'] == "admin") {
    $hide = ""; 
}

if (isset($_POST['loginbtn'])) {
    
}

include 'config.php';

class Product {
    public $id;
    public $name;
    public $price;
    public $image;

    public function __construct($id, $name, $price, $image) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->image = $image;
    }
}

class ProductController {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAllProducts() {
        $products = array();

        $select = mysqli_query($this->conn, "SELECT * FROM products");

        while ($row = mysqli_fetch_assoc($select)) {
            $product = new Product($row['id'], $row['name'], $row['price'], $row['image']);
            $products[] = $product;
        }

        return $products;
    }
}

$productController = new ProductController($conn);
$products = $productController->getAllProducts();

?>

<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="style.css">
            <title>Contact Us</title>
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
            <script>
                $(function() {
                    $(".toggle").on("click", function() {
                        $(".item").toggleClass("active");
                    });
                });

            </script>
        </head>
        <body>
        <div class="nav">
        <ul class="menu">
            <li class="logo"><a href="index.php"><img src="images/1.svg" alt="" width="165px" height="75px"></a></li>
            <li class="item button"><a class="menua" href="index.php">Pathology</a></li>
            <li class="item button"><a class="menua" href="sherbimet.php">Sherbimet</a></li>
            <li class="item button"><a class="menua" href="produktet.php">Produktet</a></li>
            <li class="item button"><a class="menua" href="contact-us.php">Contact</a></li>
            <li class="item button"><a class="menua" href="about-us.php">Rreth nesh</a></li>
            <li class="item button"><a href="dashboard.php" class="<?php echo $hide ?>">Dashboard</a></li>
            <li class="item button"><a href="logout.php">Logout</a></li>
            <li class="toggle"><span class="bars"></span></li>
        </ul>
    </div>

<div class="container">

    <h2>Product List</h2>

    <div class="product-display">
        <table class="product-display-table">
            <thead>
            <tr>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Product Price</th>
            </tr>
            </thead>
            <?php foreach ($products as $product) { ?>
                <tr>
                    <td><img src="uploaded_img/<?php echo $product->image; ?>" height="100" alt=""></td>
                    <td><?php echo $product->name; ?></td>
                    <td>$<?php echo $product->price; ?>/-</td>
                </tr>
            <?php } ?>
        </table>
    </div>

</div>




<br>
<br>
<br>

<div class="footer">
        <div class="hr"></div>
        <div class="footer-style">
            <span class="span-style">© All rights reserved 2023</span>
        </div>
 </div>

</body>
</html>
