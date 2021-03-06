<?php
require_once 'vendor/autoload.php';
require_once 'config.local.php';
$client = new Redmine\Client(\Config::REDMINE_URL, \Config::REDMINE_API_KEY);
preg_match('/\-\-issue=(\d+)/iums', $argv[1], $matches);
$issueId = (int)$matches[1];

$branchCreator = new BranchCreator(new \DateTime, $client, $issueId);

print $branchCreator->run();

class BranchCreator
{
    const BRANCH_FORMAT_DATE = 'Ymd';

    const BRANCH_FORMAT_PREFIX = 'dev';

    const BRANCH_FORMAT_SURNAME = \Config::BRANCH_FORMAT_SURNAME;

    const BRANCH_FORMAT_DEPARTMENT = \Config::BRANCH_FORMAT_DEPARTMENT;

    /**
     * @var Redmine\Client
     */
    private $redmineClient;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var int
     */
    private $issueId;

    /**
     * @var string
     */
    private $branchName;

    /**
     * @var array
     */
    private $redmineData;

    /**
     * @param DateTime $date
     * @param \Redmine\Client $redmineClient
     * @param int $issueId
     */
    public function __construct(\DateTime $date, Redmine\Client $redmineClient, $issueId)
    {
        $this->date = $date;
        $this->redmineClient = $redmineClient;
        $this->issueId = $issueId;
    }

    public function run()
    {
        $branchName = $this->getBranchName();
        $this->setRedmineBranch($branchName);
        $this->setRedmineStatus('In Progress');
        $this->setRedmineAssignedTo();
        $this->setRedmineImplementer();
        $this->updateRedmineIssue();

        return $branchName;
    }

    private function generateName()
    {
        $branchName = $this->branchPrefix();
        $branchName .= '-';
        $branchName .= $this->branchDate();
        $branchName .= '-';
        $branchName .= $this->branchSurname();
	$branchName .= '-';
	$branchName .= $this->getBranchDepartment();
	$branchName .= '-';
        $branchName .= $this->issueId;
        $branchName .= '_';
        $branchName .= $this->issuePreparedTitle();

        return $branchName;
    }

    /**
     * @return string
     */
    public function issuePreparedTitle()
    {
        $issueTitle = trim($this->getIssueTitle(), '$&^:_ .,[](){}');
        $issueTitle = strtolower($issueTitle);
        $issueTitle = preg_replace('/\W/', '_', $issueTitle);
        $issueTitle = preg_replace('/_+/', '_', $issueTitle);

        return $issueTitle;
    }

    /**
     * @param string $branchName
     */
    private function setRedmineBranch($branchName)
    {
        $this->redmineData['custom_fields'][3] = [
                    'id'=>1,
                    'value'=>$branchName
                ];
    }

    private function setRedmineStatus($status)
    {
        $statusId = $this->redmineClient->api('issue_status')->getIdByName($status);
        $this->redmineData['status_id'] = $statusId;
    }

    public function updateRedmineIssue()
    {
        $this->redmineClient->api('issue')->update($this->issueId, $this->redmineData);
    }

    public function setRedmineAssignedTo()
    {
        $userData = $this->redmineClient->api('user')->getCurrentUser();
        $this->redmineData['assigned_to_id'] = $userData['user']['id'];
    }

    public function setRedmineImplementer()
    {
        $userData = $this->redmineClient->api('user')->getCurrentUser();
        $this->redmineData['custom_fields'][0] = [
                    'id'=>99,
                    'value'=>$userData['user']['id']
                ];
    }

    /**
     * @return string
     */
    private function getIssueTitle()
    {
        $result = 'no title';
        $issue = $this->redmineClient->api('issue')->show($this->issueId);

        if (!empty($issue['issue']['subject'])) {
            $result = $issue['issue']['subject'];
        }
        return $result;
    }

    /**
     * @return string
     */
    private function branchPrefix()
    {
        return self::BRANCH_FORMAT_PREFIX;
    }

    /**
     * @return string
     */
    private function branchSurname()
    {
        return self::BRANCH_FORMAT_SURNAME;
    }

    /**
     * @return string
     */
    private function branchDate()
    {
        return $this->date->format(self::BRANCH_FORMAT_DATE);
    }

    /**
     * @return string
     */
    public function getBranchName()
    {
        if (!$this->branchName) {
            $this->branchName = $this->generateName();
        }
        return $this->branchName;
    }

    /**
     * @return string
     */
    public function getBranchDepartment()
    {
        return self::BRANCH_FORMAT_DEPARTMENT;
    }

}
