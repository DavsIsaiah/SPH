<?php
require __DIR__ . '/vendor/autoload.php';
use Kreait\Firebase\Factory;

$factory = (new Factory)->withServiceAccount('safepetshaven-firebase-adminsdk-ofsgp-8e12c0b6aa.json')
    ->withDatabaseUri('https://safepetshaven-default-rtdb.asia-southeast1.firebasedatabase.app/');
$database = $factory->createDatabase();
$storage = (new Factory())
    ->withServiceAccount('safepetshaven-firebase-adminsdk-ofsgp-8e12c0b6aa.json')
    ->withDefaultStorageBucket('safepetshaven.appspot.com')
    ->createStorage();

$bucket = $storage->getBucket();
?>