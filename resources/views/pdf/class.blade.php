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
        @endforeach Class Report</title>
    </head>
    <body>
        <!-- <p style="text-align:center"><strong>V.E.S. INSTITUTE OF TECHNOLOGY, CHEMBUR, MUMBAI - 400074</strong></p>
        <p style="text-align:center"><strong>DEPARTMENT OF COMPUTER ENGINEERING</strong></p> -->
        <table style="width:100%" border="1">
            <thead>
                <!-- <tr>
                    <th style="text-align:center" colspan="17"><strong>V.E.S. INSTITUTE OF TECHNOLOGY, CHEMBUR, MUMBAI - 400074</strong></th>
                </tr>
                <tr>
                    <th style="text-align:center" colspan="17"><strong>DEPARTMENT OF COMPUTER ENGINEERING</strong></th>
                </tr> -->
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
                        @elseif ($mark->division_id >= 21 && $mark->division_id <= 23 && $mark->subject->semester == 6)
                            <th style="text-align:center" colspan="3"><strong>Software Engineering</strong></th>
                            <th style="text-align:center" colspan="3"><strong>System Programming & Compiler Construction</strong></th>
                            <th style="text-align:center" colspan="3"><strong>Data Warehousing & Mining</strong></th>
                            <th style="text-align:center" colspan="3"><strong>Cryptography & System Security</strong></th>
                        @elseif ($mark->division_id >= 21 && $mark->division_id <= 23 && $mark->subject->semester == 5)
                            <th style="text-align:center" colspan="3"><strong>Microprocessor</strong></th>
                            <th style="text-align:center" colspan="3"><strong>Database Management System</strong></th>
                            <th style="text-align:center" colspan="3"><strong>Computer Network</strong></th>
                            <th style="text-align:center" colspan="3"><strong>Theory of Computer Science</strong></th>
                        @elseif ($mark->division_id >= 30 && $mark->division_id <= 32 && $mark->subject->semester == 8)
                            <th style="text-align:center" colspan="3"><strong>Human Machine Interaction</strong></th>
                            <th style="text-align:center" colspan="3"><strong>Distributed Computing</strong></th>
                        @elseif ($mark->division_id >= 30 && $mark->division_id <= 32 && $mark->subject->semester == 7)
                            <th style="text-align:center" colspan="3"><strong>Digital Signal & Image Processing</strong></th>
                            <th style="text-align:center" colspan="3"><strong>Mobile Communication & Computing</strong></th>
                            <th style="text-align:center" colspan="3"><strong>Artificial Intelligence & Soft Computing</strong></th>
                        @endif
                        @break
                    @endforeach
                </tr>
                <tr>    
                    @foreach ($marks as $mark)
                        @if ($mark->division_id >= 12 && $mark->division_id <= 14)
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
                        @elseif ($mark->division_id >= 21 && $mark->division_id <= 23)
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
                        @endif
                        @break
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @php ($var1=0)
                @php ($c1=0)
                @foreach($marks as $mark)
                    @php ($c1 += 1)
                @endforeach
                @foreach($marks as $mark)
                    @if ($var1 == $mark->user->roll_no)
                        @continue
                    @endif
                    <tr>
                        <td style="text-align:center">{{ $mark->user->roll_no}}</td>
                        <td style="text-align:center">{{ $mark->user->name}}</td>
                        @php ($var = $mark->user->roll_no)
                        @php ($var1 = $mark->user->roll_no)
                            @if ($mark->subject->semester == 3)
                                @php ($var2 = 5)
                                @php ($var3 = 5)
                            @elseif ($mark->subject->semester == 4)
                                @php ($var2 = 0)
                                @php ($var3 = 5)
                            @elseif ($mark->subject->semester == 5)
                                @php ($var2 = 18)
                                @php ($var3 = 7)
                            @elseif ($mark->subject->semester == 6)
                                @php ($var2 = 10)
                                @php ($var3 = 8)
                            @elseif ($mark->subject->semester == 7)
                                @php ($var2 = 25)
                                @php ($var3 = 15)
                            @elseif ($mark->subject->semester == 8)
                                @php ($var2 = 39)
                                @php ($var3 = 14)
                            @endif
                            @php ($count = 0)
                            @php ($c2=0)
                        @foreach($marks as $mark)
                            @php ($c2 += 1)
                            @if ($var > $mark->user->roll_no)
                                @continue
                            @endif
                        @if ($mark->user->roll_no == $var)
                            @while ($var2 < $mark->subject_id - 1)
                                <td style="text-align:center">-</td>
                                <td style="text-align:center">-</td>
                                <td style="text-align:center">-</td>
                                @php ($var2 += 1)
                                @php ($count += 1)
                            @endwhile
                            @php ($var2 = $mark->subject_id)
                            @php ($count += 1)
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
                        @if (($var < $mark->user->roll_no && $count != $var3) || ($c2 == $c1))
                                @for ($i = $var3 - $count; $i > 0; $i--)
                                    <td style="text-align:center">-</td>
                                    <td style="text-align:center">-</td>
                                    <td style="text-align:center">-</td>
                                @endfor
                        @endif
                        {{-- @if (($mark->subject->semester == 4 && $mark->subject_id != 5) || ($mark->subject->semester == 3 && $mark->subject_id != '10'))
                            @php ($var = $mark->user->roll_no)
                            @php ($var2 = $mark->subject_id)
                            @continue
                        @endif --}}
                    </tr>
                @endforeach
                </tbody>
            </table>
        </body>
    </html>