OVERNIGHT CHALLENGE!
=========

```
   _____                        __     _____            _       __
  / ___/____  _________  __  __/ /_   / ___/____  _____(_)___ _/ /
  \__ \/ __ \/ ___/ __ \/ / / / __/   \__ \/ __ \/ ___/ / __ `/ / 
 ___/ / /_/ / /  / /_/ / /_/ / /_    ___/ / /_/ / /__/ / /_/ / /  
/____/ .___/_/   \____/\__,_/\__/   /____/\____/\___/_/\__,_/_/   
    /_/                                                                                                                 
```

Live Heroku app url: https://powerful-brushlands-6518.herokuapp.com/wp-admin/index.php

Installation
------------

See [SETUP_README.md](SETUP_README.md)


Running Locally
---------------

A Vagrant instance to run Heroku WP is included. To get up and running:
* Install vagrant http://www.vagrantup.com/downloads
* Install vitrual box https://www.virtualbox.org/wiki/Downloads 
* Install virtual box extension pack https://www.virtualbox.org/wiki/Downloads 
* `cd` into app root directory and run `$ vagrant up` (should start setting up virtual env. go grab some ☕, takes about 10 minutes)

Once Vagrant provisions the VM you will have Heroku WP running locally at `http://herokuwp.local/`. On first load, it should bring you to the wordpress install page. If the site is not accessible in the browser, you might need to add `192.168.50.100  herokuwp.local` to your hosts file.

As a convenience both the `/public` dir and `/composer.lock` file will be monitored by the VM. Any changes to either triggers a rebuild process which will result in `/public.built` (the web root) being updated.


If your computer goes to sleep and vagrant is suspended abruptly
----------------

Sometimes after `vagrant up` from a aborted state, the vm does not start correctly and the site is not accessible. 
* Provision the machine `vagrant provision` to force it to start back up again

Run theme locally
----------------

cd into the theme directory (`public/wp-content/themes/sprout-challenge`)
run `npm install`
run `grunt dev to watch changes`


Update Composer locally
----------------

To add new plugins or upgrade versions of plugins simply update the `composer.json` file and then generate the `composer.lock` file with the following command locally:

First `vagrant ssh`

Then `cd /app/` on vagrant

Then:

```bash
$ composer update --ignore-platform-reqs
```