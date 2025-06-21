<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <header class="header modal-header">
            <h3 align="center">Change Password</h3>
        </header>
        @if(session('Message')) // Variable from demeocontroller page
            <div class="alert alert-danger">
                {{session('Message')}}
            <script>alert({{session('Message')}})</script>
            </div>
        @endif

        <form method="POST" action="{{url('/change_pass_logic')}}">
            @csrf
            <div class="form-group">

               
            </div>
            <div class="form-group">
                <label for="name">Current Password:</label>
                <input type="text" class="form-control" id="user_id" name="OldPassword"
                    placeholder="Enter Current Password" required>
            </div>
            <div class="form-group">
                <label for="age">New-Password:</label>
                <input type="password" class="form-control" id="pass" name="NewPassword"
                    placeholder="Enter New Password" required>
            </div>

            <div class="form-group">
                <label for="age">Confirm_New-Password:</label>
                <input type="password" class="form-control" id="pass" name="ConPassword"
                    placeholder="Enter New Password Again" required>
            </div>


            <button class="btn btn-success btn-md">Change Password</button>

    </div>


    </form>
    </div>

</body>

</html>