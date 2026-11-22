<?php

require __DIR__ . '/vendor/autoload.php';

use App\MagicClass;

echo 'PHP ', PHP_VERSION, PHP_EOL;

$demo = new MagicClass();              // __construct
$demo->title = 'PHP Lab 3';            // __set
echo $demo->title, PHP_EOL;            // __get
var_dump(isset($demo->title));         // __isset
unset($demo->title);                   // __unset

$demo->missingMethod();                // __call
MagicClass::missingStaticMethod();     // __callStatic

echo $demo, PHP_EOL;                    // __toString
$demo();                               // __invoke
$copy = clone $demo;                   // __clone
var_dump($demo);                       // __debugInfo

$demo->title = 'PHP Lab 3';
$serialized = serialize($demo);        // __sleep или __serialize
$restored = unserialize($serialized);  // __wakeup или __unserialize

// Показываем, какой вызов PHP формирует для восстановления объекта.
echo var_export($demo, true), PHP_EOL;

// Выполняем такой же вызов с данными объекта.
$exported = MagicClass::__set_state(['values' => ['title' => 'PHP Lab 3']]);

unset($exported, $restored, $copy, $demo); // __destruct для каждого объекта

echo PHP_EOL, '--- Геометрия ---', PHP_EOL;

$t1 = new \App\Point(2, 1);
$v1 = new \App\Vector(3, 4);
$v2 = new \App\Vector(0, 0);
$v3 = new \App\Vector(-$v1->y, $v1->x);

echo 'Длина V1 = ', $v1->length(), PHP_EOL;
echo 'Длина V2 = ', $v2->length(), PHP_EOL;
echo 'Длина V3 = ', $v3->length(), PHP_EOL;
echo 'V2 нулевой: ', $v2->isZero() ? 'да' : 'нет', PHP_EOL;
echo 'V1 и V3 перпендикулярны: ',
    $v1->isPerpendicularTo($v3) ? 'да' : 'нет', PHP_EOL;

echo "T1 до переноса: ({$t1->x}, {$t1->y})", PHP_EOL;
$t1->move($v1->x, $v1->y);
echo "T1 после переноса: ({$t1->x}, {$t1->y})", PHP_EOL;