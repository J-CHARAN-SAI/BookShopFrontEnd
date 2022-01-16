<!DOCTYPE html>
<html>
<head>
    <style>
        ul {
            list-style-type: none;
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
            text-decoration: none;
        }

        .header {
            background-color: cadetblue;
            margin: 0;
            padding: 15px;
            text-align: center;
        }


        input[type=text] {
            width: 40%;
            padding:8px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;

        }

        input[type=submit] {
            width: 7%;
            background-color: #4CAF50;
            color: white;
            padding: 8px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
        }

        input[type=submit]:hover {
            background-color: #45a049;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: center;
            padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2}

        th {
            background-color: #04AA6D;
            color: white;
        }

    </style>
</head>
<body>
<h1 class="header" >Book Shop</h1>
<ul>

    <li><a href="/addBook">Add Book</a></li>
    <li><a href="/getBook">Search Book</a></li>
</ul>
</body>
</html>
