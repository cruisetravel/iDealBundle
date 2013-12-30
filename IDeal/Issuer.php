<?php

namespace Wrep\IDealBundle\IDeal;

use Wrep\IDealBundle\Exception\InvalidArgumentException;

class Issuer
{

    protected $bic;
    protected $name;

    public function __construct(BIC $bic = null, $name = null)
    {
        if (isset($bic)) {
            $this->setBic($bic);
        }
        if (isset($name)) {
            $this->setName($name);
        }
    }

    public function getBIC()
    {
        return $this->bic;
    }

    public function setBic(BIC $bic)
    {
        $this->bic = $bic;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        if (!is_string($name) || strlen($name) == 0) {
            throw new InvalidArgumentException('Name must be a non-empty string. (' . $name . ')');
        }

        $this->name = $name;
    }

}
