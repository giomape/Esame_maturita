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
   
    <title>Login</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="stile.css" rel="stylesheet">

    <script>
        function compilato(){
          let controllo=false;
          if(document.getElementById("username").value=="")
            controllo=true;
          else if(document.getElementById("password").value=="")
            controllo=true;
          else{}
          if(controllo==true){
            document.getElementById("required").style.display="inline-block";
            document.getElementById("cerrate").style.display="none";
            return false;
          }
          else{
            return true;
          }
        }

        function autenticazione(){
          if(compilato()==true){
            var xhr = new XMLHttpRequest();
            var url="login1.php";
            const params=JSON.stringify({
              username: document.getElementById("username").value,
              password: document.getElementById("password").value
            });
            xhr.open("POST", url, true);
            xhr.onreadystatechange = function () {
              if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                  window.location.href="verifica_email.php";
                }
              else if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 401) {
                document.getElementById("required").style.display="none";
                document.getElementById("cerrate").style.display="inline-block";
                document.getElementById("username").value="";
                document.getElementById("password").value="";
                document.getElementById("username").focus();
              }
            }
            xhr.send(params);
          }
        }
    </script>
  </head>

  <body style="background-color: rgb(77, 177, 77);" onload="">
    <div class="main-block">
        <h1>Login</h1>
        <form name="login">
          <hr>
          <div style="text-align: center;">
            <i style="size:7x" class="fas fa-user-circle fa-5x"></i>
          </div>
          <p id="required" style="color: red; display: none;">Alcuni campi non sono stati inseriti</p><br>
          <label id="icon" for="username"><i class="fas fa-address-card"></i></label>
          <input type="text" name="username" id="username" placeholder="Username" required/>
          <label id="icon" for="password"><i class="fas fa-unlock-alt"></i></label>
          <input type="password" name="password" id="password" placeholder="Password" required/>
          <p id="cerrate" style="color: red; display: none;">Le credenziali inserite non sono corrette</p><br>
          <div class="btn-block">
            <input type="button" value="Accedi" onclick="autenticazione()">
          </div>
          <div style="text-align: center;">
            <span style="text-align: center; font-size:15px">Non hai un account? </span>
            <a href="registrazione.php">Registrati</a>
          </div>
        </form>
      </div>    
  </body>
</html>