<?php
/**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE && DISCLAIMER
 *
 * see : classes/webservice/WebserviceRequest.php
 *
 * @author    Enzo Le Port
 * @author    Alexis Zucher
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 */
class WebserviceSpecificManagementStoreManyStocks implements WebserviceSpecificManagementInterface
{

    /** @var WebserviceOutputBuilder */
    protected $objOutput;
    protected $output;
     
    /** @var WebserviceRequest */
    protected $wsObject;
 
    /**------------------------------------------------
     * GETTERS & SETTERS
     **------------------------------------------------
     **/
 
    /**
     * @param WebserviceOutputBuilderCore $obj
     * @return WebserviceSpecificManagementInterface
     */
    public function setObjectOutput(WebserviceOutputBuilderCore $obj)
    {
        $this->objOutput = $obj;
        return $this;
    }
 
    public function getObjectOutput()
    {
        return $this->objOutput;
    }
 
    public function setWsObject(WebserviceRequestCore $obj)
    {
        $this->wsObject = $obj;
        return $this;
    }
 
    public function getWsObject()
    {
        return $this->wsObject;
    }
 
    public function manage() {
        return $this->wsObject->getOutputEnabled();
    }

    /**
     * This must be return an array with specific values as WebserviceRequest expects.
     *
     * @return array
     */
    public function getContent() {
        if (!array_key_exists('from', $this->wsObject->urlFragments)) {
            throw new WebserviceException(vsprintf('Parameters "%s" is missing', array('from')), array('100', 500));
        }
     
        $paramFromData = $this->wsObject->urlFragments['from'];
             
        return json_encode(['results' => array('test 1 OK !')]);
        }

}