# PROJECT NAME : Link shortener

## GOAL : This is a test task for Profiliance Group

## HOW TO RUN

* ### Auto
    - Clone this repo ```git clone https://github.com/Yur-ok/profilance_group.git```
    - cd into *profilance_group*
    - if using **mysql** run command
        *  ```make setup```
        * open browser by the given link
    - if any other db run command
        * ```make setup_my_db```
        * open ```.env``` and configure your DB
        * run command ```make dev``` for start local development server
* ### Handy
    - Clone this repo ```git clone https://github.com/Yur-ok/profilance_group.git```
    - cd into *profilance_group*
    - run command ```composer create-project```
    - open ```.env``` and configure DB  ( **skip if you use mysql** )
    - run migration ```php artisan migrate```
    - then run local dev server ```php artisan serve```
    - open link in browser and check
