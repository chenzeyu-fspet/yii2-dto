<?php

namespace yii\dto\tests;

use yii\dto\BaseDto;

/**
 * 卡包信息
 * Class CardDto
 *
 * @package app\dtos\mysql
 */
class CardDto extends BaseDto
{
    public $item_id;// 卡包id
    public $item_count;// 卡包数量
    public $name;// 卡包名称
    public $icon_url;// 卡包图标
    public $description;// 详细信息
    public $expire_time;// 过期时间

    /**
     * @date: 2020-07-11 22:07
     *
     * @param $data
     *
     * @return mixed|void
     */
    public function customLoad($data)
    {
        // TODO: Implement customLoad() method.
    }

    /**
     * @date: 2020-07-11 22:07
     *
     * @param string $json
     *
     * @return mixed|void
     */
    public function customLoadFromJson(string $json)
    {
        // TODO: Implement customLoadFromJson() method.
    }

    /**
     * @param mixed $item_id
     */
    public function setItemId(int $item_id)
    {
        $this->item_id = $item_id;
    }

    /**
     * @param mixed $item_count
     */
    public function setItemCount(int $item_count)
    {
        $this->item_count = $item_count;
    }

    /**
     * @param mixed $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $icon_url
     */
    public function setIconUrl(string $icon_url)
    {
        $this->icon_url = $icon_url;
    }

    /**
     * @param mixed $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * @param mixed $expire_time
     */
    public function setExpireTime(int $expire_time)
    {
        $this->expire_time = $expire_time;
    }
}