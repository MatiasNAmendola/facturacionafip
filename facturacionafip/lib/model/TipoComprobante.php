<?php

class TipoComprobante extends BaseTipoComprobante
{
	public function __toString(){
		return $this->getDescription();
	}
}
