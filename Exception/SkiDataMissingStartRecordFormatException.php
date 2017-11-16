<?php

/*
 * This file is part of the skidata-library package.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\SkiData\Exception;

/**
 * SkiData missing start record format exception.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Library\SkiData\Exception
 * @final
 */
final class SkiDataMissingStartRecordFormatException extends AbstractSkiDataException {

	/**
	 * Constructor.
	 */
	public function __construct() {
		parent::__construct("The start record format is missing");
	}

}
