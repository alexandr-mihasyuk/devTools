#!/bin/bash
runScript="$HOME/redmineApiTools/createBranch.php"
phpBin=`which php`
branchCreator="$phpBin $runScript"
gitRepoNameCmd=`git rev-parse --show-toplevel`
repoName=`basename $gitRepoNameCmd`
echo "repo: $repoName"
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
