<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Mailer;
use App\Models\realestate\Properties;
use App\Models\Amenities;
use App\Models\Locations;
use App\Models\PropertyTypes;
use App\Models\SalePropertyInquery;
use App\Models\SalePropertyInqueryImages;

class PropertyController extends Controller
{
    public function index(){

    }


    public function buyProperties(){
        
        $data['nav'] = 'buy';
        $data['purpose'] = 'Sale';
        $data['data'] = Properties::where('status', '1')->where('purpose', 'Sale')->paginate(10);
        $data['locations'] = Locations::orderBy('name')->get();
        $data['propertyTypes'] = PropertyTypes::orderBy('name')->get();

        
        return view('web.properties.index')->with($data);
    }
    public function rentProperties(){
        
        $data['nav'] = 'rent';
        $data['purpose'] = 'Rent';
        $data['data'] = Properties::where('status', '1')->where('purpose', 'Rent')->paginate(10);
        $data['locations'] = Locations::orderBy('name')->get();
        $data['propertyTypes'] = PropertyTypes::orderBy('name')->get();
        
        return view('web.properties.index')->with($data);
    }

    public function search(Request $request){
        $data['request'] = $request->all();

        $data['nav'] = 'rent';
        $data['purpose'] = '';
        $data['locations'] = Locations::orderBy('name')->get();
        $data['propertyTypes'] = PropertyTypes::orderBy('name')->get();
        $data['data'] = Properties::where('status', '1')
                        ->when(!empty($data['request']['purpose']), function ($q) use ($data) {
                            return $q->where('purpose', $data['request']['purpose']);
                        })
                        ->when(!empty($data['request']['location']), function ($q) use ($data) {
                            return $q->where('location', base64_decode($data['request']['location']));
                        })
                        ->when(!empty($data['request']['type']), function ($q) use ($data) {
                            return $q->where('property_type', base64_decode($data['request']['type']));
                        })
                        ->when(!empty($data['request']['price_range']), function ($q) use ($data) {

                            switch ($data['request']['price_range']) {
                                case 'under_500k':
                                    $q->where('price', '<', 500000);
                                    break;

                                case '500k_1m':
                                    $q->whereBetween('price', [500000, 1000000]);
                                    break;

                                case '1m_5m':
                                    $q->whereBetween('price', [1000000, 5000000]);
                                    break;

                                case '5m_10m':
                                    $q->whereBetween('price', [5000000, 10000000]);
                                    break;

                                case 'above_10m':
                                    $q->where('price', '>', 10000000);
                                    break;
                            }
                        })
                        ->paginate(10);
        
        return view('web.properties.index')->with($data);
    }


    public function details($slug){
        
        $data['data'] = Properties::where('status', '1')->where('slug', $slug)->first();
        if(empty($data['data']->id)){
            return redirect(route('home'));
        }
        
        return view('web.properties.details')->with($data);
    }


    public function sellProperties(){
        
        $data['nav'] = 'sell';
        $data['locations'] = Locations::orderBy('name')->get();
        $data['propertyTypes'] = PropertyTypes::orderBy('name')->get();
        
        return view('web.properties.sell')->with($data);
    }

    public function sellPropertiesSubmit(Request $request){
        
        $data = $request->all();

        $attachments = [];

        $sp = new SalePropertyInquery;
        $sp->name = $data['name'];
        $sp->email = $data['email'];
        $sp->mobile = $data['phone'];
        $sp->type = $data['type'];
        $sp->location_name = $data['location_name'];
        $sp->property_type = $data['propertyType'];
        $sp->bedrooms = $data['bedrooms'];
        $sp->size_sqft = $data['size'];
        $sp->unit_no = empty($data['unit_no']) ? '' : $data['unit_no'];
        $sp->price = $data['price'];
        $sp->save();

        $id = $sp->id;

        if ($request->hasFile('images')) {
            $files = $request->file('images');
            $i = 1;
            foreach ($files as $file) {
                $ext = $file->getClientOriginalExtension();
                $newname = $id . $i . date('dmyhis') . '.' . $ext;

                $file->move(public_path('storage/realestate/inquery'), $newname);

                // Save each image record (if you’re storing multiple per agent)
                $image = new SalePropertyInqueryImages; // create a separate model/table for images
                $image->inquery_id = $id;
                $image->image = $newname;
                $image->save();

                $i++;

                $attachments[] = public_path('storage/realestate/inquery/' . $newname);
            }
        }

        //dd($attachments);

        $mail = Mailer::sendMail('#'.$id.' - New Sale Property Inquiry Received! | GulfRealty.ae', ['furqan@gulfrealty.ae ', 'captain.wasi@gmail.com'], 'GulfRealty.ae', 'web.emails.propertyInquiry', $data, $attachments);

        //dd('test');
        
        return redirect()->back()->with('success', 'property_sale');
    }
}
