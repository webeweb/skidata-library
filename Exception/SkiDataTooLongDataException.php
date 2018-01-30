<?php

/**
 * This file is part of the skidata-library package.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\SkiData\Exception;

/**
 * SkiData too long data exception.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Library\SkiData\Exception
 * @final
 */
final class SkiDataTooLongDataException extends AbstractSkiDataException {

    /**
     * Constructor.
     *
     * @param string $value The value.
     * @param integer $length The length.
     */
    public function __construct($value, $length) {
        parent::__construct("The data \"" . $value . "\" exceeds the length \"" . $length . "\" allowed");
    }

}
