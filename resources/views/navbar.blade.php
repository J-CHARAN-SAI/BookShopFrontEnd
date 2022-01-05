<!DOCTYPE html>
<html>
<head>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #111;
        }

        .active {
            background-color: #04AA6D;
            margin: 0;
            padding: 15px;
            text-align: center;
        }


        input[type=text] {
            width: 20%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 5%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }


    </style>
</head>
<body>
<h2 class="active">Book Shop</h2>
<ul>


    <li><a href="/addBook">Add Book</a></li>
    <li><a href="/getBook">Get Book</a></li>
    <li><a href="/editBook">Edit Book</a></li>
    <li><a href="/deleteBook">Delete Book</a></li>
</ul>

</body>
</html>
