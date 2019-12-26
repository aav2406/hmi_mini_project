<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <p style="text-align:center"><strong>V.E.S. INSTITUTE OF TECHNOLOGY, CHEMBUR, MUMBAI - 400074</strong></p>
        <br><p style="text-align:center"><strong>DEPARTMENT OF COMPUTER ENGINEERING</strong></p>
        <br><table style="width:100%" border="1" cellspacing="none">
            <thead>
                <tr>    
                    <th style="text-align:center"><strong>Roll No</strong></th>
                    <th style="text-align:center"><strong>Name</strong></th>
                    <th style="text-align:center"><strong>Test 1</strong></th>
                    <th style="text-align:center"><strong>Test 2</strong></th>
                    <th style="text-align:center"><strong>Average</strong></th>
                </tr>
            </thead>
            <tbody>
                @foreach($marks as $mark)
                    @if ($mark->ia2 == '-1')
                        @if ($mark->ia1 == '-2')
                            <tr>
                                <td style="text-align:center">{{ $mark->user->roll_no}}</td>
                                <td style="text-align:center">{{ $mark->user->name}}</td>
                                <td style="text-align:center">Absent</td>
                                <td style="text-align:center">-</td>
                                <td style="text-align:center">-</td>
                            </tr>
                        @else
                            <tr>
                                <td style="text-align:center">{{ $mark->user->roll_no}}</td>
                                <td style="text-align:center">{{ $mark->user->name}}</td>
                                <td style="text-align:center">{{ $mark->ia1 }}</td>
                                <td style="text-align:center">-</td>
                                <td style="text-align:center">-</td>
                            </tr>
                        @endif
                    @else
                        @if ($mark->ia1 == '-2' && $mark->ia2 == '-2')
                            <tr>
                                <td style="text-align:center">{{ $mark->user->roll_no}}</td>
                                <td style="text-align:center">{{ $mark->user->name}}</td>
                                <td style="text-align:center">Absent</td>
                                <td style="text-align:center">Absent</td>
                                <td style="text-align:center">-</td>
                            </tr>
                        @elseif ($mark->ia1 == '-2')
                            <tr>
                                <td style="text-align:center">{{ $mark->user->roll_no}}</td>
                                <td style="text-align:center">{{ $mark->user->name}}</td>
                                <td style="text-align:center">Absent</td>
                                <td style="text-align:center">{{ $mark->ia2 }}</td>
                                <td style="text-align:center">-</td>
                            </tr>
                        @elseif ($mark->ia2 == '-2')
                            <tr>
                                <td style="text-align:center">{{ $mark->user->roll_no}}</td>
                                <td style="text-align:center">{{ $mark->user->name}}</td>
                                <td style="text-align:center">{{ $mark->ia1 }}</td>
                                <td style="text-align:center">Absent</td>
                                <td style="text-align:center">-</td>
                            </tr>
                        @else
                            <tr>
                                <td style="text-align:center">{{ $mark->user->roll_no}}</td>
                                <td style="text-align:center">{{ $mark->user->name}}</td>
                                <td style="text-align:center">{{ $mark->ia1 }}</td>
                                <td style="text-align:center">{{ $mark->ia2 }}</td>
                                <td style="text-align:center">{{ $mark->Avg }}</td>
                            </tr>
                        @endif
                    @endif
                @endforeach
                </tbody>
            </table>
        </body>
    </html>