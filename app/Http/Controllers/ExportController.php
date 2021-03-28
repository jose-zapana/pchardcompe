<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class ExportController extends Controller
{
    public function index()
    {
        return view('export.index');
    }

    public function pdfBasicStream()
    {
        $pdf = PDF::loadHTML('<h1>Test</h1>');
        return $pdf->stream();
    }

    public function pdfBasicDownload()
    {
        $pdf = PDF::loadHTML('<h1>Test</h1>');
        $name = 'REC-11111111-27032021.pdf';
        return $pdf->download($name);
    }

    public function pdfSaveDownload()
    {
        $pdf = PDF::loadHTML('<h1>Test con nuevo nombre otro nombre</h1>');
        $name = 'RECETA-27032021.pdf';
        $path = public_path().'/exports/'.$name;
        $pdf->save($path);
        return $pdf->stream('REC-27032021.pdf');
    }

    public function pdfViewStream()
    {
        $roles = Role::with('permissions')->get();
        //dd($roles);
        $vista = view('export.rolesPDF', compact('roles'));

        $pdf = PDF::loadHTML($vista);
        $name = 'roles_permisos.pdf';
        return $pdf->stream($name);
    }


}
