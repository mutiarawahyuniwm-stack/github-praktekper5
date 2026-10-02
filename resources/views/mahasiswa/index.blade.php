<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Data Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if(session('success'))
                    <div class="mb-4 p-4 border rounded" style="background-color: #d1e7dd; border-color: #badbcc; color: #0f5132;">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Tombol Tambah Mahasiswa Khusus Admin -->
                @if(Auth::user()->role === 'admin')
                    <div class="mb-4">
                        <a href="{{ route('mahasiswa.create') }}" 
                           style="background-color: #2563eb; color: #ffffff; padding: 10px 18px; border-radius: 6px; font-weight: bold; text-decoration: none; display: inline-block; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                            + Tambah Mahasiswa
                        </a>
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 border" style="width: 100%; border-collapse: collapse; margin-top: 10px;">
                        <thead style="background-color: #f9fafb;">
                            <tr>
                                <th style="padding: 12px; text-align: left; font-size: 12px; color: #6b7280; text-transform: uppercase; border-bottom: 1px solid #e5e7eb;">NIM</th>
                                <th style="padding: 12px; text-align: left; font-size: 12px; color: #6b7280; text-transform: uppercase; border-bottom: 1px solid #e5e7eb;">Nama</th>
                                <th style="padding: 12px; text-align: left; font-size: 12px; color: #6b7280; text-transform: uppercase; border-bottom: 1px solid #e5e7eb;">Program Studi</th>
                                <th style="padding: 12px; text-align: left; font-size: 12px; color: #6b7280; text-transform: uppercase; border-bottom: 1px solid #e5e7eb;">Email</th>
                                <th style="padding: 12px; text-align: left; font-size: 12px; color: #6b7280; text-transform: uppercase; border-bottom: 1px solid #e5e7eb;">Angkatan</th>
                                @if(Auth::user()->role === 'admin')
                                    <th style="padding: 12px; text-align: center; font-size: 12px; color: #6b7280; text-transform: uppercase; border-bottom: 1px solid #e5e7eb;">Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($mahasiswas as $item)
                                <tr>
                                    <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">{{ $item->nim }}</td>
                                    <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">{{ $item->nama }}</td>
                                    <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">{{ $item->program_studi }}</td>
                                    <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">{{ $item->email }}</td>
                                    <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">{{ $item->angkatan }}</td>
                                    @if(Auth::user()->role === 'admin')
                                        <td style="padding: 12px; text-align: center; border-bottom: 1px solid #e5e7eb;">
                                            <a href="{{ route('mahasiswa.edit', $item->id) }}" style="color: #4f46e5; font-weight: bold; margin-right: 10px; text-decoration: none;">Edit</a>
                                            <form action="{{ route('mahasiswa.destroy', $item->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="color: #dc2626; font-weight: bold; background: none; border: none; cursor: pointer;">Hapus</button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" style="padding: 20px; text-align: center; color: #6b7280;">Belum ada data mahasiswa.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>