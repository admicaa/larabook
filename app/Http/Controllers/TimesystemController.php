<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\timesinsystems;
use App\timesystem;

class TimesystemController extends Controller
{
    //
    public function show(){
        return view('timesystem.timesystem');
    }




    public function viewToReview(Request $request){
        $this->validate($request,[
            'starttime'=>'required',
            'lasttime'=>'required',
            'classtime'=>'required|numeric',
            'resttime'=>'required|numeric',
            'restnum'=>'required|numeric'
        ]);
        $firsttime = strtotime(request('starttime'));
        $lasttime = strtotime(request('lasttime'));
        $classtime = request('classtime');
        $resttime = request('resttime');
        $restnum = request('restnum');
        $minutes = round(($lasttime - $firsttime)/60,0);
        $numofhss = round(($minutes - ($restnum*$resttime))/$classtime,0);
        $afterhowmaney =  round($numofhss/$restnum,0);
        return view('timesystem.table',compact(
            'firsttime',
            'lasttime',
            'classtime',
            'resttime',
            'restnum',
            'minutes',
            'numofhss',
            'afterhowmaney'
            
        ))->with(['controller'=>$this]);
    }
    
    
    



    function newtablerow($first,$rest,$lasttime,$classtime,$resttime,$afterhowmaney,$count=1){
        if ($first>= $lasttime ){
            echo '<input name="number" value="'.($count-1).'" hidden required  form="addnew">';
            return 'false';
        }
        elseif($rest!=$afterhowmaney){
            echo'<tr>
                <td class="text-center">حصة <input type="text" name="state'.$count.'" value="1" hidden form="addnew" required></td>
                <td><input type="time" form="addnew" required class="form-control  text-right" name="last'.$count.'"value="'.date('h:i',($first+$classtime*60)).'" ></td>
                <td><input type="time" form="addnew" required class="form-control  text-right" name="first'.$count.'"value="'.date('h:i',$first).'" ></td>
            </tr>';
            
            $this->newtablerow(($first+$classtime*60),$rest+1,$lasttime,$classtime,$resttime,$afterhowmaney,$count+1);
        }
        else{
            echo'<tr>
                <td class="text-center">استراحة <input type="text" name="state'.$count.'" value="0" hidden form="addnew" required></td>
                <td><input type="time" class="form-control  text-right" form="addnew" required name="last'.$count.'"value="'.date('h:i',($first+$resttime*60)).'" ></td>
                <td><input type="time" class="form-control text-right" form="addnew" required name="first'.$count.'"value="'.date('h:i',$first).'" ></td>
            </tr>';
            $this->newtablerow(($first+$resttime*60),0,$lasttime,$classtime,$resttime,$afterhowmaney,$count+1);
        }
    }
    


    public function storeNew(){
        $this->validate(request(),[
            'number'=>'required',
            'name'=>'required'
        ]);
        $timesystem = new timesystem(request(['name']));
        $timesystem->save();
        for($i=1;$i<=request()->number;$i++){
            $mn = request('first'.$i);
            $too = request('last'.$i);
            $state = request('state'.$i);
            $timesystem->newtime(
                new timesinsystems(compact(
                        'mn',
                        'too',
                        'state'
                    )
                )
            );
        }
    }




    
}
