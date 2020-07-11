<?php

namespace yii\dto;

use yii\dto\exception\ClassNotFoundException;
use yii\helpers\ArrayHelper;
use RuntimeException;
use JsonSerializable;

/**
 * 基础Dto列表
 * Class BaseDtoList
 *
 * @package yii\dto
 */
abstract class BaseDtoList implements JsonSerializable
{
    /**
     * @var array
     */
    protected $items = [];

    /**
     * @var string 集合元素DTO类配置
     */
    protected $dto = '';

    /**
     * Dto Object List constructor
     *
     * @param array $items
     */
    public function __construct($items = [])
    {
        if ('' == $this->getDto()) {
            throw new RuntimeException('Dto class must to define.');
        }

        if ( ! class_exists($this->getDto())) {
            throw new ClassNotFoundException("class {$this->getDto()} not found.");
        }

        if ( ! empty($items)) {
            foreach ($items as $key => $item) {
                if ($item instanceof BaseDto) {
                    $this->items[$key] = $item;
                } elseif (is_array($item)) {
                    $refls = new \ReflectionClass($this->getDto());
                    $dto   = $refls->newInstance();
                    $dto->strictLoad($item);
                    $this->items[$key] = $dto;
                } else {
                    $this->items[$key] = $item;
                }
            }
        }
    }

    /**
     * @date: 2020-07-11 21:46
     * @return mixed
     */
    public function toArray()
    {
        foreach ($this->items as &$item) {
            $class = $this->getDto();
            if ($item instanceof $class) {
                $item = $item->toArray();
            } else {
                $item = ArrayHelper::toArray($item);
            }
        }

        return $this->items;
    }

    /**
     * @date: 2020-07-11 22:14
     * @return mixed|void
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * @return string
     */
    public function getDto(): string
    {
        return $this->dto;
    }

    /**
     * @param string $dto
     */
    public function setDto(string $dto): void
    {
        $this->dto = $dto;
    }
}
