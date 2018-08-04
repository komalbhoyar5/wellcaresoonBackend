<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $company_name; ?></title>
    <?php  echo $this->Html->css('../admin/css/bootstrap.min.css'); ?>
    <?php  echo $this->Html->css('../admin/font-awesome/css/font-awesome.css'); ?>
    <?php  echo $this->Html->css('../admin/css/plugins/toastr/toastr.min.css'); ?>
    <?php  echo $this->Html->css('../admin/css/animate.css'); ?>
    <?php  echo $this->Html->css('../admin/css/style.css'); ?>
    <?php
    echo $this->Html->script('../admin/js/jquery-3.1.1.min.js'); 
    echo $this->Html->script('../admin/js/bootstrap.min.js'); 
    echo $this->Html->script('../admin/js/plugins/toastr/toastr.min.js'); 

    ?>

</head>

<body class="gray-bg">
    <?php echo $this->fetch('content'); ?>
    <!-- flash messages template -->
        <?php 
        $fail = $this->Session->flash('fail');
        $success = $this->Session->flash('success');
         if ($fail !="") { ?>
                <script>
                    setTimeout(function() {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                        toastr.error("<?php echo $fail; ?>", 'Failed');

                    }, 1300);
                </script>
        <?php } ?>
        <?php if ($success !="") { ?>
                <script>
                    setTimeout(function() {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                        toastr.success('<?php echo $success; ?>', 'Success');

                    }, 1300);
                </script>
        <?php } ?>
    <!-- flash messages template -->

</body>

</html>
