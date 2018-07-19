<?php
/***/

class Account {
   /**
    * id for account; this is the primary key
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
            throw(new $exceptionType($exception->getMessage(), 0, $exception));
         }

         //convert and store the account profile id
         $this->accountProfileId = $uuid;

         /**
          * accessor method for account activation token
          *
          * @return Uuid value of account activation token
          **/

         public function getActivationToken() : Uuid {
            return($this->accountActivationToken);
         }

         /**
          * mutator method for account activation token
          *
          * @param Uuid $newAccountActivationToken new value of account activation token
          * @throws \RangeException for $newAccountActivationToken
          * @throws \TypeError if $newAccountActivationToken is not a uuid
          **/

         public function setAccountActivationToken( $newAccountActivationToken) : void {
            try {
               $uuid = self::validateUuid($newAccountActivationToken);
            } catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
               $exceptionType = get_class($exception);
               throw(new $exceptionType($exception->getMessage(), 0, $exception));
            }

            //convert and store the account activation token
            $this->accountActivationToken = $uuid;

            /**
             * accessor method for account name
             *
             * @return Uuid value of account name
             **/

            public function getAccountName() : Uuid {
               return($this->accountName);
            }

            /**
             * mutator method for account name
             *
             * @param String $newAccountName new value of account name
             * @throws \RangeException if $newAccountName is not unique
             * @throws \TypeError if $newAccountName is not a string
             **/

            public function setAccountId( $newAccountId) : void {
               try {
                  $string = self::validateString($newAccountName);
               } catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
                  $exceptionType = get_class($exception);
                  throw(new $exceptionType($exception->getMessage(), 0, $exception));
               }

               //convert and store the profile name
               $this->accountId = $string;
            }
               /**
                * accessor method for account name
                *
                * @return string value of account name
                **/

               public function getAccountName() : String {
                  return($this->accountName);
               }

            /**
             * accessor method for account email
             *
             * @return String value of account email
             **/
            public function getAccountEmail() : String {
               return($this->accountEmail);
            }

            /**
             * mutator method for account email
             *
             * @param String $newAccountEmail new value of account email
             * @throws \RangeException if $newAccountEMail is not unique
             * @throws \TypeError if $newAccountEmail is not a string
             **/
            public function setAccountEmail( $newAccountEmail) : void {
               try {
                  $string = self::validateString($newAccountEmail);
               } catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
                  $exceptionType = get_class($exception);
                  throw(new $exceptionType($exception->getMessage(), 0, $exception));
               }

               // convert and store the account email
               $this->accountEmail = $string;
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
            public function setTweetId( $newTweetId) : void {
               try {
                  $uuid = self::validateUuid($newAccountHash);
               } catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
                  $exceptionType = get_class($exception);
                  throw(new $exceptionType($exception->getMessage(), 0, $exception));
               }

               // convert and store the account's password hash
               $this->accountHash = $uuid;
            }
         }
