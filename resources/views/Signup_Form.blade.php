<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp_Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>

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

        <form method="POST" action="{{url('/submit')}}" enctype="multipart/form-data" >

            @csrf  <!-- CSRF token for security -->   <!--    go-to app/Middleware/VerifyCsrfToken.php    -->
            
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="Name" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="age">AGE</label>
                <input type="number" class="form-control" id="age" name="Age" placeholder="Enter your age" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="Email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone No</label>
                <input type="number" class="form-control" id="phone" name="Phone" placeholder="Enter your Phone No" required>
            </div>
            <div class="form-group">
                <label for="Pass">Password</label>
                <input type="password" class="form-control" id="pass" name="Pass" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="Image">Image Upload</label>
                <input type="file" class="form-control" id="Image" name="Image" placeholder="" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>

        </form> 

        <!-- Input Data Show In Same Page
         @if(isset($userData))
            <div class="table -responsive mt-5">
                <h4>Submitted Data:</h4>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Email</th>
                            <th>Phone No</th>
                            <th>Password</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $userData['Name'] }}</td>
                            <td>{{ $userData['Age'] }}</td>
                            <td> <a href="mailto:{{ $userData['Email'] }}">{{ $userData['Email'] }}</a> </td>
                            <td><a href="tel:{{ $userData['Email'] }}">{{ $userData['Phone'] }}</a></td>
                            <td>{{ $userData['Password'] }}</td>
                            <td><img src="{{ $userData['Image'] }}" alt="User Image" style="width: 100px; height: 100px;"></td>
                        </tr>
                    </tbody>

                </table>
            </div>   

         @endif -->
</div>
    
</body>
</html> 


 