<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>validasi</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/dist/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/select2/css/select2.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLte/css/skins/_all-skins.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLte/css/AdminLTE.min.css') ?>">
</head>
<body>
    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Validasi</h3>
            </div>
            <div class="box-body">
            <form id="form" action="<?php echo site_url('validation/save') ?>" method="post">
                <div class="form-group" id="element1">
                    <label for="input_text">Input 1</label>
                    <input type="text" name="input_1" id="" class="form-control">
                    <span class="help-block">
                        <div id="error1"><strong></strong></div>    
                    </span>
                </div>
                <div class="form-group" id="element2">
                    <label for="input_text">Select </label>
                    <select class="form-control" name="select_id" id="">
                        <option value="" disabled selected>-place holder-</option>
                        <option value="1">value 1</option>
                        <option value="2">value 2</option>
                    </select>
                    <span class="help-block">
                        <div id="error2"></div>    
                    </span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check"></i><span> Save</span></button>
                </div>
            </form>
            </div>
        </div>
    </section>    
</body>
</html>

<script src="<?php echo base_url('assets/jquery/dist/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/select2/js/select2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/Adminlte/js/adminlte.min.js') ?>"></script>

<script>
    $('.form-group').removeClass('has-error');
    $('#form').on('submit',function(e){
        if(!e.isDefaultPrevented()) {
            $.ajax({
                type: "POST",
                url: $("form#form").attr("action"), //Note : ambil url dari action form
                data: $("form#form").serialize(), //Note : ambil semua data dari form
                dataType: "json",
                success: function(data) {
                    $('.form-group').removeClass('has-error'); // note : remove all class has-error
                    if(data.errors) {
                        //reset error data
                        $('#error1').html('');
                        $('#error2').html('');
                        // set value error
                        $('#error1').html(data.errors.input_1);
                        $('#error2').html(data.errors.select_id);
                        // add class has-error
                        $('#element1').addClass('has-error');
                        $('#element2').addClass('has-error');
                        // note remove error class
                        if( $('#error1').html()=='') {
                            $('#element1').removeClass('has-error');
                        } else if($('#error2').html()=='') {
                            $('#element2').removeClass('has-error');
                        }
                    }
                    if(data.success) {
                        alert('success');
                        // note : redirect page
                        window.location = window.location.href;
                    }
                }
            });
        }
        return false;
    });
</script>