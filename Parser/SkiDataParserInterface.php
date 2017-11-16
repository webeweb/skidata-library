<?php

/*
 * This file is part of the skidata-library package.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\SkiData\Parser;

/**
 * SkiData parser interface.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Library\SkiData\Parser
 */
interface SkiDataParserInterface {

	/**
	 * Date format.
	 */
	const DATE_FORMAT = "Ymd";

	/**
	 * Date/time format.
	 */
	const DATETIME_FORMAT = "Ymd His";

}
