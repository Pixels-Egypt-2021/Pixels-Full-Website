<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Attack On Pixels | 2nd Recrutment ">
    <link rel="icon" href="{{ asset('images/attack/logo_b_r.png') }}" style="width=200px;"   >


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=New+Tegomin&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha3/css/bootstrap.min.css" integrity="sha512-fjZwDJx4Wj5hoFYRWNETDlD7zty6PA+dUfdRYxe463OBATFHyx7jYs2mUK9BZ2WfHQAoOvKl6oYPCZHd1+t7Qw==" crossorigin="anonymous" />
    <title>Attack On Pixels | Pixels Egypt</title>

    <style>
        td,th {
            white-space: nowrap;
        }
    </style>
   
</head>
<body>
    @if ($data)
    <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">E-Mail</th>
            <th scope="col">Phone</th>
            <th scope="col">University</th>
            <th scope="col">Department</th>
            <th scope="col">Academic Year</th>
            <th scope="col">Previous Volunteering</th>
            <th scope="col">About Pixels</th>
            <th scope="col">1st committee</th>
            <th scope="col">about 1st Committee</th>
            <th scope="col">1st Question</th>
            <th scope="col">2nd Question</th>
            <th scope="col">2nd Committe</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $member)
                <tr>
                    <th scope="row">{{ $key+1 }}</th>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->phone }}</td>
                    <td>{{ $member->univ }}</td>
                    <td>{{ $member->dep }}</td>
                    <td>{{ $member->acYear }}</td>
                    <td>{{ $member->preVolu }}</td>
                    <td>{{ $member->aboutPixels }}</td>
                    <td>{{ $member->committee }}</td>
                    <td>{{ $member->aboutComm }}</td>
                    <td>{{ $member->quesOne }}</td>
                    <td>{{ $member->quesTwo }}</td>
                    <td>{{ $member->secCommitte }}</td>
                </tr>
            @endforeach
          
        </tbody>
      </table>
@endif

</body>
</html>
