<!DOCTYPE html>
<?php
  //Defaults to english but tries to catch Swedish prefered browsers
  $language = "en";
  if (!isset($_GET["l"])) {
    $userslang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    if ($userslang == "sv") {
      $language = "sv";
    };
  } else {
    if ($_GET["l"] == "sv") {
      $language = "sv";
    };
  };

$pagetitle = "Håkan Arnoldson - A Webdeveloper's Portfolio";
$pagedescription = "Professional portfolio site for front-end aspiring front-end developer Håkan Arnoldson. Showcases projects and work.";
  if ($language == "sv") {
    $pagetitle = "Håkan Arnoldson - En webbutvecklares protfölj";
    $pagedescription = "Portföljsida med projekt och arbeten från aspirereande front-end utvecklare Håkan Arnoldson.";
  };
?>
<html lang="<?php echo $language; ?>">
<head>
  <meta charset='utf-8'>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="author" content="Håkan K Arnoldson">

  <link rel="alternate" hreflang="en" href="https://arnoldson.online/?l=en" />
  <link rel="alternate" hreflang="sv" href="https://arnoldson.online/?l=sv" />

  <title><?php echo $pagetitle; ?></title>
  <meta name="description" content="<?php echo $pagedescription; ?>">

  <link rel="stylesheet" href="dependencies/normalize-5.0.0/normalize.min.css" />
  <link rel="stylesheet" href="css/main.min.css" />

</head>
<body>
  <script src="dependencies/jquery-3.1.1/js/jquery-3.1.1.js"></script>
  <script src="js/main.js"></script>
  <script src="js/contact.js"></script>

  <?php
    /* STATIC START TEXT VARIABLES FROM LANGUAGE FILES */
    include 'includes/' . $language . '/text.php';
  ?>
  <!-- BEGIN PAGE HTML -->
  <!-- BEGIN LANGUAGE SELECTOR -->
  <figure id="lanugage-flag">
    <a href="https://arnoldson.online/?l=<?php if ($language == "sv") {echo "en";} else {echo "sv";};?>">
      <span class="language-<?php echo $language?>"></span>
    </a>
  </figure>
  <!-- END LANGUAGE SELECTOR -->
  <!-- BEGIN MAIN NAV -->
  <nav class="main-navigation" style="position:fixed; top:0;z-index:2;">
    <!--<nav id="main-fake-nav" style="background-color:green; width: 100px; height: 5px; float:left;">

    </nav>-->
    <ul class="nav-main-list">
      <li class="main-nav-item">
        <a href="#projects-wrapper"><?php echo $mainmenutext["projects"]; ?></a>
      </li>
      <li class="main-nav-item">
        <a href="#about-wrapper"><?php echo $mainmenutext["about"]; ?></a>
      </li>
      <li class="main-nav-item">
        <a href="#cv-wrapper"><?php echo $mainmenutext["cv"]; ?></a>
      </li>
      <li class="main-nav-item">
        <a href="#contact-wrapper"><?php echo $mainmenutext["contact"]; ?></a>
      </li>
      <li class="main-nav-item dropdown">
        <a href="#" class="dropbtn"><?php echo $mainmenutext["socialcv"]; ?></a>
        <div class="dropdown-collapser">
          <ul class="dropdown-content">
            <li class="main-nav-sub-item">
              <a href="https://github.com/hkarn/" target="_blank">GitHub</a>
            </li>
            <li class="main-nav-sub-item">
              <a href="#">LinkedIn</a>
            </li>
            <li class="main-nav-sub-item">
              <a href="https://teamtreehouse.com/hkanarnoldson" target="_blank">Team Treehouse</a>
          </ul>
        </div>
      </li>
    </ul>
  </nav>
  <!-- END MAIN NAV -->
  <!-- BEGIN HEADER -->
  <div class="header-wrapper">
    <header class="main-header">
          <h3 class="hello"><?php echo $headertext["h3"];?></h3>
          <h2><?php echo $headertext["h2"];?></h2>
          <h1><?php echo $headertext["h1"];?></h1>
          <h4><?php echo $headertext["h4"];?></h4>
    </header>
  </div>
  <!-- END HEADER -->
  <!-- BEGIN CONTENT -->
  <section id="projects-wrapper">
    <ul class="grid cf">
      <li class="col" style="background-image: url('img/project-currency.png');">
        <a href="projects/currency/"><img src="img/project-currency.png"></a>
      </li>
      <li class="col" style="background-image: url('img/project-vocabulary.png');">
        <a href="projects/vocabulary/"><img src="img/project-currency.png"></a>
      </li>
      <li class="col" style="background-image: url('img/project-guess.png');">
        <a href="projects/guess/"><img src="img/project-currency.png"></a>
      </li><!--
      <li class="col">
        layout test
      </li>
      <li class="col">
        layout test
      </li>
      <li class="col">
        layout test
      </li>
      <li class="col">
        layout test
      </li>-->
    </ul>
  </section>
  <section id="about-wrapper" class="content">
    <h2><?php echo $mainmenutext["about"]; ?></h2>
    <p>About and CV sections still being written. Check projects above meanwhile.</p>

  </section>
  <section id="cv-wrapper" class="content">
    <h2><?php echo $mainmenutext["cv"]; ?></h2>
    <h3>Education</h3>
    <p>2016-2017<br>
    Javascriptutvecklare front-end<br>
    Lernia Yrkeshögskola
  </p>

  <p>2012-2014<br>
  Handelshögskolans ekonomprogram<br>
  Göteborgs Universitet
</p>

<p>2012-2014<br>
Handelshögskolans ekonomprogram
</p>

  <h3>Arbetslivserfarenhet</h3>
  <p>2014-<br>
    IT och Administration<br>
    Hisinge Buss AB / Rekå Resor AB, Göteborg</p>
    <p>Still being written, please contact me below or check <a href="https://www.linkedin.com/in/arnoldson">LinkedIn</a> for more.
  </section>
  <section id="contact-wrapper" class="content">
    <h2>Contact form</h2>
  <!-- CONTACT FORM START -->
    <?php include 'includes/contact-form.php'; ?>
  <!-- CONTACT FORM END -->
  </section>
  <!-- END CONTENT -->
  <!-- BEGIN FOOTER -->
  <footer id="footer-wrapper">
    <p>
      Footer
    </p>

  </footer>
  <!-- END FOOTER -->
  <!-- END PAGE HTML -->
</body>
</html>
