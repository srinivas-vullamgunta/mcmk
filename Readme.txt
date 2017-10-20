1. I have installed Symfony 3 by using composer.
2. For databse I have used MySQL.
3. I am sending only app and src folder remian all are same symfony structure files. there is no changes.
4. Please copy my files and databse on symfony struture then everything working fine.

--------------------
Could you please check app and src folder for my modifications

For database
1. I have modified parameters.yml
path is app/config/parameters.yml

For routing
I have used this app/config/routing.yml 

Currently I am using below routings

last3days_list:
    path:     /last3days/list
    defaults: { _controller: AppBundle:Last3days:list }

last3days_show:
    path:     /last3days/show
    defaults: { _controller: AppBundle:Last3days:show }

neo_hazardous:
    path:     /neo/hazardous
    defaults: { _controller: AppBundle:Neo:hazardous }


neo_fastest:
    path:     /neo/fastest/hazardous={hazardous}
    defaults: { _controller: AppBundle:Neo:fastest, hazardous:"false"}


neo_bestyear:
    path:     /neo/best-year/hazardous={hazardous}
    defaults: { _controller: AppBundle:Neo:bestyear, hazardous:"false"}

neo_bestmonth:
    path:     /neo/best-month/hazardous={hazardous}
    defaults: { _controller: AppBundle:Neo:bestmonth, hazardous:"false"}
===========================================================================
I have created 3 controllers,  path is /src/AppBundle/Controller
1. DefaultController.php  
This controller contains the logic of "hello world"
2. Last3daysController.php
This controller contains the logic of the 3 days data from current date.

3. NeoController.php

This controller contains the logic of below functions
1. hazardous based on the true of false
2. name of the fastest asteriods
3. best year of the asteriods
4. best month of the asteriods.

path is /src/AppBundle/Entiry
I have created 1 entiry model Neaearthobjects.php

mcmakler.sql  contains database of the this task.








