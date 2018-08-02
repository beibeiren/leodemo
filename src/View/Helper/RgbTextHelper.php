<?php
namespace App\View\Helper;

use Cake\View\Helper;



class RgbTextHelper extends Helper {

    public $helpers = ['Html'];

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


    public function redLink($str,$url){
        $style = "background-color:red; color:white";
        return $this->Html->link($str,$url,['style'=>$style]);
    }
    public function greenLink($str,$url){
        $style = "background-color:green; color:green";
        return $this->Html->link($str,$url,['style'=>$style]);
    }
    public function blueLink($str,$url){
        $style = "background-color:blue; color:green";
        return $this->Html->link($str,$url,['style'=>$style]);
    }


}