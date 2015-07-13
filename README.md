Yii2 GitHub Browser App
============================

Yii2 GitHub Browser App was built on Yii 2 Basic Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
rapidly creating small projects.

REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.4.0.


VIRTUAL HOST CONFIGURATION
---------------------------

1)	C:\Windows\System32\drivers\etc\hosts
    add lines:

~~~
    127.0.0.1       your-name-site.local
    127.0.0.1       www.your-name-site.local
~~~


2)	For your local server must change httpd-vhosts.conf.
    For example in my case find
    C:\wamp\bin\apache\apache2.4.9\conf\extra\httpd-vhosts.conf
    and add lines:

~~~
<VirtualHost *:80>
    DocumentRoot "c:/wamp/www/your-name-site/web/"
    ServerName your-name-site.local
	SetEnv APPLICATION_ENV "development"
	<Directory "c:/wamp/www/your-name-site/web/">
		DirectoryIndex index.php
		AllowOverride All
		Order allow,deny
		Allow from all
    </Directory>
</VirtualHost>
~~~


INSTALLATION
------------

### Step 1 - install APP from an Archive File

Click «Download ZIP» on https://github.com/alenkasun/yii2-github-browser and unzip in local site
…\your-name-site\, so you must receive the next structure in local site root::

~~~
  assets/             contains assets definition
  commands/           contains console commands (controllers)
  config/             contains application configurations
  controllers/        contains Web controller classes
  mail/               contains view files for e-mails
  models/             contains model classes
  runtime/            contains files generated during runtime
  tests/              contains various tests for the basic application
  vendor/             contains dependent 3rd-party packages
  views/              contains view files for the Web application
  web/                contains the entry script and Web resources
  ....
~~~


### Step 2 - install dependency libs via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

Install folder VENDOR with all dependency libs via Copmoser:
open cmd.exe in site root (shirt + command from context menu) and perform:

      - if composer was installed globally:

~~~
        composer self-update
        composer install
~~~

      - else:

~~~
        php composer.phar self-update
        php composer.phar install
~~~

As a result there is a folder VENDOR at site root.


DATABASE CONFIGURATION
-----------------------

###	Database installation

Create new BD and import github_browser.sql via convinient BD-client
(example: via phpMyAdmin or HeidiSql).


### Database config

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=github_browser',
    'username' => 'git',
    'password' => 'git',
    'charset' => 'utf8',
];
```

-----------------------------------------------------

Now you should be able to access the application through the following URL:

~~~
http://your-name-site.local/
~~~
