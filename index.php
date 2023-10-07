<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="" />

    <title>E-ARSIP - Login</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="assets/css/floating-labels.css" rel="stylesheet" />
  </head>

  <body>
    <form class="form-signin" method="post" action="cek_login.php">
      <div class="text-center mb-4">
        <img
          class="mb-4"
          src="assets/logo.png"
          alt=""
          width="150"
          height="150"
        />
        <h1 class="h3 mb-3 font-weight-normal">Login E-Arsip</h1>
        <p>
          Silahkan masukkan username dan password anda, sebelum masuk kedalam sistem E-Arsip
        </p>
      </div>

      <div class="form-label-group">
        <input
          type="text"
          id="username"
          name="username"
          class="form-control"
          placeholder="Email address"
          required
          autofocus
        />
        <label for="username">Username</label>
      </div>

      <div class="form-label-group">
        <input
          type="password"
          id="Password"
          name="password"
          class="form-control"
          placeholder="Password"
          required
        />
        <label for="Password">Password</label>
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me" /> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">
        Sign in
      </button>
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2023-<?=date('Y')?></p>
    </form>
  </body>
</html>
