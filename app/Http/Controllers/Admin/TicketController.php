<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.ticket.index')->only('index');
        $this->middleware('can:admin.ticket.show')->only('show');
    }

    public function index()
    {
        //
        $tickets = Ticket::all();
        return view('admin.ticket.index',compact('tickets'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
        return view('admin.ticket.show', compact('ticket'));
    }

}
