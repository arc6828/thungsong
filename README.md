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

### Deployment on Server : Shared Host
#### Deployment on initital state
This is the deployment when the server is empty
1. zipped your entire project
1. send your zipped file to your server, use `file zilla`
1. extract your zipped file on server
1. write .htaccess to set root on folder `public`

#### Deployment on update state
This is the deployment when there is a previous version of project in server
1. use `file zilla`
1. place or replace your `new` or `updated` files

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

## Thanks
thanks for `https://markdownlivepreview.com/`