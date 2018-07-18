<?php
/***/

class Profile {
	private $profileId;
	private $profileName;
//The (mutator) function generates a new profile id for a user
/**
* @param Uuid/string $newProfileId new value of Netflix account
* @throws \RangeException if $newProfileId is not within range-parameters allowed
* @throws \TypeError if $newProfileId is not a uuid
**/
	public function setProfileId( $newProfileId) : void {
		try {
			$uuid = self::validateUuid($newProfileId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		//convert and store the profile id
		$this->profileId = $uuid;
	}
//accessor method for returning the Netflix profile id
//@return Uuid value of Netflix profile id
   public function getProfileId() : Uuid {
	   return($this->profileId);
   }
//mutator method for generating a new profile name
//@param string
//@throws \RangeException if $profileName exceeds 10 characters
   public function setProfileName( $newProfileName) : void {
	   try {
	      $string = self::validateString($newProfileName);
      } catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
	      $exceptionType = get_class($exception);
	      throw(new $exceptionType($exception->getMessage(), 0, $exception));
      }
//convert and store the profileName
      $this->profileName = $string;
   }
//accessor method for "getting" profileName
//@return string value of profileName
   public function getProfileName() : string {
	   return($this->profileName);
   }
}