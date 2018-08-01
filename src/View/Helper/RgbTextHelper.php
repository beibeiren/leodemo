<?php
namespace App\View\Helper;

use Cake\View\Helper;

class RgbTextHelper extends Helper {

    public function initialize(array $config) {
        parent::initialize($config);
    }

    public function redString($str) {
         return "<span style='background-color:red;
           color:#FFFFFF'>
           {$str}</span>";
    }

    public function greenString($str) {
        return "<span style=\"background-color:green;
           color:#FFFFFF\">
           {$str}</span>";
    }

    public function blueString($str) {
        return "<span style=\"background-color:blue;
           color:#FFFFFF\">
           {$str}</span>";
    }

}