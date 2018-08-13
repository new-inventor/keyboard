<?php
/**
 * Created by Ionov George (new-inventor).
 * Date: 12.08.2018
 */

namespace KeyboardAnalytics\Keyboard;


class Key
{
    /**
     * @var string left | right
     */
    private $hand;
    /**
     * @var string 'little' | 'ring' | 'middle' | 'index' | 'thumb'
     */
    private $finger;
    /**
     * @var string
     */
    private $sign;
    /** @var int */
    private $line;

    public function __construct(string $hand, string $finger, int $line, string $sign = null)
    {
        $this->line = $line;
        $this->hand = $hand;
        $this->finger = $finger;
        $this->sign = $sign;
    }

    /**
     * @return int
     */
    public function getLine(): int
    {
        return $this->line;
    }

    /**
     * @return string
     */
    public function getHand(): string
    {
        return $this->hand;
    }

    /**
     * @return string
     */
    public function getFinger(): string
    {
        return $this->finger;
    }

    /**
     * @return string
     */
    public function getSign(): string
    {
        return $this->sign;
    }

    /**
     * @param string $sign
     */
    public function setSign(string $sign)
    {
        $this->sign = $sign;
    }
}