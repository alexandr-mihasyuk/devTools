<?php
require_once 'vendor/autoload.php';
require_once 'config.local.php';
$client = new Redmine\Client(\Config::REDMINE_URL, \Config::REDMINE_API_KEY);

if (empty($argv[1]) || !is_string($argv[1])) {
    throw new \LogicException(__FILE__.' invalid first argument for this file', 500);
}
if (empty($argv[2]) || !is_string($argv[2])) {
    throw new \LogicException(__FILE__.' invalid second argument for this file', 500);
}

$diffFileName = $argv[1];
$dir = $argv[2];

$matches = explode('-', $diffFileName);
$matches = explode("_", $matches[4]);
$issueId = $matches[0];
$branchDiffApply = new BranchDiffAttach($client);

$branchDiffApply->run($dir, $diffFileName, (int)$issueId);

class BranchDiffAttach
{
    private $client;

    public function __construct($redmineClient)
    {
        $this->client = $redmineClient;
    }

    public function run($path, $diffFileName, $issueId)
    {
        $pathToDiff = $path.DIRECTORY_SEPARATOR.$diffFileName;
        if (!is_string($pathToDiff)) {
            throw new \InvalidArgumentException(__METHOD__.' invalid type of argument $pathToDiff', 500);
        }
        if (!is_int($issueId)) {
            throw new \InvalidArgumentException(__METHOD__.' invalid type of argument $issueId', 500);
        }
        $this->printMsg('Attaching diff file to issue #'.$issueId.'...');

        $client = $this->client;
        $filecontent = file_get_contents($pathToDiff);
        $upload = json_decode($client->api('attachment')->upload($filecontent));
        $client->api('issue')->attach($issueId, array(
            'token' => $upload->upload->token,
            'filename' => $diffFileName,
            'description' => '',
            'content_type' => 'text/plain',
        ));
        $this->printMsg('Done!');
    }

    private function printMsg($msg)
    {
        print sprintf(__CLASS__.": %s\n", $msg);
    }
}