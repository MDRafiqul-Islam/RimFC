<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Venu;
use App\Models\Ticket;
use App\Models\Fixture;
use App\Models\Formation;
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
        $sum=0;
        foreach ($data as $ticket) {
            $total_income = $ticket->totalprice;
            $sum+= $total_income;
        }
        $total_income = $sum;
        return view('admin.pages.ticket',compact('data','total_income'));
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
        if($id->ticket>=$quantity && $id->ticket>0){
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
    }
    else{
        return redirect()->route('user.pages.showticket')->with('error','Ticket limit has been reached');
    }
       return redirect()->route('user.pages.showticket')->with('error','You can not buy anymore ticket for this match');
    }

    public function confirmcart(Request $request)
    {
        $data= Purchased::where('user_id',Auth::user()->id)->get();
        $data1= null;
        foreach($data as $tick){
            $data1 = Ticket::where('fixture_id', $tick->fixture_id)->first();
        }
        $data1= Purchased::where('fixture_id', $data1->fixture_id)->first();
        $ticket_id= $data1->ticket_id;
        $ticket=Ticket::find($ticket_id);
        $data1->update([
            'status'=>'confirm'
        ]);
        if($ticket->ticket - $data1->quantity == 0){
            $ticket->update([
                'ticket'=> 0,
                'totalprice'=> $ticket->totalprice + $data1->price
            ]);
        }
        else{
        $ticket->update([
            'ticket'=> $ticket->ticket - $data1->quantity,
            'totalprice'=> $ticket->totalprice + $data1->price
        ]);
    }
        return redirect()->route('user.pages.showticket')->with('success','Your Ticket is confirm');
    }
    public function cancleTicket($id)
    {
        $ticket=Purchased::find($id)->delete();
        return redirect()->route('user.pages.showticket')->with('success','Your Ticket Has Been Cancled');
    }

    public function editticket($id)
    {
        $data =Ticket::find($id);
        $data1 = Venu::all();
        return view('admin.pages.editticket', compact('data','data1'));
    }

    public function ticketedit(Request $request, $id)
    {
        $data = Ticket::find($id);
        $data->update([
            'price'=> $request->price
        ]);
        return redirect()->route('admin.pages.showticket')->with('success','Ticket Has Been Updated');
    }

    public function ticketdelete($id)
    {
        Ticket::find($id)->delete();
        return redirect()->route('admin.pages.showticket')->with('success','Ticket Deleted Successfully');
    }
}
