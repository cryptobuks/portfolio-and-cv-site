<?php

  include 'spamcheckDBvariable.php';
  /*this file is not included and should contain the following
  //details for your database if you want to use IP based spam protection
  $servername = "localhost";
  $username = "username";
  $password = "password";
  $dbname = "myDB";
  */
  if (isset($_POST['language'])) {
    $lang = $_POST['language'];
  } else {
    $lang = "en";
  };
  $userip = $_SERVER['REMOTE_ADDR'];
  $timestamp = date('Y-m-d G:i:s');

  $connection = true; //flag to skip further checks if DB error
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    $connection = false;
  };

  /* This code needs to be run once only to initalize your table
  $sql = "CREATE TABLE TheSenders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ip VARCHAR(50) NOT NULL,
    reg_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";
  if ($conn->query($sql) === TRUE) {
      echo "Table TheSenders created successfully";
  } else {
      echo "Error creating table: " . $conn->error;
  }

   end runonce */


  if ($connection == true) {

    $sql = "INSERT INTO TheSenders (ip, reg_time)
    VALUES ('$userip', '$timestamp')";

    $conn->query($sql);
    $oneweekago = date('Y-m-d H:i:s', strtotime('-1 hours'));


    $sql = "DELETE FROM TheSenders WHERE reg_time < NOW() - INTERVAL 10 HOUR";
    //Warning UTC time. Make sure your server and the page have the same timezone or switch to UTC.

    $conn->query($sql);


    $sql = "SELECT id FROM TheSenders WHERE ip = '$userip';";
    $result = $conn->query($sql);
    if ($result->num_rows > 25) {
      http_response_code(403);
      if ($lang == "sv") {
        echo "För många förfrågrningar från detta IP. Tillfälligt blockerad!";
      } else {
        echo "To many requests from this IP. Temporarily blocked!";
      };
      $conn->close();
      exit;
    };
    $conn->close();
  };

  session_start();
  session_regenerate_id();

  /*
  After the IP spam check this form uses various checks on session variables to try and minimize abuse.
  This should be sufficent for the purpose if still the session could still be hijacked or such.
  */

  $referer = $_SERVER['HTTP_REFERER'];
  $origin = $_SERVER['HTTP_ORIGIN'];
  $mydomain = 'arnoldson.online';

  if (!strpos($referer, $mydomain) AND !strpos($origin, $mydomain)) {
    //If neither origin or referer. Very simply abuse check and dont want to rely on origin yet (not implimented).
    http_response_code(403);
    if ($lang == "sv") {
      echo "403 - Extern förfrågan blockerad.";
    } else {
      echo "403 - External request refused.";
    };
    exit;
    }

  if ($_SESSION['formsenttime'] > (time() - 30)) {
    //no more then every 30 sec
    http_response_code(400);
    if ($lang == "sv") {
      echo "Vänligen vänta lite längre innan ni skickar forumläret igen.";
    } else {
      echo "Please wait a little bit longer before using the form again.";
    };
    exit;
  }

  if ($_SESSION['from'] !== "arnoldson.online") {
    http_response_code(403);
    if ($lang == "sv") {
      echo "403 - Otillåten begäran.";
    } else {
      echo "403 - Unauthorized request.";
    };

    exit;
    }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form fields and remove whitespace.
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = filter_var(trim($_POST['message']), FILTER_SANITIZE_STRING);

    $name = strip_tags($name);
    $email = strip_tags($email);
    $message = strip_tags($message);

    if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
      // Set a 400 (bad request) response code and exit.
      http_response_code(400);
      if ($lang == "sv") {
        echo "Kontrolla att alla fälten är ordentligt ifyllda. Försök igen.";
      } else {
        echo "Make sure you filled all fields and used a valid e-mail. Try again.";
      };
      exit;
    }

    if ($_POST['url'] != "") {
      http_response_code(403);
      if ($lang == "sv") {
        echo "Blockerad av spamfilter. Försök med en annan kontaktmetod.";
      } else {
        echo "Refused by spamfilter. Try another method of contact.";
      };
      exit;
    };

    $recipient = "form2@arnoldson.net";
    $subject = "Arnoldson.online from " . $name;
    echo $email_content;
    $email_content = "Name: " . $name . "\r\n";
    $email_content .= "Email: " . $email . "\r\n\r\n";
    $email_content .= "Message:\r\n" . $message . "\r\n";
    echo $email_content;

    if ($_SESSION['lastcontent'] == $email_content) {
      //sent same content twice
      http_response_code(400);
      if ($lang == "sv") {
        echo "Du verkar redan ha skickat det här meddelandet. Försök igen.";
      } else {
        echo "It appears you already sent this data. Try again.";
      };
      exit;
    }


    if ($_SESSION['token'] != $_POST['token']) {
      http_response_code(400);
      if ($lang == "sv") {
        echo "Du har skickat formuläret för många gånger. Prova igen om ett par timmar eller välj annan kontaktmetod";
      } else {
        echo "Maximum submissions passed. Please try again in a few hours or use a different contact method.";
      };
      exit;
    };

    $email_headers = "From: Arnoldson.online <formmailer@arnoldson.online>\r\n";
    $email_headers .= "Reply-To: " . $name . "<" . $email . ">\r\n";
    $email_headers .= "Content-Type: text; charset=utf-8\r\n";
    $email_headers .= "Return-Path: <form2@arnoldson.net>\r\n";
    $email_headers .= "Errors-To: <form2@arnoldson.net>\r\n";

    if (mail($recipient, $subject, $email_content, $email_headers)) {

      //on success
      $_SESSION['formsenttime'] = time();
      $_SESSION['lastcontent'] = $email_content;
      //give the user two chances to resend on mistakes before locking the token
      $_SESSION['numberofsends']++;
      if ($_SESSION['numberofsends'] >= 3) {
        $_SESSION['token'] = "destroyed";
      };

      http_response_code(200);
      if ($lang == "sv") {
        echo "Tack så mycket! Jag svarar snart.";
      } else {
        echo "Thank you! I will answer shortly.";
      };
      exit;
    } else {
      http_response_code(500);
      if ($lang == "sv") {
        echo "Servern är död. Prova kontakta mig på ett annat sätt.";
      } else {
        echo "The server has died. Try contacting me some other way.";
      };
    }

  } else {
    //not POST
    http_response_code(403);
    if ($lang == "sv") {
      echo "403 - Förbjuden förfrågan.";
    } else {
      echo "403 - Forbidden request.";
    };
    exit;
  }

 ?>
