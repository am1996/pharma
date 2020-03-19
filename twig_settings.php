<?php
// Specify our Twig templates location

$frombase = new \Twig\TwigFilter('frombase', function ($string) {
    $base = "/pharma/";
    return $base.$string;
});
$loggedin = new \Twig\TwigFunction("loggedin",function(){
    if(isset($_SESSION["email"])) return true;
    else return false;
});
$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/templates');

// Instantiate our Twig
$twig = new \Twig\Environment($loader);
$twig->addFilter($frombase);
$twig->addFunction($loggedin);
?>