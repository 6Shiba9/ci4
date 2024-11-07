<?php

namespace Modules\Users\Controllers;

use App\Controllers\BaseController;
use Modules\Users\Models\User_model;
use Mpdf\Mpdf;

class User extends BaseController
{
    // แสดงรายการชื่อ
    public function index()
    {
        $NameModel = new User_model();
        $data['data_users'] = $NameModel->orderBy('id', 'DESC')->findAll();
        return view('Modules\Users\Views\namelist', $data);
       
    }
// แสดงรายการชื่อ
    public function createdata()
    { 
        return view('Modules\Users\Views\addname');
    }
// บันทึกข้อมูล
    public function store() {
        $NameModel = new User_model(); // ใช้ User_model แทน NameModel
        $request = \Config\Services::request();
        $data = [
            'name' => $request->getVar('name'),
            'email' => $request->getVar('email'),
            'address' => $request->getVar('address'),
            'phone' => $request->getVar('phone'),
        ];
        $NameModel->insert($data);
        return $this->response->redirect(site_url('Manage/namelist'));
    }

    // แสดงรายการชื่อ
    public function singleUser($id = null)
    {
        $NameModel = new User_model();
        $data['user_obj'] = $NameModel->where('id', $id)->first();
        // echo [$data];
        return view('Modules\Users\Views\editdata', $data);
    }
     // update
     public function update_data()
     {
         $NameModel = new User_model();
         $request = \Config\Services::request();
         $id = $request->getVar('id');
         $data = [
             'name' => $request->getVar('name'),
             'email' => $request->getVar('email'),
             'address' => $request->getVar('address'),
             'phone' => $request->getVar('phone'),
         ];
         $NameModel->update($id, $data);
         return $this->response->redirect(site_url('Manage/namelist'));
     }
 
     // delete name
     public function deletedata($id = null)
     {
         $NameModel = new User_model();
         $data['user'] = $NameModel->where('id', $id)->delete($id);
         return redirect()->to('/Manage/namelist')->with('success', 'Data deleted successfully!');
     }
    

     public function generate()
    {
        $mpdf = new \Mpdf\Mpdf();
        
        $NameModel = new User_model();
        $data = $NameModel->findAll();
    
        $html = '<h1>Data Users</h1>';
        $html .= '<hr>';
        $html .= '<tbody>';
        foreach ($data as $value) {

            $html .=  esc($value['name']) .'<br>';
            $html .=  esc($value['email']).'<br>';
            $html .=  esc($value['address']).'<br>';
            $html .=  esc($value['phone']) .'<br>';
            $html .= '<hr>';
        }
        $html .= '<tbody>';
        // เขียน HTML ลงใน PDF
        $mpdf->WriteHTML($html);
        
        // ส่ง PDF ไปยัง Browser
        $mpdf->Output('example.pdf', 'D'); // 'D' หมายถึงการดาวน์โหลด PDF
    }
}
