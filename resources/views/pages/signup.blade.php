<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- MDB CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <title>Document</title>
</head>
<body>
    <!-- Pills navs -->
    <section class="vh-100">
        <div class="container py-5 h-100">
          <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                class="img-fluid" alt="Phone image">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
              <form method="POST" action="{{ route('signup') }}">
                @csrf
                <!-- Email input -->


                <div class="form-outline mb-4">
                    <input type="text" id="name" type="text" name="name" value="{{ old('name') }}"  class="form-control form-control-lg" />
                    <label class="form-label" for="form1Example13">User name</label>
                  </div>
                <div class="form-outline mb-4">
                  <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg" />
                  <label class="form-label" for="form1Example13">Email address</label>
                </div>
      
                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input id="password" type="password" name="password" class="form-control form-control-lg" />
                  <label class="form-label" for="form1Example23">Password</label>
                </div>
                <a href="/login">Already have an account?</a>
      
                <div class="d-flex justify-content-around align-items-center mb-4">
                  <!-- Checkbox -->
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                    <label class="form-check-label" for="form1Example3"> Remember me </label>
                  </div>
            
                </div>
      
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-lg btn-block">Sign up</button>
      
                
      
              </form>
            </div>
          </div>
        </div>
      </section>


      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
      <script>
          window.onload = function () {
              var errorMessage = "{{ $errors->first() }}";
              if (errorMessage) {
                  showErrorToast(errorMessage);
              }
          };
  
          function showErrorToast(message) {
              Toastify({
                  text: message,
                  duration: 5000,
                  gravity: "top",
                  position: "center",
                  backgroundColor: "linear-gradient(to right, #ff416c, #ff4b2b)"
              }).showToast();
          }
      </script>
</body>
</html>