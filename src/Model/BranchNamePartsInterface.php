<?php
namespace Model;

/**
 * Interface BranchNamePartsInterface
 * @package Model
 */
interface BranchNamePartsInterface
{
    /**
     * @return \DateTime
     */
    public function getDate();

    /**
     * @return string
     */
    public function getDepartment();

    /**
     * @return string
     */
    public function getIssueId();

    /**
     * @return string
     */
    public function getPrefix();

    /**
     * @return string
     */
    public function getSurname();

    /**
     * @return string
     */
    public function getIssueTitle();
}