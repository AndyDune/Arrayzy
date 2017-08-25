<?php
/**
 * ----------------------------------------------
 * | Автор: Андрей Рыжов (Dune) <info@rznw.ru>   |
 * | Сайт: www.rznw.ru                           |
 * | Телефон: +7 (4912) 51-10-23                 |
 * | Дата: 25.08.2017                            |
 * -----------------------------------------------
 *
 */

namespace Arrayzy\Extend;
use Arrayzy\ArrayImitator;

class Nested
{
    /**
     * @var ArrayImitator
     */
    protected $arrayContainer;

    /**
     * Nested constructor.
     *
     * @param ArrayImitator $arrayObject
     */
    public function __construct($arrayObject)
    {
        $this->arrayContainer = $arrayObject;
    }

    /**
     * Check value for this keys exist.
     *
     * @param $keyString
     * @param string $separator
     * @return bool
     */
    public function has($keyString, $separator = '.')
    {
        $array = $this->arrayContainer->toArray();
        $keys = explode($separator, $keyString);
        foreach ($keys as $key) {
            if(!is_array($array) or !array_key_exists($key, $array)) {
                return false;
            }
            $array = $array[$key];
        }
        return true;
    }

    /**
     * Return value from nested array or default value.
     *
     * @param $keyString
     * @param string $separator
     * @return array|mixed
     */
    public function get($keyString, $separator = '.')
    {
        $array = $this->arrayContainer->toArray();
        $keys = explode($separator, $keyString);
        foreach ($keys as $key) {
            if(!is_array($array) or !array_key_exists($key, $array)) {
                return $this->arrayContainer->getDefaultValue();
            }
            $array = $array[$key];
        }
        return $array;
    }

}