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
    <div class="col-md-4" id="searchUpload">
      <!-- <h4>upload:</h4> -->


      <!-- upload form -->

      <form action="php/simpleUpload_2.php" method="post" enctype="multipart/form-data">

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
          </div>
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="fileToUpload" id="fileToUpload" aria-describedby="inputGroupFileAddon01">
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
          </div>
        </div>

        <div class="form-group">
          <label for="topic">topic:</label>
          <select name="topic" id="topic" class="form-control">
            <option value="GKP">GKP</option>
            <option value="GKL" selected>GKL</option>
            <option value="AS-MBA">AS-MBA</option>
          </select>
          <!-- <input type="topic" class="form-control" id="topic" name="topic"> -->
        </div>
        <div class="form-group">
          <label for="author">author:</label>
          <input type="author" class="form-control" id="author" name="author">
        </div>
        <div class="form-group">
          <label for="description">description:</label>
          <textarea type="description" class="form-control" id="description" name="description" rows="3" maxlength="254"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">upload</button>

      </form>

      <!-- search and upload button - show if screenwidth > 768 -->
      <div class="row" id="smallWidthButtons">
        <div class="col-6">
          <button type="button" id="uploadBtn" class="btn btn-primary btn-lg btn-block">Upload</button>

        </div>
        <div class="col-6">
          <button type="button" id="searchBtn" class="btn btn-primary btn-lg btn-block">Search</button>

        </div>
      </div>

      <hr class="d-md-none">
    </div>
    <div class="col-md-8">
      <h2 id="topicTitle">INDEX</h2>
      <div id="dataFiles">
        Hier können sie die verschiedenen Skripte zum jeweiligen Thema uploaden bzw. downloaden...

      </div>
      <!-- show appropriate Files on page-->



      <br>

    </div>
  </div>
</div>

<div id="footer" class="jumbotron text-center" style="margin-bottom:0">
  <p>Footer</p>
</div>

</body>
</html>
