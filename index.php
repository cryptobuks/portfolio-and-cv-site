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
  <nav class="main-navigation">
    <ul class="nav-main-list">
      <li class="main-nav-item">
        <a href="#"><?php echo $mainmenutext["projects"]; ?></a>
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
              <a href="#">GitHub</a>
            </li>
            <li class="main-nav-sub-item">
              <a href="#">LinkedIn</a>
            </li>
            <li class="main-nav-sub-item">
              <a href="#">Stack Overflow</a>
            </li>
            <li class="main-nav-sub-item">
              <a href="#">Team Treehouse</a>
            </li><li class="main-nav-sub-item">
              <a href="#">Codecademy</a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </nav>
  <!-- END MAIN NAV -->
  <!-- BEGIN HEADER -->
  <header class="main-header">
        <h3 class="hello"><?php echo $headertext["h3"];?></h3>
        <h2><?php echo $headertext["h2"];?></h2>
        <h1><?php echo $headertext["h1"];?></h1>
        <h4><?php echo $headertext["h4"];?></h4>
  </header>
  <!-- END HEADER -->
  <!-- BEGIN CONTENT -->
  <section id="about-wrapper" class="content">
    <h2>About</h2>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean fringilla cursus metus non placerat. Nullam ac tempus lacus, eget bibendum ligula. Donec hendrerit orci justo, in scelerisque sapien molestie a. Praesent eget vehicula neque. Vestibulum posuere molestie purus, quis pretium nibh gravida eget. Phasellus in enim sit amet ligula varius feugiat vel at libero. Suspendisse at mi volutpat, venenatis massa a, aliquam lacus. Donec sit amet malesuada ipsum.

Nullam suscipit nunc sapien, eget pharetra enim rhoncus vitae. Aenean vitae condimentum magna. Vestibulum eu fermentum nisi. Nam vitae vestibulum quam. Proin at leo ac odio varius consectetur non a leo. Nullam auctor mi eget arcu pharetra pulvinar. In hac habitasse platea dictumst. Quisque commodo accumsan justo et dictum. Nullam volutpat lorem ut tortor bibendum condimentum. Nulla non tortor lobortis, ullamcorper nisl ac, tempor ligula. Maecenas ut facilisis arcu. Nullam vehicula lorem vel commodo vulputate.
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean fringilla cursus metus non placerat. Nullam ac tempus lacus, eget bibendum ligula. Donec hendrerit orci justo, in scelerisque sapien molestie a. Praesent eget vehicula neque. Vestibulum posuere molestie purus, quis pretium nibh gravida eget. Phasellus in enim sit amet ligula varius feugiat vel at libero. Suspendisse at mi volutpat, venenatis massa a, aliquam lacus. Donec sit amet malesuada ipsum.

Nullam suscipit nunc sapien, eget pharetra enim rhoncus vitae. Aenean vitae condimentum magna. Vestibulum eu fermentum nisi. Nam vitae vestibulum quam. Proin at leo ac odio varius consectetur non a leo. Nullam auctor mi eget arcu pharetra pulvinar. In hac habitasse platea dictumst. Quisque commodo accumsan justo et dictum. Nullam volutpat lorem ut tortor bibendum condimentum. Nulla non tortor lobortis, ullamcorper nisl ac, tempor ligula. Maecenas ut facilisis arcu. Nullam vehicula lorem vel commodo vulputate.


    </p>
  </section>
  <section id="cv-wrapper" class="content">
    <h2>CV</h2>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean fringilla cursus metus non placerat. Nullam ac tempus lacus, eget bibendum ligula. Donec hendrerit orci justo, in scelerisque sapien molestie a. Praesent eget vehicula neque. Vestibulum posuere molestie purus, quis pretium nibh gravida eget. Phasellus in enim sit amet ligula varius feugiat vel at libero. Suspendisse at mi volutpat, venenatis massa a, aliquam lacus. Donec sit amet malesuada ipsum.

Nullam suscipit nunc sapien, eget pharetra enim rhoncus vitae. Aenean vitae condimentum magna. Vestibulum eu fermentum nisi. Nam vitae vestibulum quam. Proin at leo ac odio varius consectetur non a leo. Nullam auctor mi eget arcu pharetra pulvinar. In hac habitasse platea dictumst. Quisque commodo accumsan justo et dictum. Nullam volutpat lorem ut tortor bibendum condimentum. Nulla non tortor lobortis, ullamcorper nisl ac, tempor ligula. Maecenas ut facilisis arcu. Nullam vehicula lorem vel commodo vulputate.
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean fringilla cursus metus non placerat. Nullam ac tempus lacus, eget bibendum ligula. Donec hendrerit orci justo, in scelerisque sapien molestie a. Praesent eget vehicula neque. Vestibulum posuere molestie purus, quis pretium nibh gravida eget. Phasellus in enim sit amet ligula varius feugiat vel at libero. Suspendisse at mi volutpat, venenatis massa a, aliquam lacus. Donec sit amet malesuada ipsum.

Nullam suscipit nunc sapien, eget pharetra enim rhoncus vitae. Aenean vitae condimentum magna. Vestibulum eu fermentum nisi. Nam vitae vestibulum quam. Proin at leo ac odio varius consectetur non a leo. Nullam auctor mi eget arcu pharetra pulvinar. In hac habitasse platea dictumst. Quisque commodo accumsan justo et dictum. Nullam volutpat lorem ut tortor bibendum condimentum. Nulla non tortor lobortis, ullamcorper nisl ac, tempor ligula. Maecenas ut facilisis arcu. Nullam vehicula lorem vel commodo vulputate.


    </p>
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
