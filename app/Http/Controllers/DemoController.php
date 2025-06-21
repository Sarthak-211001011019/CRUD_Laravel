<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View; 
use Illuminate\Support\Facades\DB;     // Importing the DB facade to interact with the database

class DemoController extends Controller
{
    public function first_example(){
        echo "<h3>Welcome Laraval 10...</h3>";
    }

    public function signup_form(): View
    {
        return view('Signup_Form');          // Need to Create Same File Name Under resources-> views-> 'Signup_Form.blade.php'
    }

    public function submit_form(Request $req){
        // print_r($req->all()); // This will print all the data submitted through the Signup form
        //dd($req->all());  // This will dump and die, showing all the data submitted by the Signup form
        $req->validate(
            [
                'Name' => "required|regex:/^[A-Za-z ]{3,30}$/",
                'Age' => "required|integer|between:18,40",
                'Email' => "required|regex: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$/",
                'Phone' => "required|regex:/^[6-9][0-9]{9}$/",
                'Pass' => "required|regex: /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/",
                'Image' => "required|mimes:jpg,jpeg,png,gif|max: 4096"   //kb
            ]
        );

        $name = $req->input('Name'); // Accessing the 'name' field from Signup
        $age = $req->input('Age'); // Accessing the 'age' field from the Signup
        $email = $req->input('Email'); // Accessing the 'email' field from the Signup
        $phone = $req->input('Phone'); // Accessing the 'phone' field from the Signup
        $password = $req->input('Pass'); // Accessing the 'password' field from the Signup

        $file = $req->file('Image'); // Accessing the uploaded file from the Signup
        // $fileName = uniqid()."_".$file->getClientOriginalName(); // Getting the original file 
        $fileName = time()."_".$file->getClientOriginalName(); // Getting the original file 
        $UploadPath =  './uploads'; // Path to the uploads directory   or also use  // public_path('uploads'); 
        $file->move($UploadPath, $fileName); // Moving the uploaded file to the uploads directory
        
        $SubmitData = [
            'Name' => $name,
            'Age' => $age,
            'Email' => $email,
            'Phone' => $phone,
            'Password' => $password,
            'Image' => $UploadPath."/".$fileName
        ];
        DB::table('1_laravel')->insert($SubmitData); // Inserting the data into the 1-laravel table in the database
        // return view('Signup_Form')->with('userData', $SubmitData);  // Passing the submitted data to the signup_form page for viewing (using view  helper function)
          // You can also save the data to the database or perform other actions here
         return redirect('/sign_in');                                                                          
    }

    public function display_data(Request $req)
    {
        // dd($req->all()); // This will dump and die, showing all the data submitted by the Signup form
        $fetchdata= DB::table('1_laravel')->get();
        return view('display')->with('alluserinfo', $fetchdata);
       
    } 

    // public function edit_data($User_ID)
    // {
    // $record = DB::table('1_laravel')->where('User_ID', $User_ID)->first();  // Fetch user data
    // return view('edit_form')->with('userdetails', $record);              // Pass it to view

    // }

    // public function update_form(Request $req, $User_ID)
    // {
    //     // dd($req->all()); // This will dump and die, showing all the data submitted by the Signup form
    //     $req->validate(
    //         [
    //             'Name' => "required|regex:/^[A-Za-z ]{3,30}$/",
    //             'Age' => "required|integer|between:18,40",
    //             'Email' => "required|regex: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$/",
    //             'Phone' => "required|regex:/^[6-9][0-9]{9}$/",
    //             'Pass' => "required|regex: /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/",
    //             'Image' => "mimes:jpg,jpeg,png,gif|max: 4096"   //kb
    //         ]
    //     );

    //     $name = $req->input('Name'); // Accessing the 'name' field from Signup
    //     $age = $req->input('Age'); // Accessing the 'age' field from the Signup
    //     $email = $req->input('Email'); // Accessing the 'email' field from the Signup
    //     $phone = $req->input('Phone'); // Accessing the 'phone' field from the Signup
    //     $password = $req->input('Pass'); // Accessing the 'password' field from the Signup
        

        
    // }  
    
    // public function delete_data($User_ID)
    // {
    //     // dd($req->all()); // This will dump and die, showing all the data submitted by the Signup form
    //     DB::table('1_laravel')->where('User_ID', $User_ID)->delete(); // Deleting the user data from the database
    //     echo "<script>alert('Data Deleted Successfully');</script>"; // Alert message for successful deletion
    //     return redirect('/display'); // Redirecting to display page after deletion
    // }


    public function delete_user($id)
    {
        DB::table('1_laravel')->where('User_ID',$id)->delete();
        return redirect('/display');
    }

    public function edit_details($id)
    {
        $details = DB::table('1_laravel')->where('User_ID',$id)->get()->first();  // first() this only shows index-0 data
        return view('/edit_userdata')->with('Userdata',$details);
    }

    public function update_details(Request $req)
    {
        $req->validate([
            'Name' => "required|regex:/^[A-Za-z ]{3,30}$/",
            'Age' => "required|integer|between:18,40",
            'Email' => "required|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$/",
            'Phone' => "required|regex:/^[6-9][0-9]{9}$/",
            'Image' => "nullable|mimes:jpg,jpeg,png,gif|max:4096"
        ]);

        $user_id = $req->input('User_ID');
        $name = $req->input('Name');
        $age = $req->input('Age');
        $email = $req->input('Email');
        $phone = $req->input('Phone');

        // Start preparing update data
        $SubmitData = [
            'Name' => $name,
            'Age' => $age,
            'Email' => $email,
            'Phone' => $phone,
        ];

        // Check if image was uploaded
        if ($req->hasFile('Image')) {
            $file = $req->file('Image');
            $fileName = time()."_".$file->getClientOriginalName();
            $UploadPath = './uploads';
            $file->move($UploadPath, $fileName);
            $SubmitData['Image'] = $UploadPath."/".$fileName;
        }

        // Perform update
        DB::table('1_laravel')->where('User_ID', $user_id)->update($SubmitData);

        echo "<script>alert('Update Success')</script>";
        // return redirect('/edit_userdata');
    }

    public function user_login()
    {
        return view ('/sign_in');   // sign_in.blade.php 
    }

    public function login_details_check(Request $req)
    {
         $emailphone = $req->input('EmailorPhone');
         $password = $req->input('Password');
         $login_data = DB::table('1_laravel')->where('Email', $emailphone)->orWhere('Phone',$emailphone)->get()->first();

         if(empty($login_data)){
            return redirect('/sign_in')->with('Message','User Not Found  !');
         }
         else{
            $db_password = $login_data->Password;
            if($db_password === $password)
            {
                $user_id = $login_data->User_ID;
                $user_name = $login_data->Name;
                $req->session()->put('session_id', $user_id);
                $req->session()->put('session_name', $user_name);
                return redirect('/login_display_rout');  // go to login rout in  web.php
            }
            else{
                return redirect('/sign_in')->with('Message','Password Dosent Match');
            } 
         }

    }

    public function user_display()
    {
        $user_id = session('session_id');
        $user_name = session('session_name');
        $fetchdata= DB::table('1_laravel')->where('User_ID',$user_id)->get()->first();
        return view('/login_display')->with('alluserinfo', $fetchdata)
                                     ->with('Message Login Sucess'.$user_name);
    }

    public function change_pass($id){
        return view ('/change_password')->with('user_id',$id); // change_password.blade.php
    }

    public function Newpass_logic(Request $req)
    {   
        $user_id = $req->input('User_ID');
        $pass_fetch = DB::table('1_laravel')->where('User_ID',$user_id)->get()->first();

        $old_pass  = $req->input('OldPassword');
        $new_pass = $req-> input('NewPassword');
        $con_pass = $req-> input('ConPassword');

        if ($old_pass !== $pass_fetch->Password) {
	    echo "<script>alert('Wrong Old Password Try Again')</script>";
	    return view('/change_password');
	    exit;
	    }

        if ($old_pass === $new_pass) {
        echo "<script>alert('Old Password & New Password must be Different. Try Again')</script>";
        return view('/change_password');
        exit;
        }

        if ($new_pass !== $con_pass) {
        echo "<script>alert('New Password & Confirm Password must be the Same. Try Again')</script>";
        return view('/change_password');
        exit;
        }

        $password = ['Password'=>$new_pass];

        $update_pass = DB::table('1_laravel')->where('User_ID',$user_id)->update($password);
         echo "<script>alert('Update Success')</script>";

       
    }// Password Change 




}








































        // You can access individual fields like this:
        // echo $req->input('name'); // Assuming you have a field named 'name' in your form
        // echo $req->input('email'); // Assuming you have a field named 'email' in your form
        // echo $req->input('password'); // Assuming you have a field named 'password' in your form
        // Alternatively, you can use the shorthand:
        // echo $req->name; // Assuming you have a field named 'name' in your form
        // echo $req->email; // Assuming you have a field named 'email' in your form
        // echo $req->password; // Assuming you have a field named 'password' in your form
        // Here you can process the form data as needed
        // For example, you can save it to the database, send an email, etc.
        // For now, we are just dumping the data to see what was submitted
        // You can also return a response or redirect after processing the data
        // return response()->json($req->all()); // This will return the submitted data as a JSON response
        // Or you can redirect back with a success message
        // return redirect()->back()->with('success', 'Form submitted successfully!'); // Redirecting back with a success message
        // Note: Make sure to handle the request data securely, especially if it contains sensitive information like passwords.
        // You can also log the request data if needed
        // Log::info('Form submitted', $req->all()); // This will log the submitted data to the Laravel log file
        // If you want to redirect to a different route after processing the form, you can do so
        // return redirect('/some-route')->with('success', 'Form submitted successfully!'); // Redirecting to some route with a success message
        // Note: Make sure to handle the request data securely, especially if it contains sensitive information like passwords.
        // You can also validate the request data here if needed
        // For example:
        // $req->validate([
        //     'name' => 'required|max:255',    
        //     'email' => 'required|email',
        //     'password' => 'required|min:6',
        // ]);
        // After validation, you can process the data, save it to the database, etc.
        // return redirect('/first')->with('success', 'Form submitted successfully!'); // Redirecting to first_example with a success message
