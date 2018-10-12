<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload_model extends CI_Model{
    
    function __construct()
    {
        
    }

    public function create_dir()
    {
        $dir = 'upload';
        $dir1 = date('Y');
        $dir2 = date('m');
        
        if (!is_dir($dir)) {
            mkdir($dir);
        }        
        if (!is_dir($dir.'/'.$dir1)) {
            mkdir($dir.'/'.$dir1);
        }        
        if (!is_dir($dir.'/'.$dir1.'/'.$dir2)) {
            mkdir($dir.'/'.$dir1.'/'.$dir2);
        }
    }

    public function upload($id = 0)
    {
        $dir = 'upload/'.date('Y/m');
        $config['upload_path'] = $dir;
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['overwrite'] = true;
        $config['max_size'] = 1024;
        $config['file_name'] = $this->input->post('name').'-'.time(); 

        $this->upload->initialize($config);
        if($this->upload->do_upload())
        {
            $getfile = $this->upload->data();
            $image = $dir.'/'.$getfile['orig_name'];
            $data['Article_Image'] = $image;
            $this->db->update('wa_post',$data,array('Article_Id'=>$id));
        }
    }

    public function create_thumbnail($file)
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $file;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        //$config['new_image'] = 'oke.png';
        //$config['thumb_marker'] = '_thumb';
        $config['width'] = 300;
        //$config['height'] = 75;
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
    }
}