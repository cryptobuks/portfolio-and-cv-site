<!DOCTYPE html>
<?php
  //Defaults to english but tries to catch Swedish prefered browsers
  $language = "en";
  $shownflag = "se";
  if (!isset($_GET["l"])) {
    $userslang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    if ($userslang == "sv") {
      $language = "sv";
      $shownflag = "gb";
    };
  } else {
    if ($_GET["l"] == "sv") {
      $language = "sv";
      $shownflag = "gb";
    };
  };

$pagetitle = "Håkan Arnoldson - Webdeveloper - Portfolio";
$pagedescription = "Professional portfolio site for front-end aspiring front-end developer Håkan Arnoldson. Showcases projects and work.";
  if ($language == "sv") {
    $pagetitle = "Håkan Arnoldson - Webbutvecklare - Portfölj";
    $pagedescription = "Potföljsida med projekt och arbeten från aspirereande front-end utvecklare Håkan Arnoldson.";
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
  <link rel="stylesheet" href="dependencies/font-awesome-4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="dependencies/foundation-icons/foundation-icons.css" />
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
  <figure id="lanugage-flag">
    <a href="https://arnoldson.online/?l=<?php if ($language == "sv") {echo "en";} else {echo "sv";};?>">
      <img src="dependencies/partial/flag-icon-css-master/flags/4x3/<?php echo $shownflag; ?>.svg">
    </a>
  </figure>
  <!-- BEGIN PAGE HTML -->
  <section id="cover-wrapper">
    <nav class="main-navigation">
      <ul>
        <li class="main-nav-item">
          <a href="#"><?php echo $mainmenutext["projects"]; ?></a>
        </li>
        <li class="main-nav-item">
          <a href="#"><?php echo $mainmenutext["about"]; ?></a>
        </li>
        <li class="main-nav-item">
          <a href="#"><?php echo $mainmenutext["contact"]; ?></a>
        </li>
        <li class="main-nav-item">
          <a href="#"><?php echo $mainmenutext["cv"]; ?></a>
        </li>
        <li class="main-nav-item">
          <a href="#"><?php echo $mainmenutext["socialcv"]; ?></a>
          <ul>
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
        </li>
      </ul>
    </nav>

    <header>
      <span>Håkan Arnoldson</span>
      <span><?php echo $headertext["title"];?></span>
    </header>
  </section>
  <section id="about-wrapper" class="content">
    <h2>ABOUT</h2>
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

  <footer id="footer-wrapper">
    <p>
      FOOTER
    </p>

  </footer>


  <!-- END PAGE HTML -->
</body>
</html>
