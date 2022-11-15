<form style="display:flex;flex-direction:column"  method="post" action="{{route('user.register')}}">
@csrf
<input type="text" name="email" placeholder="Input Email">
@error('email')
  <label> {{$message}}</label>
@enderror
<input type="text" name="name" placeholder="Input Name">
@error('name')
  <label> {{$message}}</label>
@enderror
<input type="password" name="password" placeholder="Input Password">
@error('password')
  <label> {{$message}}</label>
@enderror
<input type="password" name="password_check" placeholder="Repeat Password">
 <button type="submit">Submit</button>
</form>