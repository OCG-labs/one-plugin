<?php
/**
 * Module Class
 * @package Wordpress
 * @subpackage one-plugin
 * @since 1.0
 * @author Bryan Haskin
 * @version 1.4
 */
namespace oneTheme;

require_once('masterControl.class.php');

abstract class Module {

    public $autoRegister = True;

    public function __construct($data = array()) {
        if(count($data) > 0) {
          foreach($data as $name => $value) {
            $this->$name = $value;
          }
        }
        if ($this->autoRegister) {
            $this->registerModule();
        }

        $this->init();
    }
    public function init() {

    }

    public function getDirectory() {
      $reflection = new \ReflectionClass($this);
      $directory = dirname($reflection->getFileName()) . '/';

      return $directory;
    }

    public function getUrl() {
        $masterControl = MasterControl::getInstance();
        return plugins_url($plugin=ONE_PLUGIN_DIR) . '/lib/modules/' . strtolower(parse_classname(get_class($this))['classname']) . '/';
    }

    public function registerModule() {
        $masterControl = MasterControl::getInstance();
        $masterControl->register($this);
    }

    public function delete() {
        $masterControl = MasterControl::getInstance();
        $objName = parse_classname(get_class($this))['classname'];
        unset($masterControl->$objName );
    }
}
