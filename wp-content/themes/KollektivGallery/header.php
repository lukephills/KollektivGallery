<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><? wp_title( '|', true, 'right' ); ?></title>

        <? wp_head(); ?>
    </head>

    <? $background_brightness = ( get_field('logo_colour') === 'white' ) ? 'dark-background' : 'light-background'; ?>

    <body <? body_class($background_brightness); ?>>
        <div class="container">

            <? include 'partials/menu.php';?>

            <? include 'partials/logo.php';?>

            <div class="content-wrap">