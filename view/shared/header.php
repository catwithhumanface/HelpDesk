<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
    <title>HelpDesk Etudiant</title>
    <link href="content/css/style5.css" rel="stylesheet" type="text/css" media="all" />
    <link href="content/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <link href="content/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Blog created with PHP/OOP using the MVC architecture and bootstrap." />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <script src="content/js/jquery.min.js"></script>
    <?php if($_SERVER['REQUEST_URI'] == ROOT_HOME): ?>
        <script src="content/js/contact_me.js"></script>
    <?php endif ?>
    <script>
        $(document).ready(function () {
            size_li = $("#myList li").size();
            x=3;
            $('#myList li:lt('+x+')').show();
            $('#loadMore').click(function () {
                x= (x+1 <= size_li) ? x+1 : size_li;
                $('#myList li:lt('+x+')').show();
            });
            $('#showLess').click(function () {
                x=(x-1<0) ? 1 : x-1;
                $('#myList li').not(':lt('+x+')').hide();
            });
        });
    </script>

</head>
<body>
<!-- bibliothèque pour les barres du menu  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" type="text/javascript"></script>
<!-- header -->
<div class="banner">
    <div class="container">
        <div class="header">
            <div class="logo">
                <a href="<?=ROOT_URL?>"><img src="content/images/logoUt1.png" style="width:20%;height:20%;float:left;" class="img-responsive" alt="" /></a>
                <h1 style="margin-left:150px;">
                    <br>HELP DESK
                </h1>

            </div>
            <div class="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i> </div>
            <div class="clearfix"> </div>

        </div>




        <header>
            <nav>
                <ul>
                    <li><a href="<?=ROOT_URL?>">Accueil</a></li>
                    <li><a href="<?=ROOT_URL?>?p=blogController&amp;a=blogPosts" data-hover="BLOG">Forum</a></li>
                    <?php if(empty($_SESSION['active'])): ?>
                        <li><a href="<?=ROOT_URL?>?p=blogController&amp;a=login" data-hover="Connexion">Connexion</a></li>
                    <?php elseif(!empty($_SESSION['active'])) : ?>
                        <li><a href="<?=ROOT_URL?>?p=blogController&amp;a=add" data-hover="ADD A NEW POST">Ajouter un nouveau ticket</a></li>
                        <li><a href="<?=ROOT_URL?>?p=blogController&amp;a=mon_compte" data-hover="">Mon Compte </a></li>
                        <li><a href="<?=ROOT_URL?>?p=blogController&amp;a=logout" data-hover="LOGOUT">Se déconnecter</a></li>
                    <?php endif ?>
                    <div class="clearfix"></div>
                    <?php if(empty($_SESSION['active'])): ?>
                        <li><a href="<?=ROOT_URL?>?p=blogController&amp;a=subscription" data-hover="Inscription">Inscription</a></li>
                    <?php endif ?>

                </ul>
            </nav>

        </header>

        <!-- script-for-nav -->
        <script type="text/javascript">
            $(document).ready(function(){
                $('.menu-toggle').click(function(){
                    $('nav').toggleClass('active')
                })
            })
        </script>
        <!-- script-for-nav -->
    </div>
</div>
<!-- header -->