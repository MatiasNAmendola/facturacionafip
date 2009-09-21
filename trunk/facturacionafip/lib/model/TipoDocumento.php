<?php

class TipoDocumento extends BaseTipoDocumento
{
	public function __toString(){
		return $this->getDescription();
	}
}
