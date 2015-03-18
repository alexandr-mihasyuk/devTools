#!/bin/bash
runScript="$HOME/redmineApiTools/createBranch.php"
phpBin=`which php`
branchCreator="$phpBin $runScript"
echo "+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++"
echo "Creating branch name..."
branch=`$branchCreator $@`
echo "Branch name is $branch"
echo "+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++"

git stash
git remote update
git checkout -b $branch origin/live --track
git push origin $branch
git stash pop
