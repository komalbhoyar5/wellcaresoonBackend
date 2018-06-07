<?php

echo $this->Html->script('../admin/js/jquery-3.1.1.min.js'); 
echo $this->Html->script('../admin/js/bootstrap.min.js'); 
echo $this->Html->script('../admin/js/plugins/metisMenu/jquery.metisMenu.js'); 
echo $this->Html->script('../admin/js/plugins/slimscroll/jquery.slimscroll.min.js'); 

echo $this->Html->script('../admin/js/plugins/flot/jquery.flot.js'); 
echo $this->Html->script('../admin/js/plugins/flot/jquery.flot.tooltip.min.js'); 
echo $this->Html->script('../admin/js/plugins/flot/jquery.flot.spline.js'); 
echo $this->Html->script('../admin/js/plugins/flot/jquery.flot.resize.js'); 

echo $this->Html->script('../admin/js/inspinia.js'); 
echo $this->Html->script('../admin/js/plugins/pace/pace.min.js'); 

echo $this->Html->script('../admin/js/plugins/jquery-ui/jquery-ui.min.js'); 
echo $this->Html->script('../admin/js/plugins/gritter/jquery.gritter.min.js'); 
echo $this->Html->script('../admin/js/plugins/sparkline/jquery.sparkline.min.js'); 
echo $this->Html->script('../admin/js/demo/sparkline-demo.js'); 
echo $this->Html->script('../admin/js/plugins/bootstrapTour/bootstrap-tour.min.js'); 

echo $this->Html->script('../admin/js/plugins/toastr/toastr.min.js'); 
echo $this->Html->script('../admin/js/plugins/sweetalert/sweetalert.min.js'); 

// echo $this->Html->script('../admin/js/'); 

?>

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
                        toastr.success("<?php echo $success; ?>", 'success');

                    }, 1300);
                </script>
        <?php } ?>
    <!-- flash messages template -->
    <script>
        $(function(){
        var url = window.location;
        var element = $('.metismenu li a').filter(function() {
            return this.href == url;
        }).parent().addClass('active'); 
            element.parent().parent('li').addClass('active');
            element.parent('ul').addClass('in');
    });
    </script>