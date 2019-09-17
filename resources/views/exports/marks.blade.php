<table style="width:100%">
    <thead>
        <tr>
            <th style="text-align:center"><strong>Roll No</strong></th>
            <th style="text-align:center"><strong>IA 1</strong></th>
            <th style="text-align:center"><strong>IA 2</strong></th>
        </tr>
    </thead>
    <tbody>
    @foreach($marks as $mark)
        @if ($mark->ia2 == '-1')
            @if ($mark->ia1 == '-2')
                <tr>
                    <td style="text-align:center">{{ $mark->student_id}}</td>
                    <td style="text-align:center">Absent</td>
                    <td style="text-align:center">-</td>
                </tr>
            @else
                <tr>
                    <td style="text-align:center">{{ $mark->student_id}}</td>
                    <td style="text-align:center">{{ $mark->ia1 }}</td>
                    <td style="text-align:center">-</td>
                </tr>
            @endif
        @else
            @if ($mark->ia1 == '-2' && $mark->ia2 == '-2')
                <tr>
                    <td style="text-align:center">{{ $mark->student_id}}</td>
                    <td style="text-align:center">Absent</td>
                    <td style="text-align:center">Absent</td>
                </tr>
            @elseif ($mark->ia1 == '-2')
                <tr>
                    <td style="text-align:center">{{ $mark->student_id}}</td>
                    <td style="text-align:center">Absent</td>
                    <td style="text-align:center">{{ $mark->ia2 }}</td>
                </tr>
            @elseif ($mark->ia2 == '-2')
                <tr>
                    <td style="text-align:center">{{ $mark->student_id}}</td>
                    <td style="text-align:center">{{ $mark->ia1 }}</td>
                    <td style="text-align:center">Absent</td>
                </tr>
            @else
                <tr>
                    <td style="text-align:center">{{ $mark->student_id}}</td>
                    <td style="text-align:center">{{ $mark->ia1 }}</td>
                    <td style="text-align:center">{{ $mark->ia2 }}</td>
                </tr>
            @endif
        @endif
    @endforeach
    </tbody>
</table>