<?php
namespace HalfMortise\DataDesign;
/**
 * Class identified as Content
 *
 * @author HalfMortise
 * @version 2.0
 **/
class Content {
   use ValidateDate;
   use ValidateUuid;

   /**
    * id for content; this is the primary key
    * @var Uuid $contentId
    **/
   private $contentId;

   /**
    * episode for content
    * @var Uuid $contentEpisode
    **/
   private $contentEpisode;

   /**
    * genre for content
    * @var Uuid $contentGenre
    **/
   private $contentGenre;

   /**
    * Constructor for this class
    *
    * @param string|Uuid $newContentId id of content entity
    * @param string|Uuid $newContentEpisode content which is broken up into episodes
    * @param string|Uuid $newContentGenre content categorized by genre
    * @param \DateTime|string|null $newContentDate date and time unique content was created
    * @throws \InvalidArgumentException if data types are not valid
    * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
    * @throws \TypeError if data types violate type hints
    * @throws \Exception if some other exception occurs
    * @Documentation https://php.net/manual/en/language.oop5.decon.php
    **/

   public function __construct($newContentId, string $newAccountName, string $newAccountEmail) {
      try {
         $this->setContentId($newContentId);
         $this->setContentEpisode($newContentEpisode);
         $this->setContentGenre($newContentGenre);
      }

         //exception type
      catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
         $exceptionType = get_class($exception);
         throw(new $exceptionType($exception->getMessage(), 0, $exception));
      }
   }

   /**
    * accessor method for content id
    *
    * @return Uuid value of content id
    **/
   public function getContentId() : Uuid {
      return($this->contentId);
   }

   /**
    * mutator method for content id
    *
    * @param Uuid $newContentId new value of content id
    * @throws \RangeException if $newContentId is not unique
    * @throws \TypeError if $newContentId is not a uuid
    **/

   public function setContentId( $newContentId) : void {
      try {
         $uuid = self::validateUuid($newContentId);
      } catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
         $exceptionType = get_class($exception);
         throw(new $exceptionType($exception->getMessage(), 0, $exception));
      }

      //convert and store the content id
      $this->contentId = $uuid;
   }


   /**
    * accessor method for content episode
    *
    * @return Uuid value of content episode
    **/

   public function getContentEpisode() : Uuid {
      return($this->contentEpisode);
   }

   /**
    * mutator method for content episode
    *
    * @param String $newContentEpisode new value of content episode
    * @throws \RangeException if $newContentEpisode is not secure
    * @throws \TypeError if $newContentEpisode is not a uuid
    **/

   public function setContentEpisode( $newContentEpisode) : void {
      try {
         $uuid = self::validateUuid($newContentEpisode);
      } catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
         $exceptionType = get_class($exception);
         throw(new $exceptionType($exception->getMessage(), 0, $exception));
      }

      //convert and store the content episode
      $this->contentEpisode = $uuid;
   }



   /**
    * accessor method for content genre
    *
    * @return Uuid value of content genre
    **/

   public function getContentGenre() : Uuid {
      return($this->contentGenre);
   }

   /**
    * mutator method for content genre
    *
    * @param String $newContentGenre new value of content genre
    * @throws \RangeException if $newContentGenre is not secure
    * @throws \TypeError if $newContentGenre is not a uuid
    **/

   public function setContentGenre( $newContentGenre) : void {
      try {
         $uuid = self::validateUuid($newContentGenre);
      } catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
         $exceptionType = get_class($exception);
         throw(new $exceptionType($exception->getMessage(), 0, $exception));
      }

      //convert and store the content genre
      $this->contentGenre = $uuid;
   }

}