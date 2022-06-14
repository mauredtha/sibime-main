<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'AuthController@showFormLogin')->name('login');
Route::get('login', 'AuthController@showFormLogin')->name('login');
Route::post('login', 'AuthController@login');
Route::get('register', 'AuthController@showFormRegister')->name('register');
Route::post('register', 'AuthController@register');


Route::group(['middleware' => 'auth'], function () {

    Route::get('home', 'HomeController@index')->name('home');
    Route::get('logout', 'AuthController@logout')->name('logout');

    Route::resource('workbooks', 'BukuKerjasController');
    Route::put('/workbooks/{id}/edit', 'BukuKerjasController@update');
    Route::get('buku_kerja_satu', 'BukuKerjasController@buku_kerja_satu')->name('buku_kerja_satu');
    Route::get('buku_kerja_dua', 'BukuKerjasController@buku_kerja_dua')->name('buku_kerja_dua');
    Route::get('buku_kerja_tiga', 'BukuKerjasController@buku_kerja_tiga')->name('buku_kerja_tiga');
    Route::get('buku_kerja_empat', 'BukuKerjasController@buku_kerja_empat')->name('buku_kerja_empat');

    Route::resource('classes', 'ClassesController');
    Route::get('kelas/{tahun}', 'ClassesController@allClass')->name('kelas');
    Route::get('level_class/{tahun_ajaran?}', 'ClassesController@allLevel')->name('level_class');

    Route::resource('class_courses', 'ClassCoursesController');

    Route::resource('courses', 'CoursesController');
    Route::get('komponen/{id}', 'CoursesController@showKomponen')->name('komponen');
    Route::get('mapel', 'CoursesController@showMapelGuru')->name('mapel');
    Route::get('class_mapel/{class_id}/{kode_siswa}', 'CoursesController@showMapelClass')->name('class_mapel');
    Route::get('all_mapel/{class_id}', 'CoursesController@showAllMapel')->name('all_mapel');
    Route::get('mapel_komponen/{class_id}/{course_id}', 'CoursesController@showKomponenClass')->name('mapel_komponen');
    //Kepsek
    Route::get('courses/{tahun_ajaran?}/{level?}', 'CoursesController@showMapel')->name('courses');
    Route::get('courses_komponen/{level?}/{id?}', 'CoursesController@showKomponenLevel')->name('courses_komponen');
    Route::get('list_mapel/{level?}/{kode?}', 'CoursesController@showMapelGuruKode')->name('list_mapel');

    Route::resource('subjects', 'MaterisController');
    Route::get('list_materi/{id}', 'MaterisController@listMateri')->name('list_materi');
    Route::get('add_materi_class/{id}', 'MaterisController@create')->name('add_materi_class');
    Route::get('all_materi/{id}', 'MaterisController@AllMateri')->name('all_materi');
    Route::get('list_materi_class/{class_id}/{course_id}', 'MaterisController@listMateriClass')->name('list_materi_class');
    //Kepsek
    Route::get('subjects/{level?}/{course_id?}', 'MaterisController@listMateriLevel')->name('subjects');
    //siswa
    Route::get('subject_answers/{course_id}/{materi_id}', 'MaterisController@listAnswer')->name('subject_answers');
    Route::get('add_answers/{materi_id}', 'MaterisController@createAnswer')->name('add_answers');
    Route::post('answers', 'MaterisController@storeAnswer')->name('answers');
    Route::get('edit_answers/{materi_id}', 'MaterisController@editAnswer')->name('edit_answers');
    Route::put('edited_answers/{id}', 'MaterisController@updateAnswer')->name('edited_answers');
    Route::delete('delete_answers/{id}', 'MaterisController@destroyAnswer')->name('delete_answers');

    Route::resource('grades', 'NilaisController');
    Route::get('list_nilai', 'NilaisController@listNilai')->name('list_nilai');
    Route::get('list_nilai_class/{id}', 'NilaisController@index')->name('list_nilai_class');
    Route::get('add_nilai_class/{id}', 'NilaisController@create')->name('add_nilai_class');
    Route::get('student_grades/{class_id}/{kode_siswa}/{course_id}', 'NilaisController@studentGrades')->name('student_grades');
    Route::get('export_excel/{id}/{kode}', 'NilaisController@export')->name('export_excel');;

    Route::resource('absences', 'AbsencesController');
    Route::get('absensi', 'AbsencesController@absensi')->name('absensi');
    Route::get('absensi_detail/{id}', 'AbsencesController@absensi_detail')->name('absensi_detail');
    Route::get('absensi_class/{id}', 'AbsencesController@index')->name('absensi_class');
    Route::get('add_absensi_class/{id}', 'AbsencesController@create')->name('add_absensi_class');
    Route::get('student_absences/{class_id}/{kode_siswa}', 'AbsencesController@student_absences')->name('student_absences');

    Route::resource('users', 'AuthController');
    Route::get('all_students/{class_id}', 'AuthController@siswaClass')->name('all_students');
    Route::get('all_students/{class_id?}', 'AuthController@siswaClass')->name('all_students');
    Route::get('upload', 'AuthController@showFormUpload')->name('upload');
    Route::post('upload', 'AuthController@import_excel');
});
