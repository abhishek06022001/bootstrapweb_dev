<?php include('main_header.php'); ?>

<body>
    <div id="page-container" class="main-admin ">
    <?php include('sidebar.php'); ?>
     
        <div class="main-body-content w-100 ets-pt">
           
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add</button>
            <div class="table-responsive bg-light">
                <table class="table">
                    <tr>
                        <th>id</th>
                        <th>image_link</th>

                        <th>Button</th>

                    </tr>
                    <?php foreach ($records as $record): ?>
                        <tr>
                            <td><input type="text" value="<?= $record['id']; ?>"></td>
                            <td><input type="text" value="<?= $record['image_link']; ?>"></td>
                            <td>
                                <button type="button" class="btn btn-info btn-lg update-btn" data-toggle="modal"
                                    data-target="#updateModal" data-id="<?= $record['id']; ?>"
                                    data-image-link="<?= $record['image_link']; ?>">
                                    Update
                                </button>

                                <button type="submit" class="btn btn-dark delete-slider"
                                    data-href="<?= base_url('slidertable/deleteSlider/' . $record['id']); ?>">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="updateModal" role="dialog">
        <div class="modal-dialog">
            
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form method="POST" action="<?= base_url('slidertable/updateSlider/'); ?>" id="updateForm">
              
                    <input type="hidden" id="update-id" name="id">
                    <div class="modal-body">
                        <label for="update-image-link">Image Link:</label>
                        <input type="text" id="update-image-link" name="image_link" class="form-control">
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
           
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    
                </div>
                <form method="POST" action="<?= base_url('addSlider') ?>">
                    <div class="modal-body">
                        <label for="fname">image_link:</label><br>
                        <input type="text" id="fname" name="image_link" value=""><br>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="Submit">
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
    
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
      
        $(document).ready(function () {
            $('.delete-slider').on('click', function () {
                if (confirm('Are you sure you want to delete this product?')) {
                    window.location.href = $(this).data('href');
                }
            });
        });
        $(document).ready(function () {
            $('.update-btn').on('click', function () {
                var id = $(this).data('id');
                var imageLink = $(this).data('image-link');

               
                $('#update-id').val(id);
                $('#update-image-link').val(imageLink);
            });
        });

    </script>
    <script>
        $(document).ready(function () {
            
            $('#updateModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var id = button.data('id'); // Extract ID from data-id attribute
                var imageLink = button.data('image-link'); // Extract image link from data-image-link attribute
                var modal = $(this);

                // Update the form action
                modal.find('#updateForm').attr('action', '<?= base_url('slidertable/updateSlider/'); ?>' + id);

                // Update the hidden input value
                modal.find('#update-id').val(id);

                // Pre-fill the image link input field
                modal.find('#update-image-link').val(imageLink);
            });
        });
    </script>
</body>

</html>