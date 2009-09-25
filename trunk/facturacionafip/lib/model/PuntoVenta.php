<?php

class PuntoVenta extends BasePuntoVenta{
	public function __toString(){
		return $this->getDescription();
	}
}
