<!DOCTYPE html>
<html>
    <head>
            <title>  </title>
    </head>

    <body>
        @foreach ($reviews as $review)
            <li> {{$review->reviewText}}  </li>
        @endforeach
    </body>

</html>