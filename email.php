<?php
require_once('config.php');
if (isset($_POST['g-recaptcha-response'])) {
    $captcha = $_POST['g-recaptcha-response'];
}
if (!$captcha) {
    echo '<p>Please check the reCAPTCHA form.</p> <button onclick="history.go(-1);">Back </button>';
    exit;
}
$secretKey   =  "";
$ip           = $_SERVER['REMOTE_ADDR'];
$response     = "";

if (isset($_SERVER['HTTP_REFERER'])) {
  if (preg_match('/\/email.html\?mailKey=+/', $_SERVER['HTTP_REFERER']) == 1) {
    $secretKey    = $checkmarkReCaptchaSecretKey;
    $response     = file_get_contents("https://www.recaptcha.net/recaptcha/api/siteverify?secret=" . $secretKey . "&response=" . $captcha . "&remoteip=" . $ip);
  }
  else if (preg_match('/\/email_invisible.html\?mailKey=+/', $_SERVER['HTTP_REFERER']) == 1) {
    $secretKey    = $invisibleReCaptchaSecretKey;
    $response     = file_get_contents("https://www.recaptcha.net/recaptcha/api/siteverify?secret=" . $secretKey . "&response=" . $captcha . "&remoteip=" . $ip);
  }
  else {
    header("HTTP/1.1 403 Forbidden");
    echo '<p>You do not have a valid referrer.</p> <button onclick="history.go(-1);">Back </button>';
    die();
  }
}
else {
  header("HTTP/1.1 403 Forbidden");
  echo '<p>You do not have a valid referrer.</p> <button onclick="history.go(-1);">Back </button>';
  die();
}

$responseKeys = json_decode($response, true);
$mailAddress  = $configEmailAddress;

if (empty($_POST['mailKey'])) {
    header("HTTP/1.1 401 Unauthorized");
    echo '<p>You do not have an email key.</p> <button onclick="history.go(-1);">Back </button>';
    die();
} elseif (!array_key_exists($_POST['mailKey'], $mailAddress)) {
    header("HTTP/1.1 403 Forbidden");
    echo '<p>You do not have a valid email key.</p> <button onclick="history.go(-1);">Back </button>';
    die();
}
$emailAddress = $mailAddress[$_POST['mailKey']];

if (intval($responseKeys["success"]) !== 1) {
    echo '<p>You failed the reCAPTCHA test.</p> <button onclick="history.go(-1);">Back </button>';
} else {
    echo "<p>The email address is: <a href=\"mailto:" . $emailAddress . "\">" . $emailAddress . "</a></p>";
}
?>                        
