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
        $data= Fixture::find($request->fixture_id);
        $data->update([
            'ticketstatus'=>'1'
        ]);
        return redirect()->route('admin.pages.showticket')->with('success','Ticket Added.');
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
        // dd($id);
        return view('user.pages.buyticket',compact('id'));
    }
    public function cart(Request $request, $ticket_id)
    {
        $id=Ticket::find($ticket_id);
        $confirm= Purchased::where('user_id', Auth::user()->id)->where('fixture_id', $id->fixture_id)->exists();
        $data=Ticket::all();
        $quantity= $request->quantity;
        $total=$quantity*$id->price;
        if(!$confirm){
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
       return redirect()->route('user.pages.showticket')->with('error','You can not buy anymore ticket for this match');
    }

    public function confirmcart(Request $request)
    {

        $data= Purchased::where('user_id',Auth::user()->id)->first();
        $data->update([
            'status'=>'confirm'
        ]);
        return redirect()->route('user.pages.showticket')->with('success','Your Ticket is confirm');
    }

}
