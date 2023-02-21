<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/kategorie.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/gericht.php');
class ExampleController
{
    public function example(RequestData $rd,$title){
        $gericht = db_gericht_select_all();
        $title=$rd->title;
        return view('example',[ 'html'=>'<div> html </div>','gericht'=>$gericht]);
    }

    public function m4_6a_queryparameter(RequestData $rd) {
        /*
           Wenn Sie hier landen:
           bearbeiten Sie diese Action,
           so dass Sie die Aufgabe löst
        */

        return view('notimplemented', [
            'request'=>$rd,
            'url' => 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"
        ]);
    }

    public  function m4_7a_queryparameter(RequestData $data ){
        $getdata=$data->getGetData();
        $name=$getdata['name'];

        return view('example.m4_7a_queryparameter',['name'=>$name]);
    }

    public function m4_7b_kategorie() {
        $data =db_kategorie_select_all_asc();
        return view('example.m4_7b_kategorie', ['data' => $data]);
    }

    public function m4_7c_gerichte() {
        $data = db_gericht_select_2euro_des();
        return view('example.m4_7c_gerichte',['data' => $data]);
    }

    public function layout(RequestData $rd){
        $getdata=$rd->getData();
        $no= isset($getdata['no'])?$getdata['no']:1;
        if($no==2){
            $var = ['no'=>$no];
            return view('example.pages.m4_7d_page_2',$var);
        }else{
            $var = ['no'=>$no];
            return view('example.pages.m4_7d_page_1',$var);
        }
    }
}