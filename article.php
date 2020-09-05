<?php

	include_once "Models/Global.php"; // Model
	include_once "Controllers/Global.php"; //Controller

?>

<!DOCTYPE html>
<html>
    <head>
    	<?php include_once "includes/head.php"; ?>
    </head>
<body>
    <?php 
	    include_once "includes/header.php"; 
    ?>

    <!-- SideBar -->
    <div class="sidebar-navigation hidde-sm hidden-xs">
        <div class="logo">
            <a href="/"><?php echo $global->getTitle(); ?></a>
        </div>
        
        <nav>
            <ul>
                <li><a href="<?php echo $global->getSocial('facebook'); ?>"><i class="fa fa-facebook"></i> FaceBook</a></li>
                <li><a href="<?php echo $global->getSocial('twitter'); ?>"><i class="fa fa-twitter"></i> Twitter</a></li>
                <li><a href="<?php echo $global->getSocial('linkedin'); ?>"><i class="fa fa-linkedin"></i> LinkendIn</a></li>
                <li><a href="<?php echo $global->getSocial('github'); ?>"><i class="fa fa-github"></i> Github</a></li>
                <li><a href="<?php echo $global->getSocial('behance'); ?>"><i class="fa fa-behance"></i> Behance</a></li>
            </ul>
        </nav>
    </div>


    <div class="page-content" style="padding: 15px;">

        <?php include_once "Controllers/C_Article.php"; ?>

        <section>
            <h1><?php echo $article['title']; ?></h1>
            <h4 style="color: #747766;"><?php echo $article['place']; ?></h4>
        </section>

        <section style="margin-left: auto; margin-right: auto; text-align: center;">
            <img src="assets/img/<?php echo $article['image']; ?>">
            <div>
                <span style="font-size: 18px; font-weight: 40px;">
                    <?php echo $article['text']; ?>
                </span>
            </div>
        </section>

    </div>
</body>
</html>