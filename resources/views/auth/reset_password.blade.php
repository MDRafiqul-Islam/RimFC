<style type="text/css">
    html{
      background-image: url('{{ asset('Football.jpg') }}');
    }

    body {
      font-family: 'Lato', sans-serif;
      color: #4A4A4A;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      overflow: hidden;
      margin: 0;
      padding: 0;
    }
    .error
    {
        font-family: 'Lato', sans-serif;
        color: black;
        align-items: top;
    }
    .success
    {
        font-family: 'Lato', sans-serif;
        color:green;
        align-items: top;
        margin-left: 20%;
    }
    form {
      width: 350px;
      position: relative;
    }

    form .form-field {
      display: flex;
      align-items: center;
      margin-bottom: 1rem;
      position: relative;
    }
    form input {
      font-family: inherit;
      width: 100%;
      outline: none;
      background-color: #fff;
      border-radius: 4px;
      border: none;
      display: block;
      padding: 0.9rem 0.7rem;
      box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16);
      font-size: 17px;
      color: #4A4A4A;
      text-indent: 40px;
    }
    form .btn {
      outline: none;
      border: none;
      cursor: pointer;
      display: inline-block;
      margin: 0 auto;
      padding: 0.9rem 2.5rem;
      text-align: center;
      background-color: #47AB11;
      color: #fff;
      border-radius: 4px;
      box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16);
      font-size: 17px;
    }
    .container {
            padding: 25px;
            background-color: lightblue;
        }

        .container h1{
            display: flex;
      justify-content: center;
      align-items: center;
        }
    .container .error1 .error{
      color:red;
      background-size: 30px;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    </style>
        <form action="{{ route('reset.password') }}" method="POST">
          @csrf
          <div class="container">
            <div class="form-field">
              <label for="disabledTextInput">Your Email</label>
              <input type="email" value="{{ $mail }}" name="mail" id="name" class="form-control" placeholder="Enter email">
            </div>
            <div class="form-field">
            <label for="exampleInputPassword1">New password</label>
            <input name="password" type="password" class="form-control" id="name" placeholder="Password">
          </div>
          <div class="form-field">
            <label for="exampleInputPassword1">Retype password</label>
            <input type="password" class="form-control" id="name" placeholder="Password">
          </div>
          <div class="form-field">
            <button class="btn" type="submit">Reset</button>
          </div>
          </form>
    </div>
  </div>
