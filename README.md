Base Configuration
===================

Default Controller
--------------------
As standard this project is setup to automatically redirect to /admin/login.  This can be altered by changing the default_controller setting in application/config/routes.php

Config file
------------
Located in application/config/config.php.  There isn't much to change here these days, you can fill in the base_url if you like, and if you are using URL rewriting to get rid of the index.php from your URLs then you will want to set the index_page setting as a blank string too.

The main thing to change here is the encryption_key setting.  This is used to protect sessions and generate passwords.  

Database
----------
A sample database is included in the database.sql file.  This just contains an admin user table as otherwise you'll never be able to log in to the system.  You'll need to install the database in phpMyAdmin (or whatever you are using) and then alter the settings in application/config/database.php to get it working






* User setup
* Autoload
* Form Validation

Extensions
----------

* MY_Model
* MY_Form_validation
* Extra JS
* Extra CSS