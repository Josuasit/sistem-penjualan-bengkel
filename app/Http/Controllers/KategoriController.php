<?php

namespace App\Http\Controllers;

use App\Http\Requests\kategorirequest;
use App\kategori;
use Form;
use Illuminate\Support\Str;
use Session;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $this->data['kategoris'] = kategori::orderBy('name','ASC')->paginate(10);

        return view('admin.kategori.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = kategori::orderBy('name', 'ASC')->get();

        $this->data['kategoris'] = $kategoris->toArray();
        return view('admin.kategori.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(kategorirequest $request)
    {
        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['name']);
        $params['parent_id'] = (int) $params['parent_id'];

        if(kategori::create($params)) {
            Session::flash('success', 'kategori sudah disimpan');
        }
        return redirect('kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = kategori::findOrfail($id);
        $this->data['kategori'] = $kategori;

        return redirect('admin.kategori.form', $this->data);
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(kategorirequest $request, $id)
    {
        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['name']);

        $kategori = kategori::findOrfail($id);
        if($kategori->update($params)){
            Session::flash('success', 'kategori telah di update');
        }
        return redirect('admin/kategori.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = kategori::findOrfail($id);
         if($kategori->delete($params)){
            Session::flash('success', 'kategori telah di hapus');
            }
            return redirect('admin/kategori');
    }
}
