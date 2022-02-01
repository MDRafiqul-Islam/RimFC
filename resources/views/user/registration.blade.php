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
    </style>
    <body>
        <div class="container">
    <form action="{{route('user.registration')}}" method="post">
        <h1>User Registration</h1>
        @csrf
    <div class="form-field">
        <input type="text" name="name" placeholder="Full Name">
    </div>
    <div class="form-field">
        <input type="text" name="mobile" placeholder="Mobile">
    </div>
    <div class="form-field">
        <input type="email" name="email" placeholder="Email">
    </div>
    <div class="form-field">
      <input type="password" name="password" placeholder="Password" minlength="6">
    </div>
    <div class="form-field">
        <input type="hidden" name="photo" value="default.jpg">
      </div>
      <div class="form-field">
        <button class="btn" type="submit">Registration</button>
      </div>
        </div>
    </form>
    </body>
    </html>
