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

        $path = $request->berkas->move('gambar', $namaFile);
        $path = str_replace("\\", "//", $path);
        echo "variable path berisi: $path <br>";

        $pathBaru = asset('gambar/'.$namaFile);
        echo "proses upload berhasil, data disimpan pada:$path";
        echo "<br>";
        echo "Tampilkan link: <a href='$pathBaru'>$pathBaru</a>";

    }
}
