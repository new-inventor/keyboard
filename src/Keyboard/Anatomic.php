<?php
namespace KeyboardAnalytics\Keyboard;
/**
 * Created by Ionov George (new-inventor).
 * Date: 11.08.2018
 *
 * 44 letters max
 *
 * heat map
 * 54333344333345
 * 4322213312224
 * 6544444444445
 *    55    55
 *
 */
class Anatomic implements KeyboardInterface
{
    /**
     * @var Key[]
     */
    private $map;

    public function __construct()
    {
        $this->map = [
            new Key(Hand::$right, Finger::$index, 2),
            new Key(Hand::$left, Finger::$index, 2),
            new Key(Hand::$right, Finger::$middle, 2),
            new Key(Hand::$left, Finger::$middle, 2),
            new Key(Hand::$right, Finger::$ring, 2),
            new Key(Hand::$left, Finger::$ring, 2),
            new Key(Hand::$right, Finger::$little, 2),
            new Key(Hand::$left, Finger::$little, 2),
            new Key(Hand::$right, Finger::$index, 2),
            new Key(Hand::$left, Finger::$index, 2),
            new Key(Hand::$right, Finger::$index, 3),
            new Key(Hand::$left, Finger::$index, 3),
            new Key(Hand::$right, Finger::$middle, 3),
            new Key(Hand::$left, Finger::$middle, 3),
            new Key(Hand::$right, Finger::$ring, 3),
            new Key(Hand::$left, Finger::$ring, 3),
            new Key(Hand::$right, Finger::$little, 3),
            new Key(Hand::$left, Finger::$little, 3),
            new Key(Hand::$right, Finger::$little, 3),
            new Key(Hand::$left, Finger::$little, 3),
            new Key(Hand::$right, Finger::$little, 2),
            new Key(Hand::$right, Finger::$index, 3),
            new Key(Hand::$left, Finger::$index, 3),
            new Key(Hand::$right, Finger::$index, 1),
            new Key(Hand::$left, Finger::$index, 1),
            new Key(Hand::$right, Finger::$index, 1),
            new Key(Hand::$left, Finger::$index, 1),
            new Key(Hand::$right, Finger::$middle, 1),
            new Key(Hand::$left, Finger::$middle, 1),
            new Key(Hand::$right, Finger::$ring, 1),
            new Key(Hand::$left, Finger::$ring, 1),
            new Key(Hand::$right, Finger::$little, 1),
            new Key(Hand::$left, Finger::$little, 1),
            new Key(Hand::$right, Finger::$little, 3),
            new Key(Hand::$left, Finger::$little, 3),
            new Key(Hand::$right, Finger::$little, 1),
            new Key(Hand::$left, Finger::$little, 1),
            new Key(Hand::$right, Finger::$little, 3),
            new Key(Hand::$left, Finger::$little, 3),
            new Key(Hand::$right, Finger::$middle, 0),
            new Key(Hand::$left, Finger::$middle, 0),
            new Key(Hand::$right, Finger::$ring, 0),
            new Key(Hand::$left, Finger::$ring, 0),
            new Key(Hand::$right, Finger::$little, 1),
            new Key(Hand::$left, Finger::$little, 1),
        ];
    }

    public function loadSigns($signs)
    {
        foreach ($signs as $index => $sign) {
            $this->map[$index]->setSign($sign);
        }
    }

    public function getKeyBySign(string $sign): Key
    {
        foreach ($this->map as $key) {
            if ($key->getSign() === $sign) {
                return $key;
            }
        }
        return null;
    }
}