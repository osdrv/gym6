<?php

/**
 * Customer form base class.
 *
 * @method Customer getObject() Returns the current form's model object
 *
 * @package    gym6
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCustomerForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'login'    => new sfWidgetFormInputText(),
      'mail'     => new sfWidgetFormInputText(),
      'name'     => new sfWidgetFormInputText(),
      'password' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'login'    => new sfValidatorString(array('max_length' => 50)),
      'mail'     => new sfValidatorString(array('max_length' => 255)),
      'name'     => new sfValidatorString(array('max_length' => 255)),
      'password' => new sfValidatorString(array('max_length' => 50)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Customer', 'column' => array('login')))
    );

    $this->widgetSchema->setNameFormat('customer[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Customer';
  }

}
