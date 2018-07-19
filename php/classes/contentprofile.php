<?php
/***/
//this defines the class's state and behavior
class Contentprofile {
/**
 * id for the content profile; this is the primary key
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
