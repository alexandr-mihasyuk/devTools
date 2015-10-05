<?php

namespace Tests\Unit\Model;

use Model\BranchNameParts;
use PhpUnitPlus\Lib\Component\InputDataChecker;
use PhpUnitPlus\Lib\Util\Simple\AnyString;
use PhpUnitPlus\Lib\Util\Simple\TypeHintingInput;

class BranchNamePartsTest extends \PHPUnit_Framework_TestCase
{
    use InputDataChecker;

    public function testConstruct()
    {
        $date = new TypeHintingInput(new \DateTime);
        $department = new AnyString();
        $issueId = new AnyString();
        $prefix = new AnyString();
        $surname = new AnyString();
        $issueTitle = new AnyString();

        $this->checkInputData(
            [
                $date,
                $department,
                $issueId,
                $prefix,
                $surname,
                $issueTitle,
            ],
            function (
                $date,
                $department,
                $issueId,
                $prefix,
                $surname,
                $issueTitle
            ) {
                $model = new BranchNameParts(
                    $date,
                    $department,
                    $issueId,
                    $prefix,
                    $surname,
                    $issueTitle
                );

                $this->assertEquals($date, $model->getDate());
                $this->assertEquals($department, $model->getDepartment());
                $this->assertEquals($issueId, $model->getIssueId());
                $this->assertEquals($prefix, $model->getPrefix());
                $this->assertEquals($surname, $model->getSurname());
                $this->assertEquals($issueTitle, $model->getIssueTitle());
            }
        );

    }
}
