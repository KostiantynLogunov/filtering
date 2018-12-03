<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <aside>
                    <form action="/users">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ request()->name }}">
                        </div>

                        <div class="form-group">
                            <label for="is_active">Is Active:</label>
                            <label for="is_active">YES</label>
                            <input type="radio" name="is_active" value="1" id="is_active" {{ request()->is_active == 1 ? 'checked' : ''}}>
                            <label for="is_not_active">NO</label>
                            <input type="radio" name="is_active" value="0" id="is_not_active" {{ ! request()->is_active ? 'checked' : ''}}>
                        </div>

                        <div class="form-group">
                            <label for="name">Birthday</label>
                            <input type="text" name="birthday" value="{{  request()->birthday }}">
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender">
                                <option value="1" {{ request()->gender == 1 ? 'selected' : '' }}>Male</option>
                                <option value="2" {{ request()->gender == 2 ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Filter</button>
                    </form>
                </aside>
            </div>
            @foreach($users as $user)
                <div class="card" style="width: 18rem;">
                    {{--<img class="card-img-top" src=".../100px180/" alt="Card image cap">--}}
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <p class="card-text">Birthday: {{ $user->info->birthday }}</p>
                        <p class="card-text">Gender: {{ $user->gender == '1' ? 'male' : 'female' }}</p>
                        <p class="card-text"> Is active: {{ $user->is_active ? 'Yes' : 'No' }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
