<!DOCTYPE html>
<html lang="en">
<head>
  <title>BA - learning</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/root.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="js/form.js"></script>
  <script src="js/ajax_sendTopic.js"></script>
  <script src="js/manipulation.js"></script>
  <script src="js/showPdfFiles.js"></script>
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head>
<body>

<div class="jumbotron text-center" style="margin-bottom:0">
  <h1>BA - learning</h1>
  <p>share your skills with your classmates...</p>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">categories:</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="gkp.php">GKP</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="gkl.php">GKL</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="as-mba.php">AS-MBA</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container" id="containerOne">
  <div class="row">
    <div class="col-md-12" id="showFile" style="height:100%;">

      <iframe src="php/uploads/gkl/gklh_somatologie_25_01_2019.pdf" style="height:100vh; width:100%"></iframe>
    </div>
  </div>
</div>

<div id="footer" class="jumbotron text-center" style="margin-bottom:0">
  <p>Footer</p>
</div>

</body>
</html>
