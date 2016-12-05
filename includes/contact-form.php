<?php

function generateRandomString($length = 10) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}

  $token = generateRandomString();
  session_start();
  session_regenerate_id();


  if (!isset($_SESSION['from']) OR ($_SESSION['lastrefresh'] <= (time() - 2400))) {
    //user either dont have a session or been inactive for more then 40 minutes
    $_SESSION['token'] = $token;
    $_SESSION['timestamp'] = time();
    $_SESSION['from'] = "arnoldson.online";
    $_SESSION['formsenttime'] = 0;
    $_SESSION['lastcontent'] = "";
    $_SESSION['numberofsends'] = 0;
  } else {
    if (($_SESSION['token'] != "destroyed") AND ($_SESSION['numberofsends'] <= 3)) {
      $token = $_SESSION['token'];
    }
  }
  $_SESSION['lastrefresh'] = time();
?>

<div class="contact-form-container">
  <form id="contact-form" action="php/send-a-contact.php" method="post">
    <input id="form-hidden" name="token" type="hidden" value="<?php echo $token; ?>">
    <input id="form-url" name="url" type="url" value="">
    <input id="form-lang" name="language" type="hidden" value="<?php echo $language; ?>">
    <fieldset>
      <input id="form-name" name="name" placeholder="<?php echo $nameplaceholder; ?>" type="text" tabindex="1" required>
    </fieldset>
    <fieldset>
      <input id="form-email" name="email" placeholder="<?php echo $emailplaceholder; ?>" type="email" tabindex="2" required>
    </fieldset>
    <fieldset>
      <textarea id="form-message" name="message" placeholder="<?php echo $messageplacholder; ?>" tabindex="3" required></textarea>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="<?php echo $submitsending; ?>" tabindex="4"><?php echo $submittext; ?></button>
      <div id="form-messages"></div>
    </fieldset>
  </form>
</div
