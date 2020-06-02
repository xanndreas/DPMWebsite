<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DPM Polinema</title>
  <link href="<?= base_url() ?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>js/bootstrap.min.js" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?= base_url(); ?>css/login.css">
  <script src="<?= base_url(); ?>js/login.js"></script>
</head>

<body>
  <section>
    <div class="page">

      <div class="welcome">
        <img class="logo" src="<?= base_url(); ?>img/logo_dpm.png" alt="">
        <button class="sign_in">Sign In</button>
        <button class="btn">Sign Up</button>
      </div>
      <div class="sign_up">
        <!-- alert -->
        <?php if ($this->session->flashdata('flash-data')) :  ?>
            <div class="row mt-4">
                <div class="col-md-6">
                <div class="alert alert-warning alert-dismissible show" role="alert">
                    <strong> <?= $this->session->flashdata('flash-data'); ?> </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                </div>
            </div>
        <?php endif; ?>
        <!-- EndofAlert -->
        <form method="POST" action="<?= base_url(); ?>login/signUp">
          <h2>Sign Up your Account</h2>
          <input type="text" name="nim1" value="" placeholder="NIM" required><br>
          <input type="text" name="name" value="" placeholder="Full Name" required><br>
          <input type="email" name="email" value="" placeholder="Email" required><br>
          <input type="password" name="password1" value="" placeholder="Password" required><br>
          <input type="submit" name="sign_up" value="Sign Up" class="up">
        </form>
      </div>
      <div class="login">
        <form method="POST" action="<?= base_url(); ?>login/signIn">
          <h2>Login your Account</h2>
          <input type="text" name="nim" placeholder="NIM" required><br>
          <input type="password" name="password" placeholder="Password" required><br>
          <input type="submit" name="sign_in" value="Sign In" class="in">
        </form>
      </div>
    </div>
  </section>
  
</body>

</html>