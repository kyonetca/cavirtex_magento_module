<?php


class Bitcoin_VirtEx_Block_VirtEx_Info extends Mage_Payment_Block_Info
{
	protected $_bitcoin_address;

	protected function _construct()
	{
		parent::_construct();
		Mage::log("Bitcoin_VirtEx_Block_Info::_construct called");
		$this->setTemplate('virtex/info.phtml');
	}

	public function getInstructions()
	{
		if(is_null($this->_instructions)) {
			$this->_instructions = $this->getMethod()->getInstructions();
		}
		return $this->_instructions;
	}

	public function getBitcoinAddress()
	{
		if(is_null($this->_bitcoin_address)) {
			$this->_bitcoin_address = $this->getMethod()->getBitcoinAddress();
		}
		return $this->_bitcoin_address;
	}
}
