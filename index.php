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
          var url="prendiDati.php";
          xhr.open("GET", url, true);
          xhr.onreadystatechange = function () {
            if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                info=JSON.parse(xhr.responseText);
                document.getElementById("username").innerHTML=info.username;
                document.getElementById("nomeinalto").innerHTML=info.username;
                let residenza=info.nome_residenza.split(",");
                let citta=residenza[0];
                let via=residenza[1];
                if(info.tipo=="calciatore"){
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
                    document.getElementById("profilivicini").innerHTML="Società nelle vicinanze";
                }
                else{
                    document.getElementById("nome").style.display="block";
                    document.getElementById("currentserie").style.display="block";
                    document.getElementById("residenza").style.display="block";
                    document.getElementById("profilivicini").innerHTML="Calciatori nelle vicinanze";
                    document.getElementById("nome").innerHTML="<span style='font-weight: bold;'>Nome società</span>: "+info.nome;
                    document.getElementById("currentserie").innerHTML="<span style='font-weight: bold;'>Serie corrente</span>: "+info.current_serie;
                    document.getElementById("residenza").innerHTML="<span style='font-weight: bold;'>Città</span>: "+citta+"<span style='font-weight: bold;'> Via</span>: "+via;
                }
              }
          }
          xhr.send();
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
<input type="text" name="search" placeholder="Search...">
<button type="submit"><i class="fas fa-search"></i></button>
</form>
</div>
<nav>
<ul>
<li>
<a href="index.html" title="">
<span><img src="" alt=""></span>
Home
</a>
</li>
<li>
<a href="companies.html" title="">
<span><img src="" alt=""></span>
Companies
</a>
<ul>
<li><a href="companies.html" title="">Companies</a></li>
<li><a href="company-profile.html" title="">Company Profile</a></li>
</ul>
</li>
<li>
<a href="projects.html" title="">
<span><img src="" alt=""></span>
Projects
</a>
</li>
<li>
<a href="profiles.html" title="">
<span><img src="" alt=""></span>
Profiles
</a>
<ul>
<li><a href="user-profile.html" title="">User Profile</a></li>
<li><a href="my-profile-feed.html" title="">my-profile-feed</a></li>
</ul>
</li>
<li>
<a href="jobs.html" title="">
<span><img src="" alt=""></span>
Jobs
</a>
</li>
<li>
<a href="#" title="" class="not-box-openm">
<span><img src="" alt=""></span>
Messages
</a>
<div class="notification-box msg" id="message">
<div class="nt-title">
<h4>Setting</h4>
<a href="#" title="">Clear all</a>
</div>
<div class="nott-list">
<div class="notfication-details">
<div class="noty-user-img">
<img src="" alt="">
</div>
<div class="notification-info">
<h3><a href="messages.html" title="">Jassica William</a> </h3>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</p>
<span>2 min ago</span>
</div>
</div>
<div class="notfication-details">
<div class="noty-user-img">
<img src="" alt="">
</div>
<div class="notification-info">
<h3><a href="messages.html" title="">Jassica William</a></h3>
<p>Lorem ipsum dolor sit amet.</p>
<span>2 min ago</span>
</div>
</div>
<div class="notfication-details">
<div class="noty-user-img">
<img src="" alt="">
</div>
<div class="notification-info">
<h3><a href="messages.html" title="">Jassica William</a></h3>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempo incididunt ut labore et dolore magna aliqua.</p>
<span>2 min ago</span>
</div>
</div>
<div class="view-all-nots">
<a href="messages.html" title="">View All Messsages</a>
</div>
</div>
</div>
</li>
<li>
<a href="#" title="" class="not-box-open">
<span><img src="" alt=""></span>
Notification
</a>
<div class="notification-box noti" id="notification">
<div class="nt-title">
<h4>Setting</h4>
<a href="#" title="">Clear all</a>
</div>
<div class="nott-list">
<div class="notfication-details">
<div class="noty-user-img">
<img src="" alt="">
</div>
<div class="notification-info">
<h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
<span>2 min ago</span>
</div>
</div>
<div class="notfication-details">
<div class="noty-user-img">
<img src="" alt="">
</div>
<div class="notification-info">
<h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
<span>2 min ago</span>
</div>
</div>
<div class="notfication-details">
<div class="noty-user-img">
<img src="" alt="">
</div>
<div class="notification-info">
<h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
<span>2 min ago</span>
</div>
</div>
<div class="notfication-details">
<div class="noty-user-img">
<img src="" alt="">
</div>
<div class="notification-info">
<h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
<span>2 min ago</span>
</div>
</div>
<div class="view-all-nots">
<a href="#" title="">View All Notification</a>
</div>
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
<h3 class="tc">Logout</h3>
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
<img src="https://www.infobetting.com/blog/wp-content/uploads/2018/07/lebron-james-lakers-696x596.jpg" alt="">
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
<p style="display:none" id="residenza"></p>
</div>
</div>
<ul class="user-fw-status">
<li>
<h4>Following</h4>
<span id="seguiti">45</span>
</li>
<li>
<h4>Followers</h4>
<span id="seguaci">45.3M</span>
</li>
</ul>
</div>
<div class="suggestions full-width">
<div class="sd-title">
<h3>Suggestions</h3>
<i class="la la-ellipsis-v"></i>
</div>
<div class="suggestions-list">
<div class="suggestion-usd">
<img src="" alt="">
<div class="sgt-text">
<h4>Jessica William</h4>
<span>Graphic Designer</span>
</div>
<span><i class="la la-plus"></i></span>
</div>
<div class="suggestion-usd">
<img src="" alt="">
<div class="sgt-text">
<h4>John Doe</h4>
<span>PHP Developer</span>
</div>
<span><i class="la la-plus"></i></span>
</div>
<div class="suggestion-usd">
<img src="" alt="">
<div class="sgt-text">
<h4>Poonam</h4>
<span>Wordpress Developer</span>
</div>
<span><i class="la la-plus"></i></span>
</div>
<div class="suggestion-usd">
<img src="" alt="">
<div class="sgt-text">
<h4>Bill Gates</h4>
<span>C & C++ Developer</span>
</div>
<span><i class="la la-plus"></i></span>
</div>
<div class="suggestion-usd">
<img src="" alt="">
<div class="sgt-text">
<h4>Jessica William</h4>
<span>Graphic Designer</span>
</div>
<span><i class="la la-plus"></i></span>
</div>
<div class="suggestion-usd">
<img src="" alt="">
<div class="sgt-text">
<h4>John Doe</h4>
<span>PHP Developer</span>
</div>
<span><i class="la la-plus"></i></span>
</div>
<div class="view-more">
<a href="#" title="">View More</a>
</div>
</div>
</div>
<div class="tags-sec full-width">
<ul>
<li><a href="#" title="">Help Center</a></li>
<li><a href="#" title="">About</a></li>
<li><a href="#" title="">Privacy Policy</a></li>
<li><a href="#" title="">Community Guidelines</a></li>
<li><a href="#" title="">Cookies Policy</a></li>
<li><a href="#" title="">Career</a></li>
<li><a href="#" title="">Language</a></li>
<li><a href="#" title="">Copyright Policy</a></li>
</ul>
<div class="cp-sec">
<img src="" alt="">
<p><img src="" alt="">Copyright 2019</p>
</div>
</div>
</div>
</div>
<div class="col-lg-6 col-md-8 no-pd">
<div class="main-ws-sec">
<div class="post-topbar">
<div class="user-picy">
<img src="" alt="">
</div>
<div class="post-st">
<ul>
<li><a class="post_project" href="#" title="">Post a Project</a></li>
<li><a class="post-jb active" href="#" title="">Post a Job</a></li>
</ul>
</div>
</div>
<div class="posts-section">
<div class="post-bar">
<div class="post_topbar">
<div class="usy-dt">
<img src="" alt="">
<div class="usy-name">
<h3>John Doe</h3>
<span><img src="" alt="">3 min ago</span>
</div>
</div>
<div class="ed-opts">
<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
<ul class="ed-options">
<li><a href="#" title="">Edit Post</a></li>
<li><a href="#" title="">Unsaved</a></li>
<li><a href="#" title="">Unbid</a></li>
<li><a href="#" title="">Close</a></li>
<li><a href="#" title="">Hide</a></li>
</ul>
</div>
</div>
<div class="epi-sec">
<ul class="descp">
<li><img src="" alt=""><span>Epic Coder</span></li>
<li><img src="" alt=""><span>India</span></li>
</ul>
<ul class="bk-links">
<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
</ul>
</div>
<div class="job_descp">
<h3>Senior Wordpress Developer</h3>
<ul class="job-dt">
<li><a href="#" title="">Full Time</a></li>
<li><span>$30 / hr</span></li>
</ul>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
<ul class="skill-tags">
<li><a href="#" title="">HTML</a></li>
<li><a href="#" title="">PHP</a></li>
<li><a href="#" title="">CSS</a></li>
<li><a href="#" title="">Javascript</a></li>
<li><a href="#" title="">Wordpress</a></li>
</ul>
</div>
<div class="job-status-bar">
<ul class="like-com">
<li>
<a href="#"><i class="fas fa-heart"></i> Like</a>
<img src="" alt="">
<span>25</span>
</li>
<li><a href="#" class="com"><i class="fas fa-comment-alt"></i> Comment 15</a></li>
</ul>
<a href="#"><i class="fas fa-eye"></i>Views 50</a>
</div>
</div>

<div class="post-bar">
<div class="post_topbar">
<div class="usy-dt">
<img src="" alt="">
<div class="usy-name">
<h3>John Doe</h3>
<span><img src="" alt="">3 min ago</span>
</div>
</div>
<div class="ed-opts">
<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
<ul class="ed-options">
<li><a href="#" title="">Edit Post</a></li>
<li><a href="#" title="">Unsaved</a></li>
<li><a href="#" title="">Unbid</a></li>
<li><a href="#" title="">Close</a></li>
 <li><a href="#" title="">Hide</a></li>
</ul>
</div>
</div>
<div class="epi-sec">
<ul class="descp">
<li><img src="" alt=""><span>Epic Coder</span></li>
<li><img src="" alt=""><span>India</span></li>
</ul>
<ul class="bk-links">
<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
<li><a href="#" title="" class="bid_now">Bid Now</a></li>
</ul>
</div>
<div class="job_descp">
<h3>Senior Wordpress Developer</h3>
<ul class="job-dt">
<li><a href="#" title="">Full Time</a></li>
<li><span>$30 / hr</span></li>
</ul>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
<ul class="skill-tags">
<li><a href="#" title="">HTML</a></li>
<li><a href="#" title="">PHP</a></li>
<li><a href="#" title="">CSS</a></li>
<li><a href="#" title="">Javascript</a></li>
<li><a href="#" title="">Wordpress</a></li>
</ul>
</div>
<div class="job-status-bar">
<ul class="like-com">
<li>
<a href="#"><i class="fas fa-heart"></i> Like</a>
<img src="" alt="">
<span>25</span>
</li>
<li><a href="#" class="com"><i class="fas fa-comment-alt"></i> Comment 15</a></li>
</ul>
<a href="#"><i class="fas fa-eye"></i>Views 50</a>
</div>
</div>
<div class="posty">
<div class="post-bar no-margin">
<div class="post_topbar">
<div class="usy-dt">
<img src="" alt="">
<div class="usy-name">
<h3>John Doe</h3>
<span><img src="" alt="">3 min ago</span>
</div>
</div>
<div class="ed-opts">
<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
<ul class="ed-options">
<li><a href="#" title="">Edit Post</a></li>
<li><a href="#" title="">Unsaved</a></li>
<li><a href="#" title="">Unbid</a></li>
<li><a href="#" title="">Close</a></li>
<li><a href="#" title="">Hide</a></li>
</ul>
</div>
</div>
<div class="epi-sec">
<ul class="descp">
<li><img src="" alt=""><span>Epic Coder</span></li>
<li><img src="" alt=""><span>India</span></li>
</ul>
<ul class="bk-links">
<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
</ul>
</div>
<div class="job_descp">
<h3>Senior Wordpress Developer</h3>
<ul class="job-dt">
<li><a href="#" title="">Full Time</a></li>
<li><span>$30 / hr</span></li>
</ul>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
<ul class="skill-tags">
<li><a href="#" title="">HTML</a></li>
<li><a href="#" title="">PHP</a></li>
<li><a href="#" title="">CSS</a></li>
<li><a href="#" title="">Javascript</a></li>
<li><a href="#" title="">Wordpress</a></li>
</ul>
</div>
<div class="job-status-bar">
<ul class="like-com">
<li>
<a href="#"><i class="fas fa-heart"></i> Like</a>
<img src="" alt="">
<span>25</span>
</li>
<li><a href="#" class="com"><i class="fas fa-comment-alt"></i> Comment 15</a></li>
</ul>
<a href="#"><i class="fas fa-eye"></i>Views 50</a>
</div>
</div>
<div class="comment-section">
<a href="#" class="plus-ic">
<i class="la la-plus"></i>
</a>
<div class="comment-sec">
<ul>
<li>
<div class="comment-list">
<div class="bg-img">
<img src="" alt="">
</div>
<div class="comment">
<h3>John Doe</h3>
<span><img src="" alt=""> 3 min ago</span>
<p>Lorem ipsum dolor sit amet, </p>
<a href="#" title="" class="active"><i class="fa fa-reply-all"></i>Reply</a>
</div>
</div>
<ul>
<li>
<div class="comment-list">
<div class="bg-img">
<img src="" alt="">
</div>
<div class="comment">
<h3>John Doe</h3>
<span><img src="" alt=""> 3 min ago</span>
<p>Hi John </p>
<a href="#" title=""><i class="fa fa-reply-all"></i>Reply</a>
</div>
</div>
</li>
</ul>
</li>
<li>
<div class="comment-list">
<div class="bg-img">
<img src="" alt="">
</div>
<div class="comment">
<h3>John Doe</h3>
<span><img src="" alt=""> 3 min ago</span>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at.</p>
<a href="#" title=""><i class="fa fa-reply-all"></i>Reply</a>
</div>
</div>
</li>
</ul>
</div>
<div class="post-comment">
<div class="cm_img">
<img src="" alt="">
</div>
<div class="comment_box">
<form>
<input type="text" placeholder="Post a comment">
<button type="submit">Send</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-3 pd-right-none no-pd">
<div class="right-sidebar">
<div class="widget widget-jobs">
<div class="sd-title">
<h3 id="profilivicini"></h3>
</div>
<div class="jobs-list">
<div class="job-info">
<div class="job-details">
<h3>Senior Product Designer</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
</div>
<div class="hr-rate">
<span>$25/hr</span>
</div>
</div>
<div class="job-info">
<div class="job-details">
<h3>Senior UI / UX Designer</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
</div>
<div class="hr-rate">
<span>$25/hr</span>
</div>
</div>
<div class="job-info">
<div class="job-details">
<h3>Junior Seo Designer</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
</div>
<div class="hr-rate">
<span>$25/hr</span>
</div>
</div>
<div class="job-info">
<div class="job-details">
<h3>Senior PHP Designer</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
</div>
<div class="hr-rate">
<span>$25/hr</span>
</div>
</div>
<div class="job-info">
<div class="job-details">
<h3>Senior Developer Designer</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
</div>
<div class="hr-rate">
<span>$25/hr</span>
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
</div>
</div>
</main>
<div class="post-popup pst-pj">
<div class="post-project">
<h3>Post a project</h3>
<div class="post-project-fields">
<form>
<div class="row">
<div class="col-lg-12">
<input type="text" name="title" placeholder="Title">
</div>
<div class="col-lg-12">
<div class="inp-field">
<select>
<option>Category</option>
<option>Category 1</option>
<option>Category 2</option>
<option>Category 3</option>
</select>
</div>
</div>
<div class="col-lg-12">
<input type="text" name="skills" placeholder="Skills">
</div>
<div class="col-lg-12">
<div class="price-sec">
<div class="price-br">
<input type="text" name="price1" placeholder="Price">
<i class="la la-dollar"></i>
</div>
<span>To</span>
<div class="price-br">
<input type="text" name="price1" placeholder="Price">
<i class="la la-dollar"></i>
</div>
</div>
</div>
<div class="col-lg-12">
<textarea name="description" placeholder="Description"></textarea>
</div>
<div class="col-lg-12">
<ul>
<li><button class="active" type="submit" value="post">Post</button></li>
<li><a href="#" title="">Cancel</a></li>
</ul>
</div>
</div>
</form>
</div>
<a href="#" title=""><i class="la la-times-circle-o"></i></a>
</div>
</div>
<div class="post-popup job_post">
<div class="post-project">
<h3>Post a job</h3>
<div class="post-project-fields">
<form>
<div class="row">
<div class="col-lg-12">
<input type="text" name="title" placeholder="Title">
</div>
<div class="col-lg-12">
<div class="inp-field">
<select>
<option>Category</option>
<option>Category 1</option>
<option>Category 2</option>
<option>Category 3</option>
</select>
</div>
</div>
<div class="col-lg-12">
<input type="text" name="skills" placeholder="Skills">
</div>
<div class="col-lg-6">
<div class="price-br">
<input type="text" name="price1" placeholder="Price">
<i class="la la-dollar"></i>
</div>
</div>
<div class="col-lg-6">
<div class="inp-field">
<select>
<option>Full Time</option>
<option>Half time</option>
</select>
</div>
</div>
<div class="col-lg-12">
<textarea name="description" placeholder="Description"></textarea>
</div>
<div class="col-lg-12">
<ul>
<li><button class="active" type="submit" value="post">Post</button></li>
<li><a href="#" title="">Cancel</a></li>
</ul>
</div>
</div>
</form>
</div>
<a href="#" title=""><i class="la la-times-circle-o"></i></a>
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