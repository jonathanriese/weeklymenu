<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body>
    <div class="content">
        <menu>
            <div class="bodymovinanim"></div>
            <h3 class="header_logo">
                <a href="<?php echo site_url();?>">zm</a>
            </h3>
            <nav>
                <a href="<?php echo site_url('/commander');?>">Commander</a>
                <a href="<?php echo site_url('/mariages');?>">Mariages</a>
                <a href="<?php echo site_url('/le-cuisinier');?>">Le Cuisinier</a>
            </nav>
            <div class="header_right">
                <a class="bag" href="<?php echo site_url('/panier');?>"><i data-feather="shopping-bag"></i></a>
                <a href="<?php echo site_url('/my-account');?>"><i data-feather="user"></i></a>
            </div>
        </menu>