 <?php
    require_once('templates/navbar.php');

    $sql = "SELECT * FROM Products";
    $stmt = $pdo->query($sql);

    // Display products in Bootstrap cards
    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Products</title>
     <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
 </head>

 <body>



     <div class="container">
         <h1 class="my-4">Products</h1>
         <div class="row">
             <?php while ($product = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                 <div class="col-lg-4 col-md-6 mb-4">
                     <div class="card h-100">
                         <img class="card-img-top" src="<?= $product['img'] ?>" alt="<?= $product['name'] ?>">
                         <div class="card-body">
                             <h4 class="card-title"><?= $product['name'] ?></h4>
                             <p class="card-text"><?= $product['description'] ?></p>
                         </div>
                         <div class="card-footer">
                             <strong>Price: $<?= $product['price'] ?></strong>
                             <br>
                             <small class="text-muted">Stock: <?= $product['stock'] ?></small>
                         </div>
                     </div>
                 </div>
             <?php endwhile; ?>
         </div>
     </div>

     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 </body>

 </html>