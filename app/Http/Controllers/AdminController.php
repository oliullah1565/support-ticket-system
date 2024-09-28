<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        return view('admin.tickets.index', compact('tickets'));
    }
    
    public function closeTicket(Ticket $ticket)
    {
        $ticket->update(['status' => 'closed']);
    
        Mail::to($ticket->user->email)->send(new TicketClosed($ticket));
    
        return redirect()->back()->with('success', 'Ticket closed successfully');
    }
    
}
