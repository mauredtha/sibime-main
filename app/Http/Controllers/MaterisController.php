<?php

namespace App\Http\Controllers;
use App\Materis;
use App\Courses;
use App\Classes;
use App\DetailMateri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Redirect;

class MaterisController extends Controller
{

    public function listMateriClass($class_id, $course_id){

      $data['subjects'] = Materis::where(['id_class' => $class_id, 'ic_course' => $course_id])->get();

      $class_name = Classes::where('id', '=', $class_id)->get();

      $compactData=array('data', 'class_id', 'class_name');
      return view('materi.Materi', compact($compactData));
    }

    public function listMateri($id)
    {
        if(Auth::user()->role == 'Siswa'){
            $data['subjects'] = Materis::where(['id_class' => Auth::user()->class_id, 'ic_course' => $id])->get();
        }else {

            $class_level = Classes::where('id', '=', $id)->value('level');

            $data['subjects'] = Courses::where(['level' => $class_level,'kode_guru'=> Auth::user()->kode])->orWhere('kode_guru2', '=', Auth::user()->kode)->orWhere('kode_guru3', '=', Auth::user()->kode)->orWhere('kode_guru4', '=', Auth::user()->kode)->orWhere('kode_guru5', '=', Auth::user()->kode)->get();

            foreach ($data['subjects'] as $key => $value) {
                $data['subjects'][$key]['ListMateri'] = Materis::where(['id_class' => $id, 'ic_course' => $value->id])->get();
            }

        }

        $class_name = Classes::where('id', '=', $id)->get();

        $compactData=array('data', 'id', 'class_name');
        return View::make('materi.Daftar', compact($compactData));
    }

    public function allMateri($id){

        $data['subjects'] = Materis::where(['ic_course' => $id, 'kode_guru' => Auth::user()->kode])->get();
        $mapel = Courses::where('id', '=', $id)->get();

        return view('materi.All', compact('data','mapel'));
    }

    public function create($id)
    {
        $class = Classes::where('id', '=', $id)->get();
        $courses = Courses::where(['level' => $class[0]->level,'kode_guru'=> Auth::user()->kode])->orWhere('kode_guru2', '=', Auth::user()->kode)->orWhere('kode_guru3', '=', Auth::user()->kode)->orWhere('kode_guru4', '=', Auth::user()->kode)->orWhere('kode_guru5', '=', Auth::user()->kode)->get();

        return view('materi.Create', compact('class','courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ic_course' => 'required',
            'materi' => 'mimes:csv,txt,xlx,xls,pdf,doc,docx,xlsx|max:2048',
            'latihan' => 'mimes:csv,txt,xlx,xls,pdf,doc,docx,xlsx|max:2048',
            'ulahan_harian' => 'mimes:csv,txt,xlx,xls,pdf,doc,docx,xlsx|max:2048',
            'remidial' => 'mimes:csv,txt,xlx,xls,pdf,doc,docx,xlsx|max:2048',
        ]);

        if($request->file('materi')){
            $name = date('YmdHis').'_'.$request->file('materi')->getClientOriginalName();
            $filePath = $request->file('materi')->storeAs('uploads', $name, 'public');
            $fileName = date('YmdHis').'_'.$request->file('materi')->getClientOriginalName();
            $insert['materi'] = $fileName;
        }

        // dd($insert['materi']);
        if($request->file('latihan')){
            $name = date('YmdHis').'_'.$request->file('latihan')->getClientOriginalName();
            $filePath = $request->file('latihan')->storeAs('uploads', $name, 'public');
            $fileName = date('YmdHis').'_'.$request->file('latihan')->getClientOriginalName();
            $insert['latihan'] = $fileName;
        }

        if($request->file('ulangan_harian')){
            $name = date('YmdHis').'_'.$request->file('ulangan_harian')->getClientOriginalName();
            $filePath = $request->file('ulangan_harian')->storeAs('uploads', $name, 'public');
            $fileName = date('YmdHis').'_'.$request->file('ulangan_harian')->getClientOriginalName();
            $insert['ulangan_harian'] = $fileName;
        }

        if($request->file('remidial')){
            $name = date('YmdHis').'_'.$request->file('remidial')->getClientOriginalName();
            $filePath = $request->file('remidial')->storeAs('uploads', $name, 'public');
            $fileName = date('YmdHis').'_'.$request->file('remidial')->getClientOriginalName();
            $insert['remidial'] = $fileName;
        }

        $insert['id_class'] = $request->get('id_class');
        $insert['ic_course'] = $request->get('ic_course');
        $insert['kode_guru'] = Auth::user()->kode;
        $insert['tahun_ajar'] = $request->get('tahun_ajar');

        $insert['start_materi'] = $request->get('start_materi');
        $insert['deadline_materi'] = $request->get('deadline_materi');
        $insert['start_latihan'] = $request->get('start_latihan');
        $insert['deadline_latihan'] = $request->get('deadline_latihan');
        $insert['start_uh'] = $request->get('start_uh');
        $insert['deadline_uh'] = $request->get('deadline_uh');
        $insert['start_remidi'] = $request->get('start_remidi');
        $insert['deadline_remidi'] = $request->get('deadline_remidi');

        $insert['created_at'] = date('Y-m-d H:i:s');
        $insert['updated_at'] = date('Y-m-d H:i:s');

        // dd($insert);

        Materis::insert($insert);
        return Redirect::route('list_materi', $request->get('id_class'))->with(['success'=>'Greate! Materi created successfully.']);
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $materi = Materis::where($where)->first();
        $class = Classes::where('id', '=', $materi->id_class)->get();
        // dd($class);
        $courses = Courses::where(['level' => $class[0]->level,'kode_guru'=> Auth::user()->kode])->orWhere('kode_guru2', '=', Auth::user()->kode)->orWhere('kode_guru3', '=', Auth::user()->kode)->orWhere('kode_guru4', '=', Auth::user()->kode)->orWhere('kode_guru5', '=', Auth::user()->kode)->get();
        return view('materi.Edit', compact('materi', 'class', 'courses'));
    }


    public function update(Request $request, $id)
    {
        $update = $request->except('_method','_token','submit','kelas');
        // dd($request);

        if($request->file('materi')){
            $name = date('YmdHis').'_'.$request->file('materi')->getClientOriginalName();
            $filePath = $request->file('materi')->storeAs('uploads', $name, 'public');
            $fileName = date('YmdHis').'_'.$request->file('materi')->getClientOriginalName();
            $update['materi'] = $fileName;
        }

        if($request->file('latihan')){
            $name = date('YmdHis').'_'.$request->file('latihan')->getClientOriginalName();
            $filePath = $request->file('latihan')->storeAs('uploads', $name, 'public');
            $fileName = date('YmdHis').'_'.$request->file('latihan')->getClientOriginalName();
            $update['latihan'] = $fileName;
        }

        if($request->file('ulangan_harian')){
            $name = date('YmdHis').'_'.$request->file('ulangan_harian')->getClientOriginalName();
            $filePath = $request->file('ulangan_harian')->storeAs('uploads', $name, 'public');
            $fileName = date('YmdHis').'_'.$request->file('ulangan_harian')->getClientOriginalName();
            $update['ulangan_harian'] = $fileName;
        }

        if($request->file('remidial')){
            $name = date('YmdHis').'_'.$request->file('remidial')->getClientOriginalName();
            $filePath = $request->file('remidial')->storeAs('uploads', $name, 'public');
            $fileName = date('YmdHis').'_'.$request->file('remidial')->getClientOriginalName();
            $update['remidial'] = $fileName;
        }

        $update['id_class'] = $request->get('id_class');
        $update['ic_course'] = $request->get('ic_course');
        $update['kode_guru'] = Auth::user()->kode;
        $update['tahun_ajar'] = $request->get('tahun_ajar');
        $update['start_materi'] = $request->get('start_materi');
        $update['deadline_materi'] = $request->get('deadline_materi');
        $update['start_latihan'] = $request->get('start_latihan');
        $update['deadline_latihan'] = $request->get('deadline_latihan');
        $update['start_uh'] = $request->get('start_uh');
        $update['deadline_uh'] = $request->get('deadline_uh');
        $update['start_remidi'] = $request->get('start_remidi');
        $update['deadline_remidi'] = $request->get('deadline_remidi');
        $upate['updated_at'] = date('Y-m-d H:i:s');

        Materis::where('id',$id)->update($update);
        return Redirect::route('list_materi', $request->get('id_class'))->with(['success'=>'Greate! Materi created successfully.']);
    }


    public function destroy($id)
    {
        Materis::where('id',$id)->delete();
        return Redirect::to('classes')->with('success','Materi deleted successfully');
    }

    public function listMateriLevel($level, $course_id){
        $classes = Classes::where(['level'=>$level])->get();

        $class_id = [];
        foreach ($classes as $key => $value) {
            $class_id[] = $value->id;
        }

        $subjects = Materis::whereIn('id_class', $class_id)->where('ic_course', '=', $course_id)->orderBy('materi','asc')->paginate(10);

        return view('materi.MateriLevel', compact('subjects'));
    }

    public function listAnswer($course_id, $materi_id){
      $answers = DetailMateri::where(['id_komponen_mapel'=>$materi_id])->orderBy('created_at','desc')->paginate(15);

      return view('materi.ListAnswers', compact('course_id', 'materi_id', 'answers'));
    }

    public function createAnswer($id){
      $subjects = Materis::where(['id' => $id])->value('materi');
      return view('materi.CreateAnswer', compact('subjects','id'));
    }

    public function storeAnswer(Request $request)
    {

        $request->validate([
            'answer' => 'mimes:csv,txt,xlx,xls,pdf,doc,docx,xlsx|max:2048',
        ]);

        if($request->file('answer')){
            $name = date('YmdHis').'_'.$request->file('answer')->getClientOriginalName();
            $filePath = $request->file('answer')->storeAs('uploads', $name, 'public');
            $fileName = date('YmdHis').'_'.$request->file('answer')->getClientOriginalName();

            if($request->get('kategori') == '0'){
              $insert['latihan'] = $fileName;
            }elseif ($request->get('kategori') == '1') {
              $insert['ulangan_harian'] = $fileName;
            }else{
              $insert['remedial'] = $fileName;
            }
        }

        $id_course =  Materis::where(['id'=>$request->get('materi_id')])->value('ic_course');

        $insert['id_komponen_mapel'] = $request->get('materi_id');
        $insert['materi'] = $request->get('materi');
        $insert['kode_siswa'] = Auth::user()->kode;
        $insert['created_at'] = date('Y-m-d H:i:s');
        $insert['updated_at'] = date('Y-m-d H:i:s');

        // dd($insert);

        DetailMateri::insert($insert);
        return Redirect::route('subject_answers', [$id_course, $request->get('materi_id')])->with(['success'=>'Greate! Your answer has been saved successfully.']);
    }

    public function editAnswer($id)
    {
        $where = array('id' => $id);
        $answer = DetailMateri::where($where)->first();
        // dd($class);

        return view('materi.EditAnswer', compact('answer','id'));
    }


    public function updateAnswer(Request $request, $id)
    {
        //dd($request);

        if($request->file('answer')){
          dd('asks');
            $name = date('YmdHis').'_'.$request->file('answer')->getClientOriginalName();
            $filePath = $request->file('answer')->storeAs('uploads', $name, 'public');
            $fileName = date('YmdHis').'_'.$request->file('answer')->getClientOriginalName();

            if($request->get('kategori') == '0'){
              $update['latihan'] = $fileName;
            }elseif ($request->get('kategori') == 1) {
              dd(1);
              $update['ulangan_harian'] = $fileName;
            }else{
              $update['remedial'] = $fileName;
            }
        }

        $update = $request->except('_method','_token','submit','materi_id','kategori');

        $id_course =  Materis::where(['id'=>$request->get('materi_id'), 'id_class'=>Auth::user()->class_id])->value('ic_course');

        //dd($id_course);

        $update['id_komponen_mapel'] = $request->get('materi_id');
        $update['materi'] = $request->get('materi');
        $update['kode_siswa'] = Auth::user()->kode;
        $update['updated_at'] = date('Y-m-d H:i:s');


        DetailMateri::where('id',$id)->update($update);
        return Redirect::route('subject_answers', [$id_course, $request->get('materi_id')])->with(['success'=>'Greate! Your answer has been edited successfully.']);
    }


    public function destroyAnswer($id)
    {
        DetailMateri::where('id',$id)->delete();
        return Redirect::to(url()->previous())->with('success','Your answer has been deleted successfully');
    }



}
