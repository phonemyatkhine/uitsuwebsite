<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;

class FilesController extends Controller
{
    public function __construct() {
        $this->middleware(['auth'])->except(['download', 'responseFile']);
    }
    public function index(Request $request)
    {
        if($request->input('path')) {
            $list = $this->ls(storage_path("/app/files").($request->input('path')));
            if($list == false) {
                return redirect('/files');
            }
        } else {
            $list = $this->ls(storage_path("/app/files"));
        }
        return view('pages.files.index')->with([
            'pageTitle' => 'Files',
            'list' => $list,
        ]);
    }
    public function upload() {
        return view('pages.files.upload')->with([
            'pageTitle' => "Upload File"
        ]);
    }
    public function ls($path) {
        if (strpos(realpath($path), realpath(storage_path("/app/files"))) !== false) {
            return scandir(realpath($path));
        } else {
            return false;
        }
    }
    public function save(Request $request) {
        if($request->hasFile('file')) {
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->storeAs("/files".$request->input('path'), $filename);
            return redirect('/files?path='.$request->input('path'));
        }
    }

    public function responseFile(Request $request) {
        $file = realpath(storage_path("/app/files").($request->input('path')));
        if(!file_exists($file) || is_dir($file)) {
            abort(404);
        } elseif(strpos($file, realpath(storage_path("/app/files"))) === true) {
            return redirect("/files");
        } else {
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            if(in_array($ext, array('gif', 'jpg', 'jpeg', 'png', 'ico', 'svg', 'pdf'))) {
                if($ext == 'gif') {
                    $type = 'image/gif';
                } elseif($ext == 'jpg' || $ext == 'jpeg') {
                    $type = 'image/jpeg';
                } elseif($ext == 'png') {
                    $type = 'image/png';
                } elseif($ext == 'ico') {
                    $type = 'image/x-icon';
                } elseif($ext == 'svg') {
                    $type = 'image/svg+xml';
                } elseif($ext == 'pdf') {
                    $type = 'application/pdf';
                }
                return response()->file($file, ['Content-Type', $type]);
            } else {
                return response()->download($file);
            }
        }

    }

    public function download(Request $request) {
        $file = realpath(storage_path("/app/files").($request->input('path')));
        if(!file_exists($file) || is_dir($file)) {
            abort(404);
        } elseif(strpos($file, realpath(storage_path("/app/files"))) === true) {
            return redirect("/files");
        } else {
            return response()->download($file);
        }
    }

    public function delete(Request $request) {
        $file = realpath(storage_path("/app/files").($request->input('path')));
        if(!file_exists($file)) {
            abort(404);
        } elseif(strpos($file, realpath(storage_path("/app/files"))) === true) {
            return redirect("/files");
        } else {
            if(is_dir($file)) {
                rmdir($file);
            } else {
                unlink($file);
            }
            return redirect('/files?path='.$request->input('redirectpath'));
        }
    }

    public function mkdir(Request $request) {
        $path = realpath(storage_path("/app/files").($request->input('path')));
        $name = $request->input('name');
        $created_path = $path.'/'.$name;
        if(!file_exists($created_path)) {
            mkdir($created_path);
        }
        return back();
    }
}
