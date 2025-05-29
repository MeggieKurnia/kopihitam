<?php

namespace AdminApp\Controllers;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportController implements FromView
{
	private $model;
	private $header;
	private $data;

	function __construct($model,$header = null,$orderBy=null){
		$this->model = new $model();
		$db = new $this->model();
		if(!is_null($header)){
			$this->header = $header;
			$this->data = $this->model->select(array_keys($this->header));
			if($orderBy){
				foreach($orderBy as $k=>$v){
					$this->data = $this->data->orderBy($k,$v);
				}
			}
		}else{
			$this->data = $this->model;
		}

	}

    public function view(): View
    {
        return view('admin::export_excel', [
            'data' => $this->data->get(),
            'header'=>$this->header
        ]);
    }
}