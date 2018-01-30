<?php

/**
 * This file is part of the skidata-library package.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\SkiData\Entity;

use DateTime;

/**
 * SkiData start record rormat entity.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Library\SkiData\Entity
 * @final
 */
final class SkiDataStartRecordFormatEntity {

    /**
     * Currency.
     *
     * @var string
     */
    private $currency;

    /**
     * Date of file.
     *
     * @var DateTime
     */
    private $dateFile;

    /**
     * Facility number
     *
     * @var integer
     */
    private $facilityNumber;

    /**
     * Number of records.
     *
     * @var integer
     */
    private $numberRecords;

    /**
     * Version of record structure.
     *
     * @var integer
     */
    private $versionRecordStructure;

    /**
     * Constructor.
     */
    public function __construct() {
        // NOTHING TO DO.
    }

    /**
     * Get the currency.
     *
     * @return string Returns the currency.
     */
    public function getCurrency() {
        return $this->currency;
    }

    /**
     * Get the date of file.
     *
     * @return DateTime Returns the date of file.
     */
    public function getDateFile() {
        return $this->dateFile;
    }

    /**
     * Get the facility number.
     *
     * @return integer Returns the facility number.
     */
    public function getFacilityNumber() {
        return $this->facilityNumber;
    }

    /**
     * Get the number of records.
     *
     * @return integer Returns the number of records.
     */
    public function getNumberRecords() {
        return $this->numberRecords;
    }

    /**
     * Get the version of record structure.
     *
     * @return integer Returns the version of record structure.
     */
    public function getVersionRecordStructure() {
        return $this->versionRecordStructure;
    }

    /**
     * Set the currency.
     *
     * @param string $currency The currency.
     * @return SkiDataStartRecordFormatEntity Returns the SkiData start record format entity.
     */
    public function setCurrency($currency) {
        $this->currency = $currency;
        return $this;
    }

    /**
     * Set the date of file.
     *
     * @param DateTime $dateFile The date of file.
     * @return SkiDataStartRecordFormatEntity Returns the SkiData start record format entity.
     */
    public function setDateFile(DateTime $dateFile = null) {
        $this->dateFile = $dateFile;
        return $this;
    }

    /**
     * Set the facility number.
     *
     * @param integer $facilityNumber The facility number.
     * @return SkiDataStartRecordFormatEntity Returns the SkiData start record format entity.
     */
    public function setFacilityNumber($facilityNumber) {
        $this->facilityNumber = $facilityNumber;
        return $this;
    }

    /**
     * Set the number of records.
     *
     * @param integer $numberRecords The number of records.
     * @return SkiDataStartRecordFormatEntity Returns the SkiData start record format entity.
     */
    public function setNumberRecords($numberRecords) {
        $this->numberRecords = $numberRecords;
        return $this;
    }

    /**
     * Set the version of record structure.
     *
     * @param integer $versionRecordStructure The version of record structure.
     * @return SkiDataStartRecordFormatEntity Returns the SkiData start record format entity.
     */
    public function setVersionRecordStructure($versionRecordStructure) {
        $this->versionRecordStructure = $versionRecordStructure;
        return $this;
    }

}
