		</div>

	</div>

	<script src="<?php echo base_url(); ?>public/admin/js/jquery-2.2.4.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/select2.full.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jscolor.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery.inputmask.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery.inputmask.date.extensions.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery.inputmask.extensions.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/icheck.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/fastclick.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery.sparkline.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery.slimscroll.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery.fancybox.pack.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/app.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/summernote.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery.magnific-popup.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery.nestable.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/demo.js"></script>

	<script>



	(function($) {
		
		$(document).ready(function() {
	        $('#editor1').summernote({
	        	height: 300
	        });
	        $('#editor2').summernote({
	        	height: 300
	        });
	        $('#editor3').summernote({
	        	height: 300
	        });
	        $('#editor4').summernote({
	        	height: 300
	        });
	        $('#editor5').summernote({
	        	height: 300
	        });
	        $('#editor6').summernote({
	        	height: 300
	        });
	        $('.editor').summernote({
	        	height: 300
	        });
	        $('.editor_short').summernote({
	        	height: 150
	        });
	    });

	    //Initialize Select2 Elements
	    $(".select2").select2();

	    //Datemask dd/mm/yyyy
	    $("#datemask").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});
	    //Datemask2 mm/dd/yyyy
	    $("#datemask2").inputmask("mm-dd-yyyy", {"placeholder": "mm-dd-yyyy"});
	    //Money Euro
	    $("[data-mask]").inputmask();

	    //Date picker
	    $('.datepicker').datepicker({
	      autoclose: true,
	      format: 'yyyy-mm-dd',
	      todayBtn: 'linked',
	    });
	    $('#datepicker').datepicker({
	      autoclose: true,
	      format: 'yyyy-mm-dd',
	      todayBtn: 'linked',
	    });

	    $('#datepicker1').datepicker({
	      autoclose: true,
	      format: 'yyyy-mm-dd',
	      todayBtn: 'linked',
	    });

	    $('#datepicker2').datepicker({
	      autoclose: true,
	      format: 'yyyy-mm-dd',
	      todayBtn: 'linked',
	    });

	    //iCheck for checkbox and radio inputs
	    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
	      checkboxClass: 'icheckbox_minimal-blue',
	      radioClass: 'iradio_minimal-blue'
	    });
	    //Red color scheme for iCheck
	    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
	      checkboxClass: 'icheckbox_minimal-red',
	      radioClass: 'iradio_minimal-red'
	    });
	    //Flat red color scheme for iCheck
	    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
	      checkboxClass: 'icheckbox_flat-green',
	      radioClass: 'iradio_flat-green'
	    });


	    $("#example1").DataTable();
	    $('#example2').DataTable({
	      "paging": true,
	      "lengthChange": false,
	      "searching": false,
	      "ordering": true,
	      "info": true,
	      "autoWidth": false
	    });

	    $('#confirm-delete').on('show.bs.modal', function(e) {
	      $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
	    });
 
	})(jQuery);

	</script>

	<script type="text/javascript">

        $(document).ready(function () {

		    $("#btnAddNew").click(function () {

		        var rowNumber = $("#PhotosTable tbody tr").length;

		        var trNew = "";              

		        var addLink = "<div class=\"upload-btn" + rowNumber + "\"><input type=\"file\" name=\"photos[]\"></div>";
		           
		        var deleteRow = "<a href=\"javascript:void()\" class=\"Delete btn btn-danger btn-xs\">X</a>";

		        trNew = trNew + "<tr> ";

		        trNew += "<td>" + addLink + "</td>";
		        trNew += "<td style=\"width:28px;\">" + deleteRow + "</td>";

		        trNew = trNew + " </tr>";

		        $("#PhotosTable tbody").append(trNew);

		    });

		    $('#PhotosTable').delegate('a.Delete', 'click', function () {
		        $(this).parent().parent().fadeOut('slow').remove();
		        return false;
		    });

		});

		selectEmailMethod = $('#selectEmailMethod').val();
        $('#selectEmailMethod').on('change',function() {
            selectEmailMethod = $('#selectEmailMethod').val();
            if ( selectEmailMethod == 'Normal' ) {
               	$('#smtpContainer').hide();
            } else if ( selectEmailMethod == 'SMTP' ) {
               	$('#smtpContainer').show();
            }
        });

        function loadNestable() {
            $('.dd').nestable({
                maxDepth: 3,
                dropCallback: function (details) {
                    var order = new Array();

                    if(details.parentId != null && details.parentId != '') {
                        $("li[data-id='"+details.parentId+"']").find('ol:first').children().each(function (index, elem) {
                            order[index] = $(elem).attr('data-id');
                        });
                    } else {
                        $("div.dd").find('ol:first').children().each(function (index, elem) {
                            order[index] = $(elem).attr('data-id');
                        })
                    }

                    $.ajax({
                        url: '<?php echo base_url().'admin/setting/menu' ?>',
                        data: {
                            'parentId'  : details.parentId,
                            'itemId'    : details.itemId,
                            'children'  : JSON.stringify(order)
                        },
                        beforeSend: function () {
                            //
                        },
                        success: function (response) {
                            alert(response);
                        },
                        type: "post",
                        dataType: "json"
                    })
                }
            })
        }
        
        function loadMenu() {
            $.ajax({
                url: '<?php echo base_url().'admin/setting/menu' ?>',
                data: {
                    'request' : 'list'
                },
                beforeSend: function () {
                    jQuery('#list-menu').html("<br/><br/><center><h3>Populate menu . . .</h3></center>");
                },
                success: function (response) {
                    jQuery('#list-menu').html(response);
                },
                type: 'get',
                dataType: 'html'
            });
        }

        function loadPage(url) {
            jQuery('#result').html("<br/><br/><center><h3>Populate page . . .</h3></center>").load(url);
        }

        function addMenuHyperlink(obj) {
            if($("#menu_name").val() == '') {
                alert('Menu Name is required');
                $("#menu_name").focus();
                return false;
            }

            if($("#menu_type_param").val() == '') {
                alert('Target URL is required');
                $("#menu_type_param").focus();
                return false;
            } else {
                var valid = /^(ftp|http|https):\/\/[^ "]+$/.test($("#menu_type_param").val());
                if(!valid) {
                    alert('Target URL not valid');
                    $("#menu_type_param").focus();
                    return false;
                }
            }

            var $form = $('#form-hyperlink');
            var $btn = document.getElementById("menu-hyperlink");
            $.ajax({
                url: $form.attr('action'),
                data: $form.serialize(),
                beforeSend: function () {
                    $btn.innerText = 'Creating Menu...';
                },
                success: function (response) {
                    loadMenu();
                    $btn.innerText= 'Submit';
                    $('#menuModal').modal('hide');
                },
                type: "post"
            })
        }
        
    </script>
</body>
</html>