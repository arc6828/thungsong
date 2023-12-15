# Thungsong : ML Flood by KU
<div align="center">
<img src="https://thungsongflood.org/img/LOGO_KU_Flood-01.png" width="400" />
</div>

This web application is build on top PHP Laravel Framework to visualize result data of water level and rain. Data come from 2 sources : thaiwater.net and our proposed machine learning model. This project divided into 2 parts: web application part and machine learning model part

## 1. Web Application Part

### Laravel Installation for development : Windows
#### Requied Softwares
1. `xampp`
1. `composer`
1. `git-scm` or `github-desktop` or both

#### Installation

```
cd c:\xampp\htdocs
git clone https://github.com/arc6828/thungsong
cd thungsong
composer install
copy .env.example .env
php artisan key:generate
```

#### Run on local
```
php artisan serve
```

### Remeark
Deploy by using git


## 2. Machine Learning Model Part

### How does it work
1. Schedule every hour by window Task Scheduler 
1. Call secondary data from `thaiwater.net` API
1. Run machine learning model on Python Jupyter
1. Result place on folder `output`
    1. image (.png)
    1. data (.csv)
    1. metadata (.json)
    1. other information (.json)
1. Gether all results and send to S3
1. Visulization on web service



### papermill
- Papermill is a tool for parameterizing and executing Jupyter Notebooks.

```
# https://papermill.readthedocs.io/en/latest/installation.html
pip install papermill

# normal run
papermill Test.ipynb Testoutput.ipynb
# or run with some parameters
papermill local/input.ipynb s3://bkt/output.ipynb -p alpha 0.6 -p l1_ratio 0.1
```


## Line Developer Console
- Config Page
https://developers.line.biz/console/channel/2000317971/messaging-api

- Webhook production
https://developers.line.biz/console/channel/2000317971/messaging-api
https://www.thungsong.org/api/line/webhook


- Webhook development
https://developers.line.biz/console/channel/1656209501/messaging-api
https://ef45-202-29-39-122.ngrok-free.app/api/line/webhook

https://bcd8-202-29-39-122.ngrok-free.app/api/line/webhook

## S3 compatible upload file
```
composer require --with-all-dependencies league/flysystem-aws-s3-v3 "^1.0"
```


## CRUD generator
```
php artisan crud:generate Post --fields_from_file="resources/crud-generator/json/Post.json"
```