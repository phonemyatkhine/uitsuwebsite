<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;

class FilesController extends Controller
{
    public function __construct() {
        $this->middleware(['auth'])->except(['download', 'responseFile']);
    }
    public function index()
    {
        return view('pages.files.index')->with([
            'pageTitle' => 'Files',
            'files' => File::all()
        ]);
    }
    public function upload() {
        return view('pages.files.upload')->with([
            'pageTitle' => "Upload File"
        ]);
    }
    public function save(Request $request) {
        echo "Uploading ...";
        $file = new File;
        $file->name = $request->input('name');
        $file->description = $request->input('description');
        $file->owner = \Auth::user()->id;
        $file->tag = $request->input('tag');
        if($request->hasFile('file')) {
            $ext = $request->file('file')->getClientOriginalExtension();
            $filename = sha1(time()).'.'.$ext;
            $request->file('file')->storeAs('public/files/', $filename);
            $file->filename = "storage/files/".$filename;
        }
        if($file->save()) {
            return redirect('/files');
        }
    }

    public function responseFile($id) {
        $file = File::where('id', $id)->first();
        if($file == NULL) {
            abort(404);
        } else {
            $filename = basename($file->filename);
            $filepath = storage_path("app/public/files/".$filename);
            $ext = pathinfo($filepath, PATHINFO_EXTENSION);
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
                return response()->file($filepath, ['Content-Type', $type]);
            } elseif($content = file_get_contents($filepath)) {
                echo "<pre>".htmlspecialchars($content)."</pre>";
            } else {
                return response()->download($filepath);
            }
        }

    }

    public function download($id) {
        $file = File::where('id', $id)->first();
        if($file == NULL) {
            abort(404);
        } else {
            $filename = basename($file->filename);
            $filepath = storage_path("app/public/files/".$filename);
            $ext = pathinfo($filepath, PATHINFO_EXTENSION);
            $nametodownload = $file->name.".".$ext;
            return response()->download($filepath, $nametodownload, ['Content-Type', "application/octet-stream"]);
        }
    }

    public function delete($id) {
        $file = File::where('id', $id)->first();
        if($file->owner == \Auth::user()->id) {
            $file->delete();
        }
        return redirect('/files');
    }
}
