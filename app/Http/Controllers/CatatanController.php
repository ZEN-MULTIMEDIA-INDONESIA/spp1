<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
use App\Models\Proyek;
use App\Models\Task;
use Illuminate\Http\Request;

class CatatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($uuid)
    {
        $task = Task::where('uuid', $uuid)->first();
        $data = [
            'title' => 'Berikan Catatan',
            'task' => $task,
            'catatans' => Catatan::where('task_id', $task->id)->get()->all(),
            'proyek' => Proyek::where('id', $task->proyek_id)->first(),
        ];
        return view('task.catatan', $data);
    }

    public function store(Request $request, $id)
    {
        Catatan::insert([
            'uuid' => uuid_create(),
            'user_id' => auth()->user()->id,
            'task_id' => $id,
            'catatan' => $request->catatan,
            'created_at' => now()
        ]);
        return redirect()->route('catatan.task', ['id' => $id])->with([
            'title' => 'Menambah Catatan',
            'icon' => 'success',
            'text' => 'Berhasil menambahkan catatan untuk task ini!'
        ]);
    }

    public function hapus($uuid)
    {
        Catatan::where('uuid', $uuid)->delete();
        return response()->json([
            'title' => 'Menghapus data',
            'icon' => 'success',
            'text' => 'Berhasil menghapus catatan!'
        ]);
    }
}
