<table>
    <thead>
        <tr>
            <th>@lang('#')</th>
            <th>@lang('Name')</th>
            <th>@lang('Telephone')</th>
            <th>@lang('Temperature')</th>
            <th>@lang('Date')</th>
            <th>@lang('Time')</th>
            <th>@lang('Station')</th>
        </tr>
    </thead>
    <tbody>
    @php
    $count = 1;
    @endphp
    @foreach ($attendances as $attendee)
        <tr>
            <td>{{ $count++ }}</td>
            <td>{{ $attendee->name }}</td>
            <td>{{ $attendee->telephone }}</td>
            <td>{{ $attendee->temperature }}</td>
            <td>{{ $attendee->created_at->format('d/m/Y') }}</td>
            <td>{{ $attendee->created_at->format('h:i a') }}</td>
            <td>{{ $attendee->station->name }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
