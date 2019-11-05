<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">
  <title>Zeronet Bridge</title>
</head>

<body>
  <div class="tools">
    <a class="tools-link" href="./">Back</a>
  </div>
  <div class="centerp">
    <h2>Convert zeronet url into clearnet friendly link </h2>
    <noscript>Javascript is required for this site</noscript>
    <label for="input">Zeronet url</label>
    <input class="url-input" id="input" type="text" placeholder="http://127.0.0.1:43110/Talk.ZeroNetwork.bit/">
    <br />
    <br />
    <label for="output">Clearnet link</label>
    <input class="url-input" onClick="this.select();" id="output" type="text" placeholder="https://zeronet.link/Talk.ZeroNetwork.bit/">
    <a id="output-link" class="tools-link" href="/"></a>
    <br />
    <br />
    <input type="button" value="Convert" onclick="autorun()">
    <br />
    <br />

  </div>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
  <script type="text/javascript">
    function autorun() {
      console.log("autorun")
      try {
        var znRoot = 'http://127.0.0.1:43110/'
        var znUrl = $("#input").val()
        if (znUrl != "" && znUrl.indexOf(znRoot) >= 0) {
          console.log(znUrl)
          var znUrlSplitted = znUrl.split(znRoot);
          console.log(znUrlSplitted);
          var clearnetLink = "https://zeronet.link/" + znUrlSplitted[1]
          $("#output").val(clearnetLink)
          $("#output-link").attr("href", clearnetLink)
          $("#output-link").text(clearnetLink)
        } else {
          $("#output-link").attr("href", "")
          $("#output").val("")
          $("#output-link").text("incorrect ZN url")
        }
      } catch (error) {
        console.error(error);
      }
    }
    $("#input").change(autorun());
    $('#input').keypress(function(e) {
      if (e.which == 13) {
        autorun()
        return false;
      }
    });

    if (document.addEventListener) document.addEventListener("DOMContentLoaded", autorun, false);
    else if (document.attachEvent) document.attachEvent("onreadystatechange", autorun);
    else window.onload = autorun;
  </script>
</body>

</html>