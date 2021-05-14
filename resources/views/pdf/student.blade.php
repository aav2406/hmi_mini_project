<!DOCTYPE html>
<html>
    <head>
        <title>
        @foreach($marks as $mark)
            {{ $mark->user->name}}
            @break
        @endforeach Report</title>
    </head>
    <body>
        <table style="width:100%;border: 1px solid black">
            <thead>
                <!-- <tr>
                    <th style="text-align:center;border: 1px solid black" colspan="17"><strong>V.E.S. INSTITUTE OF TECHNOLOGY, CHEMBUR, MUMBAI - 400074</strong></th>
                </tr>
                <tr>
                    <th style="text-align:center;border: 1px solid black" colspan="17"><strong>DEPARTMENT OF COMPUTER ENGINEERING</strong></th>
                </tr> -->
                @foreach($marks as $mark)
                    @if ($mark->division_id == 12)
                        <tr>
                            <th style="text-align:center;border: 1px solid black" colspan="17"><strong>Class/Division : D7A</strong></th>
                        </tr>
                    @elseif ($mark->division_id == 13)
                        <tr>
                            <th style="text-align:center;border: 1px solid black" colspan="17"><strong>Class/Division : D7B</strong></th>
                        </tr>
                    @elseif ($mark->division_id == 14)
                        <tr>
                            <th style="text-align:center;border: 1px solid black" colspan="17"><strong>Class/Division : D7C</strong></th>
                        </tr>
                    @elseif ($mark->division_id == 21)
                        <tr>
                            <th style="text-align:center;border: 1px solid black" colspan="17"><strong>Class/Division : D12A</strong></th>
                        </tr>
                    @elseif ($mark->division_id == 22)
                        <tr>
                            <th style="text-align:center;border: 1px solid black" colspan="17"><strong>Class/Division : D12B</strong></th>
                        </tr>
                    @elseif ($mark->division_id == 23)
                        <tr>
                            <th style="text-align:center;border: 1px solid black" colspan="17"><strong>Class/Division : D12C</strong></th>
                        </tr>
                    @elseif ($mark->division_id == 30)
                        <tr>
                            <th style="text-align:center;border: 1px solid black" colspan="17"><strong>Class/Division : D17A</strong></th>
                        </tr>
                    @elseif ($mark->division_id == 31)
                        <tr>
                            <th style="text-align:center;border: 1px solid black" colspan="17"><strong>Class/Division : D17B</strong></th>
                        </tr>
                    @elseif ($mark->division_id == 32)
                        <tr>
                            <th style="text-align:center;border: 1px solid black" colspan="17"><strong>Class/Division : D17C</strong></th>
                        </tr>
                    @endif
                    @break
                @endforeach
                @foreach($marks as $mark)
                    <tr>
                        <th style="text-align:center;border: 1px solid black" colspan="17"><strong>Name : {{ $mark->user->name}}</strong></th>
                    </tr>
                    @break
                @endforeach
                <tr>    
                    <th style="text-align:center;border: 1px solid black"><strong>Sr No</strong></th>
                    <th style="text-align:center;border: 1px solid black" colspan="10"><strong>Subject</strong></th>
                    <th style="text-align:center;border: 1px solid black" colspan="2"><strong>Test 1</strong></th>
                    <th style="text-align:center;border: 1px solid black" colspan="2"><strong>Test 2</strong></th>
                    <th style="text-align:center;border: 1px solid black" colspan="2"><strong>Average</strong></th>
                </tr>
            </thead>
            <tbody>
                @php ($index=0)
                @foreach($marks as $mark)
                    <td style="text-align:center;border: 1px solid black">{{ $index+=1}}</td>
                    <td style="text-align:center;border: 1px solid black" colspan="10">{{ $mark->subject->subject}}</td>
                    @if ($mark->ia2 == '-1')
                        @if ($mark->ia1 == '-2')
                            <tr>
                                <td style="text-align:center;border: 1px solid black" colspan="2">Absent</td>
                                <td style="text-align:center;border: 1px solid black" colspan="2">-</td>
                                <td style="text-align:center;border: 1px solid black" colspan="2">-</td>
                            </tr>
                        @else
                            <tr>
                                <td style="text-align:center;border: 1px solid black" colspan="2">{{ $mark->ia1 }}</td>
                                <td style="text-align:center;border: 1px solid black" colspan="2">-</td>
                                <td style="text-align:center;border: 1px solid black" colspan="2">-</td>
                            </tr>
                        @endif
                    @else
                        @if ($mark->ia1 == '-2' && $mark->ia2 == '-2')
                            <tr>
                                <td style="text-align:center;border: 1px solid black" colspan="2">Absent</td>
                                <td style="text-align:center;border: 1px solid black" colspan="2">Absent</td>
                                <td style="text-align:center;border: 1px solid black" colspan="2">-</td>
                            </tr>
                        @elseif ($mark->ia1 == '-2')
                            <tr>
                                <td style="text-align:center;border: 1px solid black" colspan="2">Absent</td>
                                <td style="text-align:center;border: 1px solid black" colspan="2">{{ $mark->ia2 }}</td>
                                <td style="text-align:center;border: 1px solid black" colspan="2">-</td>
                            </tr>
                        @elseif ($mark->ia2 == '-2')
                            <tr>
                                <td style="text-align:center;border: 1px solid black" colspan="2">{{ $mark->ia1 }}</td>
                                <td style="text-align:center;border: 1px solid black" colspan="2">Absent</td>
                                <td style="text-align:center;border: 1px solid black" colspan="2">-</td>
                            </tr>
                        @else
                            <tr>
                                <td style="text-align:center;border: 1px solid black" colspan="2">{{ $mark->ia1 }}</td>
                                <td style="text-align:center;border: 1px solid black" colspan="2">{{ $mark->ia2 }}</td>
                                <td style="text-align:center;border: 1px solid black" colspan="2">{{ $mark->Avg }}</td>
                            </tr>
                        @endif
                    @endif
                @endforeach
                </tbody>
            </table>
        </body>
    </html>