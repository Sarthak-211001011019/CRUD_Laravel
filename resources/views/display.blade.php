<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Display</title>
</head>
<body> 
<!-- Input Data Show In Same Page -->
         @if(isset($alluserinfo))

         <div class="alert alert-success">
            <h3>Welcome Admin:</h3>
        {{session('session_name')}} 
         <a href="{{url('/logout_rout')}}"><button>LogOut</button></a>
        </div>
            <div class="table -responsive mt-5">
                <h4>Submitted Data:</h4>

                <table class="table table-bordered" border="1" cellpadding="10" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Email</th>
                            <th>Phone No</th>
                            <th>Password</th>
                            <th>UserType</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr> @foreach($alluserinfo as $userData)
                            <td>{{ $userData->Name }}</td>
                            <td>{{ $userData->Age }}</td>
                            <td> <a href="mailto:{{ $userData->Email }}">{{ $userData->Email }}</a> </td>
                            <td><a href="tel:{{ $userData->Email }}">{{ $userData->Phone }}</a></td>
                            <td>{{ $userData->Password }}</td>
                             <td>{{ $userData->User_Type }}</td>

                            <td><img src="{{ $userData->Image }}" alt="User Image" style="width: 100px; height: 100px;"></td>  

                            <td>
                                <!-- <a href="{{ url('/edit_form/'.$userData->User_ID) }}">Edit</a> |
                                <a href="{{ url('/delete_form/'.$userData->User_ID) }}" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a> -->
                                <a href="{{url('/delete')}}{{$userData->User_ID}}" onclick="return confirm('Are You Sure ?')">Delete</a>
                                 <a href="{{url('/edit_details')}}{{$userData->User_ID}}">Edit</a>
                                 @if($userData->Auth_Status == 0)
                                 <a href="{{ route('auth_rout', ['id' => $userData->User_ID, 'operation' => 'Block']) }}"class="btn btn-danger btn-sm">Block</a>
                                 @endif
                                 @if($userData->Auth_Status == 1)
                                 <a href="{{ route('auth_rout', ['id' => $userData->User_ID, 'operation' => 'Unblock']) }}" class="btn btn-success btn-sm">Un-block</a>
                                 @endif
                                 <!-- <a href="{{url('/logout_rout')}}"><button>LogOut</button></a>  -->

                        </tr> @endforeach
                    </tbody>
                </table>
            </div>   
         @endif

</body>
</html>
