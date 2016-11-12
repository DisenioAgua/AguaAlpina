<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Clientes</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/AguaAlpina/public/css/bootstrap.css" type="text/css">
  <script src="/AguaAlpina/public/js/jquery2.js"></script>
</head>
<body>
  <div class="container">
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
</html>
