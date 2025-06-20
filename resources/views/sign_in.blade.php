<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign_In</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <header class= "header modal-header" >
            <h3 align="center">Login Page</h3>
        </header>
        @if(session('Message'))    // Variable from demeocontroller page  
        <div class="alert alert-danger">
        {{session('Message')}}
        </div>
        <script>alert('Message')</script>
          @endif
        
        <form method="POST" action="{{url('/login_details')}}">
          @csrf
         <div class="form-group">
                <label for="name">Email:</label>
                <input type="text" class="form-control" id="user_id" name="EmailorPhone" placeholder="Enter Email Or Phone Number" required>
            </div>
            <div class="form-group">
                <label for="age">Password:</label>
                <input type="password" class="form-control" id="pass" name="Password" placeholder="Enter Password" required>
            </div>
        <div class="form-group">

        <button class="btn btn-success btn-md">Login</button>

        </div>


        </form>
    </div>
    
</body>
</html>