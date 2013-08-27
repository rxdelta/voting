Voting
======

Hidden voting system that originally made for SAMPAD commiunity. 

No one, even who is access to DB can not know who vote whom.


INSTALL
-------

To install make a clone
go to php_headers folder
make a file named vars.php and put configuration in (sample file named vars-sample.php)
create a database and import structure in (clean & contain sample data sql files are located in root)

run "update user set `password`=md5('admin123') where id=1;" query then
it is ready to login as admin using password 123

TODO
----


* Add/Edit user/candidate/voter/election interfaces
* Add interface to assign candidates/voters to specific election
* Improve show result interface
* Add SMS System support for notification

