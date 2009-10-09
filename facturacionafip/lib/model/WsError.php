<?php

class WsError extends BaseWsError {
	public function __toString(){
		return $this->getMessage();
	}
}
