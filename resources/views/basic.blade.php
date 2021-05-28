
<!DOCTYPE html>
<html>
<head>
    <title>Elevation Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <style>
        table {
            width:70%;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 7px;
            text-align: left;
        }
    </style>

</head>

<body>

<h1 class="title is-1">Elevation Test</h1>

<div class="container">

    <div class="panel panel-primary">
        <br />
        <div class="panel-heading"><h2>Select Test File</h2></div>
        <div class="panel-body">

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <strong>{{ $message }}</strong>
                </div>
                <br />
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Warning!</strong> There were some issues with your file.
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                    <br />
            @endif

            <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>

                    <div class="col-md-6">
                        <input type="file" name="file" class="form-control">
                    </div>
                        <div class="col-md-6" >
                            <br />
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div>

                </div>
            </form>

        </div>
    </div>

</div>

@if ($message = Session::get('success'))

    <div style="padding-left:16px">
        <br />

        <table>
            <h2>User Account Information</h2>
            <thead>
            <tr>
                <th scope="col">Account Number</th>
                <th scope="col">Request Type</th>
                <th scope="col">Account Name</th>
                <th scope="col">Rate</th>
                <th scope="col">Effective Date</th>
                <th scope="col">Reason Code</th>

            </tr>
            </thead>
            <tbody>

            @foreach (Session::get('data') as $userData)
                <tr>
                    @foreach ($userData as $individualUser=> $data)
                        <td>{{$data}}</td>
                    @endforeach
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endif

</body>

</html>
