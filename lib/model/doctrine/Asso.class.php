<?php

/**
 * Asso
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    simde
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Asso extends BaseAsso {

  /**
   * 
   * This method has been overloaded for the search functionnality with zend framework
   * it add the asso to the index file
   * @see vendor/doctrine/Doctrine/Doctrine_Record::save()
   */
  public function save(Doctrine_Connection $conn = null)
  {
    $conn = $conn ? $conn : AssoTable::getInstance()->getConnection();
    $conn->beginTransaction();
    try {
      $ret = parent::save($conn);

      $this->updateLuceneIndex();

      $conn->commit();

      return $ret;
    } catch(Exception $e) {
      $conn->rollBack();
      throw $e;
    }
  }

  /**
   * This method has been overloaded for the search functionnality with zend framework
   * it delete the asso from the index file
   * @see vendor/doctrine/Doctrine/Doctrine_Record::delete()
   */
  public function delete(Doctrine_Connection $conn = null)
  {
    $index = AssoTable::getInstance()->getLuceneIndex();

    foreach($index->find('pk:' . $this->getId()) as $hit)
    {
      $index->delete($hit->id);
    }

    return parent::delete($conn);
  }

  /**
   * Method to use the zend framework for search
   * update the index file used for search
   */
  public function updateLuceneIndex()
  {
    $index = AssoTable::getInstance()->getLuceneIndex();

    // remove existing entries
    foreach($index->find('pk:' . $this->getId()) as $hit)
    {
      $index->delete($hit->id);
    }


    $doc = new Zend_Search_Lucene_Document();

    // store asso primary key to identify it in the search results
    $doc->addField(Zend_Search_Lucene_Field::Keyword('pk', $this->getId()));

    // index asso fields
    $doc->addField(Zend_Search_Lucene_Field::UnStored('name', $this->getName(), 'utf-8'));
    $doc->addField(Zend_Search_Lucene_Field::UnStored('description', $this->getDescription(), 'utf-8'));
    $doc->addField(Zend_Search_Lucene_Field::UnStored('login', $this->getLogin(), 'utf-8'));

    // add asso to the index
    $index->addDocument($doc);
    $index->commit();
  }

  /**
   * Return name slugified
   * 
   * @return string
   */
  public function getNameSlug()
  {
    return Text::slugify($this->getName());
  }

  public function isPole()
  {
    // Codé en dur pour des raisons de performances
    return in_array($this->getId(), array(1, 3, 4, 5, 6));
  }

  public function addMember(sfGuardUser $user)
  {
    $assoMember = new AssoMember();
    $assoMember->setAsso($this);
    $assoMember->setUser($user);
    $assoMember->setRoleId(sfConfig::get('app_portail_default_join_role'));
    $assoMember->setSemestreId(sfConfig::get('app_portail_current_semestre'));
    $assoMember->save();
  }

  public function removeMember(sfGuardUser $user)
  {
    $assoMember = AssoMemberTable::getInstance()->getCurrentAssoMember($this->getPrimaryKey(), $user->getPrimaryKey())->fetchOne();
    $assoMember->delete();
  }

  public function getPoleName()
  {
    if($this->getPole())
      return $this->getPole()->__toString();
  }

  public function getUrlSite()
  {
    return 'http://assos.utc.fr/' . $this->getLogin();
  }

  public function getCharteSigned()
  {
    $charte = CharteInfoTable::getInstance()->getByAssoAndSemestre($this->getId())->fetchOne();
    return ( $charte ) ? $charte->getConfirmation() : 0;
  }

}
