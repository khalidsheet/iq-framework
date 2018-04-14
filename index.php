<?php 

include_once 'init.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$template = new Twig_Environment(new Twig_Loader_Filesystem('views'));

$lexer = new Twig_Lexer($template, array(
    'tag_comment'   => array('{[', ']}'),
    'tag_block'     => array('{@', '@}'),
    'tag_variable'  => array('{{', '}}'),
    'interpolation' => array('@{', '}'),
));

$template->setLexer($lexer);



new Database();
Router::start();