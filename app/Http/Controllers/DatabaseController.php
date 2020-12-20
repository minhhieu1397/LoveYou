<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\addCollumn;
use App\Http\Requests\DeleteColRequest;

class DatabaseController extends Controller
{
    public function database()
    {
        return view('database');
    }

    public function addColumn(addCollumn $request)
    {
        $name = $request->input('name');
        $type = $request->input('type');
        
		Schema::table('database', function(Blueprint $table) use ($name, $type) {
            $table->{$type}($name);
        });

        return back();     
    }
    
    public function delete(Request $request)
    {
        $name = $request->input('name');

        if(Schema::hasColumn('database', $name)) {
            Schema::table('database', function (Blueprint $table) use ($name) 
            {
                $table->dropColumn([$name]);
            });
        } else {
            return back()->withErrors([
                'deleteColumn' => 'column does not exist'
            ]);
        }

        return back();     
    }
}
