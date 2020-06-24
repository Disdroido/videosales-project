<?php

$loader = new \Twig\Loader\FilesystemLoader('pages/templates');
$twig = new \Twig\Environment($loader, [
]);

echo $twig->render('logout.html');
