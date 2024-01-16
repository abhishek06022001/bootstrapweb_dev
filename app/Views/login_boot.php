<?php include('main_header.php'); ?>

<body>
    <div id="page-container" class="main-admin">
        <?php include('sidebar.php'); ?>

    </div>
</body>
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