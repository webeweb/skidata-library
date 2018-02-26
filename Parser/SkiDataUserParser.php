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

use WBW\Library\Core\Utility\BooleanUtility;
use WBW\Library\SkiData\Entity\SkiDataUser;

/**
 * SkiDataUserParser
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Library\SkiData\Parser
 * @final
 */
final class SkiDataUserParser extends AbstractSkiDataParser {

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Parse a SkiData user entity.
     *
     * @param SkiDataUser $entity The SkiData user entity.
     * @return string Returns the parsed SkiData user entity.
     */
    public function parseEntity(SkiDataUser $entity) {

        // Initialise the output.
        $output = [];

        $output[] = $this->encodeInteger($entity->getUserNumber(), 9);
        $output[] = $this->encodeInteger($entity->getCustomerNumber(), 9);
        $output[] = $this->encodeString($entity->getTitle(), 10);
        $output[] = $this->encodeString($entity->getSurname(), 25);
        $output[] = $this->encodeString($entity->getFirstname(), 25);
        $output[] = $this->encodeDate($entity->getDateBirth());
        $output[] = $this->encodeString($entity->getParkingSpace(), 5);
        $output[] = $this->encodeString($entity->getRemarks(), 50);
        $output[] = $this->encodeDateTime($entity->getDatetimeLastModification());
        $output[] = $this->encodeBoolean($entity->getDeletedRecord());
        $output[] = $this->encodeString($entity->getIdentificationNumber(), 20);
        $output[] = $this->encodeBoolean($entity->getCheckLicensePlate());
        $output[] = $this->encodeBoolean($entity->getPassageLicensePlatePermitted());
        $output[] = $this->encodeBoolean($entity->getExcessTimesCreditCard());
        $output[] = $this->encodeString($entity->getCreditCardNumber(), 20);
        $output[] = $this->encodeDate($entity->getExpiryDate());
        $output[] = $this->encodeString($entity->getRemarks2(), 50);
        $output[] = $this->encodeString($entity->getRemarks3(), 50);
        $output[] = $this->encodeString($entity->getDivision(), 50);
        $output[] = $this->encodeString($entity->getEmail(), 120);
        $output[] = $this->encodeBoolean($entity->getGroupCounting());
        $output[] = $this->encodeInteger($entity->getETicketTypeP(), 1);
        $output[] = $this->encodeString($entity->getETicketEmailTelephone(), 120);
        $output[] = $this->encodeInteger($entity->getETicketAuthentication(), 1);
        $output[] = $this->encodeInteger($entity->getETicketServiceTyp(), 1);
        $output[] = $this->encodeInteger($entity->getETicketServiceArt(), 1);

        // Return the output.
        return implode(";", $output);
    }

    /**
     * Parse a line.
     *
     * @param string $line The line.
     * @return SkiDataUser Returns a SkiData user entity.
     */
    public function parseLine($line) {

        // Split the line.
        $data = explode(";", $line);
        $i    = 0;

        // Initialize the entity.
        $entity = new SkiDataUser();

        $entity->setUserNumber($this->decodeInteger($data[$i++]));
        $entity->setCustomerNumber($this->decodeInteger($data[$i++]));
        $entity->setTitle($this->decodeString($data[$i++]));
        $entity->setSurname($this->decodeString($data[$i++]));
        $entity->setFirstname($this->decodeString($data[$i++]));
        $entity->setDateBirth($this->decodeDate($data[$i++]));
        $entity->setParkingSpace($this->decodeString($data[$i++]));
        $entity->setRemarks($this->decodeString($data[$i++]));
        $entity->setDatetimeLastModification($this->decodeDateTime($data[$i++]));
        $entity->setDeletedRecord(BooleanUtility::parseString($data[$i++]));
        $entity->setIdentificationNumber($this->decodeString($data[$i++]));
        $entity->setCheckLicensePlate(BooleanUtility::parseString($data[$i++]));
        $entity->setPassageLicensePlatePermitted(BooleanUtility::parseString($data[$i++]));
        $entity->setExcessTimesCreditCard(BooleanUtility::parseString($data[$i++]));
        $entity->setCreditCardNumber($this->decodeString($data[$i++]));
        $entity->setExpiryDate($this->decodeDate($data[$i++]));
        $entity->setRemarks2($this->decodeString($data[$i++]));
        $entity->setRemarks3($this->decodeString($data[$i++]));
        $entity->setDivision($this->decodeString($data[$i++]));
        $entity->setEmail($this->decodeString($data[$i++]));
        $entity->setGroupCounting(BooleanUtility::parseString($data[$i++]));
        $entity->setETicketTypeP($this->decodeInteger($data[$i++]));
        $entity->setETicketEmailTelephone($this->decodeString($data[$i++]));
        $entity->setETicketAuthentication($this->decodeInteger($data[$i++]));
        $entity->setETicketServiceTyp($this->decodeInteger($data[$i++]));
        $entity->setETicketServiceArt($this->decodeInteger($data[$i++]));

        // Return the entity.
        return $entity;
    }

}
