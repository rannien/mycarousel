<?php
if (!defined('_PS_VERSION_'))
    exit;

class myCarousel extends Module
{

    public function __construct()
    {
        $this->name = 'mycarousel';
        $this->tab = 'front_office_features';
        $this->version = '1.0';
        $this->author = 'Csaba Verebelyi';
        $this->need_instance = 0;

        parent::__construct();

        $this->displayName = $this->l('My Carousel');
        $this->description = $this->l('Adds a new block to the homepage tabs.');
        $this->confirmUninstall = $this->l('Are you sure you want to delete this module?');
    }

    public function install()
    {
        if (!parent::install() OR
            !$this->registerHook('header') OR
            !$this->registerHook('displayHomeTabContent'))
            return false;
        return true;
    }

    public function hookDisplayHeader($params)
    {

    }

    public function hookDisplayHomeTabContent($params)
    {
      $this->context->controller->addCSS($this->_path.'libs/owl/owl.carousel.css', 'all');
      $this->context->controller->addCSS($this->_path.'libs/owl/owl.theme.css', 'all');
      $this->context->controller->addCSS($this->_path.'views/css/custom.css', 'all');
      $this->context->controller->addJS($this->_path.'libs/owl/owl.carousel.min.js', 'all');
      $this->context->controller->addJS($this->_path.'views/js/initMyCarousel.js', 'all');

      return $this->display(__FILE__, 'mycarousel.tpl');
    }
}
