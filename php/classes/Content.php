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
 * Unfinished due to project requirements specifying only one class to be developed (see Account or Profile)
 *
 * Class identified as Content
 *
 * @author HalfMortise
 * @version 1.0
 **/
class Content {
   use ValidateUuid;

   /**
    * id for content; this is the primary key for the class
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

   public function __construct($newContentId, string $newContentEpisode, string $newContentGenre) {
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
    * @param String/uuid $newContentEpisode new value of content episode
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
    * @param String/uuid $newContentGenre new value of content genre
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