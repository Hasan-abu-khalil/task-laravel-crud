<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cards</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" style="color: white" href="#">Welcome</a>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Link 1</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Link 2</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Link 3</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('cards.index') }}">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                
            </ul>
        </div>
        <form class="form-inline">
            <a href="{{ route('cards.create') }}"><button class="btn btn-outline-primary my-2 my-sm-0" type="button">Add</button></a>
        </form>
    </nav>
    @if (session()->has('message'))
        <div>
            <br>
            <div style="color: white; background: red; font-weight: bold; padding: 10px">
                Warning
            </div>
            <div style="border: 1px solid red; padding: 8px; color: red; background: rgb(255, 210, 210);">
                {{ session()->get('message') }}
            </div>
        </div>
    @endif
    <br><br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cards as $card)
                <tr>
                    <th scope="row">{{ $card->id }}</th>
                    <td>{{ $card->name }}</td>
                    <td>{{ $card->description }}</td>
                    <td>{{ $card->price }}</td>
                    <td>
                        <a href="{{ route('cards.edit', $card->id) }}"><button type="button" class="btn btn-success">Edit</button></a>
                        <div style="display: inline-block">
                            <form action="{{ route('cards.destroy', $card->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Bootstrap and JavaScript libraries -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
