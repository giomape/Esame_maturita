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
   
    <title>Registrazione</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="stile.css" rel="stylesheet">

    <script>
        var messi=[];
        const regolaPassword = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/
        const regolaEmail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/
        var usercorrect;

        function checkUsername(){
          var xhr = new XMLHttpRequest();
          var url="check_username.php";
          url+="?username="+document.getElementById("username").value;
          xhr.open("GET", url, true);
          xhr.onreadystatechange = function () {
            if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                document.getElementById("username").style.color="green";
                document.getElementById("usererrato").style.display="none";
                usercorrect=true;
              }
            else if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 409) {
              document.getElementById("username").style.color="red";
              document.getElementById("usererrato").style.display="inline-block";
              usercorrect=false;
            }
          }
          xhr.send();
        }

        function clearOption(Select_toclear) {
          var o = Select_toclear.options.length - 1;
          for(var i = o; i >= 0; i--) {
              Select_toclear.remove(i);
          }
        }
        var conta;

        function contolloRequired(){
          conta = false;
          if(document.getElementById("footballer").checked){
            if(document.getElementById("name").value=="")
              conta=true;
            else if(document.getElementById("surname").value=="")
              conta=true;
            else if(document.getElementById("data").value=="")
              conta=true;
            else if(document.getElementById("email").value=="")
              conta=true;
            else if(document.getElementById("username").value=="")
              conta=true;
            else if(document.getElementById("password").value=="")
              conta=true;
            else if(document.getElementById("password2").value=="")
              conta=true;
            else if(document.getElementById("city").value=="")
              conta=true;
            else if(document.getElementById("street").value=="")
              conta=true;
            else if(document.getElementById("res").innerText=="")
              conta=true;
            else if(document.getElementById("bio").value=="")
              conta=true;
          }
          else{
            if(document.getElementById("names").value=="")
              conta=true;
            else if(document.getElementById("email").value=="")
              conta=true;
            else if(document.getElementById("username").value=="")
              conta=true;
            else if(document.getElementById("password").value=="")
              conta=true;
            else if(document.getElementById("password2").value=="")
              conta=true;
            else if(document.getElementById("city").value=="")
              conta=true;
            else if(document.getElementById("street").value=="")
              conta=true;
            else if(document.getElementById("res").innerText=="" || document.getElementById("res").style.display=="none")
              conta=true;
          }
          if(usercorrect==false){
            document.getElementById("usererrato").style.display="inline-block";
            document.getElementById("username").focus();
            return;
          }
          if(conta==false)
            controlloMail();
          if(conta==false)
            almenounRuolo();
          if(conta==true){
            document.getElementById("required").style.display="inline-block";
            document.getElementById("username").focus();
          }
          else{
            document.getElementById("required").style.display="none";
            inserisciDati();
          }
        }

        function almenounRuolo(){
          let contatore=0;
          for(var i=1; i<=13;i++){
            if(document.getElementById(i).checked)
              contatore++;
          }
          if(contatore==0)
            conta=true;
          else
            conta=false;
        }

        var ruoli=[];
        function prendiRuoli(){
          ruoli=[];
          for(var i=1; i<=13;i++){
            if(document.getElementById(i).checked)
              ruoli.push(i);
          }
        }

        var vai=false;
        function inserisciDati(){
          confermaPass();
          if(vai==false)
            ottieniDatiCorretti();
          if(vai==false)
            prendiRuoli();
          if(vai==false){
            if(document.getElementById("footballer").checked){
              var xhr = new XMLHttpRequest();
              var url="registrazione_calciatore.php";
              const params=JSON.stringify({
                nome: document.getElementById("name").value,
                cognome: document.getElementById("surname").value,
                data_nascita: document.getElementById("data").value,
                email: document.getElementById("email").value, 
                username: document.getElementById("username").value,
                password: document.getElementById("password").value,
                nome_residenza: document.getElementById("city").value+", "+document.getElementById("street").value,
                latitudine: latitudine,
                longitudine: longitudine,
                piede: piede,
                biografia: document.getElementById("bio").value,
                max_serie: maxserietext,
                current_serie: currentserietext,
                ruoli: ruoli
              });
              xhr.open("POST", url, true);
              xhr.onreadystatechange = function () {
                if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                  window.location.href="verifica_email.php";
                }
              }
              xhr.send(params);
            }
            else{
              var xhr = new XMLHttpRequest();
              var url="registrazione_societa.php";
              const params=JSON.stringify({
                nome: document.getElementById("names").value,
                email: document.getElementById("email").value, 
                username: document.getElementById("username").value,
                password: document.getElementById("password").value,
                nome_residenza: document.getElementById("city").value+", "+document.getElementById("street").value,
                latitudine: latitudine,
                longitudine: longitudine,
                current_serie: currentserietext,
                ruoli: ruoli
              });
              xhr.open("POST", url, true);
              xhr.onreadystatechange = function () {
                if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                  window.location.href="verifica_email.php";
                }
              }
              xhr.send(params);
            }
          }
        }
        function controllo(){
            if(document.getElementById("footballer").checked){
              document.getElementById("footdiv").style.display="block";
              document.getElementById("labelruolo").innerHTML="Ruoli preferiti";
              document.getElementById("biodiv").style.display="block";
              document.getElementById("hismaxdiv").style.display="block";
              document.getElementById("nomi").style.display="block";
              document.getElementById("nomisoc").style.display="none";
              document.getElementById("city").placeholder="Localit?? di residenza";
            }
            else{
              document.getElementById("footdiv").style.display="none";
              document.getElementById("labelruolo").innerHTML="Ruoli ricercati";
              document.getElementById("biodiv").style.display="none";
              document.getElementById("hismaxdiv").style.display="none";
              document.getElementById("nomi").style.display="none";
              document.getElementById("nomisoc").style.display="block";
              document.getElementById("city").placeholder="Localit?? di sede";
            }
        }
        function controllaDoppi(testo){
          var conta=0;
          for(var i=0;i<messi.length;i++){
            if(messi[i]==testo)
              conta++;
          }
          if(conta==0)
            return true;
          else
            return false;
        }

        var place;
        var longitudine;
        var latitudine;
        var piede;
        var maxserietext;
        var currentserietext;

        function ottieniDatiCorretti(){
          let scelta=document.getElementById("res").value;
          longitudine=place[scelta].lon;
          latitudine=place[scelta].lat;
          if(document.getElementById("sinistro").checked){
            piede="sinistro";
          }
          else{
            piede="destro";
          }
          var sel = document.getElementById("maxserie");
          maxserietext= sel.options[sel.selectedIndex].text;
          var sel = document.getElementById("lastserie");
          currentserietext= sel.options[sel.selectedIndex].text;
        }

        function getAddress(){
          messi=[];
          document.getElementById("res").style.display="block";
          var xhr = new XMLHttpRequest();
          var url="https://nominatim.openstreetmap.org/search";
          url+="?q="+registrazione.street.value;
          url+=","+registrazione.city.value;
          url+="&format=json&polygon=1&addressdetails=1";
          xhr.open("GET", url, true);
          xhr.onreadystatechange = function () {
            if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
              place=JSON.parse(xhr.responseText);
              var sel=registrazione.res;
              clearOption(sel);
              for (i=0;i<place.length;i++){
                  var opt=document.createElement("option");
                  if(typeof place[i].address.road!=="undefined")
                    opt.innerText=place[i].address.road+",";
                  if(typeof place[i].address.farmyard!=="undefined")
                    opt.innerText+=place[i].address.farmyard+",";
                  if(typeof place[i].address.quarter!=="undefined")
                    opt.innerText+=place[i].address.quarter+",";
                  if(typeof place[i].address.suburb!=="undefined")
                    opt.innerText+=place[i].address.suburb+",";
                  if(typeof place[i].address.village!=="undefined")
                    opt.innerText+=place[i].address.village+",";
                  if(typeof place[i].address.town!=="undefined")
                    opt.innerText+=place[i].address.town+",";
                  if(typeof place[i].address.city!=="undefined")
                    opt.innerText+=place[i].address.city+",";
                  if(typeof place[i].address.province!=="undefined")
                    opt.innerText+=place[i].address.province+",";
                  if(typeof place[i].address.state!=="undefined")
                    opt.innerText+=place[i].address.state+",";
                  if(typeof place[i].address.country!=="undefined")
                    opt.innerText+=place[i].address.country+",";
                  opt.setAttribute("value",i);
                  if(controllaDoppi(opt.innerText)){
                    messi[i]=opt.innerText;
                    sel.appendChild(opt);
                  }
              }
            }
          }
          xhr.send();
        }
        function hideElem(id){
          if(document.body.contains(document.getElementById(id))){
            document.getElementById(id).style.display="none";
          }
        }
        function getRuoli(){
          if(localStorage.getItem("ruoli")===null){
            var xhr = new XMLHttpRequest();
            var url="getRuoli.php";
            xhr.open("GET", url, true);
            xhr.onreadystatechange = function () {
                if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                  localStorage.setItem("ruoli",xhr.responseText);
                  var r=JSON.parse(xhr.responseText);
                  var pos=document.getElementById("ruoli");
                  for (i=0;i<r.length;i++){
                    var opt = document.createElement("INPUT");
                    opt.setAttribute("type", "checkbox");
                    opt.setAttribute("name", r[i].gruppo);
                    opt.setAttribute("id",r[i].id_ruolo);
                    var sel = document.getElementById("rolegroup");
                    var lab=document.createElement("label");
                    lab.setAttribute("for",r[i].nome);
                    lab.setAttribute("id","l"+r[i].id_ruolo);
                    
                    if(sel.options[sel.selectedIndex].text!=r[i].gruppo){
                      opt.setAttribute("style","display:none;cursor:pointer");
                      lab.setAttribute("style","display:none");
                    }
                    else{
                      opt.setAttribute("style","display:inline;cursor:pointer");
                      lab.setAttribute("style","display:inline");
                    }
                    pos.appendChild(opt);
                    pos.appendChild(lab);
                    document.getElementById("l"+r[i].id_ruolo).innerHTML=r[i].nome+"<br>";
                  }
                }
            }
            xhr.send();
          }
          else{
            var r=JSON.parse(localStorage.getItem("ruoli"));
            var pos=document.getElementById("ruoli");
            for (i=0;i<r.length;i++){
              var opt = document.createElement("INPUT");
              opt.setAttribute("type", "checkbox");
              opt.setAttribute("name", r[i].gruppo);
              opt.setAttribute("id",r[i].id_ruolo);
              var sel = document.getElementById("rolegroup");
              var lab=document.createElement("label");
              lab.setAttribute("for",r[i].nome);
              lab.setAttribute("id","l"+r[i].id_ruolo);
              
              if(sel.options[sel.selectedIndex].text!=r[i].gruppo){
                opt.setAttribute("style","display:none;cursor:pointer");
                lab.setAttribute("style","display:none");
              }
              else{
                opt.setAttribute("style","display:inline;cursor:pointer");
                lab.setAttribute("style","display:inline");
              }
              pos.appendChild(opt);
              pos.appendChild(lab);
              document.getElementById("l"+r[i].id_ruolo).innerHTML=r[i].nome+"<br>";
            }
          }
        }
        function showRuoli(){
          var r=JSON.parse(localStorage.getItem("ruoli"));
          var pos=document.getElementById("ruoli");
          var sel = document.getElementById("rolegroup");
          for (i=0;i<r.length;i++){
            if(sel.options[sel.selectedIndex].text!=r[i].gruppo){
              document.getElementById(r[i].id_ruolo).style.display="none";
              document.getElementById("l"+r[i].id_ruolo).style.display="none";
            }
            else{
              document.getElementById(r[i].id_ruolo).style.display="inline";
              document.getElementById("l"+r[i].id_ruolo).style.display="inline";
            }
          }
        }
        function controlloMail(){
          if(!document.getElementById("email").value.match(regolaEmail)) {
            document.getElementById("email").focus();
            document.getElementById("email").value="";
            document.getElementById("mailerrata").style.display="inline-block";
            document.getElementById("perrata").style.display="none";
            document.getElementById("psbagliata").style.display="none";
            conta=true;
            return;
          } 
          else {
          }
        }
        function confermaPass(){
          if(document.getElementById("password").value!==document.getElementById("password2").value){
            document.getElementById("password").focus();
            document.getElementById("nomi").focus();
            document.getElementById("password").value="";
            document.getElementById("password2").value="";
            document.getElementById("perrata").style.display="inline-block";
            document.getElementById("psbagliata").style.display="none";
            document.getElementById("mailerrata").style.display="none";
            vai=true;
            return;
          }
          else if(!document.getElementById("password").value.match(regolaPassword)) {
            document.getElementById("password").focus();
            document.getElementById("nomi").focus();
            document.getElementById("password").value="";
            document.getElementById("password2").value="";
            document.getElementById("psbagliata").style.display="inline-block";
            document.getElementById("perrata").style.display="none";
            document.getElementById("mailerrata").style.display="none";
            vai=true;
            return;
          } 
          else {
            vai=false;
          }
        }
        function minuscolo(){
          document.getElementById("username").value=document.getElementById("username").value.toLowerCase();
        }

        function togliSpazi(){
          var str = document.getElementById("username").value; 
          var res = str.replace(" ", "");
          document.getElementById("username").value = res;
        }

    </script>
  </head>

  <body style="background-color: #f2f2f2;" onload="controllo();getRuoli()">
    <div class="main-block">
        <h1>Registrazione</h1>
        <form name="registrazione">
          <hr>
          <h3 style="text-align: center;">Seleziona il tipo di account da creare</h3>
          <div class="account-type" style="text-align: center;">
            <input type="radio" value="footballer" id="footballer" name="account" onchange="controllo()" checked/>
            <label for="footballer" class="radio">Calciatore</label>
            <input type="radio" value="society" id="society" name="account" onchange="controllo()"/>
            <label for="society" class="radio">Societ??</label>
          </div>
          <hr>
          <div style="text-align: center;">
            <span style="text-align: center; font-size:15px">Hai gi?? un account? </span>
            <a href="login.php">Accedi</a>
          </div>
          <hr>
          <h3 style="text-align: center;">Informazioni</h3><br>
          <p id="required" style="color: red; display: none;">Alcuni campi non sono stati inseriti. Completare la registrazione</p><br>
          <div id="nomisoc">
          <label id="icon" for="names"><i class="fas fa-address-card"></i></label>
          <input type="text" name="names" id="names" maxlength="255" placeholder="Nome societ??" required/>
          </div>
          <div id="nomi">
          <label id="icon" for="name"><i class="fas fa-address-card"></i></label>
          <input type="text" name="name" id="name" maxlength="255" placeholder="Nome" required/>
          <label id="icon" for="surname"><i class="fas fa-address-card"></i></label>
          <input type="text" name="surname" id="surname" maxlength="255" placeholder="Cognome" required/>
          <label id="icon" for="data"><i class="fas fa-calendar"></i></label>
          <input type="date" name="data" id="data" required/>
          </div>
          <label id="icon" for="email"><i class="fas fa-envelope"></i></label>
          <input type="text" name="email" maxlength="100" id="email" placeholder="Email" required/>
          <p id="mailerrata" style="color: red; display: none;">L'email inserita non ?? valida</p><br>
          <label id="icon" for="username"><i class="fas fa-user"></i></label>
          <input type="text" name="username" id="username" maxlength="50" placeholder="Username" oninput="minuscolo();togliSpazi()" onchange="checkUsername()" required/>
          <p id="usererrato" style="color: red; display: none;">Username non disponibile, selezionarne un altro</p><br>
          <label id="icon" for="password"><i class="fas fa-unlock-alt"></i></label>
          <input type="password" name="password" id="password" placeholder="Password" required/>
          <label id="icon" for="password2"><i class="fas fa-unlock-alt"></i></label>
          <input type="password" name="password2" id="password2" placeholder="Conferma password" required/>
          <p id="perrata" style="color: red; display: none;">Le password inserite non corrispondono. Reinserirle</p><br>
          <p id="psbagliata" style="color: red; display: none;">La password deve essere di almeno 8 caratteri e contenere almeno un numero</p><br>
          <hr>
          <h3 style="text-align: center;">Indirizzo</h3><br>
          <label id="icon" for="city"><i class="fas fa-location-arrow"></i></label>
          <input type="text" name="city" id="city" placeholder="Localit?? di residenza" required/>
          <label id="icon" for="street"><i class="fas fa-map-marker"></i></label>
          <input type="text" name="street" id="street" placeholder="Via (es. Verdi)" required/><br><br>
          <div style="text-align: center;">
          <select name="res" id="res" style="width: calc(100% - 13px);display: none;"><br>
          </select>
          </div>
          <input type="button" value="Cerca indirizzo (obbligatorio)" onclick="getAddress()">
          <div class="foot-type" style="text-align: center;" id="footdiv">
            <hr>
            <h3 style="text-align: center;">Piede preferito</h3><br>
            <input type="radio" value="none" id="sinistro" name="foot" checked/>
            <label for="sinistro" class="radio">Sinistro</label>
            <input type="radio" value="none" id="destro" name="foot" />
            <label for="destro" class="radio">Destro</label>
          </div>
          <div class="role-type" style="text-align: center;" id="rolediv">
            <hr>
            <h3 style="text-align: center;" id="labelruolo">Ruoli preferiti</h3><br>
            <select name="rolegroup" id="rolegroup" style="max-width: 100%;" onchange="showRuoli()"><br>
              <option>Portiere</option>
              <option>Difensore</option>
              <option>Centrocampista</option>
              <option>Attaccante</option>
            </select><br><br>
            <div id="ruoli" name="ruoli">

            </div>
          </div>
          <div class="bio-type" style="text-align: center;" id="biodiv">
            <hr>
            <h3 style="text-align: center;">Biografia</h3>
            <textarea name="bio" id="bio" placeholder="Inserisci una breve biografia" style="resize:none;height: 150px;" maxlength="499" required/></textarea>
          </div>
          <div class="hisotry-type" style="text-align: center;" id="hismaxdiv">
            <hr>
            <h3 style="text-align: center;">Seleziona la massima serie raggiunta</h3><br>
            <select id="maxserie" name="maxserie">
              <option>Serie A</option>
              <option>Serie B</option>
              <option>Serie C</option>
              <option>Serie D</option>
              <option>Eccellenza</option>
              <option>Promozione</option>
              <option>Prima categoria</option>
              <option>Seconda categoria</option>
              <option>Terza categoria</option>
            </select>
          </div>
          <div class="hisotry-type" style="text-align: center;" id="hislastdiv">
            <hr>
            <h3 style="text-align: center;">Seleziona la serie corrente</h3><br>
            <select id="lastserie" name="lastserie">
              <option>Serie A</option>
              <option>Serie B</option>
              <option>Serie C</option>
              <option>Serie D</option>
              <option>Eccellenza</option>
              <option>Promozione</option>
              <option>Prima categoria</option>
              <option>Seconda categoria</option>
              <option>Terza categoria</option>
            </select>
          </div>
          <div class="btn-block">
            <input type="button" value="Registrati" onclick="contolloRequired()">
          </div>
        </form>
      </div>    
  </body>
</html>