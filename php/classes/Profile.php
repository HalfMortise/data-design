<?php
namespace Edu\Cnm\DataDesign;
/**
 * Class identified as Profile
 *
 * @author HalfMortise
 * @version 2.0
 **/
class Profile {
   use ValidateDate;
   use ValidateUuid;

   /**
    * id for profile; this is the primary key
    * @var Uuid $profileId
    **/
   private $profileId;

   /**
    * name for this profile
    * @var String $profileName
    **/
   private $profileName;

   /**
    * Constructor for this class
    *
    * @param string|Uuid $newProfileId id of this Profile
    * @param string|Uuid $newProfileName name assigned to Profile
    * @param \DateTime|string|null $newNameDate date and time Name was created
    * @throws \InvalidArgumentException if data types are not valid
    * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
    * @throws \TypeError if data types violate type hints
    * @throws \Exception if some other exception occurs
    * @Documentation https://php.net/manual/en/language.oop5.decon.php
    **/

   public function __construct($newProfileId, string $newProfileName) {
      try {
         $this->setProfileId($newProfileId);
         $this->setProfileName($newProfileName);
      }


      //determine exception thrown
      catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
         $exceptionType = get_class($exception);
         throw(new $exceptionType($exception->getMessage(), 0, $exception));
      }
   }
      //end exception

   /**
    * accessor method for profile id
    *
    * @return Uuid value of profile id
    **/
   public function getProfileId() : Uuid {
      return($this->profileId);
   }

   /**
    * mutator method for profile id
    *
    * @param Uuid $newProfileId new value of profile id
    * @throws \RangeException if $newProfileId is not unique
    * @throws \TypeError if $newProfileId is not a uuid
    **/
   public function setProfileId( $newProfileId) : void {
      try {
         $uuid = self::validateUuid($newProfileId);
      } catch(\InvalidArgumentException | \RangeException | \ Exception | \ TypeError $exception) {
         $exceptionType = get_class($exception);
         throw(new $exceptionType($exception->getMessage(), 0, $exception));
      }
      // convert and store the profile id
      $this->profileId = $uuid;
   }

   /**
    * accessor method for profile name
    *
    * @return String value of profile name
    **/
   public function getProfileName() :string {
      return($this->profileName);
   }

   /**
    * mutator method for profile name
    *
    * @param String $newProfileName new value of profile name
    * @throws \RangeException if $newProfileName is not secure
    * @throws \TypeError: none (leaving comment in for reference)
    **/
   public function setProfileName(string $newProfileName) : void {
      // verify the name content is secure
      $newProfileName = trim($newProfileName);
      $newProfileName = filter_var($newProfileName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
      if(empty($newProfileName) === true) {
         throw(new \InvalidArgumentException("This name is not valid"));
      }
      //convert and store the profile name
      $this->profileName = $newProfileName;
   }

   /**
    * inserts this Profile into mySQL
    *
    * @param \PDO $pdo PDO connection object
    * @throws \PDOException when mySQL related errors occur
    * @throws \TypeError if $pdo is not a PDO connection object
    **/
   public function insert(\PDO $pdo) : void {
      // create query template
      $query = "INSERT INTO profile(profileId, profileName)";
      $statement = $pdo->prepare($query);
      // bind the member variables to the place holders in the template
      $parameters = ["profileId" => $this->profileId->getBytes(), "profileName => $this->profileName"];
      $statement->execute($parameters);

      }

      /**
       * deletes this Profile from mySQL
       *
       * @param \PDO $pdo PDO connection object
       * @throws \PDOException when mySQL related errors occur
       * @throws \TypeError if $pdo is not a PDO connection object
       **/
      public function delete(\PDO $pdo) : void {
         // create query template
         $query = "DELETE FROM profile WHERE profileId = :profileId";
         $statement = $pdo->prepare($query);
         // bind the member variables to the place holder in the template
         $parameters = ["profileId" => $this->profileId->getBytes()];
         $statement->execute($parameters);

      }

      /**
       * updates this Profile in mySQL
       *
       * @param \PDO $pdo PDO connection object
       * @throws \PDOException when mySQL related errors occur
       * @throws \TypeError if $pdo is not a PDO connection object
       **/

      public function update(\PDO $pdo) : void {
         // create a query template
         $query = "UPDATE profile SET profileId = :profileId, profileName = :profileName";
         $statement = $pdo->prepare($query);
         $parameters = ["profileId" =>$this->profileId->getBytes(), "profileName" => $this->profileName];
         $statement->execute($parameters);

      }












}