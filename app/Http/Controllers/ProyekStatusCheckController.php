<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\Task;
use Illuminate\Http\Request;

class ProyekStatusCheckController extends Controller
{
    protected $proyek_id;

    public function __construct($id)
    {
        $this->proyek_id = $id;
    }

    public function check()
    {
        $tasks = Task::where('proyek_id', $this->proyek_id)->get()->all();
        $finish_task = Task::where([['proyek_id', $this->proyek_id], ['status', '0'], ['status', '1']])->get()->all();
        if (count($finish_task) === $tasks) {
            Proyek::where('id', $this->proyek_id)->update([
                'status' => '3'
            ]);
        } else {
            Proyek::where('id', $this->proyek_id)->update([
                'status' => '2'
            ]);
        }
    }
}
