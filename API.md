# Connect Laravel backend to Vue Frontend

## Understand API / Routers in Vue Frontend

Soybean Admin借助 Apifox 的云端mock功能实现mock请求，接口文档：[soybean-admin-mock](https://docs.soybeanjs.cn/zh/guide/quick-start.html)

### Use APIfox for API design and test

To better design and test API, it would be good to use [APIfox](https://app.apifox.com/) to design and test APIs for both frontend and backend

setup a project in apifox.
[image] (apifox-1.jpg)

### User Authentication 

design api for user authentication

### Ticket Management

Design a ticket management system, so create a model and controller for Ticket.

```php
php artsian make:model Ticket -m -c --api
```

it will create app/Models/Ticket.php and TicketController.php

```bash

   INFO  Model [app/Models/Ticket.php] created successfully.  

   INFO  Migration [database/migrations/2024_12_18_093116_create_tickets_table.php] created successfully.  

   INFO  Controller [app/Http/Controllers/TicketController.php] created successfully.  
````
