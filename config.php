<?php
    # DO NOT UPLOAD ME WITH SECRETS TO ANY PUBLIC REPO!
    # Secret Keys are used to authenticate with the CAPTCHA services to verify a test.
    # Keys should not be shared with anyone else.
    # If you are updating this as a template, ensure that all keys are redacted first.
    # An example is <SERVICE_NAME_SECRET_KEY_GOES_HERE>
    # For more instructions, including the command to forcibly update config.php on Git, see .gitignore

    ############# DO NOT EDIT THE BELOW SECTION #############
    $__CONFIGFILELOC = __FILE__;
    $__CONFIGFILECALL = $_SERVER['DOCUMENT_ROOT'].$_SERVER['PHP_SELF'];
    if(substr($_SERVER['DOCUMENT_ROOT'], -1) == '/') {
        $__CONFIGFILECALL = substr($_SERVER['DOCUMENT_ROOT'], 0, -1).$_SERVER['PHP_SELF'];
    }
    if($__CONFIGFILELOC == $__CONFIGFILECALL) { 
        header("status: 204");
        header("HTTP/1.0 204 No Response");
        die();
    }
    ############# DO NOT EDIT THE ABOVE SECTION #############



    $configEmailAddress = array(
      "EXAMPLEKEY" => "exampleuser@example.org", ## DELETE THIS AND ENTER YOUR OWN EMAIL.
    );

    $checkmarkReCaptchaSecretKey = "<STANDARD_RECAPTCHA_SECRET_KEY_GOES_HERE>";
    $invisibleReCaptchaSecretKey = "<INVISIBLE_RECAPTCHA_SECRET_KEY_GOES_HERE>";

?>
