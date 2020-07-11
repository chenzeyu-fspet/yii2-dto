<?php
require_once __DIR__.'/../../autoload.php';
require_once __DIR__.'/vendor/autoload.php';

define('YII_DEBUG', false);

use yii\dto\tests\CardDto;
use yii\dto\tests\CardDtoList;

$card     = [
    'item_id'     => '10001',
    'item_count'  => 100,
    'name'        => '福卡',
    'icon_url'    => 'www.baidu.com',
    'description' => 'hello world',
    'expire_time' => time(),
    'test'        => 'xxxxx',
];
$card_dto = new CardDto();
$card_dto->strictLoad($card);
var_dump(json_encode($card_dto));

$items         = [$card_dto, $card, (object)$card];
$card_dto_list = new CardDtoList($items);
var_dump(json_encode($card_dto_list));
