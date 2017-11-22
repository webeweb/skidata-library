<?php

/**
 * This file is part of the skidata-library package.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\SkiData\Parser;

use WBW\Library\SkiData\Entity\SkiDataCustomerEntity;
use WBW\Library\SkiData\Entity\SkiDataStartRecordFormatEntity;

/**
 * SkiData start record format parser.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Library\SkiData\Parser
 * @final
 */
final class SkiDataStartRecordFormatParser extends AbstractSkiDataParser {

	/**
	 * Constructor.
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Parse a SkiData start record format entity.
	 *
	 * @param SkiDataCustomerEntity $entity The SkiData start record format entity.
	 * @return string Returns the parsed SkiData start record format entity.
	 */
	public function parseEntity(SkiDataStartRecordFormatEntity $entity) {

		// Initialise the output.
		$output = [];

		$output[]	 = $this->encodeInteger($entity->getVersionRecordStructure(), 6);
		$output[]	 = $this->encodeInteger($entity->getFacilityNumber(), 7);
		$output[]	 = $this->encodeDate($entity->getDateFile());
		$output[]	 = $this->encodeInteger($entity->getNumberRecords(), 5);
		$output[]	 = $this->encodeString($entity->getCurrency(), 6);

		// Return the output.
		return implode(";", $output);
	}

	/**
	 * Parse a line.
	 *
	 * @param string $line The line.
	 * @return SkiDataStartRecordFormatEntity Returns a SkiData start record format entity.
	 */
	public function parseLine($line) {

		// Split the line.
		$data	 = explode(";", $line);
		$i		 = 0;

		// Initialize the entity.
		$entity = new SkiDataStartRecordFormatEntity();

		$entity->setVersionRecordStructure($this->decodeInteger($data[$i++]));
		$entity->setFacilityNumber($this->decodeInteger($data[$i++]));
		$entity->setDateFile($this->decodeDate($data[$i++]));
		$entity->setNumberRecords($this->decodeInteger($data[$i++]));
		$entity->setCurrency($this->decodeString($data[$i++]));

		// Return the entity.
		return $entity;
	}

}
