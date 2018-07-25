<?php
namespace Halfmortise\DataDesign;
require_once("autoload.php"); //autoload.php file in Classes directory
require_once(dirname(__DIR__, 2) . "../vendor/autoload.php");
use Ramsey\Uuid\Uuid;
/**
 * Small Cross Section of a Netflix account profile -
 * The tracking feature allows a user to come and go from an individual profile and content
 * while leaving content unfinished, and then returning to continue later from that same point.
 *
 * Unfinished due to project requirements specifying only one class to be developed
 *
 * Class identified as ContentProfile
 *
 * @author HalfMortise
 * @version 1.0
 **/

class ContentProfile {
   use ValidateUuid;

/**
 * id for the ContentProfile; this is the primary key for the class
 * @var Uuid $profileId
**/
	private $contentProfileProfileId;

/**
 * id for
 * @var Uuid $contentProfileContentId
**/
	private $contentProfileContentId;

/**
 * id for
 * @var Uuid $contentProfileTrackPosition
**/
	private $contentProfileTrackPosition;

/**this is the accessor method to allow to "get"
 * @return UUID values
**/
	public function getContentProfileProfileId(): Uuid {
		return ($this->contentProfileProfileId);
	}

	public function getContentProfileContentId(): Uuid {
		return ($this->contentProfileContentId);
	}

	public function getContentProfileTrackPosition(): Uuid {
		return ($this->contentProfileTrackPosition);
	}
}
