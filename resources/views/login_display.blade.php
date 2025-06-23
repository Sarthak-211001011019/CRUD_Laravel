<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>User_Display</title>
</head>
<body> 
    
@if(session('Message'))
    <div class="alert alert-success">
        {{ session('Message')}}
        {{session('session_name')}}
    </div>
@endif

@if(session('Message'))
    <script>
    alert("{{session('Message')}}");
    </script>
@endif

         @if(isset($alluserinfo))
            <div class="table -responsive mt-5">
                <h4>User Data:</h4>

                <table class="table table-bordered" border="1" cellpadding="10" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Email</th>
                            <th>Phone No</th>
                            <th>Password</th>
                            <th>User__Type</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr> 
                            <td>{{ $alluserinfo->Name }}</td>
                            <td>{{ $alluserinfo->Age }}</td>
                            <td> <a href="mailto:{{ $alluserinfo->Email }}">{{ $alluserinfo->Email }}</a> </td>
                            <td><a href="tel:{{ $alluserinfo->Email }}">{{ $alluserinfo->Phone }}</a></td>
                            <td>{{ $alluserinfo->Password }}</td>
                            <td>{{ $alluserinfo->User_Type }}</td>
                            <td><img src="{{ $alluserinfo->Image }}" alt="User Image" style="width: 100px; height: 100px;"></td>  
                            <td>
                                <!-- <a href="{{ url('/edit_form/'.$alluserinfo->User_ID) }}">Edit</a> |
                                <a href="{{ url('/delete_form/'.$alluserinfo->User_ID) }}" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a> -->
                                <a href="{{url('/delete')}}{{$alluserinfo->User_ID}}" onclick="return confirm('Are You Sure ?')">Delete</a>
                                 <a href="{{url('/edit_details')}}{{$alluserinfo->User_ID}}">Edit</a>
                                 <a href="{{url('/change_pass_rout')}}">Change Password</a>

                        </tr>
                    </tbody>

                </table>
            </div>   

         @endif
    
</body>
</html>
