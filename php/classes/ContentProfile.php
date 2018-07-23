<?php
namespace HalfMortise\DataDesign;
require_once(dirname(__DIR__, 2) . "/classes/autoload.php");

/**
 * Class identified as ContentProfile
 *
 * @author HalfMortise
 * @version 2.0
 **/

class ContentProfile {
   use ValidateDate;
   use ValidateUuid;

/**
 * id for the ContentProfile; this is the primary key
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
