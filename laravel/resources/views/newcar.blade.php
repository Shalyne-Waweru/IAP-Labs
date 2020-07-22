<!DOCTYPE html>
<html>
    <head>
            <title>  </title>
    </head>

    <body>
    <!--        <form method = "POST" action = "/car" enctype = "multipart/form-data">
                {{ csrf_field() }}
                Make: <input type = "text" name = "make" value = "{{old('make')}}" /> <br>

                Model: <input type = "text" name = "model" value = "{{old('model')}}" /> <br>

                Date Produced: <input type = "date" name = "produced_on" value = "{{old('produced_on')}}" /> <br>

                <input type = "file" name = "image" /> <br>

                <input type = "submit" value = "SAVE" /> <br>
                
        </form>
        -->
        @if (Session::has('form_submit'))
		    {{ session('form_submit') }}
		@endif

        @if (count($errors))
		    @foreach ($errors->all() as $error)
		       <li> {{$error}} </li>
            @endforeach
		@endif

        <form method = "POST" action = "/car" enctype = "multipart/form-data">
        {{ csrf_field() }}
        Make: <input type = "text" name = "make" value = "{{old('make')}}" /> <br> <br>

		Model: <input type = "text" name = "model" value = "{{old('model')}}" /> <br> <br>

		Date Produced: <input type = "date" name = "produced_on" value = "{{old('produced_on')}}" /> <br> <br>

            <input type = "file" name = "image" /> <br> <br>

			<input type = "submit" value = "SAVE" /> 
			
		</form>
    </body>

</html>