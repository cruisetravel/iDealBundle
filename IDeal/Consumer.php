<?php

namespace Wrep\IDealBundle\IDeal;

use Wrep\IDealBundle\Exception\InvalidArgumentException;

class Consumer
{
	private $name;
	private $bic;
	private $iban;

	public function __construct($name = null, $iban = null, BIC $bic = null)
	{
            if (isset($name)) {
		$this->setName($name);
            }

            $this->setBIC($bic);

            if (isset($iban)) {
                $this->setIban($iban);
            }
	}

	public function getName()
	{
		return $this->name;
	}

	protected function setName($name)
	{
		if ( $name !== null && !is_string($name) ) {
			throw new InvalidArgumentException('Name must be a string.');
		}

		if ( empty($name) ) {
			$name = null;
		}

		$this->name = $name;
	}

	public function getIban()
	{
		return $this->iban;
	}

	protected function setIban($iban)
	{
		if ( $iban !== null && !is_string($iban) ) {
			throw new InvalidArgumentException('IBAN must be a string.');
		}

		if ( empty($iban) ) {
			$iban = null;
		}

		$this->iban = $iban;
	}

	public function getBIC()
	{
		return $this->bic;
	}

	protected function setBIC(BIC $bic = null)
	{
		$this->bic = $bic;
	}

	public function isEmpty()
	{
		return ($this->getBIC() == null && $this->getIban() == null && $this->getName() == null);
	}
}
