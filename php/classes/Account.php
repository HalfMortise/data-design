<?php
namespace Halfmortise\DataDesign;
require_once("autoload.php"); //autoload.php file in Classes directory
require_once(dirname(__DIR__, 2) . "./vendor/autoload.php");
use Ramsey\Uuid\Uuid;
/**
 * Small Cross Section of a Netflix account profile -
 * The tracking feature allows a user to come and go from an individual profile and content
 * while leaving content unfinished, and then returning to continue later from that same point.
 *
 * Class identified as Account
 *
 * @author HalfMortise
 * @version 1.0
 **/
class Account {
   use ValidateUuid;


   /**
    * id for account; this is the primary key for the class
    * @var Uuid $accountId
    **/
   private $accountId;

   /**
    * profile id for account
    * @var Uuid $accountProfileId
    **/
   private $accountProfileId;
   /**
    * id for account activation token
    * @var Uuid $accountActivationToken
    **/
   private $accountActivationToken;

   /**
    * name for this account
    * @var String $accountName
    **/
   private $accountName;

   /**
    * email for this account
    * @var String $accountEmail
    **/
   private $accountEmail;

   /**
    * hash for this account's password
    * @var Uuid $accountHash
    **/
   private $accountHash;



   /**
    * Constructor for this class
    *
    * @param string|Uuid $newAccountId id of this Account
    * @param string|Uuid $newAccountProfileId id of the profile that contains the Account
    * @param string|Uuid $newAccountActivationToken token used to activate the Account
    * @param string|Uuid $newAccountName name assigned to Account
    * @param string|Uuid $newAccountEmail email assigned to Account
    * @param string|Uuid $newAccountHash hash used for Account password creation
    * @param \DateTime|string|null $newAccountDate date and time Account was created
    * @throws \InvalidArgumentException if data types are not valid
    * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
    * @throws \TypeError if data types violate type hints
    * @throws \Exception if some other exception occurs
    * @Documentation https://php.net/manual/en/language.oop5.decon.php
   **/

   public function __construct($newAccountId, $newAccountProfileId, $newAccountActivationToken, string $newAccountName, string $newAccountEmail, $newAccountHash) {
      try {
         $this->setAccountId($newAccountId);
         $this->setAccountProfileId($newAccountProfileId);
         $this->setAccountActivationToken($newAccountActivationToken);
         $this->setAccountName($newAccountName);
         $this->setAccountEmail($newAccountEmail);
         $this->setAccountHash($newAccountHash);
      }

      //exception type
      catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
      $exceptionType = get_class($exception);
      throw(new $exceptionType($exception->getMessage(), 0, $exception));
      }
   }



   /**
    * accessor method for account id
    *
    * @return Uuid value of account id
    **/
   public function getAccountId() : Uuid {
      return($this->accountId);
   }

   /**
    * mutator method for account id
    *
    * @param Uuid $newAccountId new value of account id
    * @throws \RangeException if $newAccountId is not unique
    * @throws \TypeError if $newAccountId is not a uuid
    **/

   public function setAccountId( $newAccountId) : void {
      try {
         $uuid = self::validateUuid($newAccountId);
      } catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
         $exceptionType = get_class($exception);
         throw(new $exceptionType($exception->getMessage(), 0, $exception));
      }

      //convert and store the profile id
      $this->accountId = $uuid;
   }
     /**
      * accessor method for account profile id
      *
      * @return Uuid value of account profile id
      **/

      public function getAccountProfileId() : Uuid{
         return($this->accountProfileId);
      }

     /**
      * mutator method for account profile id
      *
      * @param Uuid $newAccountProfileId new value of account profile id
      * @throws \RangeException if $newAccountProfileId is not unique
      * @throws \TypeError if $newAccountProfileId is not a uuid
      **/

      public function setAccountProfileId( $newAccountProfileId) : void {
         try {
            $uuid = self::validateUuid($newAccountProfileId);
         } catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
            $exceptionType = get_class($exception);
            throw(new $exceptionType($exception->getMessage("uuid is not valid"), 0, $exception));
         }

         //convert and store the account profile id
         $this->accountProfileId = $uuid;
      }

         /**
          * accessor method for account activation token
          *
          * @return Uuid value of account activation token
          **/

         public function getActivationToken(): Uuid {
            return ($this->accountActivationToken);
         }

         /**
          * mutator method for account activation token
          *
          * @param Uuid $newAccountActivationToken new value of account activation token
          * @throws \RangeException if $newAccountActivationToken is not unique
          * @throws \TypeError if $newAccountActivationToken is not a uuid
          **/

         public function setAccountActivationToken( $newAccountActivationToken) : void {
            try {
               $uuid = self::validateUuid($newAccountActivationToken);
            } catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
               $exceptionType = get_class($exception);
               throw(new $exceptionType($exception->getMessage("uuid is not valid"), 0, $exception));
            }

            //convert and store the account activation token
            $this->accountActivationToken = $uuid;
            }

            /**
             * accessor method for account name
             *
             * @return Uuid value of account name
             **/

            public function getAccountName() : String {
               return($this->accountName);
            }

            /**
             * mutator method for account name
             *
             * @param String $newAccountName new value of account name
             * @throws \RangeException if $newAccountName is not secure
             * @throws \TypeError if $newAccountName is not a string
             **/

            public function setAccountName(string $newAccountName) : void {
               //verify the account name is secure
               $newAccountName = trim($newAccountName);
               $newAccountName = filter_var($newAccountName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
               if(empty($newAccountName) === true) {
                  throw(new \InvalidArgumentException("Account must have name"));
               }

               //convert and store the account name
               $this->accountName = $newAccountName;
            }

            /**
             * accessor method for account email
             *
             * @return Uuid value of account email
             **/

            public function getAccountEmail() : String {
      return($this->accountEmail);
            }

            /**
            * mutator method for account email
            *
             * @param String $newAccountEmail new value of account email
            * @throws \RangeException if $newAccountEmail is not secure
           * @throws \TypeError if $newAccountEmail is not a string
           **/

           public function setAccountEmail(string $newAccountEmail) : void {
               //verify the account email is secure
               $newAccountEmail = trim($newAccountEmail);
               $newAccountEmail = filter_var($newAccountEmail, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
             if(empty($newAccountEmail) === true) {
                throw(new \InvalidArgumentException("Please provide email address"));
             }

               //convert and store the account email
               $this->accountEmail = $newAccountEmail;
          }


   /**
             * accessor method for account's password hash
             *
             * @return Uuid value of account's password hash
             **/
            public function getAccountHash() : Uuid {
               return($this->accountHash);
            }

            /**
             * mutator method for account hash
             *
             * @param Uuid $newAccountHash new value of account's password hash
             * @throws \RangeException if $newAccountHash is not unique
             * @throws \TypeError if $newAccountHash is not a uuid
             **/
            public function setAccountHash( $newAccountHash) : void {
               try {
                  $uuid = self::validateUuid($newAccountHash);
               } catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
                  $exceptionType = get_class($exception);
                  throw(new $exceptionType($exception->getMessage("uuid is not valid"), 0, $exception));
               }

               // convert and store the account's password hash
               $this->accountHash = $uuid;
            }
         }
