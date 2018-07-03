# Installation

## Requirements
* Docker Community Edition ([link](https://www.docker.com/community-edition))
* Bash shell for running the initial setup script

## Setup
If you are setting up the machine for the first time, please run

```sh
$ . setup.sh
```

This will take a while because the database is initialised and then the app image is being build and launched.


## Manage the app

After running `setup.sh`, there are two container running on your machine:
* carcada_database
* carcada_app

### Stop a container
```sh
docker kill <container_name>
```

### Start a container
Use the commands that are being used in `setup.sh`.

**Note:**
* Make sure that you launch the database container before the application container.
* After launching the database, you need to initialise the database by running the commands at the end of  `setup.sh`


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
| seats | integer | >= | 2 |


*Example*
```
GET /api/ridesearch?from=Mu&to=&travelDay=2019-01-01 HTTP/1.0
```

# Leftovers from the Vagrant setup

## Known issues
- Swagger installation is not working at the moment
- mbstring PHP extension is missing on the machine
- Add role to install composer
- Run composer when provisioning
- `zip` and `unzip` to system tools
- run phinx (`phinx install`?) after at the end to init DB
- set php.in and my.cnf to UTF8 to be able to use special characters in the data
