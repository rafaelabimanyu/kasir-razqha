@extends('layouts.admin')

@section('title', 'Kelola Petugas')
@section('page_title', 'Manajemen Petugas')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div class="relative group">
        <i class="ph ph-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
        <input type="text" placeholder="Cari petugas..." class="pl-12 pr-4 py-3 bg-white border border-gray-100 rounded-2xl outline-none focus:border-brand-maroon transition-all text-sm w-64 shadow-sm">
    </div>
    <button @click="$dispatch('open-modal', 'modal-add-user')" class="flex items-center gap-2 px-6 py-3 bg-brand-maroon text-white font-bold rounded-2xl shadow-lg hover:bg-brand-maroon-light transition-all">
        <i class="ph ph-user-plus text-xl"></i>
        <span>Tambah Petugas</span>
    </button>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
    @foreach($users as $user)
    <div class="bg-white rounded-[32px] overflow-hidden shadow-soft group hover:translate-y-[-5px] transition-all duration-300">
        <div class="p-8 flex flex-col items-center text-center">
            <div class="w-20 h-20 rounded-full bg-brand-maroon/5 flex items-center justify-center text-brand-maroon text-3xl font-bold mb-6 group-hover:bg-brand-maroon group-hover:text-white transition-all duration-300">
                {{ strtoupper(substr($user->username, 0, 1)) }}
            </div>
            
            <h4 class="font-bold text-gray-800 text-lg mb-1">{{ $user->username }}</h4>
            <span class="px-3 py-1 bg-brand-gold/10 text-brand-gold text-[10px] font-black rounded-full uppercase tracking-widest mb-6">
                {{ $user->role }}
            </span>

            <div class="flex gap-2 w-full mt-4">
                <button 
                    @click="$dispatch('open-modal', { id: 'modal-edit-user', user: {{ $user->toJson() }} })"
                    class="flex-1 py-3 bg-gray-50 text-gray-500 rounded-xl font-bold text-xs hover:bg-brand-maroon hover:text-white transition-all flex items-center justify-center gap-2"
                >
                    <i class="ph ph-pencil-simple"></i>
                    Edit
                </button>
                <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Hapus petugas ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full py-3 bg-gray-50 text-red-400 rounded-xl font-bold text-xs hover:bg-red-500 hover:text-white transition-all flex items-center justify-center gap-2">
                        <i class="ph ph-trash"></i>
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Modal Tambah Petugas -->
<div 
    x-data="{ open: false }" 
    x-show="open" 
    @open-modal.window="if ($event.detail === 'modal-add-user') open = true"
    class="fixed inset-0 z-[100] flex items-center justify-center p-6"
    x-cloak
>
    <div @click="open = false" class="absolute inset-0 bg-brand-maroon/20 backdrop-blur-sm"></div>
    <div class="bg-white w-full max-w-md rounded-[40px] shadow-2xl relative z-10 overflow-hidden">
        <div class="p-8 border-b border-gray-50 flex items-center justify-between">
            <h3 class="font-montserrat font-bold text-2xl text-brand-maroon">Tambah Petugas</h3>
            <button @click="open = false" class="text-gray-400 hover:text-red-500 transition-colors">
                <i class="ph ph-x-circle text-3xl"></i>
            </button>
        </div>
        
        <form action="{{ route('user.store') }}" method="POST" class="p-8 space-y-6">
            @csrf
            <div class="space-y-4">
                <div class="space-y-2">
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Username</label>
                    <input type="text" name="username" placeholder="Masukkan username" required class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl outline-none focus:border-brand-maroon focus:bg-white transition-all text-sm font-medium">
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Password</label>
                    <input type="password" name="password" placeholder="••••••••" required class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl outline-none focus:border-brand-maroon focus:bg-white transition-all text-sm font-medium">
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Role</label>
                    <select name="role" required class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl outline-none focus:border-brand-maroon focus:bg-white transition-all text-sm font-medium cursor-pointer">
                        <option value="kasir">Kasir</option>
                        <option value="admin">Administrator</option>
                    </select>
                </div>
            </div>
            
            <button type="submit" class="w-full py-5 bg-brand-maroon text-white font-black rounded-3xl shadow-lg hover:bg-brand-maroon-light transition-all mt-4">
                SIMPAN PETUGAS
            </button>
        </form>
    </div>
</div>

<!-- Modal Edit Petugas -->
<div 
    x-data="{ open: false, user: {}, action: '' }" 
    x-show="open" 
    @open-modal.window="if ($event.detail.id === 'modal-edit-user') { open = true; user = $event.detail.user; action = '/registrasi-petugas/' + user.id }"
    class="fixed inset-0 z-[100] flex items-center justify-center p-6"
    x-cloak
>
    <div @click="open = false" class="absolute inset-0 bg-brand-maroon/20 backdrop-blur-sm"></div>
    <div class="bg-white w-full max-w-md rounded-[40px] shadow-2xl relative z-10 overflow-hidden">
        <div class="p-8 border-b border-gray-50 flex items-center justify-between">
            <h3 class="font-montserrat font-bold text-2xl text-brand-maroon">Edit Petugas</h3>
            <button @click="open = false" class="text-gray-400 hover:text-red-500 transition-colors">
                <i class="ph ph-x-circle text-3xl"></i>
            </button>
        </div>
        
        <form :action="action" method="POST" class="p-8 space-y-6">
            @csrf
            @method('PUT')
            <div class="space-y-4">
                <div class="space-y-2">
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Username</label>
                    <input type="text" name="username" :value="user.username" required class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl outline-none focus:border-brand-maroon focus:bg-white transition-all text-sm font-medium">
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Password Baru (Kosongkan jika tidak diubah)</label>
                    <input type="password" name="password" placeholder="••••••••" class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl outline-none focus:border-brand-maroon focus:bg-white transition-all text-sm font-medium">
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Role</label>
                    <select name="role" x-model="user.role" required class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl outline-none focus:border-brand-maroon focus:bg-white transition-all text-sm font-medium cursor-pointer">
                        <option value="kasir">Kasir</option>
                        <option value="admin">Administrator</option>
                    </select>
                </div>
            </div>
            
            <button type="submit" class="w-full py-5 bg-brand-gold text-brand-maroon font-black rounded-3xl shadow-lg hover:bg-brand-gold-soft transition-all mt-4">
                UPDATE PETUGAS
            </button>
        </form>
    </div>
</div>
@endsection
