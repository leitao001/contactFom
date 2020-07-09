<!DOCTYPE html>
<html>
<head>
    <title>Contact form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12" style="margin-top: 50px;" id="contact_div">
            <h3>Your Contact Details</h3>
            <form style="margin-top: 20px;" id="contact_form">
                <div class="form-group row">
                    <label class="col-md-2 col-form-label" style="text-align: right;">Name <span style="color: red">*</span></label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="name" name="name" maxlength="100" min="3" required>
                    </div>
                    <label class="col-md-2 col-form-label" style="text-align: right;">Phone <span style="color: red">*</span></label>
                    <div class="col-md-4">
                        <input type="tel" class="form-control" id="phone" name="phone" maxlength="100" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label" style="text-align: right;">Company Name <span style="color: red">*</span></label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="company_name" name="company_name" min="3" maxlength="100" required>
                    </div>
                    <label class="col-md-2 col-form-label" style="text-align: right;">Skype</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="skype" name="skype" maxlength="100">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label" style="text-align: right;">E-mail<span style="color: red">*</span></label>
                    <div class="col-md-4">
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <label class="col-md-2 col-form-label" style="text-align: right;">Region<span style="color: red">*</span></label>
                    <div class="col-md-4">
                        <select class="form-control" id="region" name="region">
                            <option value="taiwan">Taiwan</option>
                            <option value="china">China</option>
                            <option value="uk">United Kingdom</option>
                        </select>
                    </div>
                </div>
                <div class="form-group form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="is_subscribe" id="is_subcribe" checked value="1"> Subscribe to ENF's Price Watch Newsletter (Terms and conditions)
                    </label>
                </div>

                <button type="submit" class="btn btn-warning" style="width: 100px; float: right">Send</button>

            </form>
        </div>
        <div class="col-md-12" style="display: none; padding-top: 150px;" id="alert_div">
            <h3 style="text-align: center; color: #1c7430;">Your contact information was saved successfully. Thank you</h3>
            <button id="go_back" class="btn btn-success" style="float: right;">Go contact form</button>
        </div>
    </div>
</div>
</body>
<script  type="text/javascript" src="assets/js/jquery.min.js"></script>
<script  type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script>
    $("document").ready(function () {
        $('#contact_form').submit(function (e) {
            e.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: 'actions.php',
                type: 'post',
                dataType: 'json',
                data: form_data,
                success: function (data) {
                    if (data.success == true) {
                        $("#contact_div").hide();
                        $("input[type=text], input[type=email], input[type=tel]").val("");
                        $("#alert_div").show();
                    }
                    else {
                        alert(data.msg);
                    }
                },
                error: function () {
                    alert('An error has occurred');
                }
            });
        });

        $("#go_back").on('click', function () {
            $("#contact_div").show();
            $("#alert_div").hide();
        });
    });
</script>
</html>