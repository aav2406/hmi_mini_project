<html>
    <head>
        <title>
        @foreach($users as $user)
            @if ($user->division == 12)
                D7A
            @elseif ($user->division == 13)
                D7B
            @elseif ($user->division == 14)
                D7C
            @elseif ($mark->division_id == 21)
                D12A
            @elseif ($mark->division_id == 22)
                D12B
            @elseif ($mark->division_id == 23)
                D12C
            @elseif ($mark->division_id == 30)
                D17A
            @elseif ($mark->division_id == 31)
                D17B
            @elseif ($mark->division_id == 32)
                D17C
            @endif
            @break
        @endforeach Parent Details</title>
    </head>
    <body>
        <table style="width:100%" border="1">
            <thead>
                <tr>
                    <th style="text-align:center" colspan="17"><strong>V.E.S. INSTITUTE OF TECHNOLOGY, CHEMBUR, MUMBAI - 400074</strong></th>
                </tr>
                <tr>
                    <th style="text-align:center" colspan="17"><strong>DEPARTMENT OF COMPUTER ENGINEERING</strong></th>
                </tr>
                @foreach($users as $user)
                    @if ($user->division == 12)
                        <tr>
                            <th style="text-align:center" colspan="17"><strong>Class/Division : D7A</strong></th>
                        </tr>
                    @elseif ($user->division == 13)
                        <tr>
                            <th style="text-align:center" colspan="17"><strong>Class/Division : D7B</strong></th>
                        </tr>
                    @elseif ($user->division == 14)
                        <tr>
                            <th style="text-align:center" colspan="17"><strong>Class/Division : D7C</strong></th>
                        </tr>
                    @elseif ($mark->division_id == 21)
                        <tr>
                            <th style="text-align:center" colspan="17"><strong>Class/Division : D12A</strong></th>
                        </tr>
                    @elseif ($mark->division_id == 22)
                        <tr>
                            <th style="text-align:center" colspan="17"><strong>Class/Division : D12B</strong></th>
                        </tr>
                    @elseif ($mark->division_id == 23)
                        <tr>
                            <th style="text-align:center" colspan="17"><strong>Class/Division : D12C</strong></th>
                        </tr>
                    @elseif ($mark->division_id == 30)
                        <tr>
                            <th style="text-align:center" colspan="17"><strong>Class/Division : D17A</strong></th>
                        </tr>
                    @elseif ($mark->division_id == 31)
                        <tr>
                            <th style="text-align:center" colspan="17"><strong>Class/Division : D17B</strong></th>
                        </tr>
                    @elseif ($mark->division_id == 32)
                        <tr>
                            <th style="text-align:center" colspan="17"><strong>Class/Division : D17C</strong></th>
                        </tr>
                    @endif
                    @break
                @endforeach
                <tr>
                    <th style="text-align:center" colspan="17"><strong>Student Personal Information</strong></th>
                </tr>
                <tr>
                    <th style="text-align:center" colspan="3"><strong>STUDENT</strong></th>
                    <th style="text-align:center" colspan="14"><strong>PARENT 1</strong></th>
                    {{-- <th style="text-align:center" colspan="7"><strong>PARENT 1</strong></th>
                    <th style="text-align:center" colspan="7"><strong>PARENT 2</strong></th> --}}
                </tr>
                <tr>
                    <th style="text-align:center"><strong>Roll No</strong></th>
                    <th style="text-align:center" colspan="2"><strong>Name</strong></th>
                    <th style="text-align:center" colspan="5"><strong>Name</strong></th>
                    <th style="text-align:center" colspan="4"><strong>Mobile</strong></th>
                    <th style="text-align:center" colspan="5"><strong>Email</strong></th>
                    {{-- <th style="text-align:center" colspan="2"><strong>Name</strong></th>
                    <th style="text-align:center" colspan="2"><strong>Mobile</strong></th>
                    <th style="text-align:center" colspan="3"><strong>Email</strong></th>
                    <th style="text-align:center" colspan="2"><strong>Name</strong></th>
                    <th style="text-align:center" colspan="2"><strong>Mobile</strong></th>
                    <th style="text-align:center" colspan="3"><strong>Email</strong></th> --}}
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                        <tr>
                            <td style="text-align:center">{{$user->roll_no}}</td>
                            <td style="text-align:center" colspan="2">{{$user->name}}</td>
                            <td style="text-align:center" colspan="5">{{$user->parentname1}}</td>
                            <td style="text-align:center" colspan="4">{{$user->parentphone_no1}}</td>
                            <td style="text-align:center" colspan="5">{{$user->parentemail1}}</td>
                            {{-- <td style="text-align:center" colspan="2">{{$user->parentname1}}</td>
                            <td style="text-align:center" colspan="2">{{$user->parentphone_no1}}</td>
                            <td style="text-align:center" colspan="3">{{$user->parentemail1}}</td>
                            <td style="text-align:center" colspan="2">{{$user->parentname2}}</td>
                            <td style="text-align:center" colspan="2">{{$user->parentphone_no2}}</td>
                            <td style="text-align:center" colspan="3">{{$user->parentemail2}}</td> --}}
                        </tr>
            @endforeach
            </tbody>
        </table>
    </body>
</html>