<?php
$Language = $PATHINFO[2];
$Id = $PATHINFO[3];
$row = $PostDetail->Select(-1, 1, 'MasterID', 'ASC', "WHERE `Language`='" . $Language . "' AND `MasterID`='" . $Id . "'")[0];
if ($row == null)
{
    exit(header("HTTP/1.0 404 Not Found"));
}
else
{
    // TODO:
    // require_once  'views/securitycheck.php';
}
//TODO: Allow partial Ajax Requests
?>



<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="masthead mb-auto">
    <div class="inner">
      <h3 class="masthead-brand"><?php echo Translate::Label(Config::NAME, $Language) ?></h3>
      <nav class="nav nav-masthead justify-content-center">
        <a class="nav-link" href="<?php echo $BASEURL ?>"><?php echo Translate::Label("خانه", $Language) ?></a>
        <a class="nav-link active" href="#"><?php echo Translate::Label("پست", $Language) ?></a>
        <a class="nav-link" href="#comments"><?php echo Translate::Label("نظرات", $Language) ?></a>
      </nav>
    </div>
  </header>

  <main role="main" class="inner cover">
    <h1 class="cover-heading">Cover your page.</h1>
    <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
    <p class="lead">
      <a href="#" class="btn btn-lg btn-secondary">Learn more</a>
    </p>
  </main>

</div>
