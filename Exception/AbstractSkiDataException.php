<?php

/**
 * This file is part of the skidata-library package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\SkiData\Exception;

use SebastianBergmann\RecursionContext\Exception;
use WBW\Library\Core\Exception\AbstractCoreException;

/**
 * Abstract SkiData exception.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\SkiData\Exception
 * @abstract
 */
abstract class AbstractSkiDataException extends AbstractCoreException {

    /**
     * Constructor.
     *
     * @param string $message The message.
     * @param Exception $previous The previous exception.
     */
    public function __construct($message, Exception $previous = null) {
        parent::__construct($message, $previous);
    }

}
