<?php

namespace App\Http\Controllers;

use App\Models\Venu;
use App\Models\Ticket;
use App\Models\Fixture;
use App\Models\Purchased;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function createTicket($fixture_id)
    {
        $data = Fixture::find($fixture_id);
        $data1 = Venu::all();
        return view('admin.pages.createticket',compact('data','data1'));
    }
    public function addTicket(Request $request)
    {
        Ticket::create([
            'fixture_id'=>$request->fixture_id,
            'date'=>$request->date,
            'venu_id'=>$request->venu_id,
            'ticket'=>$request->ticket,
            'price'=>$request->price,
        ]);
        return redirect()->back()->with('success','Result Added.');
    }
    public function showTicket()
    {
        $data=Ticket::all();
        return view('admin.pages.ticket',compact('data'));
    }

    public function showTicketUser()
    {
        $data=Ticket::all();
        return view('user.pages.ticket',compact('data'));
    }
    public function buyTicket($ticket_id)
    {
        $id=Ticket::find($ticket_id);
        $data=Ticket::all();
        return view('user.pages.buyticket',compact('data','id'));
    }
    public function cart(Request $request, $ticket_id)
    {
        $id=Ticket::find($ticket_id);
        $data=Ticket::all();
        $quantity= $request->quantity;
        $total=$quantity*$id->price;
        Purchased::create([
            'fixture_id'=>$id->fixture_id,
            'user_id'=>Auth::user()->id,
            'ticket_id'=>$ticket_id,
            'quantity'=>$quantity,
            'price'=>$total,
        ]);
        $data= Purchased::where('user_id',Auth::user()->id)->first();
        return view('user.pages.ticketcart',compact('data'));
    }

    public function confirmcart(Request $request)
    {

        $data= Purchased::where('user_id',Auth::user()->id)->first();
        $data->update([
            // field name from db || field name from form
            'status'=>'confirm'
        ]);

    }

}
