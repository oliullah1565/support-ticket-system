<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ticket;

use App\Models\Response;
use Illuminate\Support\Facades\Mail;

use App\Mail\TicketCreated;

use Auth;

class TicketController extends Controller
{
    public function index()
    {
        if(Auth::user()->role=="admin"){
            $tickets = Ticket::get();
            

        }else{
            
            $tickets = Ticket::where('user_id', auth()->id())->get();
        }
        
        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request)
    {
        $ticket = Ticket::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
        ]);

      
       //Mail::to('admin@gmail.com')->send(new TicketCreated($ticket));
       //Mail::to(auth()->user()->email)->send(new TicketCreated($ticket));


        return redirect()->route('tickets.index')->with('success', 'Ticket created successfully.');
    }

    public function show($id)
    {
        $ticket = Ticket::with('responses')->findOrFail($id);

         return view('tickets.view', compact('ticket'));
    }

    public function respond(Request $request, $ticketId)
    {
    
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $ticket = Ticket::findOrFail($ticketId);

        $response = new Response();
        $response->ticket_id = $ticket->id;
        $response->admin_name = auth()->user()->name; 
        $response->message = $request->message;
        $response->save();

        return redirect()->route('tickets.show', $ticketId)->with('success', 'Response added successfully.');
    }

    public function close(Ticket $ticket)
    {
        
        $ticket->update(['status' => 'closed']);

        //Mail::to($ticket->user->email)->send(new \App\Mail\TicketClosed($ticket));

        return redirect()->route('tickets.index')->with('success', 'Ticket closed.');
    }

    public function destroy($id)
    {
        
        $ticket = Ticket::find($id);
        if (!$ticket) {
            return redirect()->back()->with('error', 'Ticket not found.');
        }

        $ticket->delete();

        return redirect()->route('tickets.index')->with('success', 'Ticket deleted successfully.');
    }
}
