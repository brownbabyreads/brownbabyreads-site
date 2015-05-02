# Install composer

class composer::install {

  package { "curl":
    ensure => installed,
  }

  exec { 'install composer':
    command => 'curl -sS https://getcomposer.org/installer | php && sudo mv composer.phar /usr/local/bin/composer',
    require => Package['curl'],
  }

  exec { 'generate composer.lock':
    command => 'composer install -d /vagrant --ignore-platform-reqs',
    environment => ['COMPOSER_HOME=/usr/local/bin'],
    require => Exec['install composer']
  }
}
