<?php

class WebserviceSpecificManagementKbcustomer implements WebserviceSpecificManagementInterface
{
    /** @var WebserviceOutputBuilder */

    protected $objOutput;

    protected $output;

    /** @var WebserviceRequest */

    protected $wsObject;

    public function setUrlSegment($segments)
    {
        $this->urlSegment = $segments;

        return $this;
    }

    public function getUrlSegment()
    {
        return $this->urlSegment;
    }

    public function getWsObject()
    {
        return $this->wsObject;
    }

    public function getObjectOutput()
    {
        return $this->objOutput;
    }

    /**
    * This must be return a string with specific values as WebserviceRequest expects.
    *
    * @return string
    */
    public function getContent()
    {
        //return $this->objOutput
        //    ->getObjectRender()
        //    ->overrideContent($this->output);
        return json_encode(['results' => array('test 2 OK !')]);
    }

    public function setWsObject(WebserviceRequestCore $obj)
    {
        $this->wsObject = $obj;
        return $this;
    }

    /**
    * @param WebserviceOutputBuilderCore $obj
    * @return WebserviceSpecificManagementInterface
    */
    public function setObjectOutput(WebserviceOutputBuilderCore $obj)
    {
        $this->objOutput = $obj;
        return $this;
    }

    public function manage()
    {
        $objects_products = [];
        $objects_products['empty'] = new Customer();
        $customer_list = Customer::getCustomers();
        foreach ($customer_list as $list) {
            $objects_products[] = new Customer($list['id_customer']);
        }

        $this->_resourceConfiguration = $objects_products[
            'empty'
        ]->getWebserviceParameters();

        $this->output .= $this->objOutput->getContent(
            $objects_products,
            null,
            $this->wsObject->fieldsToDisplay,
            $this->wsObject->depth,
            WebserviceOutputBuilder::VIEW_LIST,
            false
        );
    }
}
