<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <style>
        .content {
            position: absolute;
            left: 250px;
            top: 10%;
            padding: 20px;

            height: 100vh;
            width: calc(100vw - 250px);

        }
    </style>
</head>

<body>
    <?php include('sidebar.php'); ?>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <div class="content">
            <h2>Product table</h2>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#yourModalID">Open Modal</button>
            <form method="post" action="<?= base_url('product/addRow') ?>">
            
                <button type="button" name="addRow" data-toggle="modal" data-target="#myModal">Add Row</button>
                <table class="table">
                    <thead>
                        <tr>
                            <!-- <th scope="col">id</th> -->
                            <th scope="col">image_link</th>
                            <th scope="col">description</th>

                            <th scope="col">Buttons</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">

                        <?php foreach ($records as $record): ?>
                            <tr>

                                <td><input type="text" value="<?= $record['image_link']; ?>"></td>
                                <td><input type="text" value="<?= $record['description']; ?>"></td>

                                <td>
                                    <button>Update</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <!-- Display a blank row if 'addRow' is set -->
                        <?php if (isset($_POST['addRow'])): ?>
                            <tr>
                                <td><input type="text" name="image_link"></td>
                                <td><input type="text" name="description"></td>

                            </tr>
                        <?php endif; ?>

                    </tbody>
                </table>
            </form>
        </div>

        <div class="modal" id="yourModalID">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal content goes here -->
                </div>
            </div>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>