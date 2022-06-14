<?php

namespace App\Http\Controllers;
use App\Materis;
use App\Classes;
use App\Courses;
use App\User;
use App\Absences;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Redirect;

class AbsencesController extends Controller
{

    public function index($id)
    {
        // $data['absensi'] = Absences::where(['id_class'=>$id, 'kode_guru'=>Auth::user()->kode])->orderBy('id','desc')->paginate(10);
        $data['absensi'] = User::where(['class_id'=>$id])->orderBy('name','asc')->paginate(10);
        $class_name = Classes::where('id', '=', $id)->get();
        return view('absence.List',compact('data','class_name','id'));

        // $absensi = Absensi::findOrFail($id_class);
        // return view('absensi.list', $absensi);
    }

    public function create($id)
    {
        $datas = User::where(['role'=>'Siswa', 'class_id'=>$id])->get();
        $class_name = Classes::where('id', '=', $id)->get();
        return view('absence.Create', compact('datas','class_name'));
    }

    public function store(Request $request)
    {
        //dd($request);
        $class_id =  User::where('kode', '=', $request->input('kode_siswa')[0])->value('class_id');

        $tahun_ajar = Classes::where('id', '=', $class_id)->value('tahun_ajaran');
        $siswa= [];
        foreach ( $request->kode_siswa as $key => $value ) {
          //dd($request->input('status_kehadiran')[$key]);
            if($request->input('status_kehadiran')[$key] == 'on'){
                $kehadiran = 1;
            }else {
                $kehadiran = 0;
            }

          if($request->file('doc')){
            foreach ($request->file('doc') as $i => $val_doc) {
              if($i == $key){
                $name = date('YmdHis').'_'.$val_doc->getClientOriginalName();
                $filePath = $val_doc->storeAs('uploads', $name, 'public');
                $fileName = date('YmdHis').'_'.$val_doc->getClientOriginalName();

                $siswa[$key]['id_class'] = $class_id;
                $siswa[$key]['kode_siswa'] = $request->input('kode_siswa')[$key];
                $siswa[$key]['nama'] = $request->input('name')[$key];
                $siswa[$key]['status_kehadiran'] = $kehadiran;
                $siswa[$key]['tahun_ajar'] = $tahun_ajar;
                $siswa[$key]['kode_guru'] = Auth::user()->kode;
                $siswa[$key]['created_at'] =date('Y-m-d H:i:s');
                $siswa[$key]['updated_at'] =date('Y-m-d H:i:s');
                $siswa[$key]['alasan'] =$request->input('alasan')[$key];
                $siswa[$key]['doc'] = $fileName;
                //dd($siswa);
              } else {
                $siswa[$key]['id_class'] = $class_id;
                $siswa[$key]['kode_siswa'] = $request->input('kode_siswa')[$key];
                $siswa[$key]['nama'] = $request->input('name')[$key];
                $siswa[$key]['status_kehadiran'] = $kehadiran;
                $siswa[$key]['tahun_ajar'] = $tahun_ajar;
                $siswa[$key]['kode_guru'] = Auth::user()->kode;
                $siswa[$key]['created_at'] =date('Y-m-d H:i:s');
                $siswa[$key]['updated_at'] =date('Y-m-d H:i:s');
                $siswa[$key]['alasan'] =$request->input('alasan')[$key];
              }

            }
          }

          if(!isset($siswa[$key]['doc'])){
            $siswa[$key]['doc'] = null;
            $siswa[$key]['id_class'] = $class_id;
            $siswa[$key]['kode_siswa'] = $request->input('kode_siswa')[$key];
            $siswa[$key]['nama'] = $request->input('name')[$key];
            $siswa[$key]['status_kehadiran'] = $kehadiran;
            $siswa[$key]['tahun_ajar'] = $tahun_ajar;
            $siswa[$key]['kode_guru'] = Auth::user()->kode;
            $siswa[$key]['created_at'] =date('Y-m-d H:i:s');
            $siswa[$key]['updated_at'] =date('Y-m-d H:i:s');
            $siswa[$key]['alasan'] =$request->input('alasan')[$key];
          }

            // $siswa[] = [
            //     'id_class' => $class_id,
            //     'kode_siswa' => $request->input('kode_siswa')[$key],
            //     'nama' => $request->input('name')[$key],
            //     'status_kehadiran' => $kehadiran,
            //     'tahun_ajar' => $tahun_ajar,
            //     'kode_guru' => Auth::user()->kode,
            //     'created_at' => date('Y-m-d H:i:s'),
            //     'updated_at' => date('Y-m-d H:i:s'),
            //     'alasan' => $request->input('alasan')[$key],
            //     'doc' => $fileName
            // ];
        }

        //dd($siswa);
        Absences::insert($siswa);

        return Redirect::route('absensi_class', $class_id)->with(['success'=>'Greate! Absences created successfully.']);
    }

    public function absensi()
    {
        $class = Classes::where('id',Auth::user()->class_id)->get();

        $conds = ['level' => $class[0]->level, 'tahun_ajaran' => $class[0]->tahun_ajaran];

        $data['courses'] = Courses::where($conds)->get();

        return view('absence.Absensi', $data);
    }

    public function absensi_detail($id){
        //id = 6

        if(Auth::user()->role == 'Siswa'){
            $courses = Courses::where('id',$id)->get();

            $data['absences'] = Absences::where(['kode_siswa' => Auth::user()->kode,'kode_guru' => $courses[0]->kode_guru])->orWhere('kode_guru', '=', $courses[0]->kode_guru2)->orWhere('kode_guru', '=', $courses[0]->kode_guru3)->orWhere('kode_guru', '=', $courses[0]->kode_guru4)->orWhere('kode_guru', '=', $courses[0]->kode_guru5)->get();
        } else {
            //Guru
            $class_id = User::where(['kode'=>$id])->value('class_id');
            $data['absences'] = Absences::where(['kode_siswa' => $id, 'id_class'=>$class_id])->get();
        }

        return view('absence.Detail', $data);
    }

    public function student_absences($class_id, $kode_siswa){
      $absences =  Absences::where(['id_class'=>$class_id, 'kode_siswa'=>$kode_siswa])->groupBy('kode_guru')->selectRaw('count(*) as total_hadir, kode_guru')->paginate(10);

      $level = Classes::where(['id'=>$class_id])->value('level');

      foreach ($absences as $key => $value) {

        $absences[$key]['mapel'] = Courses::where(['level' => $level,'kode_guru' => $value->kode_guru])->orWhere('kode_guru2', '=', $value->kode_guru)->orWhere('kode_guru3', '=', $value->kode_guru)->orWhere('kode_guru4', '=', $value->kode_guru)->orWhere('kode_guru5', '=', $value->kode_guru)->value('name');
      }

      return view('absence.Students', compact('absences'));
    }
}
