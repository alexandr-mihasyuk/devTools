# remineApiTools
Work with Redmine throught API

Now available creating branch by redmine issue number

## Cloning work copy
```
 $ git clone https://github.com/alexandr-mihasyuk/redmineApiTools.git
 $ cd redmineApiTools
 $ composer update -o
```

## Usage

create folder "bin" in your home dir
```
 $ cd ~
 $ mkdir bin
```
make symlink to shell script from redmineApiTools
```
 $ ln -s absolute/path/to/redmineApiTools/createBranch.sh ~/bin/createBranch
```
make executable new link
```
 $ chmod +x ~/bin/createBranch
```
go to folder with project
```
 $ cd path/to/project
```
copy config.local.sample.php to config.local.php (in git ignore) and edit values of constants
```
 $ cp config.local.sample.php config.local.php
```
then run tool
```
 $ createBranch --issue=999999
```