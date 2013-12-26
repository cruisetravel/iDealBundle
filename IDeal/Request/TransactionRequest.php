<?php

namespace Wrep\IDealBundle\IDeal\Request;

use Wrep\IDealBundle\IDeal\Merchant;
use Wrep\IDealBundle\IDeal\Transaction;
use Wrep\IDealBundle\IDeal\Issuer;

class TransactionRequest extends BaseRequest
{
	public function __construct(Merchant $merchant, Transaction $transaction, Issuer $issuer, $returnUrl)
	{
		parent::__construct(BaseRequest::TYPE_TRANSACTION, $merchant);
		$this->setTransaction($transaction);
		$this->setBIC($issuer->getBIC());
		$this->setReturnUrl($returnUrl);
	}
}
