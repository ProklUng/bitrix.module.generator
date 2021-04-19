# Bitrix module generator

## Установка

1) `composer require proklung/bitrix.module.generator`

2) `cp vendor/proklung/bitrix-module-generator/bin/module bin/module` - копируем исполняемый файл в папку bin.

## Использование

`php bin\module make:module test.module prokl --entity=false --admin=false --serviceprovider=false`

Где test.module - название модуля, а prokl - вендор модуля.

--entity - генерировать класс сущности для таблицы модуля. По умолчанию - да.
--admin  - генерировать админку с опциями для модуля. По умолчанию - да.
--serviceprovider - генерировать микро-сервис-провайдер модуля. По умолчанию - нет.

## Нюансы

В названиях модуля нельзя использовать слово new. Возникают проблемы с именованием класса сущности.

Автозагрузка классов без имплицитного указания в include.php: название файла в lowercase.
Namespace: <вендор модуля>\<Название модуля до точки>\<Название модуля после точки>; 

Название файла с классом только lowercase!
