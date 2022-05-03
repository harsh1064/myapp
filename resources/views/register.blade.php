<!DOCTYPE html>
<html lang="en">
<head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
                 integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
                 crossorigin="anonymous">


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="container">
  <h3>{{$title}}</h3>
  
  <div class="container">
    <form action="{{$url}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>First Name: </label>
            <input type="text" class="form-control" name="fname" placeholder="first name" value="@if($tu == 'U') {{$user->name}} @else {{old('fname')}} @endif"/>
            <span class="text-danger">
                @error('fname')
                    {{$message}}
                @enderror
            </span>
        </div> 
        
        <!-- <div class="form-group">
            <label>Last Name: </label>
            <input type="text" class="form-control" name="lname" placeholder="last name" value="{{old('lname')}}"/>
            <span class="text-danger">
                @error('lname')
                    {{$message}}
                @enderror
            </span>
        </div>  -->

        <div class="form-group">
            <label>Email: </label>
            <input type="text" class="form-control" name="email" placeholder="email" value="@if($tu == 'U') {{$user->email}} @else {{old('email')}} @endif"/>
            <span class="text-danger">
                @error('email')
                    {{$message}}
                @enderror
            </span>
        </div> 

        @if($tu == 'R')
        <div class="form-group">
            <label>Password: </label>
            <input type="password" class="form-control" name="password" placeholder="password"/>
            <span class="text-danger">
                @error('password')
                    {{$message}}
                @enderror
            </span>
        
        </div>
        
        <div class="form-group">
            <label>Confirm Password: </label>
            <input type="password" class="form-control" name="cpassword" placeholder="confirm password"/>
            <span class="text-danger">
                @error('cpassword')
                    {{$message}}
                @enderror
            </span>
        
        </div>

        @endif
        
        <div class="form-group">
            <label>Upload Your Photo: </label>
            <input type="file" class="form-control-file" name="pic" />
        </div> 

        <div class="form-group">
            <a href="{{route('user.submit')}}">
                <button type="submit" class="btn btn-primary" name="submit">Register </button>
            </a>
        </div> 
    </form>
  </div>
</div>
</body>
</html>