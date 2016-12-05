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
  <link rel="stylesheet" href="css/main.min.css" />

</head>
<body>
  <script src="dependencies/jquery-3.1.1/js/jquery-3.1.1.js"></script>
  <script src="js/main.js"></script>
  <script src="js/contact.js"></script>
  <?php include 'includes/' . $language . '/main.html'; ?>
  <?php include 'includes/' . $language . '/contact-form.php'; ?>
  <?php include 'includes/' . $language . '/footer.html'; ?>
</body>
</html>
