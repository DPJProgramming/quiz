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

$f3->route('GET|POST /survey', function($f3){
    $choices = getChoices();
    $f3->set('choices', $choices);

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $f3->set('SESSION.name', $_POST['name']);
        $heroes = $_POST['choices'];
        $f3->set('SESSION.heroes', $heroes);

        $f3->reroute('summary');
    }

    $view = new Template();
    echo $view->render('views/survey.html');
});

$f3->route('GET /summary', function($f3){

    $view = new Template();
    echo $view->render('views/summary.html');
});


$f3->run();
?>