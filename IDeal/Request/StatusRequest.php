<?php

namespace Wrep\IDealBundle\IDeal\Request;

use Wrep\IDealBundle\IDeal\Merchant;
use Wrep\IDealBundle\IDeal\Transaction;
use Wrep\IDealBundle\IDeal\Request\BaseRequest;

class StatusRequest extends BaseRequest
{
	public function __construct(Merchant $merchant, Transaction $transaction)
	{
		parent::__construct(BaseRequest::TYPE_STATUS, $merchant);
		$this->setTransaction($transaction);
	}

	protected function addTransactionElement(\SimpleXMLElement $xml)
	{
		$transactionXml = $xml->addChild('Transaction');
		$transactionXml->addChild('transactionID', $this->transaction->getTransactionId() );

		return $transactionXml;
	}
}
