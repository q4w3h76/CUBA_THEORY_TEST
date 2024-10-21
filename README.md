# CUBA_THEORY_TEST
# 1
```
SELECT * FROM abc WHERE name = 'xxx' AND cnt = yyy
SELECT * FROM abc WHERE cnt = xxx AND name LIKE 'yyy%'
SELECT * FROM abc ORDER BY cnt ASC
```
Для оптимизации этих запросов нужно сделать составной индекс по полям (cnt, name)
```
CREATE INDEX idx_name_cnt ON abc(cnt, name)
```


# 2
Читать файл частями
по 1 строке с помощью функии fgetcsv

# 3
В запросе не нужно использовать не обработаные переменные, так как если кто-то решит вписать вместо **$_GET['id']** какой-нибудь sql запрос по типу **DROP DATABASE;** то у него это получится.
Это атака называется sql инъекция, для защиты можно добавить экранирование с помощью mysqli_real_escape_string(), при работе с PDO есть метод prepare где можно определить переменные после чего их безопасно забиндить.


# 4
Первый запрос
```
SELECT customer_name, SUM(order_price), MONTH(date) AS mount FROM orders
  GROUP BY customer_name, order_mount;
```
Второй запрос
```
SELECT customer_name, SUM(order_price) AS orders_sum FROM orders
  GROUP BY customer_name
  HAVING orders_sum >= 10000 AND MIN(order_price) >= 500;
```


# 5
Разница в области видимости
```
function f(a,b) { return a+b }
```
такая функция будет видна до ее объявления в коде
```
var f = function(a,b) { return a+b }
```
а такая функция будет видна только после объявления


# 6
LEFT JOIN и INNER JOIN
Различия в том что INNER JOIN выдает только пересекающиеся строки между двумя таблицами а LEFT JOIN выдает строки левой таблицы и переекающиеся строки между левой и правой таблицей и поэтому больше строк выдаст LEFT JOIN


# 7
если правильно понял задачу то нужно написать скрипт который будет запускатся с помощью стророней программы каждые 15 секнуд

Скрипт:
```
<?php

echo 'Hello';
```
и чтобы этот скрипт каждые 15 секунд выводил 'Hello' использовал бы systemd сервсис с таймером
Сервис echohello.service в /etc/systemd/system/
```
[Unit]
Description=start php script

[Service]
Type=oneshot
ExecStart=/usr/bin/php /path/to/index.php
```
Таймер echohello.timer там же где сервис
```
[Unit]
Description=timer run service echohello

[Timer]
OnActiveSec=15s
Unit=echohello.service

[Install]
WantedBy=timers.target
```
после чего нужно перезагрузить systemd и активировать таймер с помощью systemctl

# 8

Все положил в файл distribute_discount.php
