@extends('layouts.app')

@section('content')

<div class="container">
            <h1>Ticket Details</h1>
            <div class="card">
                <div class="card-header">
                    <h5>{{ $ticket->title }}</h5>
                </div>
                <div class="card-body">
                    <h6><strong>User:</strong> {{ $ticket->user->name }}</h6>
                    <h6><strong>Status:</strong> {{ ucfirst($ticket->status) }}</h6>
                    <h6><strong>Description:</strong></h6>
                    <p>{{ $ticket->description }}</p>

                    @if ($ticket->responses->count())
                        <h6><strong>Responses:</strong></h6>
                        <ul class="list-group mb-3">
                            @foreach ($ticket->responses as $response)
                                <li class="list-group-item">
                                    <strong>Admin:</strong> {{ $response->admin_name }}<br>
                                    {{ $response->message }}<br>
                                    <small class="text-muted">{{ $response->created_at->format('d M Y H:i') }}</small>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>No responses yet.</p>
                    @endif

                   
                </div>
                <div class="card-footer">
                   @if(Auth::user()->role=="customer")
                    <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this ticket?');">Delete Ticket</button>
                    </form>

                    @endif

                    @if(Auth::user()->role=="admin")
                    <form action="{{ route('tickets.respond', $ticket->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="response" class="form-label">Admin Response</label>
                        <textarea class="form-control" id="response" name="message" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Response</button>
                </form>
                @endif
                </div>
            </div>
        </div>
@endsection