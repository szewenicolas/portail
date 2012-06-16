<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Profile', 'doctrine');

/**
 * BaseProfile
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property string $domain
 * @property string $nickname
 * @property date $birthday
 * @property char $sexe
 * @property string $mobile
 * @property integer $home_place
 * @property integer $family_place
 * @property integer $branche_id
 * @property integer $filiere_id
 * @property integer $semestre
 * @property string $other_email
 * @property string $photo
 * @property boolean $weekmail
 * @property boolean $autorisation_photo
 * @property string $devise
 * @property sfGuardUser $User
 * @property Place $HomePlace
 * @property Place $FamilyPlace
 * @property Branche $Branche
 * @property Filiere $Filiere
 * @property UserSemestre $UserSemestre
 * @property Doctrine_Collection $UserSport
 * 
 * @method integer             getUserId()             Returns the current record's "user_id" value
 * @method string              getDomain()             Returns the current record's "domain" value
 * @method string              getNickname()           Returns the current record's "nickname" value
 * @method date                getBirthday()           Returns the current record's "birthday" value
 * @method char                getSexe()               Returns the current record's "sexe" value
 * @method string              getMobile()             Returns the current record's "mobile" value
 * @method integer             getHomePlace()          Returns the current record's "home_place" value
 * @method integer             getFamilyPlace()        Returns the current record's "family_place" value
 * @method integer             getBrancheId()          Returns the current record's "branche_id" value
 * @method integer             getFiliereId()          Returns the current record's "filiere_id" value
 * @method integer             getSemestre()           Returns the current record's "semestre" value
 * @method string              getOtherEmail()         Returns the current record's "other_email" value
 * @method string              getPhoto()              Returns the current record's "photo" value
 * @method boolean             getWeekmail()           Returns the current record's "weekmail" value
 * @method boolean             getAutorisationPhoto()  Returns the current record's "autorisation_photo" value
 * @method string              getDevise()             Returns the current record's "devise" value
 * @method sfGuardUser         getUser()               Returns the current record's "User" value
 * @method Place               getHomePlace()          Returns the current record's "HomePlace" value
 * @method Place               getFamilyPlace()        Returns the current record's "FamilyPlace" value
 * @method Branche             getBranche()            Returns the current record's "Branche" value
 * @method Filiere             getFiliere()            Returns the current record's "Filiere" value
 * @method UserSemestre        getUserSemestre()       Returns the current record's "UserSemestre" value
 * @method Doctrine_Collection getUserSport()          Returns the current record's "UserSport" collection
 * @method Profile             setUserId()             Sets the current record's "user_id" value
 * @method Profile             setDomain()             Sets the current record's "domain" value
 * @method Profile             setNickname()           Sets the current record's "nickname" value
 * @method Profile             setBirthday()           Sets the current record's "birthday" value
 * @method Profile             setSexe()               Sets the current record's "sexe" value
 * @method Profile             setMobile()             Sets the current record's "mobile" value
 * @method Profile             setHomePlace()          Sets the current record's "home_place" value
 * @method Profile             setFamilyPlace()        Sets the current record's "family_place" value
 * @method Profile             setBrancheId()          Sets the current record's "branche_id" value
 * @method Profile             setFiliereId()          Sets the current record's "filiere_id" value
 * @method Profile             setSemestre()           Sets the current record's "semestre" value
 * @method Profile             setOtherEmail()         Sets the current record's "other_email" value
 * @method Profile             setPhoto()              Sets the current record's "photo" value
 * @method Profile             setWeekmail()           Sets the current record's "weekmail" value
 * @method Profile             setAutorisationPhoto()  Sets the current record's "autorisation_photo" value
 * @method Profile             setDevise()             Sets the current record's "devise" value
 * @method Profile             setUser()               Sets the current record's "User" value
 * @method Profile             setHomePlace()          Sets the current record's "HomePlace" value
 * @method Profile             setFamilyPlace()        Sets the current record's "FamilyPlace" value
 * @method Profile             setBranche()            Sets the current record's "Branche" value
 * @method Profile             setFiliere()            Sets the current record's "Filiere" value
 * @method Profile             setUserSemestre()       Sets the current record's "UserSemestre" value
 * @method Profile             setUserSport()          Sets the current record's "UserSport" collection
 * 
 * @package    simde
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProfile extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('profile');
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('domain', 'string', 15, array(
             'type' => 'string',
             'length' => 15,
             ));
        $this->hasColumn('nickname', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('birthday', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('sexe', 'char', 1, array(
             'type' => 'char',
             'length' => 1,
             ));
        $this->hasColumn('mobile', 'string', 15, array(
             'type' => 'string',
             'length' => 15,
             ));
        $this->hasColumn('home_place', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('family_place', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('branche_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('filiere_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('semestre', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('other_email', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('photo', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('weekmail', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('autorisation_photo', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('devise', 'string', 300, array(
             'type' => 'string',
             'length' => 300,
             ));

        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id'));

        $this->hasOne('Place as HomePlace', array(
             'local' => 'home_place',
             'foreign' => 'id'));

        $this->hasOne('Place as FamilyPlace', array(
             'local' => 'family_place',
             'foreign' => 'id'));

        $this->hasOne('Branche', array(
             'local' => 'branche_id',
             'foreign' => 'id'));

        $this->hasOne('Filiere', array(
             'local' => 'filiere_id',
             'foreign' => 'id'));

        $this->hasOne('UserSemestre', array(
             'local' => 'semestre',
             'foreign' => 'id'));

        $this->hasMany('UserSport', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}