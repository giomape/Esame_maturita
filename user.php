<?php 
    session_start();
    require("https.php");
    if(!isset($_SESSION["username"]) && !isset($_SESSION["password"])){
        http_response_code(401);
        header('Location: login.php');
        die();
    }

?>
<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="UTF-8">
<title>Sito</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/line-awesome.css">
<link rel="stylesheet" type="text/css" href="css/line-awesome-font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
<link href="css/all.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.min.css">
<link rel="stylesheet" type="text/css" href="css/slick.css">
<link rel="stylesheet" type="text/css" href="css/slick-theme.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css">

<script>
var info;

    function prendiDati(){
        var xhr = new XMLHttpRequest();
          var url="prendiDatiUser.php";
          url+="?username="+"<?php echo $_GET["username"]; ?>";
          xhr.open("GET", url, true);
          xhr.onreadystatechange = function () {
            if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                info=JSON.parse(xhr.responseText);
                document.getElementById("notificatitolo").innerHTML='Notifiche';
                if(info.tipo!="<?php echo $_SESSION["type"]; ?>"){
                    if(info.length==0){
                        window.location.href="index.php";
                    }
                    else{
                        document.getElementById("username").innerHTML=info.username;
                        document.getElementById("nomeinalto").innerHTML="<?php echo $_SESSION["username"]; ?>";
                        let residenza=info.nome_residenza.split(",");
                        let citta=residenza[0];
                        let via=residenza[1];
                        var div=document.getElementById("qui");
                        var datalist=document.createElement("datalist");
                        datalist.setAttribute("id","nomiutente");
                        div.appendChild(datalist);
                        if(info.tipo=="calciatore"){
                            document.getElementById("immagine").src="player_image.svg";
                            document.getElementById("biografia").style.display="block";
                            document.getElementById("nome").style.display="block";
                            document.getElementById("data_nascita").style.display="block";
                            document.getElementById("currentserie").style.display="block";
                            document.getElementById("maxserie").style.display="block";
                            document.getElementById("residenza").style.display="block";
                            document.getElementById("piede").style.display="block";
                            document.getElementById("biografia").innerHTML="<span style='font-weight: bold;'>Biografia</span>: "+info.biografia;
                            document.getElementById("nome").innerHTML="<span style='font-weight: bold;'>Nome</span>: "+info.nome+" "+info.cognome;
                            document.getElementById("data_nascita").innerHTML="<span style='font-weight: bold;'>Data di nascita</span>: "+info.data_nascita;
                            document.getElementById("currentserie").innerHTML="<span style='font-weight: bold;'>Serie corrente</span>: "+info.current_serie;
                            document.getElementById("maxserie").innerHTML="<span style='font-weight: bold;'>Massima serie raggiunta</span>: "+info.max_serie;
                            document.getElementById("piede").innerHTML="<span style='font-weight: bold;'>Piede</span>: "+info.piede;
                            document.getElementById("residenza").innerHTML="<span style='font-weight: bold;'>Città</span>: "+citta+"<span style='font-weight: bold;'> Via</span>: "+via;
                            document.getElementById("top_profile_title").innerHTML="Più popolari";
                            
                        }  
                        else{
                            document.getElementById("immagine").src="team_image.svg";
                            document.getElementById("nome").style.display="block";
                            document.getElementById("currentserie").style.display="block";
                            document.getElementById("residenza").style.display="block";
                            document.getElementById("nome").innerHTML="<span style='font-weight: bold;'>Nome società</span>: "+info.nome;
                            document.getElementById("currentserie").innerHTML="<span style='font-weight: bold;'>Serie corrente</span>: "+info.current_serie;
                            document.getElementById("residenza").innerHTML="<span style='font-weight: bold;'>Città</span>: "+citta+"<span style='font-weight: bold;'> Via</span>: "+via;
                            document.getElementById("top_profile_title").innerHTML="Più popolari";
                        }
                        if(info.vecchio=="calciatore"){
                            document.getElementById("profilivicini").innerHTML="Società nelle vicinanze";
                        }
                        else{
                            document.getElementById("profilivicini").innerHTML="Calciatori nelle vicinanze";
                        }
                        addRuoli();
                        getNearest();
                        getFollower();
                        checkFollower();
                        getTopProfile();
                        getPost();
                        prendiUsername();
                    }
                }
                else{
                    window.location.href="index.php";
                }
              }
          }
          xhr.send();
    }

    function addRuoli(){
        var xhr = new XMLHttpRequest();
        var url="prendiRuoliUser.php";
        url+="?username="+"<?php echo $_GET["username"]; ?>";
        xhr.open("GET", url, true);
        xhr.onreadystatechange = function () {
            if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                res=JSON.parse(xhr.responseText);
                let div=document.getElementById("ruoli");
                var int=document.createElement("p");
                int.setAttribute("id", "nruoli"+i);
                int.setAttribute("style", "font-weight: bold");
                div.appendChild(int);
                document.getElementById("nruoli"+i).innerHTML="Ruoli";
                for(var i=0; i<res.length; i++){
                    var p=document.createElement("p");
                    p.setAttribute("id", "ruolo"+i);
                    div.appendChild(p);
                    document.getElementById("ruolo"+i).innerHTML=res[i].nome;
                }
            }
        }
        xhr.send();
    }

    function cerca(){
        window.location.href="user.php?username="+document.getElementById("search").value;
    }

    function checkFollower(){
        var xhr = new XMLHttpRequest();
          var url="checkFollow.php";
          url+="?username="+"<?php echo $_GET["username"]; ?>";
          xhr.open("GET", url, true);
          xhr.onreadystatechange = function () {
            if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                document.getElementById("follow").innerHTML="SEGUITO";
                document.getElementById("follow").setAttribute("onClick", "unfollow()" );
            }
            else if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 404) {
                document.getElementById("follow").innerHTML="SEGUI";
                document.getElementById("follow").setAttribute("onClick", "follow()" );
            }
          }
          xhr.send();
    }

    function getFollower(){
        var xhr = new XMLHttpRequest();
          var url="getFollower.php";
          url+="?username="+"<?php echo $_GET["username"]; ?>";
          xhr.open("GET", url, true);
          xhr.onreadystatechange = function () {
            if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                res=JSON.parse(xhr.responseText);
                document.getElementById("seguaci").innerHTML=res["follower"];
                document.getElementById("seguiti").innerHTML=res["following"];
            }
          }
          xhr.send();
    }

    function getUser(username){
        window.location.href="user.php?username="+username;
    }

    function getNearest(){
        var xhr = new XMLHttpRequest();
          var url="getNearestPlace.php";
          url+="?lat="+"<?php echo $_SESSION["lat"]; ?>";
          url+="&long="+"<?php echo $_SESSION["long"]; ?>";
          xhr.open("GET", url, true);
          xhr.onreadystatechange = function () {
            if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                res=JSON.parse(xhr.responseText);
                let div1=document.getElementById("vicinanza");
                for (i=0;i<res.length;i++){
                    
                    var div2 = document.createElement("div");
                    div2.setAttribute("id","elemento"+i);
                    div2.setAttribute("class","job-info");
                    div1.appendChild(div2);
                    var div3 = document.createElement("div");
                    div3.setAttribute("id","dettagli"+i);
                    div3.setAttribute("class","job-details");
                    div2.appendChild(div3);
                    var username = document.createElement("h3");
                    username.setAttribute("id","username"+i);
                    username.addEventListener("click", function(event){
                        getUser(event.target.innerText);
                    });
                    username.setAttribute("style","cursor:pointer");
                    div3.appendChild(username);
                    document.getElementById("username"+i).innerHTML=res[i].username;
                    var current = document.createElement("p");
                    current.setAttribute("id","current"+i);
                    div3.appendChild(current);
                    document.getElementById("current"+i).innerHTML=res[i].current_serie;
                    var div4 = document.createElement("div");
                    div4.setAttribute("id","dis"+i);
                    div4.setAttribute("class","hr-rate");
                    div2.appendChild(div4);
                    var distanza = document.createElement("span");
                    distanza.setAttribute("id","distanza"+i);
                    div4.appendChild(distanza);
                    var cifra=(res[i].distanza)*1;
                    document.getElementById("distanza"+i).innerHTML=cifra.toFixed(1)+" km";
                    if(i==14){i=res.length;}
                }
            }
        }
        xhr.send();
    }

    function getTopProfile(){
        var xhr = new XMLHttpRequest();
          var url="topProfile.php";
          xhr.open("GET", url, true);
          xhr.onreadystatechange = function () {
            if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                res=JSON.parse(xhr.responseText);
                let div1=document.getElementById("suggeriti");
                for (i=0;i<res.length;i++){
                    var div2 = document.createElement("div");
                    div2.setAttribute("id","element"+i);
                    div2.setAttribute("class","suggestion-usd");
                    div1.appendChild(div2);
                    var div3 = document.createElement("div");
                    div3.setAttribute("id","dettagl"+i);
                    div3.setAttribute("class","sgt-text");
                    div2.appendChild(div3);
                    var username = document.createElement("h4");
                    username.setAttribute("id","usernam"+i);
                    username.addEventListener("click", function(event){
                        getUser(event.target.innerText);
                    });
                    username.setAttribute("style","cursor:pointer");
                    div3.appendChild(username);
                    document.getElementById("usernam"+i).innerHTML=res[i].username;
                    var current = document.createElement("span");
                    current.setAttribute("id","curren"+i);
                    div3.appendChild(current);
                    document.getElementById("curren"+i).innerHTML=res[i].current_serie;
                    var numero = document.createElement("span");
                    numero.setAttribute("id","numer"+i);
                    div2.appendChild(numero);
                    document.getElementById("numer"+i).innerHTML=res[i].numero;
                    if(i==5){i=res.length;}
                }
            }
        }
        xhr.send();
    }

    function addPost(){
        var xhr = new XMLHttpRequest();
        var url="inserisciPost.php";
        url+="?titolo="+document.getElementById("titolo").value;
        url+="&descrizione="+document.getElementById("descrizione").value;
        xhr.open("GET", url, true);
        xhr.onreadystatechange = function () {
            if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                $(".post-popup.job_post").removeClass("active");
                $(".wrapper").removeClass("overlay");
                window.location.reload();
                return false;
            }
        }
        xhr.send();
    }

    function follow(){
        var xhr = new XMLHttpRequest();
          var url="follow.php";
          url+="?seguito="+"<?php echo $_GET["username"]; ?>";
          xhr.open("GET", url, true);
          xhr.onreadystatechange = function () {
            if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                document.getElementById("follow").innerHTML="SEGUITO";
                document.getElementById("follow").setAttribute("onClick","unfollow();");
            }
        }
        xhr.send();
        getFollower();
    }

    function unfollow(){
        var xhr = new XMLHttpRequest();
          var url="unfollow.php";
          url+="?seguito="+"<?php echo $_GET["username"]; ?>";
          xhr.open("GET", url, true);
          xhr.onreadystatechange = function () {
            if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                document.getElementById("follow").innerHTML="SEGUI";
                document.getElementById("follow").setAttribute("onClick","follow();");
            }
        }
        xhr.send();
        getFollower();
    }

    function getPost(){
        var xhr = new XMLHttpRequest();
        var url="getPostUser.php";
        url+="?username="+"<?php echo $_GET["username"]; ?>";
        xhr.open("GET", url, true);
        xhr.onreadystatechange = function () {
            if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                res=JSON.parse(xhr.responseText);
                console.log(res);
                let div1=document.getElementById("sezionepost");
                if(res.length==0){
                    var div2 = document.createElement("div");
                    div2.setAttribute("id","elemen"+i);
                    div2.setAttribute("class","post-bar");
                    div1.appendChild(div2);
                    var div6 = document.createElement("div");
                    div6.setAttribute("id","det"+i);
                    div6.setAttribute("class","job_descp");
                    div2.appendChild(div6);
                    var titolo = document.createElement("h3");
                    titolo.setAttribute("id","titolo"+i);
                    div6.appendChild(titolo);
                    document.getElementById("titolo"+i).innerHTML="Torna più tardi";
                    var descrizione = document.createElement("p");
                    descrizione.setAttribute("id","descrizione"+i);
                    div6.appendChild(descrizione);
                    document.getElementById("descrizione"+i).innerHTML="<?php echo $_GET["username"]; ?> non ha ancora postato nulla :(";
                }
                else{
                    for (i=0;i<res.length;i++){
                    var div2 = document.createElement("div");
                    div2.setAttribute("id","elemen"+i);
                    div2.setAttribute("class","post-bar");
                    div1.appendChild(div2);
                    var div3 = document.createElement("div");
                    div3.setAttribute("id","dettag"+i);
                    div3.setAttribute("class","post_topbar");
                    div2.appendChild(div3);
                    var div4 = document.createElement("div");
                    div4.setAttribute("id","detta"+i);
                    div4.setAttribute("class","usy-dt");
                    div3.appendChild(div4);
                    var div5 = document.createElement("div");
                    div5.setAttribute("id","dett"+i);
                    div5.setAttribute("class","usy-name");
                    div4.appendChild(div5);
                    var username = document.createElement("h3");
                    username.setAttribute("id","userna"+i);
                    username.addEventListener("click", function(event){
                        getUser(event.target.innerText);
                    });
                    username.setAttribute("style","cursor:pointer");
                    div5.appendChild(username);
                    document.getElementById("userna"+i).innerHTML=res[i].username;
                    var data = document.createElement("span");
                    data.setAttribute("id","data"+i);
                    div5.appendChild(data);
                    document.getElementById("data"+i).innerHTML=res[i].data;

                    var div6 = document.createElement("div");
                    div6.setAttribute("id","det"+i);
                    div6.setAttribute("class","job_descp");
                    div2.appendChild(div6);
                    var titolo = document.createElement("h3");
                    titolo.setAttribute("id","titolo"+i);
                    div6.appendChild(titolo);
                    document.getElementById("titolo"+i).innerHTML="<br>"+res[i].titolo;
                    var descrizione = document.createElement("p");
                    descrizione.setAttribute("id","descrizione"+i);
                    div6.appendChild(descrizione);
                    document.getElementById("descrizione"+i).innerHTML=res[i].descrizione;
                    var ul=document.createElement("ul");
                    ul.setAttribute("class","skill-tags");
                    div6.appendChild(ul);
                    var li=document.createElement("li");
                    ul.appendChild(li);
                    var current_serie = document.createElement("a");
                    current_serie.setAttribute("id","current_serie"+i);
                    li.appendChild(current_serie);
                    document.getElementById("current_serie"+i).innerHTML=res[i].current_serie;
                    }
                }
            }
        }
        xhr.send();
    }

    var usernameDatabase;
    function prendiUsername(){
        var xhr = new XMLHttpRequest();
        var url="prendiUsernameDatabase.php";
        xhr.open("GET", url, true);
        xhr.onreadystatechange = function () {
            if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                usernameDatabase=JSON.parse(xhr.responseText);
            }
        }
        xhr.send();
    }

    function removeChildren (parent) {
        while (parent.lastChild) {
            parent.removeChild(parent.lastChild);
        }
    }

    function autocomplet(){
        var sel=document.getElementById("nomiutente");
        var ricerca;
        removeChildren(sel);
        ricerca=document.getElementById("search").value;
        if(ricerca.length!=0){
            for (i=0;i<usernameDatabase.length;i++){
                username=usernameDatabase[i].username;
                if(username.startsWith(ricerca)){
                    var opt=document.createElement("option");
                    opt.innerText=username;
                    opt.setAttribute("value",username);
                    sel.appendChild(opt);
                }
            }
        }
        else{
            return;
        }
    }

    function scrivi(){
        window.location.href="message.php?user="+"<?php echo $_GET["username"]; ?>";
    }

    var notifiche=0;
    function getNotification(){
    var xhr = new XMLHttpRequest();
        var url="getNotification.php";
        xhr.open("GET", url, true);
        xhr.onreadystatechange = function () {
            if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                document.getElementById("notificatitolo").innerHTML='Notifiche <i class="fas fa-exclamation"></i>';
                mes=JSON.parse(xhr.responseText);
                if(mes.length>notifiche){
                    removeChildren(document.getElementById("notifiche"));
                    for (i=0;i<mes.length;i++){
                        var div4= document.createElement("div");
                        div4.setAttribute("id","notifica"+i);
                        div4.setAttribute("class","notfication-details");
                        var barranotifiche=document.getElementById("notifiche");
                        barranotifiche.appendChild(div4);
                        var div5= document.createElement("div");
                        div5.setAttribute("id","notifica"+i);
                        div5.setAttribute("class","notification-info");
                        div4.appendChild(div5);
                        var posto = document.createElement("h3");
                        div5.appendChild(posto);
                        var username = document.createElement("a");
                        username.setAttribute("id","userna"+i);
                        username.addEventListener("click", function(event){
                            getChat(event.target.innerText);
                        });
                        username.setAttribute("style","cursor:pointer");
                        posto.appendChild(username);
                        document.getElementById("userna"+i).innerHTML=mes[i].mittente;
                        var testom = document.createElement("p");
                        testom.setAttribute("id","tes"+i);
                        div5.appendChild(testom);
                        document.getElementById("tes"+i).innerHTML=mes[i].messaggio;
                        var da = document.createElement("span");
                        da.setAttribute("id","da"+i);
                        div5.appendChild(da);
                        document.getElementById("da"+i).innerHTML=mes[i].data;
                    }
                    notifiche=mes.length;
                }
            }
            else{
                document.getElementById("notificatitolo").innerHTML='Notifiche';
            }
        }
        xhr.send();
    }
    setInterval(getNotification, 2000);

    function getChat(username){
        <?php
            session_start();
            $data=date("Y-m-d H:i:s");
            $_SESSION["data"]=$data;
        ?>
        window.location.href="message.php?user="+username;
    }
    
</script>

</head>
<body onload="prendiDati()">
<div class="wrapper">
<header>
<div class="container">
<div class="header-data">
<div class="logo">
<a href="index.html" title=""><img src="" alt=""></a>
</div>
<div class="search-bar">
<form>
<input type="text" list="nomiutente" name="search" id="search" autocomplete="off" oninput="autocomplet()" placeholder="Cerca">
<div id="qui">

</div>
<button type="button" onclick="cerca()"><i class="fas fa-search"></i></button>
</form>
</div>
<nav>
<ul>
<li>
<a href="index.php" title="">
<span><img src="" alt=""></span>
Home
</a>
</li>
<li>
<a href="userPost.php" title="">
Miei post
</a>
</li>
<li>
<a href="#" title="" class="not-box-openm" id="notificatitolo">
</a>
<div class="notification-box msg" id="message">
<div class="nott-list" id="notifiche">

</div>
</div>
</li>
</ul>
</nav>
<div class="menu-btn">
<a href="#" title=""><i class="fas fa-bars"></i></a>
</div>
<div class="user-account">
<div class="user-info">
<img src="" alt="">
<a href="#" title="" id="nomeinalto"></a>
<i class="fas fa-angle-down"></i>
</div>
<div class="user-account-settingss" id="users">
<h3 class="tc"><a href="logout.php">Logout</a></h3>
</div>
</div>
</div>
</div>
</header>
<main>
<div class="main-section">
<div class="container">
<div class="main-section-data">
<div class="row">
<div class="col-lg-3 col-md-4 pd-left-none no-pd">
<div class="main-left-sidebar no-margin">
<div class="user-data full-width">
<div class="user-profile">
<div class="username-dt">
<div class="usr-pic">
<img id="immagine" alt="">
</div>
</div>
<div class="user-specs">
<h3 id="username"></h3>
<p style="display:none" id="nome"></p>
<p style="display:none" id="biografia"></p>
<p style="display:none" id="data_nascita"></p>
<p style="display:none" id="piede"></p>
<p style="display:none" id="maxserie"></p>
<p style="display:none" id="currentserie"></p>
<p style="display:none" id="residenza"></p><br>

<div id="ruoli">

</div>

<br>
<button style="float: center;color: #fff;background-color: #e44d3a;height: 40px;padding: 0 10px;text-align: center;font-size: 14px;border: 0;margin-left: 10px;cursor: pointer;font-weight: 600;" onclick="follow()" id="follow"></button>
<button style="float: center;color: #fff;background-color: #53d690;height: 40px;padding: 0 10px;text-align: center;font-size: 14px;border: 0;margin-left: 10px;cursor: pointer;font-weight: 600;" onclick="scrivi()" id="contatta">CONTATTA</button>
</div>
</div>
<ul class="user-fw-status">
<li>
<h4>Following</h4>
<span id="seguiti"></span>
</li>
<li>
<h4>Followers</h4>
<span id="seguaci"></span>
</li>
</ul>
</div>
<div class="suggestions full-width">
<div class="sd-title">
<h3 id="top_profile_title"></h3>
</div>  
<div class="suggestions-list" id="suggeriti">

</div>
</div>
<div class="tags-sec full-width">
<div class="cp-sec">
<img src="" alt="">
<p><img src="" alt="">Copyright 2021</p>
</div>
</div>
</div>
</div>
<div class="col-lg-6 col-md-8 no-pd">
<div class="main-ws-sec">
<div class="post-topbar">
<div class="post-st">
<ul>
<li><a class="post-jb active" href="#" title="">Crea un post</a></li>
</ul>
</div>
</div>
<div class="posts-section" id="sezionepost">

</div>
</div>
</div>
<div class="col-lg-3 pd-right-none no-pd">
<div class="right-sidebar">
<div class="widget widget-jobs">
<div class="sd-title">
<h3 id="profilivicini"></h3>
</div>
<div class="jobs-list" id="vicinanza">
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</main>

<div class="post-popup job_post">
<div class="post-project">
<h3>Crea un post</h3>
<div class="post-project-fields">
<form>
<div class="row">
<div class="col-lg-12">
<input type="text" id="titolo" placeholder="Titolo">
</div>
<div class="col-lg-12">
<textarea id="descrizione" placeholder="Descrizione"></textarea>
</div>
<div class="col-lg-12">
<ul>
<input type="button" style="float: center;color: #fff;background-color: #e44d3a;height: 40px;padding: 0 10px;text-align: center;font-size: 14px;border: 0;margin-left: 10px;cursor: pointer;font-weight: 600;" onclick="addPost()" id="posta" value="POST">
</ul>
</div>
</div>
</form>
</div>
<a href="#" title=""><i class="fas fa-times"></i></a>
</div>
</div>

</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>
<script type="text/javascript" src="js/slick.min.js"></script>
<script type="text/javascript" src="js/scrollbar.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>