<!DOCTYPE html>
<html>
    <head>
        <title>Class Report</title>
    </head>
    <body>
        {{-- <p style="text-align:center"><strong>V.E.S. INSTITUTE OF TECHNOLOGY, CHEMBUR, MUMBAI - 400074</strong></p>
        <p style="text-align:center"><strong>DEPARTMENT OF COMPUTER ENGINEERING</strong></p> --}}
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
                <tr>
                    <th colspan="2"></th>
                    @foreach($marks as $mark)
                        @if ($mark->division_id >= 12 && $mark->division_id <= 14 && $mark->subject->semester == 4)
                            <th style="text-align:center" colspan="3"><strong>Applied Mathematics IV</strong></th>
                            <th style="text-align:center" colspan="3"><strong>Operating System</strong></th>
                            <th style="text-align:center" colspan="3"><strong>Computer Organization and Architecture</strong></th>
                            <th style="text-align:center" colspan="3"><strong>Analysis of Algorithms</strong></th>
                            <th style="text-align:center" colspan="3"><strong>Computer Graphics</strong></th>
                        @elseif ($mark->division_id >= 12 && $mark->division_id <= 14 && $mark->subject->semester == 3)
                            <th style="text-align:center" colspan="3"><strong>Applied Mathematics III</strong></th>
                            <th style="text-align:center" colspan="3"><strong>Digital Logic Design and Analysis</strong></th>
                            <th style="text-align:center" colspan="3"><strong>Discrete Mathematics</strong></th>
                            <th style="text-align:center" colspan="3"><strong>Electronic Circuits and Communication Fundamentals
                            </strong></th>
                            <th style="text-align:center" colspan="3"><strong>Data Structures</strong></th>
                        @endif
                        @break
                    @endforeach
                </tr>
                <tr>    
                    <th style="text-align:center"><strong>Roll No</strong></th>
                    <th style="text-align:center"><strong>Name</strong></th>
                    <th style="text-align:center"><strong>Test 1</strong></th>
                    <th style="text-align:center"><strong>Test 2</strong></th>
                    <th style="text-align:center"><strong>Avg</strong></th>
                    <th style="text-align:center"><strong>Test 1</strong></th>
                    <th style="text-align:center"><strong>Test 2</strong></th>
                    <th style="text-align:center"><strong>Avg</strong></th>
                    <th style="text-align:center"><strong>Test 1</strong></th>
                    <th style="text-align:center"><strong>Test 2</strong></th>
                    <th style="text-align:center"><strong>Avg</strong></th>
                    <th style="text-align:center"><strong>Test 1</strong></th>
                    <th style="text-align:center"><strong>Test 2</strong></th>
                    <th style="text-align:center"><strong>Avg</strong></th>
                    <th style="text-align:center"><strong>Test 1</strong></th>
                    <th style="text-align:center"><strong>Test 2</strong></th>
                    <th style="text-align:center"><strong>Avg</strong></th>
                </tr>
            </thead>
            <tbody>

                @php ($var1=0)
                @foreach($marks as $mark)
                    @if ($var1 == $mark->user->roll_no)
                        @continue
                    @endif
                    <tr>
                        <td style="text-align:center">{{ $mark->user->roll_no}}</td>
                        <td style="text-align:center">{{ $mark->user->name}}</td>
                        @php ($var = $mark->user->roll_no)
                        @php ($var1 = $mark->user->roll_no)
                        @foreach($marks as $mark)
                        @if ($mark->user->roll_no == $var)
                            @if ($mark->ia2 == '-1')
                                @if ($mark->ia1 == '-2')
                                        <td style="text-align:center">Ab</td>
                                        <td style="text-align:center">-</td>
                                        <td style="text-align:center">-</td>
                                @else
                                        <td style="text-align:center">{{ $mark->ia1 }}</td>
                                        <td style="text-align:center">-</td>
                                        <td style="text-align:center">-</td>
                                @endif
                            @else
                                @if ($mark->ia1 == '-2' && $mark->ia2 == '-2')
                                        <td style="text-align:center">Ab</td>
                                        <td style="text-align:center">Ab</td>
                                        <td style="text-align:center">-</td>
                                @elseif ($mark->ia1 == '-2')
                                        <td style="text-align:center">Ab</td>
                                        <td style="text-align:center">{{ $mark->ia2 }}</td>
                                        <td style="text-align:center">-</td>
                                @elseif ($mark->ia2 == '-2')
                                        <td style="text-align:center">{{ $mark->ia1 }}</td>
                                        <td style="text-align:center">Ab</td>
                                        <td style="text-align:center">-</td>
                                @else
                                        <td style="text-align:center">{{ $mark->ia1 }}</td>
                                        <td style="text-align:center">{{ $mark->ia2 }}</td>
                                        <td style="text-align:center">{{ $mark->Avg }}</td>
                                @endif
                            @endif
                        @endif
                        @endforeach
                        @if (($mark->subject->semester == 4 && $mark->subject_id != '5') || ($mark->subject->semester == 3 && $mark->subject_id != '10'))
                            @php ($mark->subject_id += 1)
                            @php ($var = $mark->user->roll_no)
                            @continue
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </body>
    </html>