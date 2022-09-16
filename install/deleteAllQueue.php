<?php

//streamer config
require_once '../videos/configuration.php';

if (!isCommandLineInterface()) {
    return die('Command Line only');
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$rows = Encoder::getAllQueue();

echo "Start".PHP_EOL;
foreach ($rows as $value) {
    echo "Deleting [{$value['id']}]{$value['title']}, {$value['videoDownloadedLink']}".PHP_EOL; 
    $e = new Encoder($value['id']);
    $e->delete();
}

echo "end".PHP_EOL;
echo "\n";
die();



