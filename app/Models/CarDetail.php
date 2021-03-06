<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarDetail extends Model
{
    protected $connection = 'db_test';
    protected $table = 'tb_car_detail';
    public $timestamps = false;

    public function converterCarDetail($request)
    {

        $car_cnt = CarDetail::where('car_id', $request->car_id)->count();

        if($car_cnt == 0) {
            foreach($request->request as $key=>$val) {
                if(isset($val)) {
                    $this->{$key} = $val;
                }
            }

            return $this;
        }

        return redirect('/')->with('alert', '아이디 중복');
    }

    public static $rules = [
        'name' => ['required', 'min:2', 'max:10'],
        'color' => ['required'],
    ];
}
