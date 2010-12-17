<?php

class sfWidgetFormPlainText extends sfWidgetForm
{
  protected function configure($options = array(), $attributes = array())
  {
    // parent::configure($options, $attributes);

    // $this->setOption('is_hidden', false);
  }

  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    $field  = $value;
//    $field .= parent::render($name, $value, $attributes, $errors);

    return $field;
  }
}