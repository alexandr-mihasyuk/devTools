#!/bin/bash
runScript="$HOME/redmineApiTools/branchDiff.php"
phpBin=`which php`
branchDiffScript="$phpBin $runScript"
masterBranch='origin/live'
branch=`git rev-parse --abbrev-ref HEAD`
diffFileName="$branch.diff"
dir=${PWD}
git remote update
git merge origin/live --no-ff
git push origin $branch
echo "Creating diff in $dir/$diffFileName"
git diff $masterBranch "origin/$branch" > $diffFileName
#echo $dir
$branchDiffScript $diffFileName $dir
#echo $branch