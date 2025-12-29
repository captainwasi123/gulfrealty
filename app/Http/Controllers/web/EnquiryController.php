<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Helpers\Mailer;
use App\Http\Requests\EnquiryRequest;
use App\Http\Requests\HelpRequest;
use App\Http\Requests\BrochureRequest;
use App\Models\BrochureDownload;

class EnquiryController extends Controller
{
    public function enquiryProperty(EnquiryRequest $request){
        $data = $request->all();
        $response = [];
        $status = 200;


        $n = new Enquiry;
        $n->name = $data['name'];
        $n->email = $data['email'];
        $n->type = '2';
        $n->property_name = $data['property_name'];
        $n->property_link = $data['property_slug'];
        $n->description = $data['description'];
        $n->save();

        //dd($data);


        //$mail = Mailer::sendMail('Thank You for Contacting Me | Rahaal - The Explorer', array($data['email']), 'Rahaal', 'web.emails.response', $data);
        $mail = Mailer::sendMail('#'.$n->id.' - New Inquiry Received! | GulfRealty.ae', ['furqan@gulfrealty.ae ', 'captain.wasi@gmail.com', 'enquiry@gulfrealty.ae'], 'GulfRealty.ae', 'web.emails.enquiry', $data);

        $response['success'] = 'success';
        $response['message'] = 'Success! You successfully Submitted.';



        return response()->json($response, 200);
    }

    public function enquiryContact(EnquiryRequest $request){
        $data = $request->all();
        $response = [];
        $status = 200;


        $n = new Enquiry;
        $n->name = $data['name'];
        $n->email = $data['email'];
        $n->type = '1';
        $n->description = $data['description'];
        $n->save();

        //dd($data);


        //$mail = Mailer::sendMail('Thank You for Contacting Me | Rahaal - The Explorer', array($data['email']), 'Rahaal', 'web.emails.response', $data);
        $mail = Mailer::sendMail('#'.$n->id.' - New Inquiry Received! | GulfRealty.ae', ['furqan@gulfrealty.ae ', 'captain.wasi@gmail.com', 'enquiry@gulfrealty.ae'], 'GulfRealty.ae', 'web.emails.enquiry', $data);

        $response['success'] = 'success';
        $response['message'] = 'Success! You successfully Submitted.';



        return response()->json($response, 200);
    }

    public function enquiryAgent(EnquiryRequest $request){
        $data = $request->all();
        $response = [];
        $status = 200;


        $n = new Enquiry;
        $n->name = $data['name'];
        $n->email = $data['email'];
        $n->agent_name = $data['agent_name'];
        $n->type = '1';
        $n->description = $data['description'];
        $n->save();

        //dd($data);


        //$mail = Mailer::sendMail('Thank You for Contacting Me | Rahaal - The Explorer', array($data['email']), 'Rahaal', 'web.emails.response', $data);
        $mail = Mailer::sendMail('#'.$n->id.' - New Inquiry Received! | GulfRealty.ae', ['furqan@gulfrealty.ae ', 'captain.wasi@gmail.com', 'enquiry@gulfrealty.ae'], 'GulfRealty.ae', 'web.emails.enquiry', $data);

        $response['success'] = 'success';
        $response['message'] = 'Success! You successfully Submitted.';



        return response()->json($response, 200);
    }

    public function brochureDownload(BrochureRequest $request){
        $data = $request->all();
        $response = [];
        $status = 200;


        $n = new BrochureDownload;
        $n->name = $data['name'];
        $n->email = $data['email'];
        $n->property_name = $data['property_name'];
        $n->save();

        //dd($data);


        //$mail = Mailer::sendMail('Thank You for Contacting Me | Rahaal - The Explorer', array($data['email']), 'Rahaal', 'web.emails.response', $data);
        $mail = Mailer::sendMail('#'.$n->id.' - Brochure Downloaded! | GulfRealty.ae', ['furqan@gulfrealty.ae ', 'captain.wasi@gmail.com', 'enquiry@gulfrealty.ae'], 'GulfRealty.ae', 'web.emails.brochure', $data);

        $response['success'] = 'success';
        $response['message'] = 'Success! You successfully Submitted.';



        return response()->json($response, 200);
    }

    public function enquirySell(EnquiryRequest $request){
        $data = $request->all();
        $response = [];
        $status = 200;


        $n = new Enquiry;
        $n->name = $data['name'];
        $n->email = $data['email'];
        $n->type = '3';
        $n->description = $data['description'];
        $n->save();

        //dd($data);


        //$mail = Mailer::sendMail('Thank You for Contacting Me | Rahaal - The Explorer', array($data['email']), 'Rahaal', 'web.emails.response', $data);
        $mail = Mailer::sendMail('#'.$n->id.' - New Sell Request Received! | GulfRealty.ae', ['furqan@gulfrealty.ae ', 'captain.wasi@gmail.com', 'enquiry@gulfrealty.ae'], 'GulfRealty.ae', 'web.emails.enquiry', $data);

        $response['success'] = 'success';
        $response['message'] = 'Success! You successfully Submitted.';



        return response()->json($response, 200);
    }
}
