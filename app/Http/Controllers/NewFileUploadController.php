<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewFileUploadController extends Controller
{
    public function fileUpload() {
        return view('new-file-upload');
    }

    public function prosesFileUpload(Request $request) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'berkas' => 'required|file|image|max:500'
        ]);

        $extFile = $request->file('berkas')->getClientOriginalExtension();
        $namaFile = $request->nama.".".$extFile;

        $request->berkas->storeAs('public', $namaFile);
        echo "Gambar berhasil diupload ke <a href='".asset('storage/'.$namaFile)."'>". $namaFile ."</a>";
        echo "<br>";
        echo "<img src='".asset('storage/'.$namaFile)."' width='200'>";
    }
}
