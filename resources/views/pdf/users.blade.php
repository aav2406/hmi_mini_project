<table style="width:100%" border="1">
    <thead>
        <tr>
            <th style="text-align:center" colspan="17"><strong>V.E.S. INSTITUTE OF TECHNOLOGY, CHEMBUR, MUMBAI - 400074</strong></th>
        </tr>
        <tr>
            <th style="text-align:center" colspan="17"><strong>DEPARTMENT OF COMPUTER ENGINEERING</strong></th>
        </tr>
        @foreach($users as $user)
                <tr>
                    <th style="text-align:center" colspan="17"><strong>Class/Division : D{{$user->division - 5}}A</strong></th>
                </tr>
                @break
        @endforeach
        <tr>
            <th style="text-align:center" colspan="17"><strong>Student Personal Information</strong></th>
        </tr>
        <tr>
            <th style="text-align:center" colspan="3"><strong>STUDENT</strong></th>
            <th style="text-align:center" colspan="7"><strong>PARENT 1</strong></th>
            <th style="text-align:center" colspan="7"><strong>PARENT 2</strong></th>
        </tr>
        <tr>
            <th style="text-align:center"><strong>Roll No</strong></th>
            <th style="text-align:center" colspan="2"><strong>Name</strong></th>
            <th style="text-align:center" colspan="2"><strong>Name</strong></th>
            <th style="text-align:center" colspan="2"><strong>Mobile</strong></th>
            <th style="text-align:center" colspan="3"><strong>Email</strong></th>
            <th style="text-align:center" colspan="2"><strong>Name</strong></th>
            <th style="text-align:center" colspan="2"><strong>Mobile</strong></th>
            <th style="text-align:center" colspan="3"><strong>Email</strong></th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
                <tr>
                    <td style="text-align:center">{{$user->roll_no}}</td>
                    <td style="text-align:center" colspan="2">{{$user->name}}</td>
                    <td style="text-align:center" colspan="2">{{$user->parentname1}}</td>
                    <td style="text-align:center" colspan="2">{{$user->parentphone_no1}}</td>
                    <td style="text-align:center" colspan="3">{{$user->parentemail1}}</td>
                    <td style="text-align:center" colspan="2">{{$user->parentname2}}</td>
                    <td style="text-align:center" colspan="2">{{$user->parentphone_no2}}</td>
                    <td style="text-align:center" colspan="3">{{$user->parentemail2}}</td>
                </tr>
    @endforeach
    </tbody>
</table>