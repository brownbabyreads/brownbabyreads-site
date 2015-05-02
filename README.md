# OVERNIGHT CHALLENGE!

```
   _____                        __     _____            _       __
  / ___/____  _________  __  __/ /_   / ___/____  _____(_)___ _/ /
  \__ \/ __ \/ ___/ __ \/ / / / __/   \__ \/ __ \/ ___/ / __ `/ / 
 ___/ / /_/ / /  / /_/ / /_/ / /_    ___/ / /_/ / /__/ / /_/ / /  
/____/ .___/_/   \____/\__,_/\__/   /____/\____/\___/_/\__,_/_/   
    /_/                                                                                                                 
```

Live Heroku: http://polar-cove-8788.herokuapp.com/

## Get started

Start by cloning this repo:

```bash
git clone git@github.com:ericcecchi/overnight-website.git
cd overnight-website
```

And then set up a dev branch for yourself:

```bash
git checkout -b you-dev
git push -u origin you-dev
```

## Running WordPress Locally

### With vagrant

Make sure you have [vagrant and virtualbox already installed](#vagrant-and-virtualbox). Then:

```bash
vagrant plugin install vagrant-hostsupdater
vagrant up
open http://overnight.dev
```

### With MAMP

Read [Installing WordPress Locally on Your Mac With MAMP](https://codex.wordpress.org/Installing_WordPress_Locally_on_Your_Mac_With_MAMP).

Configure with these [MAMP settings](http://bluetide.pro/o1a9/53YjQuDF).

Setup MAMP database:

* http://localhost/phpmyadmin/
* Create database and name it `wordpress`
* Create a user `wordpress` with password `wordpress` with access to the `wordpress` database
* `wordpress wordpress wordpress`

## Making changes to the theme

We're using npm to manange packages and grunt to automate the build process.

```bash
cd wordpress/wp-content/themes/sprout-challenge
npm install
grunt dev
```

## Deploying

Just commit and push. Everyone is working off they're own dev branch and submitting PR's to master. Master is automatically deployed to heroku.

## vagrant and virtualbox

If you don't have vagrant and virtualbox already installed, you will after these steps:

```bash
brew tap phinze/homebrew-cask && brew install brew-cask
brew cask install vagrant virtualbox
```
