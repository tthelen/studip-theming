<?php
require 'bootstrap.php';

/**
 * Theming.class.php
 *
 * ...
 *
 * @author  tgloeggl@uos.de, tobias.thelen@uni-osnabrueck.de
 * @version 0.2
 */

require_once 'FactoryProxy.php';

class Theming extends StudIPPlugin implements SystemPlugin {

    public function __construct() {
        parent::__construct();
        
        #var_dump($GLOBALS['template_factory']);
        $GLOBALS['template_factory'] = new Theming\FactoryProxy(
            $GLOBALS['template_factory'], 
            realpath($this->getPluginPath() . '/templates')
        );

        PageLayout::addScript($this->getPluginURL() . '/assets/application.js');
        PageLayout::addStylesheet($this->getPluginURL() . '/assets/style.css');

        $GLOBALS['THEMING_IMAGES'] = $this->getPluginURL() .'/assets/images';
    }
}
