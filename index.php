<?php
session_start();

if (isset($_SESSION['username'])) {
  header("Location: public/dash.php");
  exit();
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - NTavern</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="public/css/style.css">
</head>
<!-- <body style="background-image: url(public/img/kitchen2.jpg); background-size: cover;"> -->
  <body>
  <div class="login-container">
    <h3 style="letter-spacing: 1.8px;">
      <span style="color: #dada00;">N</span>Tavern's
    </h3>
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login-form" style="font-weight: 500;">Sign in</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="register-tab" data-toggle="tab" href="#register-form" style="font-weight: 500;">Register</a>
      </li>
    </ul>
    <div class="tab-content mt-3">
      <!-- Form Login -->
      <div class="tab-pane fade show active" id="login-form">
        <form action="config/login.php" method="POST" novalidate>
          <div class="form-group">
            <input type="text" class="form-control" id="login-username" name="username" placeholder="Username or Email" autocomplete="off" required>
            <div class="invalid-feedback"></div>
          </div>
          <div class="form-group">
            <input type="password" class="form-control bi-eye" id="login-password" name="password" placeholder="Password" autocomplete="off" required>
            <div class="invalid-feedback"></div>
          </div>
          <button type="submit" class="btn btn-warning btn-loading" style="margin-top: 7px; border-radius: 30px; height: 43px;">
            <b>Sign in</b>
            <span class="loading-icon">
              <i class="spinner-border text-black" style="margin-left: 100px; width: 20px; height: 20px;"></i>
            </span>
          </button>
          <center>
            <h5>or Sign in with</h5><br>
            <i class="bi bi-google" id="google"></i>
            <i class="bi bi-facebook" id="fb"></i>
            <i class="bi bi-twitter" id="twitter"></i>
          </center>
        </form>
      </div>
      <!-- Form Register -->
      <div class="tab-pane fade" id="register-form">
        <form action="config/register.php" method="POST" novalidate>
          <div class="form-group">
            <input type="text" class="form-control" id="register-fullname" name="fullname" placeholder="Full Name" autocomplete="off" required>
            <div class="invalid-feedback"></div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="register-username" name="rusername" placeholder="Username or Email" autocomplete="off" required>
            <div class="invalid-feedback"></div>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="register-password" name="rpassword" placeholder="Set Password" autocomplete="off" required>
            <div class="invalid-feedback"></div>
          </div>
          <button type="submit" class="btn btn-warning btn-loading" style="margin-top: 7px; border-radius: 30px; height: 43px;">
            <b>Register</b>
            <span class="loading-icon">
              <i class="spinner-border text-black" style="margin-left: 100px; width: 20px; height: 20px;"></i>
            </span>
          </button>
          <center>
            <h5 style="cursor: pointer;">or Sign in with</h5><br>
            <i class="bi bi-google" id="google"></i>
            <i class="bi bi-facebook" id="fb"></i>
            <i class="bi bi-twitter" id="twitter"></i>
          </center>
        </form>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script>
    const loginForm = document.querySelector('#login-form form');
    const registerForm = document.querySelector('#register-form form');

    loginForm.addEventListener('submit', function(event) {
      event.preventDefault();
      event.stopPropagation();
      validateForm(this);
    });

    registerForm.addEventListener('submit', function(event) {
      event.preventDefault();
      event.stopPropagation();
      validateForm(this);
    });

    function validateForm(form) {
      const inputs = form.querySelectorAll('input[required]');
      let isValid = true;

      inputs.forEach(function(input) {
        if (!input.checkValidity()) {
          isValid = false;
          showError(input, 'This field is required.');
        } else {
          clearError(input);
        }
      });

      if (isValid) {
        showLoadingButton(form);
        setTimeout(function() {
          form.submit();
        }, 1000);
      }
    }

    function showError(input, message) {
      const formGroup = input.parentElement;
      const errorContainer = formGroup.querySelector('.invalid-feedback');
      formGroup.classList.add('was-validated');
      errorContainer.innerText = message;
    }

    function clearError(input) {
      const formGroup = input.parentElement;
      const errorContainer = formGroup.querySelector('.invalid-feedback');
      formGroup.classList.remove('was-validated');
      errorContainer.innerText = '';
    }

    function showLoadingButton(form) {
      const button = form.querySelector('button[type="submit"]');
      const loadingIcon = button.querySelector('.loading-icon');
      button.disabled = true;
      button.classList.add('loading');
      loadingIcon.style.display = 'inline-block';
    }
  </script>
</body>
</html>

<!-- Adhim Niokagi
       Github : Nioka666 -->