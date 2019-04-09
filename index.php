<?php
namespace lib;
include 'config/config.php';

spl_autoload_register( function ($class) {
    $path = dirname(__FILE__) ."/". strtolower( str_replace( "\\", "/", $class));
    spl_autoload($path); 
});
echo '<pre>';
$i = new Instrument();
$gitar = $i->addInstrument('Гитара','Струнные');
echo $gitar;
echo '<pre>';
$i2 = new Instrument();
$barabany = $i2->addInstrument('Бaрабаны','Ударные');
echo $barabany;
echo '<pre>';
$m = new Musician();
$RobZombie = $m->addMusician('Rob','Gitarist',$i);
echo $RobZombie;
echo '<pre>';

$m2 = new Musician();
$RobZombie2 = $m2->addMusician('Rob2','Udarnik',$i2);
echo $RobZombie2;
echo '<pre>';



$b = new Band();
$zombi = $b->addBand('ZOMBI','ROCK');
echo $zombi;
echo '<pre>';

$b2 = new Band();
$zombi = $b2->addBand('KISS','ROCK');
echo $zombi;
echo '<pre>';

$m3 = new Musician();
$RobZombie3 = $m3->addMusician('Rob3','Gitarist',$i);
echo $RobZombie3;
echo '<pre>';
echo $b->addMusician($m);
echo '<pre>';

echo $b->addMusician($m2);
echo '<pre>';

echo $b2->addMusician($m3);
echo '<pre>';

echo $m->assingToBand($b);
echo '<pre>';

echo $m3->assingToBand($b);
echo '<pre>';

echo $m3->assingToBand($b2);
echo '<pre>';

echo $b->showBand();
echo '<pre>';

echo $b2->showBand();

include 'template/index.php';


