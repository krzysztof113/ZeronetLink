<?php
$request_uri = $_SERVER[REQUEST_URI];
$zeronet_url = "http://127.0.0.1:43110" . $_SERVER[REQUEST_URI];
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="http://127.0.0.1:43110/1HeLLo4uzjaLetFx6NH3PMwFP3qbRbTf3D/uimedia/all.css?rev=<?php echo rand(); ?>">
  <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">
  <title>Zeronet Bridge</title>
</head>

<body>
  <div class="tools">
    <a class="tools-link" href="/tools">Tools</a>
  </div>
  <div class="centerp">
    <h2>This site is a bridge to the Zeronet network.</h2>
    <noscript>Javascript is required for this site</noscript>
    <h4 id="status">Zeronet Bridge</h4>
    <h4 id="instruction">You can download from <br /><a class="pure-button pure-button-active" target="_blank" href="https://zeronet.io">Zeronet website - zeronet.io</a></h4>
    <a class="pure-button pure-button-primary" href="<?php echo $actual_link; ?>">Retry this page</a>
    <br />
    <br />

  </div>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
  <script type="text/javascript">
    function autorun() {
      $("#status").text("Checking...")
      var background_color = $("body").css("background-color")
      var zn_background_color = "rgb(210, 206, 205)" //HelloZN css
      if (background_color == zn_background_color) {
        $("#status").html("✅ Zeronet client detected. Redirecting to <br /><br /><a class='tools-link' href='<?php echo $zeronet_url; ?>'><?php echo $zeronet_url; ?></a>")
        $("#instruction").hide();
        setTimeout(redirect, 100);
      } else {
        $("#status").html("⚠ Zeronet client was NOT detected on your computer ⚠<br /><br /><a class='tools-link' href='<?php echo $zeronet_url; ?>'><?php echo $zeronet_url; ?></a>")
        $("#instruction").show();
      }
    }

    function redirect() {
      window.location.replace("<?php echo $zeronet_url; ?>");
    }

    if (document.addEventListener) document.addEventListener("DOMContentLoaded", autorun, false);
    else if (document.attachEvent) document.attachEvent("onreadystatechange", autorun);
    else window.onload = autorun;
  </script>
</body>

</html>