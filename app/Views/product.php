<?php include('main_header.php'); ?>

<body>
    <div id="page-container" class="main-admin">
        <?php include('sidebar.php'); ?>
        <div class="main-body-content w-100 ets-pt">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add</button>
            <div class="table-responsive bg-light">
                <table class="table">
                    <tr>
                        <th>id</th>
                        <th>image_link</th>
                        <th>description</th>
                        <th>Button</th>
                    </tr>
                    
                    <?php foreach ($records as $record): ?>
                        <tr>

                            <td><input type="text" value="<?= $record['id']; ?>"></td>
                            <td><input type="text" value="<?= $record['image_link']; ?>"></td>
                            <td><input type="text" value="<?= $record['description']; ?>"></td>
                            <td>
                                <button type="button" class="btn btn-info btn-lg update-btn" data-toggle="modal"
                                    data-target="#updateModal" data-id="<?= $record['id']; ?>"
                                    data-image-link="<?= $record['image_link']; ?>"
                                    data-description="<?= $record['description']; ?>">
                                    Update
                                </button>

                                <button type="submit" class="btn btn-dark delete-product"
                                    data-href="<?= base_url('product/deleteProduct/' . $record['id']); ?>">
                                    Delete
                                </button>
                            </td>


                        </tr>
                    <?php endforeach; ?>

                </table>
            </div>
        </div>
    </div>
    <!-- UPDATE PRODUCT FUNCTIONALITY -->
    <div class="modal fade" id="updateModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content for updating records -->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form method="POST" action="<?= base_url('product/updateProduct/'); ?>" id="updateForm">
                    <!-- Use a hidden input field to store the current ID -->
                    <input type="hidden" id="update-id" name="id">
                    <div class="modal-body">
                        <label for="update-image-link">Image Link:</label>
                        <input type="text" id="update-image-link"  name="a_image_link" class="form-control">
                        <label for="update-description">description:</label>
                        <input type="text" id="update-description" name="a_image_description" class="form-control">
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

            <!-- ADD PRODUCT FUNCTIONALITY -->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <form method="POST" action="<?= base_url('addProduct') ?>">
                    <div class="modal-body">

                        <label for="fname">image_link:</label><br>
                        <input type="text" id="fname" name="a_image_link" value=""><br>
                        <label for="lname">Description:</label><br>
                        <input type="text" id="lname" name="a_image_description" value=""><br>
                    </div>
                    <!-- POPUP -->
                    <div class="modal-footer">
                        <input type="submit" value="Submit">

                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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
            $('.delete-product').on('click', function () {
                if (confirm('Are you sure you want to delete this product?')) {
                    window.location.href = $(this).data('href');
                }
            });
        });
        $(document).ready(function () {
            $('.update-btn').on('click', function () {
                var id = $(this).data('id');
                var imageLink = $(this).data('image-link');
                var description = $(this).data('description');

                // Populate the modal input fields
                $('#update-id').val(id);
                $('#update-image-link').val(imageLink);
                $('#update-description').val(description);
            });
        });

    </script>
    <script>
        $(document).ready(function () {
            // When the modal is shown, update the form action and hidden input value
            $('#updateModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var id = button.data('id'); // Extract ID from data-id attribute
                var imageLink = button.data('image-link'); // Extract image link from data-image-link attribute
                var description = button.data('description'); // Extract image link from data-image-link attribute
                var modal = $(this);

                // Update the form action
                modal.find('#updateForm').attr('action', '<?= base_url('product/updateProduct/'); ?>' + id);

                // Update the hidden input value
                modal.find('#update-id').val(id);

                // Pre-fill the image link input field
                modal.find('#update-image-link').val(imageLink);
                modal.find('#update-image-link').val(description);
            });
        });
    </script>
</body>

</html>