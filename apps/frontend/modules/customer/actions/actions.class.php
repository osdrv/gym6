<?php

/**
 * customer actions.
 *
 * @package    gym6
 * @subpackage customer
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class customerActions extends sfActions
{
  private function generateCalendar(&$d_o_y)
  {
    for($y=1;$y<=5;$y++)
    {
        for($x=1;$x<=7;$x++)
        {
            $cd = mktime(0,0,1,  1,1,date('Y'))+($d_o_y - 0)*3600*24;
            $mdays[$x][$y] =
               array('date' => date('Y.m.d',$cd),
                     'view' => date('j',$cd));
            $d_o_y++;
        }
    }
    return $mdays;
  }
  public function executeRegistration2(sfWebRequest $request)
  {
    $this->mdays=array();
    $s_o_m = mktime(0,0,1,date('m'),1,date('Y')); //Первое число текущего месяца
    $d_o_1st = date('N',$s_o_m); //(1-7) День недели первого числа месяца
    $d_o_y = date('z',$s_o_m) - $d_o_1st + 1; //День в году, с которого оторого начинаме календарь
    $this->mdays = $this->generateCalendar($d_o_y);
    $this->n_o_month = date("F",$s_o_m);
    $this->mdays1 = $this->generateCalendar($d_o_y);
    $this->n_o_month1 = date("F",date('m')<12?mktime(0,0,1,date('m')+1,1,date('Y')):mktime(0,0,1,1,1,date('Y')+1));
  }

  public function executePay(sfWebRequest $request)
  {
  }

  public function executeIndex(sfWebRequest $request)
  {
    $this->customers = Doctrine::getTable('customer')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->customer = Doctrine::getTable('customer')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->customer);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new customerForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new customerForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($customer = Doctrine::getTable('customer')->find(array($request->getParameter('id'))), sprintf('Object customer does not exist (%s).', $request->getParameter('id')));
    $this->form = new customerForm($customer);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($customer = Doctrine::getTable('customer')->find(array($request->getParameter('id'))), sprintf('Object customer does not exist (%s).', $request->getParameter('id')));
    $this->form = new customerForm($customer);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($customer = Doctrine::getTable('customer')->find(array($request->getParameter('id'))), sprintf('Object customer does not exist (%s).', $request->getParameter('id')));
    $customer->delete();

    $this->redirect('customer/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $customer = $form->save();

      $this->redirect('customer/edit?id='.$customer->getId());
    }
  }
}
