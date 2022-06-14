<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

use App\Classes;
use App\Courses;
use App\User;
use App\ClassCourses;

use Illuminate\Http\Request;
use Redirect;
use Response;

class ClassCoursesController extends Controller
{

    public function index()
    {
        if(Auth::user()->role == 'Admin'){
            $data['class_courses'] = ClassCourses::orderBy('id','desc')->paginate(10);

            foreach ($data['class_courses'] as $key => $value) {
              $data['class_courses'][$key]['nama_guru'] =  User::where(['kode'=>$value->guru])->value('name');
              $classes = explode(",", $value->kelas);

              $group = array();
              foreach ($classes as $k => $val) {
                $group_classes = Classes::where(['id'=>$val])->value('name');
                $group[] = $group_classes;
              }

              $data['class_courses'][$key]['nama_kelas'] = implode(",", $group);
            }

            // dd($data['class_courses']);

        }else{
            $courses = Courses::where('kode_guru', '=', Auth::user()->kode)->orWhere('kode_guru2', '=', Auth::user()->kode)->orWhere('kode_guru3', '=', Auth::user()->kode)->orWhere('kode_guru4', '=', Auth::user()->kode)->orWhere('kode_guru5', '=', Auth::user()->kode)->get();

            $level = array();
            foreach ($courses as $key => $value) {
               $level[] = $value->level;
            }

            $data['classes'] = Classes::whereIn('level', array_unique($level))->orderBy('id','desc')->paginate(10);
        }

        return view('class_courses.List',$data);
    }

    public function create()
    {
        $list_tahun_ajar = Classes::select('tahun_ajaran')->distinct()->get();
        $list_mapel = Courses::select('name')->distinct()->get();
        $list_guru = User::where(['role'=>'Guru'])->get();
        $list_kelas = Classes::select('name')->distinct()->orderBy('name','asc')->get();
        return view('class_courses.Create', compact('list_tahun_ajar','list_mapel','list_guru','list_kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun_ajaran' => 'required',
            'level' => 'required',
            'mapel' => 'required',
            'guru' => 'required',
            'kelas' => 'required',
            ]);

        //dd($request);

        $insert['tahun_ajaran'] = $request->get('tahun_ajaran');
        $insert['level'] = $request->get('level');
        $insert['mapel'] = $request->get('mapel');
        $insert['guru'] = $request->get('guru');

        $kelas = array();
        foreach ($request->get('kelas') as $key => $value) {
          $class_id = Classes::where(['name'=>$value, 'level' => $request->get('level'), 'tahun_ajaran'=>$request->get('tahun_ajaran')])->value('id');
          $kelas[] =  $class_id;
        }

        $insert['kelas'] =  implode(",", $kelas);

        ClassCourses::insert($insert);
        return Redirect::to('class_courses')->with('success','Greate! Class Courses created successfully.');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $where = array('id' => $id);
        $data['class_info'] = ClassCourses::where($where)->first();
        $list_tahun_ajar = Classes::select('tahun_ajaran')->distinct()->get();
        $list_mapel = Courses::select('name')->distinct()->get();
        $list_guru = User::where(['role'=>'Guru'])->get();
        $list_kelas = Classes::select('name')->distinct()->orderBy('name','asc')->get();

        $classes = explode(",", $data['class_info']->kelas);
        $group = array();
        foreach ($classes as $k => $val) {
          $group_classes = Classes::where(['id'=>$val])->value('name');
          $group[] = $group_classes;
        }

        $data['class_info']->kelas = $group;


        return view('class_courses.Edit', compact('data','list_tahun_ajar','list_mapel','list_guru','list_kelas'));
    }


    public function update(Request $request, $id)
    {
        $update = $request->except('_method','_token','submit');
        // dd($request);
        $request->validate([
            'kelas' => 'required',
            ]);
        $update = ['kelas' => $request->kelas];

        $update['tahun_ajaran'] = $request->get('tahun_ajaran');
        $update['level'] = $request->get('level');
        $update['mapel'] = $request->get('mapel');
        $update['guru'] = $request->get('guru');

        $kelas = array();
        foreach ($request->get('kelas') as $key => $value) {
          $class_id = Classes::where(['name'=>$value, 'level' => $request->get('level'), 'tahun_ajaran'=>$request->get('tahun_ajaran')])->value('id');
          $kelas[] =  $class_id;
        }

        $update['kelas'] =  implode(",", $kelas);

        ClassCourses::where('id',$id)->update($update);
        return Redirect::to('class_courses')->with('success','Great! Class Courses updated successfully');
    }


    public function destroy($id)
    {
        ClassCourses::where('id',$id)->delete();
        return Redirect::to('class_courses')->with('success','Class Courses deleted successfully');
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
