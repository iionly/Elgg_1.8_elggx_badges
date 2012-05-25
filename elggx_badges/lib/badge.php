<?php
/**
 * Badges Badge class
 *
 */

class BadgesBadge extends ElggFile {

  protected function initializeAttributes() {

    parent::initializeAttributes();

    $this->attributes['subtype'] = "badge";
  }

  public function __construct($guid = null) {

    parent::__construct($guid);
  }
}
