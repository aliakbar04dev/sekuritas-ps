<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Files\File;

class Upload extends BaseController
{
    public function index()
    {
        //
    }
    public function attachment(){
        $files = $this->request->getFile('files');
        $sessId = session('ID') ?? '1';
        $location = '/data/articles/'.$sessId;
        if(!file_exists($location)){
            $getAllLocation = '';
            foreach(explode('/', $location) as $k => $v){
                if($k == 0) continue;
                $getAllLocation .= '/'.$v;
                if(!file_exists(WRITEPATH.$getAllLocation)){
                    mkdir(WRITEPATH.$getAllLocation, 0777, true);
                }
            }
        }
        $realPath = WRITEPATH.$location;
        $data = ['sucess' => false, 'file_path' => null, 'file_name' => null, 'file_uploader' => $sessId];
        if(!$files->hasMoved()){
            $newName = $files->getRandomName();
            $files->move($realPath, $newName);
            $uploadedFile = new File($realPath.'/'.$newName);
            $data['sucess'] = true;
            $data['file_path'] = $location.'/'.$newName;
            $data['file_name'] = $files->getClientName();
            $data['file_uploader'] = $sessId;
        }
        return $this->response->setStatusCode(200)->setJSON($data);
    }
    public function open_attachment(){
        $path = $this->request->getVar('path');
        if(($image = file_get_contents(WRITEPATH.$path)) === FALSE){
            show_404();

        }else{ 
            $mimeType = 'image/jpg';
            $file = new File(WRITEPATH.$path);
            $mimeType = $file->getMimeType();
            $this->response
            ->setStatusCode(200)
            ->setContentType($mimeType)
            ->setBody($image)
            ->send();
        }
            // choose the right mime type
           

        // return @file_get_contents(base_url('writable').$path);
    }
}
