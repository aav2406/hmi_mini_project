<!DOCTYPE html>
<html>
    <head>
        <title>
        @foreach($marks as $mark)
            @if ($mark->division_id == 12)
                D7A
            @elseif ($mark->division_id == 13)
                D7B
            @elseif ($mark->division_id == 14)
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
        @endforeach 
        @foreach($marks as $mark)
            {{$mark->subject->subject}}
        @break
        @endforeach Marks Report</title>
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
                @foreach($marks as $mark)
                    @if ($mark->division_id == 12)
                        <tr>
                            <th style="text-align:center" colspan="17"><strong>Class/Division : D7A</strong></th>
                        </tr>
                    @elseif ($mark->division_id == 13)
                        <tr>
                            <th style="text-align:center" colspan="17"><strong>Class/Division : D7B</strong></th>
                        </tr>
                    @elseif ($mark->division_id == 14)
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
                @foreach($marks as $mark)
                    <tr>
                        <th style="text-align:center" colspan="17"><strong>Subject : {{$mark->subject->subject}}</strong></th>
                    </tr>
                    @break
                @endforeach
                <tr>    
                    <th style="text-align:center"><strong>Roll No</strong></th>
                    <th style="text-align:center" colspan="10"><strong>Name</strong></th>
                    <th style="text-align:center" colspan="2"><strong>Test 1</strong></th>
                    <th style="text-align:center" colspan="2"><strong>Test 2</strong></th>
                    <th style="text-align:center" colspan="2"><strong>Average</strong></th>
                </tr>
            </thead>
            <tbody>
                @foreach($marks as $mark)
                    @if ($mark->ia2 == '-1')
                        @if ($mark->ia1 == '-2')
                            <tr>
                                <td style="text-align:center">{{ $mark->user->roll_no}}</td>
                                <td style="text-align:center" colspan="10">{{ $mark->user->name}}</td>
                                <td style="text-align:center" colspan="2">Absent</td>
                                <td style="text-align:center" colspan="2">-</td>
                                <td style="text-align:center" colspan="2">-</td>
                            </tr>
                        @else
                            <tr>
                                <td style="text-align:center">{{ $mark->user->roll_no}}</td>
                                <td style="text-align:center" colspan="10">{{ $mark->user->name}}</td>
                                <td style="text-align:center" colspan="2">{{ $mark->ia1 }}</td>
                                <td style="text-align:center" colspan="2">-</td>
                                <td style="text-align:center" colspan="2">-</td>
                            </tr>
                        @endif
                    @else
                        @if ($mark->ia1 == '-2' && $mark->ia2 == '-2')
                            <tr>
                                <td style="text-align:center">{{ $mark->user->roll_no}}</td>
                                <td style="text-align:center" colspan="10">{{ $mark->user->name}}</td>
                                <td style="text-align:center" colspan="2">Absent</td>
                                <td style="text-align:center" colspan="2">Absent</td>
                                <td style="text-align:center" colspan="2">-</td>
                            </tr>
                        @elseif ($mark->ia1 == '-2')
                            <tr>
                                <td style="text-align:center">{{ $mark->user->roll_no}}</td>
                                <td style="text-align:center" colspan="10">{{ $mark->user->name}}</td>
                                <td style="text-align:center" colspan="2">Absent</td>
                                <td style="text-align:center" colspan="2">{{ $mark->ia2 }}</td>
                                <td style="text-align:center" colspan="2">-</td>
                            </tr>
                        @elseif ($mark->ia2 == '-2')
                            <tr>
                                <td style="text-align:center">{{ $mark->user->roll_no}}</td>
                                <td style="text-align:center" colspan="10">{{ $mark->user->name}}</td>
                                <td style="text-align:center" colspan="2">{{ $mark->ia1 }}</td>
                                <td style="text-align:center" colspan="2">Absent</td>
                                <td style="text-align:center" colspan="2">-</td>
                            </tr>
                        @else
                            <tr>
                                <td style="text-align:center">{{ $mark->user->roll_no}}</td>
                                <td style="text-align:center" colspan="10">{{ $mark->user->name}}</td>
                                <td style="text-align:center" colspan="2">{{ $mark->ia1 }}</td>
                                <td style="text-align:center" colspan="2">{{ $mark->ia2 }}</td>
                                <td style="text-align:center" colspan="2">{{ $mark->Avg }}</td>
                            </tr>
                        @endif
                    @endif
                @endforeach
                </tbody>
            </table>
        </body>
    </html>