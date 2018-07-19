<?php
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
    * @var String $contentEpisode
    **/
   private $contentEpisode;

   /**
    * genre for content
    * @var String $contentGenre
    **/
   private $contentGenre;








}