<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\Task;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class TaskController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'ZEN MULTIMEDIA INDONESIA',
            'tasks' => Task::where('deleted_at', null)->get()->all()
        ];
        return view('task.index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data',
            'proyeks' => Proyek::where('deleted_at', null)->get()->all(),
        ];
        return view('task.tambah', $data);
    }

    public function restorasi()
    {
        $data = [
            'title' => 'Restorasi Data',
            'tasks' => Task::where('deleted_at', '!=', null)->get()->all()
        ];
        return view('task.restorasi', $data);
    }

    public function edit($uuid)
    {
        $data = [
            'title' => 'Edit Data',
            'task' => Task::where('uuid', $uuid)->first()
        ];
        return view('task.edit', $data);
    }

    public function store(Request $request)
    {
        Task::insert([
            'uuid' => uuid_create(),
            'task' => $request->task,
            'proyek_id' => $request->proyek_id,
            'created_at' => now()
        ]);
        return redirect()->route('task')->with([
            'title' => 'Menambahkan data',
            'icon' => 'success',
            'text' => 'Berhasil menambahkan data task'
        ]);
    }

    public function hapus($uuid)
    {
        Task::where('uuid', $uuid)->update([
            'deleted_at' => now()
        ]);
        return response()->json([
            'title' => 'Menghapus data',
            'icon' => 'success',
            'text' => 'Berhasil menghapus data task'
        ]);
    }

    public function restore($uuid)
    {
        Task::where('uuid', $uuid)->update([
            'deleted_at' => null,
        ]);
        return response()->json([
            'title' => 'Restorasi data task',
            'icon' => 'success',
            'text' => 'Berhasil merestorasi data task'
        ]);
    }

    public function hapus_permanen($uuid)
    {
        Task::where('uuid', $uuid)->delete();
        return response()->json([
            'title' => 'Menghapus data permanen',
            'icon' => 'success',
            'text' => 'Berhasil menghapus data task secara permanen'
        ]);
    }

    public function terima_task($uuid)
    {
        $task = Task::where('uuid', $uuid)->first();
        Task::where('uuid', $uuid)->update([
            'user_id' => auth()->user()->id,
            'status' => '0',
            'updated_at' => now()
        ]);
        Proyek::where('id', $task->proyek_id)->update([
            'status' => '1',
            'updated_at' => now()
        ]);
        return response()->json([
            'title' => 'Mengambil Task',
            'icon' => 'success',
            'text' => 'Berhasil mengambil task yang dipilih, selamat mengerjakan!'
        ]);
    }

    public function penyelesaian_task($uuid)
    {
        $task = Task::where('uuid', $uuid)->first();
        Task::where('uuid', $uuid)->update([
            'status' => '1',
            'updated_at' => now()
        ]);
        Proyek::where('id', $task->proyek_id)->update([
            'status' => '2',
            'updated_at' => now()
        ]);
        return response()->json([
            'title' => 'Penyelesaian Task',
            'icon' => 'success',
            'text' => 'Berhasil mengupdate data task, terimakasih pengerjaan anda akan segera direview!'
        ]);
    }
}
