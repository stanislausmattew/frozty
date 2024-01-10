<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Website Logs</h1>

    <input type="button" onclick="location.href='{{ url('admin')}}';" value="Back" />

    <br><br>

    <table border="2">
        <thead>
            <tr>
                <th>No.</th>
                <th>IP</th>
                <th>URL</th>
                <th>Status Code</th>
                <th>TIME</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($logs as $log)
                <tr>
                    <td>{{$log->id}}</td>
                    <td>{{$log->ip}}</td>
                    <td>{{$log->url}}</td>
                    <td>{{$log->status_code}}</td>
                    <td>{{$log->created_at}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center">No Logs</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
