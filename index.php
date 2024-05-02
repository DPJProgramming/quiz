<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once ('vendor/autoload.php');
require_once('models/data.php');

$f3 = Base::instance();

$f3->route('GET /', function(){
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET /survey', function($f3){
    $choices = getChoices();
    $f3->set('choices', $choices);

    $view = new Template();
    echo $view->render('views/survey.html');
});


$f3->run();
?>