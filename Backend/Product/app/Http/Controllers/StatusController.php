<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    //
    public function show() {
        return Status::All();
    }

    public function insert(Request $request){
        $status = $request->input('name');
        $stmt = DB::table('statuses')->insert(['name'=>$status]);

        echo json_encode(array(
            "success" => $stmt,
            "message" => "Status succesfully created"
        ));

    }

    public function update(Request $request){
        $id = $request->input('id');
        $name = $request->input('name');

        $stmt = DB::table('statuses')
        ->where('id', $id)
        ->update([
            'name' => $name
        ]);
    }
}
