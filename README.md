# Installation

## System requirements
* ansible
* vagrant
* virtualbox

On MacOs X, you can run:
```
$ brew install ansible
$ brew casket install vagrant
$ brew casket install virtualbox
```


## Setup

### Personalisation file
Holds configuration, like hostname, IP address, etc.

You will need to add an entry into your `/etc/hosts` file with the hostname from the Personalisation file that points to the IP written mentioned in the `Personalisation` file.

### Start the virtual machine
```
vagrant up
```



## Known issues
- Swagger installation is not working at the moment
- mbstring PHP extension is missing on the machine
- Add role to install composer
- Run composer when provisioning
- `zip` and `unzip` to system tools
- run phinx (`phinx install`?) after at the end to init DB