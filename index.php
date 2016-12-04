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
?>
<html lang="<?php echo $language; ?>">
<head>
  <meta charset='utf-8'>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="author" content="Håkan K Arnoldson">

  <link rel="alternate" hreflang="en" href="https://arnoldson.online/?l=en" />
  <link rel="alternate" hreflang="sv" href="https://arnoldson.online/?l=sv" />

  <title><?php echo $language; ?></title>

  <link rel="stylesheet" href="css/main.min.css" />

</head>
<body>
  <script src="js/main.js"></script>
  <?php include 'includes/' . $language . '.html'; ?>
</body>
</html>
