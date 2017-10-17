<?php

namespace rafisa\quicknote;

include '../../lib/AutoLoader.php';

use rafisa\lib\AutoLoader;
use rafisa\lib\view\View;
use rafisa\lib\routing\RoutesConfig;
use rafisa\lib\routing\RouteSimple;

AutoLoader::register();

session_start();

session_regenerate_id(true);

RoutesConfig::set('basePath', '');

RouteSimple::init();

RouteSimple::add('', function (){
    $content = $content = $content = 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam';
    $index = new View(dirname(__FILE__).'/../views/', 'page');
    $index->setVar('charset', 'UTF-8');
    $index->setVar('pageTitle', 'QuickNote');
    $index->setVar('title', 'Welcome to QuickNote');
    $index->setVar('content', $content);
    $index->setVar('footer', 'Made by Daniel Peters');
    $index->load();
    echo $index->getHtml();
});

RouteSimple::add('about', function (){
    $content = $content = $content = 'QuickNote is a simple to use, highly efficient notes manager.';
    $index = new View(dirname(__FILE__).'/../views/', 'page');
    $index->setVar('charset', 'UTF-8');
    $index->setVar('pageTitle', 'About');
    $index->setVar('title', 'About QuickNote');
    $index->setVar('content', $content);
    $index->setVar('footer', 'Made by Daniel Peters');
    $index->load();
    echo $index->getHtml();
});

RouteSimple::add404(function (string $url) {
    // Send 404 Header
    header("HTTP/1.0 404 Not Found");
    $content = 'Page ' . $url . ' not found';
    $error404 = new View(dirname(__FILE__).'/../views/', 'page');
    $error404->setVar('charset', 'UTF-8');
    $error404->setVar('pageTitle', '404');
    $error404->setVar('title', 'ERROR 404');
    $error404->setVar('content', $content);
    $error404->setVar('footer', 'Made by Daniel Peters');
    $error404->load();
    echo $error404->getHtml();
});

RouteSimple::run();

session_write_close();