<?php

use yii\base\BaseObject;
use yii\queue\JobInterface;

class MyFirstJOP extends BaseObject implements JobInterface
{
    public $text;
    public $file;

    public function execute($queue)
    {
        file_put_contents($this->file, $this->text);
    }
}