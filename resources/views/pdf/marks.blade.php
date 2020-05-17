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
            @endif
            @break
        @endforeach 
        @foreach($marks as $mark)
                    @if ($mark->subject_id == 1 && $mark->subject->semester == 4)
                        AM IV
                    @elseif ($mark->subject_id == 2 && $mark->subject->semester == 4)
                        OS
                    @elseif ($mark->subject_id == 3 && $mark->subject->semester == 4)
                        COA
                    @elseif ($mark->subject_id == 4 && $mark->subject->semester == 4)
                        AOA
                    @elseif ($mark->subject_id == 5 && $mark->subject->semester == 4)
                        CG
                    @elseif ($mark->subject_id == 6 && $mark->subject->semester == 3)
                        AM III
                    @elseif ($mark->subject_id == 7 && $mark->subject->semester == 3)
                        DLDA
                    @elseif ($mark->subject_id == 8 && $mark->subject->semester == 3)
                        DIS
                    @elseif ($mark->subject_id == 9 && $mark->subject->semester == 3)
                        ECCF
                    @elseif ($mark->subject_id == 10 && $mark->subject->semester == 3)
                        DS
                    @endif
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
                    @endif
                    @break
                @endforeach
                @foreach($marks as $mark)
                    @if ($mark->subject_id == 1 && $mark->subject->semester == 4)
                        <tr>
                            <th style="text-align:center" colspan="17"><strong>Subject : Applied Mathematics IV</strong></th>
                        </tr>
                    @elseif ($mark->subject_id == 2 && $mark->subject->semester == 4)
                        <tr>
                            <th style="text-align:center" colspan="17"><strong>Subject : Operating System</strong></th>
                        </tr>
                    @elseif ($mark->subject_id == 3 && $mark->subject->semester == 4)
                        <tr>
                            <th style="text-align:center" colspan="17"><strong>Subject : Computer Organization and Architecture
                            </strong></th>
                        </tr>
                    @elseif ($mark->subject_id == 4 && $mark->subject->semester == 4)
                        <tr>
                            <th style="text-align:center" colspan="17"><strong>Subject : Analysis of Algorithms</strong></th>
                        </tr>
                    @elseif ($mark->subject_id == 5 && $mark->subject->semester == 4)
                        <tr>
                            <th style="text-align:center" colspan="17"><strong>Subject : Computer Graphics</strong></th>
                        </tr>
                    @elseif ($mark->subject_id == 6 && $mark->subject->semester == 3)
                        <tr>
                            <th style="text-align:center" colspan="17"><strong>Subject : Applied Mathematics III</strong></th>
                        </tr>
                    @elseif ($mark->subject_id == 7 && $mark->subject->semester == 3)
                        <tr>
                            <th style="text-align:center" colspan="17"><strong>Subject : Digital Logic Design and Analysis</strong></th>
                        </tr>
                    @elseif ($mark->subject_id == 8 && $mark->subject->semester == 3)
                        <tr>
                            <th style="text-align:center" colspan="17"><strong>Subject : Discrete Mathematics</strong></th>
                        </tr>
                    @elseif ($mark->subject_id == 9 && $mark->subject->semester == 3)
                        <tr>
                            <th style="text-align:center" colspan="17"><strong>Subject : Electronic Circuits and Communication Fundamentals
                            </strong></th>
                        </tr>
                    @elseif ($mark->subject_id == 10 && $mark->subject->semester == 3)
                        <tr>
                            <th style="text-align:center" colspan="17"><strong>Subject : Data Structures</strong></th>
                        </tr>
                    @endif
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