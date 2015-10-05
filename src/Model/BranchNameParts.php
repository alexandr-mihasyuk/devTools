<?php

namespace Model;

use Exception\NotStringArgumentException;

/**
 * Class BranchNameParts
 * @package Model
 */
class BranchNameParts implements BranchNamePartsInterface
{
    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var string
     */
    private $issueId;

    /**
     * @var string
     */
    private $prefix;

    /**
     * @var string
     */
    private $surname;

    /**
     * @var string
     */
    private $department;

    /**
     * @var string
     */
    private $issueTitle;

    /**
     * BranchNameParts constructor.
     * @param \DateTime $date
     * @param string $department
     * @param string $issueId
     * @param string $prefix
     * @param string $surname
     * @param string $issueTitle
     */
    public function __construct(\DateTime $date, $department, $issueId, $prefix, $surname, $issueTitle)
    {
        if (!is_string($department)) {
            throw new NotStringArgumentException('$department');
        }

        $this->department = $department;

        if (!is_string($issueId)) {
            throw new NotStringArgumentException('$issueId');
        }

        $this->issueId = $issueId;

        if (!is_string($prefix)) {
            throw new NotStringArgumentException('$prefix');
        }

        $this->prefix = $prefix;

        if (!is_string($surname)) {
            throw new NotStringArgumentException('$surname');
        }

        $this->surname = $surname;

        if (!is_string($issueTitle)) {
            throw new NotStringArgumentException('$issueTitle');
        }

        $this->issueTitle = $issueTitle;

        $this->date = $date;
    }


    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @return string
     */
    public function getIssueId()
    {
        return $this->issueId;
    }

    /**
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @return string
     */
    public function getIssueTitle()
    {
        return $this->issueTitle;
    }
}