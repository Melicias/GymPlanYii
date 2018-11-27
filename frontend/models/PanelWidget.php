<?php
/**
 * Created by PhpStorm.
 * User: Utilizador
 * Date: 27/11/2018
 * Time: 19:14
 */

namespace frontend\models;


use yii\bootstrap\Html;

class PanelWidget extends \yii\bootstrap\Widget {

    /** properties * */
    public $containerOptions;
    public $title;
    public $titleOptions;
    public $useHeading = true;
    public $headingOptions;
    public $body;
    public $bodyOptions;
    public $footer;
    public $footerOptions;
    /** methods * */
    public function init() {
        parent::init();
        if (empty($this->containerOptions)) {
            Html::addCssClass($this->containerOptions, 'panel-default');
        }
        Html::addCssClass($this->containerOptions, 'panel');
        Html::addCssClass($this->headingOptions, 'panel-heading');
        Html::addCssClass($this->titleOptions, 'panel-title');
        Html::addCssClass($this->bodyOptions, 'panel-body');
        Html::addCssClass($this->footerOptions, 'panel-footer');
    }
    public function run() {
        $out = Html::beginTag('div', $this->containerOptions);
        if (isset($this->title)) {
            if ($this->useHeading) {
                $out .= Html::beginTag('div', $this->headingOptions);
            }
            $out .= Html::beginTag('div', $this->titleOptions);
            $out .= $this->title;
            $out .= Html::endTag('div');
            if ($this->useHeading) {
                $out .= Html::endTag('div');
            }
        }
        if (gettype($this->body) === 'string') {
            $this->body = [$this->body];
        }
        if (gettype($this->body) === 'array') {
            foreach ($this->body as $body) {
                $out .= Html::beginTag('div', $this->bodyOptions);
                $out .= $body;
                $out .= Html::endTag('div');
            }
        }
        if (isset($this->footer)) {
            $out .= Html::beginTag('div', $this->footerOptions);
            $out .= $this->footer;
            $out .= Html::endTag('div');
        }
        $out .= Html::endTag('div');
        return $out;
    }
}