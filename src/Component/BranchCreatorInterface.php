<?php
namespace Component;

interface BranchCreatorInterface
{
    public function run();

    /**
     * @return string
     */
    public function issuePreparedTitle();

    /**
     * @return void
     */
    public function updateIssue();

    /**
     * @return
     */
    public function setAssignedTo();

    /**
     * @return
     */
    public function setImplementer();

    /**
     * @return string
     */
    public function getBranchName();

    /**
     * @return string
     */
    public function getBranchDepartment();
}