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
## Create database schema
```
vendor/bin/phinx migrate
```

## Seed the Database
```
vendor/bin/phinx seed:run
```

## Known issues
- Swagger installation is not working at the moment
- mbstring PHP extension is missing on the machine
- Add role to install composer
- Run composer when provisioning
- `zip` and `unzip` to system tools
- run phinx (`phinx install`?) after at the end to init DB
- set php.in and my.cnf to UTF8 to be able to use special characters in the data

# Backend Info #
## Authentication ##

### Login ###

| Name | Value |
| ------ | ------ |
| URL | /user/login |
| Method | POST |
| Body | application/json |
| Parameters | email, password |

*Example*
```
Request: 
POST carcada.local/user/login HTTP/1.0
{
  "email": "myemail@g.com",
  "password": "yourpassword"
}

Response: 
x-token: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MSwiZW1haWwiOiJhZ3VzdGluNzBAYmVlci5iaXoiLCJwYXNzd29yZCI6IiQyeSQxMiRkV1VocDc3RUZNTDZBVEpPV09JNTUub2RVZ1BibWx5cGJFaGtzdFdBLkU3QU9tUkxuaUpKZSIsImZpcnN0bmFtZSI6IldpbGJlcnQiLCJsYXN0bmFtZSI6Ild5bWFuIiwiaW1nIjpudWxsLCJ1c2VyUmF0aW5nIjoyLCJsYW5ndWFnZSI6IndhIn0.160GhOJbmmoszqVrmg1rVrpdVFTuaDR8Xu6_wzn_GHc
{
    "id": 1,
    "email": "agustin70@beer.biz",
    "password": "$2y$12$dWUhp77EFML6ATJOWOI55.odUgPbmlypbEhkstWA.E7AOmRLniJJe",
    "firstname": "Wilbert",
    "lastname": "Wyman",
    "img": null,
    "userRating": 2,
    "language": "wa"
}
```


### Authentication ###
Authorisation on all channels but the public ones and the login channel are secured through token. The token has to be passed as a header and the name is x-token. 

*Example*

```
GET /api/rides HTTP/1.0
x-token: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MSwiZW1haWwiOiJhZ3VzdGluNzBAYmVlci5iaXoiLCJwYXNzd29yZCI6IiQyeSQxMiRkV1VocDc3RUZNTDZBVEpPV09JNTUub2RVZ1BibWx5cGJFaGtzdFdBLkU3QU9tUkxuaUpKZSIsImZpcnN0bmFtZSI6IldpbGJlcnQiLCJsYXN0bmFtZSI6Ild5bWFuIiwiaW1nIjpudWxsLCJ1c2VyUmF0aW5nIjoyLCJsYW5ndWFnZSI6IndhIn0.160GhOJbmmoszqVrmg1rVrpdVFTuaDR8Xu6_wzn_GHc
```

### Filtering ###

## Ride Search ##

All parameters have to be present in the url as query parameters. Empty paraeters will be ignored (no results will be removed). The ride search is defined as follows

URL: /api/ridesearch
Method: GET
Parameters:

| Name | Parameter Type | Filter Type |  Example |
| ------ | ------ | ------ | ------ |
| from | string | Pattern | Karlsruhe |
| to | string | Pattern | Mü |
| travelDay | date | Match | 2019-01-01 |


*Example*
```
GET /api/ridesearch HTTP/1.0
