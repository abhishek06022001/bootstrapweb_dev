<?php include('main_header.php'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<style>
    .max-width-td{
        max-width :30rem;
        min-width: 25rem;
     
    }
    
</style>
<body>
    <div id="page-container" class="main-admin">
        <?php include('sidebar.php'); ?>
        <div class="main-body-content w-100 ets-pt">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add</button>
            <!-- <div class="table-responsive bg-light"> -->
            <table id="example" class="table table-striped" style="width:100%"  style="position:relative; left:10%">
                <!-- <table class="table"> -->
                <tr>
                    <td>ID</th>
                    <th >HEADER_TOP</th>
                    <th >HEADER_DESCRIPTION</th>
                    <th >Button</th>

                </tr>

                <?php foreach ($records as $record): ?>
                    <tr>
                        <!-- <td><input type="text" value="<?= $record['id']; ?>"></td>
                        <td><input type="text" value="<?= $record['header_top']; ?>"></td>
                        <td><input type="text" value="<?= $record['header_description']; ?>"></td> -->
                        <td class="max-width-td">
                            <?= $record['id']; ?>
                        </td>
                        <td class="max-width-td">
                            <?= $record['header_top']; ?>
                        </td>
                        <td class="max-width-td" >
                            <?= $record['header_description']; ?>
                        </td>


                        <td class="max-width-td" >
                            <button type="button" class="btn btn-info btn-lg update-btn" data-toggle="modal"
                                data-target="#updateModal" data-id="<?= $record['id']; ?>"
                                data-header-top="<?= $record['header_top']; ?>"
                                data-header-description="<?= $record['header_description']; ?>">
                                Update
                            </button>


                            <button type="submit" class="btn btn-dark delete-header"
                                data-href="<?= base_url('header/deleteHeader/' . $record['id']); ?>">
                                Delete
                            </button>



                        </td>
                    </tr>
                <?php endforeach; ?>

                <!-- </table> -->
            </table>
        </div>
    </div>
    <div class="modal fade" id="updateModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content for updating records -->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form method="POST" action="<?= base_url('header/updateHeader/'); ?>" id="updateForm">
                    <!-- Use a hidden input field to store the current ID -->
                    <input type="hidden" id="update-id" name="id">
                    <div class="modal-body">
                        <label for="update-header-top">header_top:</label>
                        <input type="text" id="update-header-top" name="header_top" class="form-control">
                        <label for="update-header-description">header_description:</label>
                        <input type="text" id="update-header-description" name="header_description"
                            class="form-control">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="Update" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <form method="POST" action="<?= base_url('addHeader') ?>">
                    <div class="modal-body">

                        <label for="fname">header_top:</label><br>
                        <input type="text" id="fname" name="header_top" value=""><br>
                        <label for="lname">header_description:</label><br>
                        <input type="text" id="lname" name="header_description" value=""><br>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="Submit">
                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery("#open-menu").click(function () {
                if (jQuery('#page-container').hasClass('show-menu')) {
                    jQuery("#page-container").removeClass('show-menu');
                }

                else {
                    jQuery("#page-container").addClass('show-menu');
                }
            });
        });
    </script>
    <script>
        // Assuming you're using jQuery
        $(document).ready(function () {
            $('.delete-header').on('click', function () {
                if (confirm('Are you sure you want to delete this product?')) {
                    window.location.href = $(this).data('href');
                }
            });
        });
        $(document).ready(function () {
            $('.update-btn').on('click', function () {
                var id = $(this).data('id');
                var headertop = $(this).data('header-top');
                var headerdescription = $(this).data('header-description');

                // Populate the modal input fields
                $('#update-id').val(id);
                $('#update-header-top').val(imageLink);
                $('update-header-description').val(headerdescription);
            });
        });

    </script>
    <script>
        $(document).ready(function () {
            // When the modal is shown, update the form action and hidden input value
            $('#updateModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var id = button.data('id'); // Extract ID from data-id attribute
                var headertop = button.data('header-top'); // Extract image link from data-image-link attribute
                var headerdescription = button.data('header-description'); // Extract image link from data-image-link attribute
                var modal = $(this);

                // Update the form action
                modal.find('#updateForm').attr('action', '<?= base_url('header/updateHeader/'); ?>' + id);

                // Update the hidden input value
                modal.find('#update-id').val(id);

                // Pre-fill the image link input field
                modal.find('#update-header-top').val(headertop);
                modal.find('#update-header-description').val(headerdescription);
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            new DataTable('#example');
        });
    </script>

</body>

</html>