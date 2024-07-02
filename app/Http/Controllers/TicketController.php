<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::whereHas('user', function ($query) {
            $query->where('role_id', 2); // 2 adalah id dari role 'user'
        })->get();

        return view('dashboard.admin.ticket.index', compact('tickets'));
    }

    public function show($id)
    {
        $ticket = Ticket::with('user')->findOrFail($id);
        return view('dashboard.admin.ticket.show', compact('ticket'));
    }

    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('dashboard.admin.ticket.edit', compact('ticket'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:menunggu,disetujui,ditolak',
        ]);

        $ticket = Ticket::findOrFail($id);
        $ticket->update($request->only('status'));

        return redirect()->route('ticket.index')->with('success', 'Status tiket berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        return redirect()->route('ticket.index')->with('success', 'Tiket berhasil dihapus.');
    }
}
