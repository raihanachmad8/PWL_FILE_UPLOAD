<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function fileUpload() {
        return view('file-upload');
    }

    public function prosesFileUpload(Request $request) {
        $request->validate([
            'berkas' => 'required|file|image|max:500'
        ]);
        $extFile = $request->file('berkas')->getClientOriginalExtension();
        $namaFile = "web-".time().".".$extFile;
        $path = $request->file('berkas')->storeAs('public', $namaFile);

        $pathBaru = asset('storage/'.$namaFile);
        echo "proses upload berhasil, file berada di $path";
        echo "<br>";
        echo "Tampilkan link: <a href='$pathBaru'>$pathBaru</a>";

    }
}
