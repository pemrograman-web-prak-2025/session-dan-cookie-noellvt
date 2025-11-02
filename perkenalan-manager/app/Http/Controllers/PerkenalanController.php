<?php

namespace App\Http\Controllers;

use App\Models\Perkenalan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerkenalanController extends Controller
{
    public function index()
    {
        $perkenalan = Perkenalan::where('user_id', Auth::id())->get();
        return view('perkenalan.index', compact('perkenalan'));
    }

    public function create()
    {
        return view('perkenalan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:20',
            'deskripsi_singkat' => 'required|string',
        ]);

        Perkenalan::create([
            'nama' => $request->nama,
            'npm' => $request->npm,
            'deskripsi_singkat' => $request->deskripsi_singkat,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('perkenalan.index')->with('success', 'Data perkenalan berhasil ditambahkan!');
    }

    public function edit(Perkenalan $perkenalan)
    {
        if ($perkenalan->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('perkenalan.edit', compact('perkenalan'));
    }

    public function update(Request $request, Perkenalan $perkenalan)
    {
        if ($perkenalan->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:20',
            'deskripsi_singkat' => 'required|string',
        ]);

        $perkenalan->update([
            'nama' => $request->nama,
            'npm' => $request->npm,
            'deskripsi_singkat' => $request->deskripsi_singkat,
        ]);

        return redirect()->route('perkenalan.index')->with('success', 'Data perkenalan berhasil diupdate!');
    }

    public function destroy(Perkenalan $perkenalan)
    {
        if ($perkenalan->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $perkenalan->delete();

        return redirect()->route('perkenalan.index')->with('success', 'Data perkenalan berhasil dihapus!');
    }
}