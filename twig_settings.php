<?php
// Specify our Twig templates location
$frombase = new \Twig\TwigFilter('frombase', function ($string) {
    $base = "/pharma/";
    return $base.$string;
});
$getInitials = new \Twig\TwigFunction("getInitials",function($str){
    return substr($str,1,1);
});
$loggedin = new \Twig\TwigFunction("loggedin",function(){
    if(isset($_SESSION["token"])) return true;
    else return false;
});
$money = new \Twig\TwigFunction("money",function($str){return "$str $";});
$toJson = new \Twig\TwigFunction("toJson",function($array){
    return json_encode($array,JSON_FORCE_OBJECT);
});
$fromJsonToArray = new \Twig\TwigFunction("fromJsonToArray",function($str){
    return json_decode($str,true);
});
$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/templates');
// Instantiate our Twig
$twig = new \Twig\Environment($loader);
$twig->addFilter($frombase);
$twig->addFunction($loggedin);
$twig->addFunction($getInitials);
$twig->addFunction($money);
$twig->addFunction($toJson);
$twig->addFunction($fromJsonToArray);
?>