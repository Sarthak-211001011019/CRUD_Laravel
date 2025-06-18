<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp_Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
@if(isset($Userdata))
<div class="container">
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach    
        </div>
    @endif    
    <div class="header modal-header">
        <h3>SignUp Page </h3>
    </div>
        <form method="POST" action="{{url('/update_details')}}" enctype="multipart/form-data" >
            @csrf  <!-- CSRF token for security -->   <!--    go-to app/Middleware/VerifyCsrfToken.php    -->
             <div class="form-group">
                <input type="hidden" class="form-control" id="uid" name="User_ID" Value="{{$Userdata->User_ID}}" required>
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="Name" Value="{{$Userdata->Name}}" required>
            </div>

            <div class="form-group">
                <label for="age">AGE</label>
                <input type="number" class="form-control" id="age" name="Age" Value="{{$Userdata->Age}}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="Email" Value="{{$Userdata->Email}}" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone No</label>
                <input type="number" class="form-control" id="phone" name="Phone" Value="{{$Userdata->Phone}}" required>
            </div>
      
            <div class="form-group">
                Current Image: <img src="{{$Userdata->Image}}" alt="" height="100px" width="90px"><br>
                <label for="Image">Image Upload</label>
                <input type="file" class="form-control" id="Image" name="Image" Value="" > 
            </div>
            <button type="submit" class="btn btn-primary">Update Details</button>

        </form> 
</div>
@endif    
</body>
</html> 


 