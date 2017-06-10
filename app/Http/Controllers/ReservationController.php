<?php

namespace App\Http\Controllers;

use App\Models\VRCategories;
use App\Models\VROrders;
use App\Models\VRPages;
use App\Models\VRReservations;
use App\Models\VRResources;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    /**
     * Generates custom dates and adds to array
     * @param Carbon $start_date
     * @param Carbon $end_date
     * @param $addWhat
     * @param $value
     * @param $dateFormat
     * @return array
     */
    private function generateDateRange(Carbon $start_date, Carbon $end_date, $addWhat, $value, $dateFormat)
    {
        $dates = [];
        for($date = $start_date; $date->lte($end_date); $date->$addWhat($value)) {
            $dates[] = $date->format($dateFormat);
        }
        return $dates;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($day = null)
    {


        if(auth()->check() == true) {

            if($day == null)
                $day = Carbon::today()->toDateString();

            $startTime = Carbon::today()->addHours(11);
            $endTime = Carbon::today()->addHours(22);


            $startDay = Carbon::today();
            $endDay = Carbon::today()->addWeeks(2);






            $configuration = FrontEndController::navConfiguration();
            $configuration['times'] = $this->generateDateRange($startTime, $endTime, 'addMinutes', 10, 'H:i');
            $configuration['days'] = $this->generateDateRange($startDay, $endDay, 'addDays', 1, 'y-m-d');
            $configuration['today'] = Carbon::today()->toDateString();
            $configuration['experiences'] = VRPages::with('translations')->where('category_id', 'kambariai')->get()->toArray();
            $configuration['day_from_url'] = $day;



            return view('front-end.reservation', $configuration);


        } else {

            return redirect()->route('login');

        }



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->all();
        unset($data['_token']);

        $order =VROrders::create([

            'user_id' => auth()->user()->id,
            'status'  => 'reserved'

        ]);

        foreach ($data as $key => $value) {

            VRReservations::create([

                'time' => json_encode($value),
                'page_id' => $key,
                'order_id' => $order['id']


            ]);

        }





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
