<?php

namespace App\Http\Controllers;
use App\Models\Publikasi;
use Illuminate\Http\Request;
class PublikasiController extends Controller
{
    public function index()
    {
        return Publikasi::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'releaseDate' => 'required|date',
            'description' => 'nullable|string',
            'coverUrl' => 'nullable|url',
            'tautan' => 'nullable|url'
        ]);
        $publikasi = Publikasi::create($validated);
        return response()->json($publikasi, 201);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'releaseDate' => 'required|date',
            'description' => 'nullable|string',
            'coverUrl' => 'nullable|url',
            'tautan' => 'nullable|url',
        ]);


        $publikasi = Publikasi::findOrFail($id);

        $publikasi->update($validated);

        return response()->json([
            'message' => 'Publikasi berhasil diperbarui',
            'data' => $publikasi,
        ], 200);
    }

    public function delete($id)
    {

        $publikasi = Publikasi::findOrFail($id);

        $publikasi->delete();

        return response()->json([
            'message' => 'Publikasi berhasil dihapus',
        ], 200);
    }

    public function logout(Request $request)
    {
        // Menghapus token yang sedang digunakan
        $request->user()->currentAccessToken()->delete();
    
        return response()->json([
            'message' => 'Logout berhasil. Token telah dihapus.'
        ], 200);
    }
    


}