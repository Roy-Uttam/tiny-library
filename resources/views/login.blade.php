@include('main')

<div class="account-page">
        
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-2">
                <img src="{{ asset('images/image1.png')}}" width="50%">
            </div>
            <div class="col-2">
                <div class="form-container">
                    @if(session()->has('error'))
                        <div class="alert alert-warning">
                            {{ session()->get('error') }}
                        </div>
                    @endif

                    <div class="form-btn">
                        <span onclick="register()">Register</span>
                        <span onclick="login()">Login</span>
                        <hr id="Indicator">
                    </div>
                    <form id="LoginForm" action="{{ route('savelogin') }}" method="POST">
                        @csrf
                        <input type="email" name="email" placeholder="Email" value="{{old('email')}}" required>
                        <input type="password" name="password" placeholder="Password" required>
                        <button type="submit" value="Login" class="btn">Login</button>
                        <a href="">Forget Password</a>
                    </form>

                    <form id="RegForm" {{ route('register') }} method="POST">
                        @csrf
                        <input type="text" name="fname" placeholder="Firstname" required>
                        <input type="text" name="lname" placeholder="Lastname" required>
                        <input type="email" name="email" placeholder="Email">
                        <input type="password" name="password" placeholder="Password" required>
                        <button type="submit" name="reg" class="btn">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    var MenuItems = document.getElementById("MenuItems");
    MenuItems.style.maxHeight = "0px";
    function menutoggle() {
        if (MenuItems.style.maxHeight == "0px") {
            MenuItems.style.maxHeight = "200px"
        }
        else {
            MenuItems.style.maxHeight = "0px"
        }
    }
</script>
  <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.0/mdb.min.js"
    ></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
