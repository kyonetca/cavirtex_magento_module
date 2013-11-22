<?php

class Bitcoin_VirtEx_Model_Api extends Varien_Model
{
	protected $_merchantKey;
	
	protected $_httpClient;

	public function _construct()
	{
		$this->_httpClient = Mage_HTTP_Client::getInstance();
	}

	public function setMerchantKey($merchantKey)
	{
		$this->_merchantKey = $merchantKey;
	}

	public function requestBitcoinAddress($order)
	{
		$params = array(
			"name1" => "test",
			"quantity1" => "1",
			"price1" => "10.00",
			"code1" => "1",
			"shipping_required" => "0",
			"format" => "json"
		);
		$this->_httpClient->post("https://www.cavirtex.com/merchant_purchase/".$this->_merchantKey, $params);
		$response = $this->_httpClient->getBody();
		Mage::log("Bitcoin_VirtEx_Model_Api::requestBitcoinAddress() - response: ".$response);
		$j = $this->json_decode($response);
		Mage::log("Bitcoin_VirtEx_Model_Api::requestBitcoinAddress() - response: ".print_r($j, true));
		return $j;
	}
}
