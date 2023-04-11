This is Yii2 start application template.

It was created and developing as a fast start for building an advanced sites based on Yii2.

It covers typical use cases for a new project and will help you not to waste your time doing the same work in every project




`administrator` role account
```
Login: webmaster
Password: webmaster
```

`manager` role account
```
Login: manager
Password: manager
```

`user` role account
```
Login: user
Password: user
```


### console command

## Default app setup

php console/yii app/setup


### console script for getting all fruits

php console/yii fruits/fetch



#API
    FruitController.php
    Fruit model
    api/web.php


console\controllers\FruitsController.php
common\migrations\db\m230410_085002_create_fruits_table.php


Implemented fruit and favourite page implamentation

1. frontend\controllers\FruitController.php

2. common\models\Fruits.php

3. common\models\FruitsSearch.php

4. frontend\views\fruit\index.php


