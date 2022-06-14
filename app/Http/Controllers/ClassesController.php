<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

use App\Classes;
use App\Courses;
use App\ClassCourses;

use Illuminate\Http\Request;
use Redirect;
use Response;

class ClassesController extends Controller
{

    public function index()
    {
        if(Auth::user()->role == 'Admin'){
            $data['classes'] = Classes::orderBy('id','desc')->paginate(10);
        }else{

            $group_classes = ClassCourses::where('guru', '=', Auth::user()->kode)->get();

            $level = array();

            $kelas = array();
            foreach ($group_classes as $key => $value) {
              $level[] = $value->level;
              $groups[$key] = explode(",", $value->kelas);
              foreach ($groups[$key] as $g => $group) {
                $kelas[] = $group;
              }
            }

            $data['classes'] = Classes::whereIn('id', array_unique($kelas))->orderBy('id','desc')->paginate(10);

            // $data['classes'] = Classes::whereIn('level', array_unique($level))->orderBy('id','desc')->paginate(10);
        }

        return view('classes.List',$data);
    }

    public function create()
    {
        return view('classes.Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'level' => 'required',
            'name' => 'required',
            'tahun_ajaran' => 'required',
            ]);

        $insert['level'] = $request->get('level');
        $insert['name'] = $request->get('name');
        $insert['tahun_ajaran'] = $request->get('tahun_ajaran');
        $insert['created_at'] = date('Y-m-d H:i:s');
        $insert['updated_at'] = date('Y-m-d H:i:s');

        Classes::insert($insert);
        return Redirect::to('classes')->with('success','Greate! Classes created successfully.');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $where = array('id' => $id);
        $data['class_info'] = Classes::where($where)->first();
        return view('classes.Edit', $data);
    }


    public function update(Request $request, $id)
    {
        $update = $request->except('_method','_token','submit');
        // dd($request);
        $request->validate([
            'level' => 'required',
            'name' => 'required',
            'tahun_ajaran' => 'required',
            ]);
        $update = ['level' => $request->level, 'name' => $request->name, 'tahun_ajaran' => $request->tahun_ajaran];

        $update['level'] = $request->get('level');
        $update['name'] = $request->get('name');
        $update['tahun_ajaran'] = $request->get('tahun_ajaran');
        $upate['updated_at'] = date('Y-m-d H:i:s');

        Classes::where('id',$id)->update($update);
        return Redirect::to('classes')->with('success','Great! Classes updated successfully');
    }


    public function destroy($id)
    {
        Classes::where('id',$id)->delete();
        return Redirect::to('classes')->with('success','Classes deleted successfully');
    }

    public function allClass($tahun){
      $tahun = str_replace('_', '/', $tahun);

      $classes = Classes::where(['tahun_ajaran'=>$tahun])->orderBy('level','asc')->paginate(10);

      return view('classes.all_class', compact('classes'));

    }

    public function allLevel($tahun){
      $tahun = str_replace('_', '/', $tahun);
      $class = Classes::where(['tahun_ajaran'=>$tahun])->groupBy('level')->get();

      return Response::json($class);
    }
}
