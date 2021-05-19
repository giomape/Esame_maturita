<!doctype html>
<?php require("https.php");?>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
   
    <title>Verifica e-mail</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="stile.css" rel="stylesheet">

    <script>

    var c=0;
        function sendEmail(){
          var xhr = new XMLHttpRequest();
          var url="email_sender.php";
          xhr.open("GET", url, true);
          xhr.onreadystatechange = function () {

          }
          xhr.send();
        }
        function controlloverifica(){
          if(c==0){
            var xhr = new XMLHttpRequest();
            var url="controlloverifica.php";
            xhr.open("GET", url, true);
            xhr.onreadystatechange = function () {
              if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                window.location.href="homepage.php";
              }
              else if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 401) {
                sendEmail();
                document.getElementById("caricamento").style.display="none";
                document.getElementById("main").style.display="inline-block";
                c++;
                return;
              }
            }
            xhr.send();
          }
          else{
            window.location.href="login.php";
          }
        }
    </script>
  </head>

  <body style="background-color: #ffffff;" onload="controlloverifica()">
    <div id="caricamento">
      <img src="https://www.drogbaster.it/loading/loading40.gif" style="position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%);">
    </div>
    <div class="main-block" id="main" style="display:none">
      <h1>Verifica E-mail</h1>
      <form name="Verifica">
        <hr>
        <h3>E' stata mandata un e-mail di verifica all'indirizzo inserito precedentemente, confermare la propria e-mail prima di continuare</h3><br><br><br><br><br><br><br><br><br>
        <input type="button" value="Fatto" onclick="controlloverifica()">
      </form>
    </div>    
  </body>
</html>