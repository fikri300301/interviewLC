<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <style>
    /* Center the form on the page */
    .login-form {
      width: 300px;
      margin: 0 auto;
      margin-top: 100px;
    }
  </style>
</head>
<body>

  
<div class="container">
     
  <div class="login-form">
    @if(session('error'))
  <div class="alert alert-danger mt-10">
    {{ session('error') }}
    </div>
@endif
    <h2 class="text-center">Log in</h2>
    <form action="login" method="post">
        @csrf
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="email" class="form-control" id="email" placeholder="Enter email" required>
      </div>
      
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Login</button>
      </div>
      <div class="form-group text-center">
        <p>Don't have an account? <a href="/register">Register here</a></p>
      </div>
    </form>
  </div>
</div>

</body>
</html>
