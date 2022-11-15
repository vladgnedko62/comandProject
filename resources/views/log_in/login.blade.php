<form method="post" action="{{route('user.login')}}">
@csrf
@error('formError')
  <label> {{$message}}</label>
  <br>
@enderror
<input type="text" name="email" placeholder="Input Email">
<input type="text" name="password" placeholder="Input Password">
<button type="submit">Sign In</button>
</form>
<a href="/register">Register</a>