<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Clientes</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/AguaAlpina/publica/css/formularios.css" type="text/css">
</head>
<body>
  <div class="container">
    <p class="well">#password has type of text instead of password just for testing purposes</p>
    <h3>Registration</h3>
    <hr>
    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
          <label>Username</label>
          <div class="input-group"> <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            <input type="text" class="form-control" name="Username" id="Username" placeholder="Requested Username" required value="SeanWessell">
          </div>
        </div>
        <div class="form-group">
          <label>Email</label>
          <div class="input-group"> <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            <input type="text" class="form-control" name="Email" id="Email" placeholder="Requested Email" required value="Sean.Wessell@gmail.com">
          </div>
        </div>
        <div class="form-group">
          <label>Password</label>
          <div class="input-group"> <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            <input type="text" class="form-control" name="password" id="password" placeholder="Password" required data-toggle="popover" title="Password Strength" data-content="Enter Password...">
          </div>
        </div>
        <div class="form-group">
          <label>Confirm Password</label>
          <div class="input-group"> <span class="input-group-addon"><span class="glyphicon glyphicon-resize-vertical"></span></span>
            <input type="password" class="form-control" name="confirm" id="confirm" placeholder="Confirm Password" required>
          </div>
        </div>
        <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary pull-right">
      </div>
    </div>
  </div>
</body>
<script src="/AguaAlpina/publica/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){

  //minimum 8 characters
  var bad = /(?=.{8,}).*/;
  //Alpha Numeric plus minimum 8
  var good = /^(?=\S*?[a-z])(?=\S*?[0-9])\S{8,}$/;
  //Must contain at least one upper case letter, one lower case letter and (one number OR one special char).
  var better = /^(?=\S*?[A-Z])(?=\S*?[a-z])((?=\S*?[0-9])|(?=\S*?[^\w\*]))\S{8,}$/;
  //Must contain at least one upper case letter, one lower case letter and (one number AND one special char).
  var best = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])(?=\S*?[^\w\*])\S{8,}$/;

  $('#password').on('keyup', function () {
    var password = $(this);
    var pass = password.val();
    var passLabel = $('[for="password"]');
    var stength = 'Weak';
    var pclass = 'danger';
    if (best.test(pass) == true) {
      stength = 'Very Strong';
      pclass = 'success';
    } else if (better.test(pass) == true) {
      stength = 'Strong';
      pclass = 'warning';
    } else if (good.test(pass) == true) {
      stength = 'Almost Strong';
      pclass = 'warning';
    } else if (bad.test(pass) == true) {
      stength = 'Weak';
    } else {
      stength = 'Very Weak';
    }

    var popover = password.attr('data-content', stength).data('bs.popover');
    popover.setContent();
    popover.$tip.addClass(popover.options.placement).removeClass('danger success info warning primary').addClass(pclass);

  });

})

</script>
</html>