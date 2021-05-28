<!DOCTYPE html>
<html>
<head>
    <title>Table View</title>
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

<div style="padding-left:27px">


    <a href="/" >Home</a>
    <a href="/table" >Table View</a>

</div>
<h1 class="title is-1">Static Table View</h1>

<div style="padding-left:16px">


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

        @foreach ($users as $user)
            <tr>
            @foreach ($user as $index=> $data)
                    <td>{{$data}}</td>
            @endforeach
            </tr>
        @endforeach


        </tbody>
    </table>




</div>
</body>
</html>
