@extends('layouts.app')

@section('content')


    <h1>Ticket List</h1>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->title }}</td>
                    <td>{{ $ticket->description }}</td>
                    <td>{{ $ticket->status }}</td>
                    <td>
                        @if(Auth::user()->role=="admin")
                           @if($ticket->status =="open")
                            <form action="{{ route('tickets.close', $ticket) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('POST')
                                <button type="submit">Close</button>
                            </form>

                           
                            <form action="{{ route('tickets.show', $ticket) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('GET')
                                <button type="submit">Response</button>
                            </form>
                            @endif
                        @endif
                        @if(Auth::user()->role=="customer")
                            <form action="{{ route('tickets.show', $ticket) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('GET')
                                <button type="submit">Show</button>
                            </form>
                            @if($ticket->status =="open")
                            <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this ticket?');">Delete</button>
                            </form>
                            @endif
                            
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection