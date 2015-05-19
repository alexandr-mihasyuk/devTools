# remineApiTools
Work with Redmine throught API

Now available creating branch by redmine issue number

## Cloning work copy
```
 $ git clone https://github.com/alexandr-mihasyuk/redmineApiTools.git
 $ cd redmineApiTools
 $ composer.phar update -o
```

## Usage

go to folder with redmineApiTools project
```
 $ cd path/to/redmineApiTools
```
copy config.local.sample.php to config.local.php (in git ignore)
```
 $ cp config.local.sample.php config.local.php
```
then edit values of constants
```
$ vim config.local.php
```
after editing local config create folder "bin" in your home dir
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
then go to your phoenix project directory and run tool
```
 $ createBranch --issue=999999
```
