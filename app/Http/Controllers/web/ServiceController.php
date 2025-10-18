<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;

class ServiceController extends Controller
{

    public function outdoorAdvertising(){
        $data['nav'] = 'services';
        $data['service'] = Services::where('slug', 'outdoor-advertising')->first();
        $data['subservices'] = Services::where('parent_id', $data['service']->id)->get();

        return view('web.services.outdoor-advertising.index')->with($data);
    }
        public function outdoorAdvertisingAillboardsAdvertising(){
            $data['nav'] = 'services';
            $data['service'] = Services::where('slug', 'outdoor-advertising')->first();
            $data['subservice'] = Services::where('slug', 'billboards-advertising')->first();

            return view('web.services.outdoor-advertising.billboards-advertising')->with($data);
        }
        public function outdoorAdvertisingFlyersDistribution(){
            $data['nav'] = 'services';
            $data['service'] = Services::where('slug', 'outdoor-advertising')->first();
            $data['subservice'] = Services::where('slug', 'flyers-distribution')->first();

            return view('web.services.outdoor-advertising.flyers-distribution')->with($data);
        }
        public function outdoorAdvertisingHumanBillboards(){
            $data['nav'] = 'services';
            $data['service'] = Services::where('slug', 'outdoor-advertising')->first();
            $data['subservice'] = Services::where('slug', 'human-billboards')->first();

            return view('web.services.outdoor-advertising.human-billboards')->with($data);
        }


//-------------------------------------------------------------------------------------------------------
    public function digitalAdvertising(){
        $data['nav'] = 'services';
        $data['service'] = Services::where('slug', 'digital-advertising')->first();
        $data['subservices'] = Services::where('parent_id', $data['service']->id)->get();

        return view('web.services.digital-advertising.index')->with($data);
    }
        public function digitalAdvertisingOTTAdvertising(){
            $data['nav'] = 'services';
            $data['service'] = Services::where('slug', 'digital-advertising')->first();
            $data['subservice'] = Services::where('slug', 'ott-advertising')->first();

            return view('web.services.digital-advertising.ott-advertising')->with($data);
        }
        public function digitalAdvertisingDOOHAdvertising(){
            $data['nav'] = 'services';
            $data['service'] = Services::where('slug', 'digital-advertising')->first();
            $data['subservice'] = Services::where('slug', 'dooh-advertising')->first();

            return view('web.services.digital-advertising.dooh-advertising')->with($data);
        }
        public function digitalAdvertisingHotelAdvertising(){
            $data['nav'] = 'services';
            $data['service'] = Services::where('slug', 'digital-advertising')->first();
            $data['subservice'] = Services::where('slug', 'hotel-digital-screens-advertising')->first();

            return view('web.services.digital-advertising.hotel-digital-screens-advertising')->with($data);
        }
        public function digitalAdvertisingElevetorAdvertising(){
            $data['nav'] = 'services';
            $data['service'] = Services::where('slug', 'digital-advertising')->first();
            $data['subservice'] = Services::where('slug', 'elevator-advertising')->first();

            return view('web.services.digital-advertising.elevator-advertising')->with($data);
        }


//-------------------------------------------------------------------------------------------------------
    public function prCoverage(){
        $data['nav'] = 'services';
        $data['service'] = Services::where('slug', 'public-relations-pr-coverage')->first();
        $data['subservices'] = Services::where('parent_id', $data['service']->id)->get();

        return view('web.services.public-relations-pr-coverage.index')->with($data);
    }
        public function prCoverageGulfNews(){
            $data['nav'] = 'services';
            $data['service'] = Services::where('slug', 'public-relations-pr-coverage')->first();
            $data['subservice'] = Services::where('slug', 'gulf-news')->first();

            return view('web.services.public-relations-pr-coverage.gulf-news')->with($data);
        }
        public function prCoverageForbes(){
            $data['nav'] = 'services';
            $data['service'] = Services::where('slug', 'public-relations-pr-coverage')->first();
            $data['subservice'] = Services::where('slug', 'forbes')->first();

            return view('web.services.public-relations-pr-coverage.forbes')->with($data);
        }
        public function prCoverageKhaleejTime(){
            $data['nav'] = 'services';
            $data['service'] = Services::where('slug', 'public-relations-pr-coverage')->first();
            $data['subservice'] = Services::where('slug', 'khaleej-time')->first();

            return view('web.services.public-relations-pr-coverage.khaleej-time')->with($data);
        }
        public function prCoverageArabianNews(){
            $data['nav'] = 'services';
            $data['service'] = Services::where('slug', 'public-relations-pr-coverage')->first();
            $data['subservice'] = Services::where('slug', 'arabian-news')->first();

            return view('web.services.public-relations-pr-coverage.arabian-news')->with($data);
        }


//-------------------------------------------------------------------------------------------------------

    public function celebrityMarketing(){
        $data['nav'] = 'services';
        $data['service'] = Services::where('slug', 'celebrity-marketing')->first();
        $data['subservices'] = Services::where('parent_id', $data['service']->id)->get();

        return view('web.services.celebrity-marketing.index')->with($data);
    }
        public function celebrityMarketingSport(){
            $data['nav'] = 'services';
            $data['service'] = Services::where('slug', 'celebrity-marketing')->first();
            $data['subservice'] = Services::where('slug', 'sport-personalities')->first();

            return view('web.services.celebrity-marketing.sport-personalities')->with($data);
        }
        public function celebrityMarketingBollywood(){
            $data['nav'] = 'services';
            $data['service'] = Services::where('slug', 'celebrity-marketing')->first();
            $data['subservice'] = Services::where('slug', 'bollywood-celebrities')->first();

            return view('web.services.celebrity-marketing.bollywood-celebraties')->with($data);
        }


//-------------------------------------------------------------------------------------------------------

    public function influencerMarketing(){
        $data['nav'] = 'services';
        $data['service'] = Services::where('slug', 'influencer-marketing')->first();
        $data['subservices'] = Services::where('parent_id', $data['service']->id)->get();

        return view('web.services.influencer-marketing.index')->with($data);
    }
        public function influencerMarketingNano(){
            $data['nav'] = 'services';
            $data['service'] = Services::where('slug', 'influencer-marketing')->first();
            $data['subservice'] = Services::where('slug', 'nano-influencer')->first();

            return view('web.services.influencer-marketing.nano-influencer')->with($data);
        }
        public function influencerMarketingMicro(){
            $data['nav'] = 'services';
            $data['service'] = Services::where('slug', 'influencer-marketing')->first();
            $data['subservice'] = Services::where('slug', 'micro-influencer')->first();

            return view('web.services.influencer-marketing.micro-influencer')->with($data);
        }
        public function influencerMarketingMacro(){
            $data['nav'] = 'services';
            $data['service'] = Services::where('slug', 'influencer-marketing')->first();
            $data['subservice'] = Services::where('slug', 'macro-influencer')->first();

            return view('web.services.influencer-marketing.macro-influencer')->with($data);
        }



//-------------------------------------------------------------------------------------------------------
    public function eventMarketing(){
        $data['nav'] = 'services';
        $data['service'] = Services::where('slug', 'event-marketing')->first();
        $data['subservices'] = Services::where('parent_id', $data['service']->id)->get();

        return view('web.services.event-marketing.index')->with($data);
    }
        public function eventMarketingCorporate(){
            $data['nav'] = 'services';
            $data['service'] = Services::where('slug', 'event-marketing')->first();
            $data['subservice'] = Services::where('slug', 'corporate-events')->first();

            return view('web.services.event-marketing.corporate-events')->with($data);
        }
        public function eventMarketingPrivate(){
            $data['nav'] = 'services';
            $data['service'] = Services::where('slug', 'event-marketing')->first();
            $data['subservice'] = Services::where('slug', 'private-events')->first();

            return view('web.services.event-marketing.private-events')->with($data);
        }


//-------------------------------------------------------------------------------------------------------

    public function transitMedia(){
        $data['nav'] = 'services';
        $data['service'] = Services::where('slug', 'transit-media')->first();
        $data['subservices'] = Services::where('parent_id', $data['service']->id)->get();

        return view('web.services.transit-media.index')->with($data);
    }
        public function transitMediaAirline(){
            $data['nav'] = 'services';
            $data['service'] = Services::where('slug', 'transit-media')->first();
            $data['subservice'] = Services::where('slug', 'airline-advertising')->first();

            return view('web.services.transit-media.airline-advertising')->with($data);
        }
        public function transitMediaTaxi(){
            $data['nav'] = 'services';
            $data['service'] = Services::where('slug', 'transit-media')->first();
            $data['subservice'] = Services::where('slug', 'taxi-advertising')->first();

            return view('web.services.transit-media.taxi-advertising')->with($data);
        }
        public function transitMediaBus(){
            $data['nav'] = 'services';
            $data['service'] = Services::where('slug', 'transit-media')->first();
            $data['subservice'] = Services::where('slug', 'bus-advertising')->first();

            return view('web.services.transit-media.bus-advertising')->with($data);
        }


//-------------------------------------------------------------------------------------------------------

    public function leadGeneration(){
        $data['nav'] = 'services';
        $data['service'] = Services::where('slug', 'lead-generation')->first();
        $data['subservices'] = Services::where('parent_id', $data['service']->id)->get();

        return view('web.services.lead-generation.index')->with($data);
    }
        public function leadGenerationCPL(){
            $data['nav'] = 'services';
            $data['service'] = Services::where('slug', 'lead-generation')->first();
            $data['subservice'] = Services::where('slug', 'cost-per-lead')->first();

            return view('web.services.lead-generation.cost-per-lead')->with($data);
        }


//-------------------------------------------------------------------------------------------------------

    public function sponsorships(){
        $data['nav'] = 'services';
        $data['service'] = Services::where('slug', 'sponsorships')->first();
        $data['subservices'] = Services::where('parent_id', $data['service']->id)->get();

        return view('web.services.sponsorships.index')->with($data);
    }
        public function sponsorshipsCorporate(){
            $data['nav'] = 'services';
            $data['service'] = Services::where('slug', 'sponsorships')->first();
            $data['subservice'] = Services::where('slug', 'corporate')->first();

            return view('web.services.sponsorships.corporate')->with($data);
        }
        public function sponsorshipsEntertainment(){
            $data['nav'] = 'services';
            $data['service'] = Services::where('slug', 'sponsorships')->first();
            $data['subservice'] = Services::where('slug', 'entertainment')->first();

            return view('web.services.sponsorships.entertainment')->with($data);
        }


//-------------------------------------------------------------------------------------------------------

    public function cgiAdvertising(){
        $data['nav'] = 'services';
        $data['service'] = Services::where('slug', 'creative-and-cgi-advertising')->first();
        $data['subservices'] = Services::where('parent_id', $data['service']->id)->get();

        return view('web.services.creative-and-cgi-advertising.index')->with($data);
    }
        public function cgiAdvertisingCreative(){
            $data['nav'] = 'services';
            $data['service'] = Services::where('slug', 'creative-and-cgi-advertising')->first();
            $data['subservice'] = Services::where('slug', 'creative')->first();

            return view('web.services.creative-and-cgi-advertising.creative')->with($data);
        }


//-------------------------------------------------------------------------------------------------------

    public function radioAdvertising(){
        $data['nav'] = 'services';
        $data['service'] = Services::where('slug', 'radio-advertising')->first();
        $data['subservices'] = Services::where('parent_id', $data['service']->id)->get();

        return view('web.services.radio-advertising')->with($data);
    }
}
