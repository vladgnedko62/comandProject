<table style='width:80%; '>
    <tr>
        <td><a href='#' target='_blank'><img src='https://i.postimg.cc/pdZ5H1cx/logoMail.png' border='0' alt='logoMail' /></a></td>
    </tr>
</table>
<table style='width:80%; '>
    <tr>
        <td>
            <h1 style=''>It`s time for: {{$alertName}}</h1>
        </td>
    </tr>
</table>
<table style='width:80%; '>
    <tr>
        <td>
            @foreach($images as $image)
            <img src="localhost/{{$image->image}}" alt="">
       
           @endforeach
        </td>
    </tr>
</table>
<table style='width:80%; '>
    <tr>
        <td>
           <a href="#">Go to Site</a>
        </td>
    </tr>
</table>