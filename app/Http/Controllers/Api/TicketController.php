<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Helpers\FileHelper;
use App\Http\Requests\Api\CreateTicketRequest;
use App\Mail\TicketCreated;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Mail;

class TicketController extends Controller
{
    //

    public function save(CreateTicketRequest $request)
    {
        //ToDo
        $user_id = auth('api')->user()->id;
        $ticket = new Ticket();
        $ticket->title = $request->subject;
        $ticket->description = $request->description;
        $ticket->status = $request->status;
        $ticket->priority = $request->priority;
        $ticket->category = $request->category;
        $ticket->clause = $request->clause;
        $ticket->student_data = $request->student_data;
        $ticket->user_id = $user_id;
        if(isset($request->attachments)){
            foreach ($request->attachments as $attachment) {
                //$attachment is an base64 encoded file
                $file = FileHelper::uploadBaseFile($attachment['file'], 'uploads/tickets/', $attachment['file_name']);
                $ticket->attachment = $file;
            }
        }
        if($ticket->save()){
            //$ticket->categories()->sync($request->category);
            $ticket->labels()->sync($request->lable);


            //Mail::send(new TicketCreated($ticket));
            return $this->response([],200,'تم تسجيل تذكرتك بنجاح');
        }else{
            return $this->response([],401,'حدث خطأ');
        }


    }



    public function getAllTickets()
    {
        $tickets = Ticket::with(['categories','labels','agent','user','comments'])->get();
        if($tickets){
            return $this->response(["tickets" =>$tickets],200);
        }else{
            return $this->response([],404,'لا يوجد تذاكر');
        }
    }

    public function getTicketByUser($id)
    {
        $userTickets = Ticket::where('user_id',$id)->with(['categories','labels','agent','user','comments'])->get();
        if($userTickets){
            return $this->response(["userTickets" =>$userTickets],200);
        }else{
            return $this->response([],404,'لا يوجد تذاكر لهذا المستخدم');
        }
    }
}
