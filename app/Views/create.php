<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website with Sidebar</title>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

        .sidebar {
            height: 50%;
            width: 250px;
            position: absolute;
            left: 0;
            background-color: #111;
            padding-top: 20px;
            padding-left: 10px;
            color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        }

        .sidebar a {
            padding: 8px;
            text-decoration: none;
            font-size: 20px;
            color: #818181;
            display: block;
        }

        .sidebar a:hover {
            color: #f1f1f1;
        }

        .content {
            position: absolute;
            right: 0;
            top: 10%;
            padding: 150px;
            height: 100vh;
            border: 2px solid black;
            width: 70rem;


        }

        /* td,th{
           
            padding:8px;
            text-align:left;
            border:4px solid black;
        }
         */
        .table-container {
            display: none;
        }

        /* th {
            background-color: #f2f2f2;
            border:4px solid black;
        } */

        .table-container.show {
            display: block;
        }

        .table-container.hide {
            display: none;
        }

        .table-container.hidden {
            display: none;
        }

        /* table{
           border-collapse:collapse;
           width:100%;
           border:4px solid black;
        }
        */
        /* the table part  */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>


    <div class="sidebar">
        <a href="<?= base_url('slidertable') ?>">Slider</a>
        <a href="#" onclick="toggleTable('about')">About</a>
        <a href="<?= base_url('header') ?>">Header</a>
    </div>

    <div class="content">


        <!-- About Section -->
        <div class="table-container" id="sliderTable">
            <h2>sliderrr</h2>


        </div>

        <!-- About Section -->
        <div class="table-container" id="aboutTable">


        </div>


        <script>

            function toggleTable(tableId) {
                var tables = document.querySelectorAll('.table-container');
                tables.forEach(function (table) {
                    if (table.id === tableId + 'Table') {
                        table.classList.add('show');
                    } else {
                        table.classList.remove('show');
                    }
                });
            }



        </script>




    </div>

</body>

</html>