<?php

namespace App;

class MagicClass
{
    private $data = [];

    public function __construct()
    {
        echo "__construct — объект создан\n";
    }

    public function __destruct()
    {
        echo "__destruct — объект уничтожен\n";
    }

    public function __set($name, $value)
    {
        echo "__set — запись свойства $name\n";
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        echo "__get — чтение свойства $name\n";
        return $this->data[$name] ?? null;
    }

    public function __isset($name)
    {
        echo "__isset — проверка свойства $name\n";
        return isset($this->data[$name]);
    }

    public function __unset($name)
    {
        echo "__unset — удаление свойства $name\n";
        unset($this->data[$name]);
    }
      public function __call($name, $arguments)
{
    echo "__call — вызван недоступный метод $name\n";
}

public static function __callStatic($name, $arguments)
{
    echo "__callStatic — вызван недоступный статический метод $name\n";
}

public function __toString()
{
    echo "__toString — преобразование объекта в строку\n";
    return "Объект класса MagicClass";
}

public function __invoke()
{
    echo "__invoke — объект вызван как функция\n";
}
public function __clone()
{
    echo "__clone — объект скопирован\n";
}

public function __debugInfo()
{
    echo "__debugInfo — просмотр содержимого объекта\n";
    return $this->data;
}

public function __serialize()
{
    echo "__serialize — сохраняем данные объекта\n";
    return $this->data;
}

public function __unserialize($data)
{
    echo "__unserialize — восстанавливаем данные объекта\n";
    $this->data = $data;
}

public function __sleep()
{
    echo "__sleep — выбираем свойства для сохранения\n";
    return ["data"];
}

public function __wakeup()
{
    echo "__wakeup — действия после восстановления\n";
}

public static function __set_state($properties)
{
    echo "__set_state — восстановление из PHP-кода\n";

    $object = new self();
    $object->data = $properties["data"];

    return $object;
}
}