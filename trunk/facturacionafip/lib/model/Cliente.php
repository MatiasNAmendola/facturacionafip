<?php

class Cliente extends BaseCliente
{
	public function __toString(){
		return $this->getRazonSocial();
	}
}
