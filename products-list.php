<?php
require('app/Customer.php');
require('app/Product.php');
require('app/FileUtility.php');

$products_data = FileUtility::openCSV('products.csv');

$products = Product::convertArrayToProducts($products_data);

$customer = new Customer('Karylle Lopez', 'lopez.karylle@auf.edu.ph');
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Pictography</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/heroes/">
<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
<link href="/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

  <header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 link-dark">Overview</a></li>
          <li><a href="#" class="nav-link px-2 link-secondary">Film</a></li>
          <li><a href="#" class="nav-link px-2 link-secondary">Cameras</a></li>
          <li><a href="#" class="nav-link px-2 link-secondary">Others</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>

        <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>
  <div class="px-4 pt-5 my-5 text-center border-bottom">
    <h1 class="display-4 fw-bold" style="font-family: 'Press Start 2P', cursive; color: black;">Welcome <?php echo $customer->getName() ?>! </h1> 
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">We’ve been working day in day out to bring you a new Pictography Shop so you can surf the web for your analogue gear in style and enjoy an easy and fast shopping experience on any device. After a lot of hard work from the team – we’re ready for lift-off!</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
        <button type="button" class="btn btn-primary btn-lg px-4 me-sm-3" ><a href="shopping-cart.php"class="w3-bar-item w3-button">Go to Shopping Cart</a></button>
      </div>
      <hr>
    </div>
    <div class="overflow-hidden" style="max-height: 30vh;">
      <div class="container px-5">
        <img src=https://thumbs.dreamstime.com/b/old-film-camera-lenses-old-exposure-meter-wooden-background-horizontal-photo-banner-website-header-exposure-meter-116471279.jpg class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="700" height="500" loading="lazy">
      </div>
    </div>
  </div>

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    body, html {height: 100% ;  }
    .bgimg {
      background-image: url(https://thumbs.dreamstime.com/b/old-film-camera-lenses-old-exposure-meter-wooden-background-horizontal-photo-banner-website-header-exposure-meter-116471279.jpg);
      min-height: 100%;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    }
  </style>
<body>
<div class="w3-display-topleft w3-padding-large w3-xlarge" >

<h2 style="font-family: 'Press Start 2P', cursive; color: black; font-size: 15px; position: relative; top: 15px; left: -5px">pictography </h2>

</div>
<?php foreach ($products as $product): ?>
    <form action="add-to-cart.php" method="POST">
<div class="bgimg album py-5 bg-light">
    <div class="container" style="margin-top:70px;">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <div class="container-fluid">
        <div class="col">
          <div class="card shadow-sm">
          <input type="hidden" name="product_id" value="<?php echo $product->getId(); ?>" />
          <img src="<?php echo $product->getImage(); ?>" height="225px" />

            <div class="card-body">
                <h3><?php echo $product->getName(); ?></h3>
                <p>
                <hr>
                <?php echo $product->getDescription(); ?><br/>
                <br>
                <span style="color: black; font-size: 25px"><b>$ <?php echo $product->getPrice(); ?></b></span>
                </p>
              <div class="d-flex justify-content-between align-items-center">
                Qty <input type="number" name="quantity" class="quantity" value="0" /><br/>
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="submit" class="btn btn-sm btn-outline-secondary">Add to Cart</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
  </div>
  </div>
 <?php endforeach; ?>

 <div class="container">
  <footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Overview</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Film</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Cameras</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Others</a></li>
    </ul>
    <p class="text-center text-muted">&copy; 2021 Pictography, Inc</p>
  </footer>
</div>



</body>
</html>