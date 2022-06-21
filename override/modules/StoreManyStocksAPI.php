<?php

if (!defined('_PS_VERSION_')) {
    exit();
}

class StoreManyStocksAPI extends Module
{
    public function __construct()
    {
    }

    public function install()
    {
        return parent::install() && $this->registerHook('addWebserviceResources');
    }

    public function uninstall()
    {
        return parent:uninstall();
    }

    public function hookAddWebserviceResources($params)
    {
        return [ 'send_stocks' => ['description' => 'Store a list of stocks', 'class' => 'StoreManyStocks' ] ];
        //return [ 'send_stocks' => ['description' => 'Store a list of stocks', 'specific_management' => true ] ];
        //return [ 'send_stocks' => ['description' => 'Store a list of stocks', 'specific_management' => true, 'class' => 'StoreManyStocks' ] ];
    }

    /* public function getContent()
    {
        return json_encode(['results' => array('test 2 OK !')]);
    } */
}
