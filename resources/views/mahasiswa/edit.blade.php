<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-1">NIM</label>
                        <input type="text" name="nim" value="{{ old('nim', $mahasiswa->nim) }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" required>
                        @error('nim') <span style="color: #dc2626; font-size: 14px;">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-1">Nama Lengkap</label>
                        <input type="text" name="nama" value="{{ old('nama', $mahasiswa->nama) }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" required>
                        @error('nama') <span style="color: #dc2626; font-size: 14px;">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-1">Program Studi</label>
                        <input type="text" name="program_studi" value="{{ old('program_studi', $mahasiswa->program_studi) }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" required>
                        @error('program_studi') <span style="color: #dc2626; font-size: 14px;">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-1">Email</label>
                        <input type="email" name="email" value="{{ old('email', $mahasiswa->email) }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" required>
                        @error('email') <span style="color: #dc2626; font-size: 14px;">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-1">Angkatan</label>
                        <input type="number" name="angkatan" value="{{ old('angkatan', $mahasiswa->angkatan) }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" required>
                        @error('angkatan') <span style="color: #dc2626; font-size: 14px;">{{ $message }}</span> @enderror
                    </div>

                    <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                        <a href="{{ route('mahasiswa.index') }}" style="background-color: #6b7280; color: #ffffff; padding: 10px 20px; border-radius: 6px; text-decoration: none; font-weight: bold;">
                            Batal
                        </a>
                        <button type="submit" style="background-color: #2563eb; color: #ffffff; padding: 10px 20px; border-radius: 6px; font-weight: bold; border: none; cursor: pointer;">
                            Update Data
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>