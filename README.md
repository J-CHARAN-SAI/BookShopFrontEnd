## Overview

Creating a BookShop API, where users are able to Add, Edit, Update & Delete the book details.

## API

Below is a list of API endpoints with their respective input and output. Please note that the application needs to be running. For more information about how to run the application, please refer to [run the application](#run-the-application) section below.

### Add Book

Endpoint

```
POST /books
```

Example of body

```json
{
    "title" : "The Last Song",
    "price" : 300,
    "author" : {
        "first_name" : "John",
        "last_name" : "Robert" ,
        "email" : "whitefalcon@gmail.com"
    }
}
```

Parameters

| Parameter      | Description                                |
| -------------- | ------------------------------------------ |
| `title` | Title of the book   |
| `price`         | Price of the book      |
| `author:first_name`      | Author's first name of the book |
| `author:last_name`      | Author's last name of the book |
| `author:email`      | Author's email id of the book |

Posting readings using CURL

```console
$ curl \
  -X POST \
  -H "Content-Type: application/json" \
  "http://localhost:8000/books" \
  -d '{"title": "The Last Song", "price": 100,"author": {"first_name": "John","last_name": "Robert","email": "whitefalcon@gmail.com"}}'
}
```

The above command returns 200 OK and `{Book is added successfully}`.

### Get Book Details

Endpoint

```
GET /books/<bookId>
```

Parameters

| Parameter      | Description                              |
| -------------- | ---------------------------------------- |
| `bookId` | One of the book id available in Books table |

Retrieving readings using CURL

```console
$ curl "http://localhost:8000/books/2"
```

Example output

```json
{
    "Title": "The Last Drink",
    "Price": 1000,
    "Author": {
        "first_name": "John",
        "last_name": "Robert",
        "email": "whitefalcon@gmail.com"
    }
}
```

### Update Book details

Endpoint

```
PUT /books/<bookId>
```

Parameters

| Parameter      | Description                              |
| -------------- | ---------------------------------------- |
| `bookId` | One of the book id available in Books table |

Retrieving readings using CURL

```console
$ curl \
  -X PUT \
  -H "Content-Type: application/json" \
  "http://localhost:8000/books/2" \
  -d '{"title": "The Last Song", "price": 300}'
}
```

The above command returns 200 OK and `{Book is updated successfully}`.


### Delete Book

Endpoint

```
DELETE /books/<bookId>
```

Parameters

| Parameter      | Description                              |
| -------------- | ---------------------------------------- |
| `bookId` | One of the book id available in Books table |

Retrieving readings using CURL

```console
$ curl "http://localhost:8000/books/2"
```
The above command returns 200 OK and `{Book is deleted successfully}`.

Compatible IDEs

Tested on:

- Visual Studio Code(with PHP Intelephense & PHPUnit extension)
- IntelliJ IDEA Ultimate

## Useful commands

### Build & Run the project

```terminal
$ ./deploy-bookshop.php

Above command will start the application on url `http://127.0.0.1:8000`.
```

### Run the tests

```terminal
$ php artisan test
```

