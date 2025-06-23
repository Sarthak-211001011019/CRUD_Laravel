<!DOCTYPE html>
<html>
<head>
    <title>Edit User Data</title>
</head>
<body>
     @if(isset($userdetails))
    <h2>Update User Information</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url('/update_form/'.$userdetails->User_ID) }}">

        @csrf
       
        <label>Name:</label><br>
        <input type="text" name="Name" value="{{ old('Name', $userdetails->Name) }}" required><br><br>

        <label>Age:</label><br>
        <input type="number" name="Age" value="{{ old('Age', $userdetails->Age) }}" required><br><br>

        <label>Email:</label><br>
        <input type="text" name="Email" value="{{ old('Email', $userdetails->Email) }}" required><br><br>

        <label>Phone:</label><br>
        <input type="text" name="Phone" value="{{ old('Phone', $userdetails->Phone) }}" required><br><br>

        <label>Current Image:</label><br>
        <img src="{{ asset($userdetails->Image) }}" width="100"><br><br>

        <label>Upload New Image:</label><br>
        <input type="file" name="Image"><br><br>
        
        <button type="submit">Update</button>
        <a href="{{ url('/display') }}">Cancel</a>
        
        @endif

    </form>

</body>
</html>
