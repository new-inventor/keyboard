<?php
/**
 * Created by Ionov George (new-inventor).
 * Date: 12.08.2018
 */

namespace KeyboardAnalytics\Keyboard;


interface KeyboardInterface
{
    public function loadSigns($signs);

    public function getKeyBySign(string $sign): Key;
}