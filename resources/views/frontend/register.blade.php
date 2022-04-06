@include('frontend.layout.head')
   <!-- Custom styles for this template -->
    <link href="{{ secure_asset('frontend/assets/css/signin.css') }}" rel="stylesheet">
  <body class="text-center">
<main class="form-signin text-center">
  <form  action="" method="POST" id="registerForm">
      {{ @csrf_field() }}
    <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Register New Account</h1>

    <div class="form-floating">
      <input type="text" class="form-control" name="name"  id="name" placeholder="Akinyem Taiwo">
      <label for="floatingInput">Fullname</label>
    </div>
    <br>
    <div class="form-floating">
        <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
      </div>
      <br>
      <div class="form-floating">
        <input type="tel" name="phone" class="form-control" id="phone" placeholder="name@example.com">
        <label for="floatingInput">Phone</label>
      </div>
      <br>
      <div class="form-floating">
        <input type="text" name="address" class="form-control" id="address" placeholder="name@example.com">
        <label for="floatingInput">Home / Office Address</label>
      </div>
      <br>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="password" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" id="passwordConfirm" placeholder="Password">
        <label for="floatingPassword">Confirm Password</label>
      </div>
<br>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2022–2024</p>
  </form>
</main>

@include('frontend.layout.script')
