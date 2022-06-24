<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

class StoreManyStocks extends Module
{
    public function __construct()
    {
        $this->name = 'storemanystocksapi';
        $this->tab = 'many_stocks';
        $this->version = '1.0.0';
        $this->author = 'Enzo Le Port';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => '1.6',
            'max' => '1.7.99',
        ];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('My StoreManyStocksAPI');
        $this->description = $this->l('My specific module to upadte many stocks in one call.');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

        if (!Configuration::get('storemanystocksapi')) {
            $this->warning = $this->l('No name provided');
        }
    }

    public function install()
    {
        return parent::install() && $this->registerHook('addWebserviceResources');
    }

    public function uninstall()
    {
        return parent::uninstall() && Configuration::deleteByName('storemanystocksapi');
    }

    public function hookAddWebserviceResources($params)
    {
        return [ 'send_stocks' => ['description' => 'Store a list of stocks', 'class' => 'StoreManyStocks' ], 'forbidden_method' => array('PUT', 'POST', 'DELETE') ];
        //return [ 'send_stocks' => ['description' => 'Store a list of stocks', 'specific_management' => true ] ];
        //return [ 'send_stocks' => ['description' => 'Store a list of stocks', 'specific_management' => true, 'class' => 'StoreManyStocks' ] ];
    }

    public function getContent()
    {
        return json_encode(['results' => array('test 2 OK !')]);
    }
}
