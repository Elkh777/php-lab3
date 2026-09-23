<?php

header("Content-Type: text/plain; charset=utf-8");

require __DIR__ . '/vendor/autoload.php';

use App\MagicClass;
use App\Point;
use App\Vector;

$object = new MagicClass();

echo "\nЗаписываем имя:\n";
$object->name = "Эльнара";

echo "\nЧитаем имя:\n";
echo $object->name . "\n";

echo "\nПроверяем наличие имени:\n";
var_dump(isset($object->name));

echo "\nУдаляем имя:\n";
unset($object->name);

echo "\nПроверяем после удаления:\n";
var_dump(isset($object->name));

echo "\nВызываем несуществующий метод объекта:\n";
$object->hello();

echo "\nВызываем несуществующий статический метод:\n";
MagicClass::hello();

echo "\nВыводим объект как строку:\n";
echo $object . "\n";

echo "\nВызываем объект как функцию:\n";
$object();

echo "\nЗаписываем имя перед копированием:\n";
$object->name = "Эльнара";

echo "\nСоздаём копию объекта:\n";
$copy = clone $object;

echo "\nМеняем имя только у копии:\n";
$copy->name = "Анна";

echo "\nИмя исходного объекта:\n";
echo $object->name . "\n";

echo "\nИмя копии:\n";
echo $copy->name . "\n";

echo "\nПросматриваем исходный объект:\n";
var_dump($object);

echo "\nУдаляем копию:\n";
unset($copy); 

echo "\nСохраняем объект в строку:\n";
$saved = serialize($object);

echo "Полученная строка:\n";
echo $saved . "\n";

echo "\nВосстанавливаем объект из строки:\n";
$restored = unserialize($saved);

echo "\nИмя восстановленного объекта:\n";
echo $restored->name . "\n";

echo "\nУдаляем восстановленный объект:\n";
unset($restored);

echo "\nЯвно вызываем старый метод сохранения:\n";
print_r($object->__sleep());

echo "\nЯвно вызываем старый метод восстановления:\n";
$object->__wakeup();

echo "\nПредставляем объект в виде PHP-кода:\n";
$exported = var_export($object, true);
echo $exported . "\n";

echo "\nВосстанавливаем объект из этого кода:\n";
$fromCode = eval("return " . $exported . ";");

echo "\nИмя восстановленного объекта:\n";
echo $fromCode->name . "\n";

echo "\nУдаляем восстановленный объект:\n";
unset($fromCode);

echo "\nУдаляем объект:\n";
unset($object);

echo "\nРабота с точкой и векторами:\n";

$t1 = new Point(2, 3);

$v1 = new Vector(3, 4);
$v2 = new Vector(0, 0);
$v3 = new Vector(-4, 3);

echo "\nДлины векторов:\n";
echo "V1: " . $v1->length() . "\n";
echo "V2: " . $v2->length() . "\n";
echo "V3: " . $v3->length() . "\n";

echo "\nV1 — нулевой вектор?\n";
var_dump($v1->isZero());

echo "\nV2 — нулевой вектор?\n";
var_dump($v2->isZero());

echo "\nV1 и V3 перпендикулярны?\n";
var_dump($v1->isPerpendicular($v3));

echo "\nТочка до переноса:\n";
echo "(" . $t1->x . ", " . $t1->y . ")\n";

$t1->move($v1->x, $v1->y);

echo "\nТочка после переноса на V1:\n";
echo "(" . $t1->x . ", " . $t1->y . ")\n";