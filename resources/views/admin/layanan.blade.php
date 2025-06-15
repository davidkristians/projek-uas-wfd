@extends('base.dashboard_admin')

@section('layanan')
<div class="mt-8">
    <h1 class="mb-10 text-4xl text-center fw-bold">Layanan</h1>
    <div class="text-center mb-8">
        <button onclick="showTambahModal()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Tambah Layanan
        </button>
    </div>
    <h2 class="mb-6 text-xl text-center">Layanan Yang Kita Miliki Saat Ini</h2>

     <!-- Tambahkan container flex horizontal -->
    <div class="flex flex-wrap justify-center gap-6">
        @foreach($layanans as $layanan)
        <div class="rounded-lg p-6 w-64 text-white" style="background: linear-gradient(to bottom right, #4a4a4a, #2f2f2f)">
            <div class="text-5xl mb-3">{!! $layanan->icon_svg !!}</div>
            <p class="text-sm text-center text-gray-400 mb-2">{{ $layanan->deskripsi }}</p>
            <h3 class="text-xl text-center font-bold mb-2">{{ $layanan->nama }}</h3>
            <p class="text-green-400 text-center text-lg mb-3">${{ number_format($layanan->harga, 0, ',', '.') }}</p>

            <div class="mt-4 flex justify-between gap-2">
                <button onclick="editLayanan({{ $layanan->id }})" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 text-sm">Edit</button>
                <form action="{{ route('admin.layanan.destroy', $layanan->id) }}" method="POST" onsubmit="return confirm('Hapus layanan ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 text-sm">Hapus</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>


    <!-- MODAL TAMBAH -->
    <div id="modalTambah" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white p-6 rounded w-96 text-black">
            <h2 class="text-xl font-bold mb-4">Tambah Layanan</h2>
            <form action="{{ route('admin.layanan.store') }}" method="POST">
                @csrf
                <div class="mb-2">
                    <label>Nama</label>
                    <input type="text" name="nama" class="w-full border p-2 rounded" required>
                </div>
                <div class="mb-2">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="w-full border p-2 rounded" required></textarea>
                </div>
                <div class="mb-2">
                    <label>Harga</label>
                    <input type="number" name="harga" class="w-full border p-2 rounded" required>
                </div>
                <div class="mb-2">
                    <label>Icon SVG</label>
                    <textarea name="icon_svg" class="w-full border p-2 rounded" required></textarea>
                </div>
                <div class="flex justify-end mt-4 gap-2">
                    <button type="button" onclick="closeTambahModal()" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL EDIT -->
    <div id="modalEdit" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white p-6 rounded w-96 text-black">
            <h2 class="text-xl font-bold mb-4">Edit Layanan</h2>
            <form id="formEdit" method="POST">
                @csrf
                <div class="mb-2">
                    <label>Nama</label>
                    <input type="text" name="nama" id="editNama" class="w-full border p-2 rounded" required>
                </div>
                <div class="mb-2">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" id="editDeskripsi" class="w-full border p-2 rounded" required></textarea>
                </div>
                <div class="mb-2">
                    <label>Harga</label>
                    <input type="number" name="harga" id="editHarga" class="w-full border p-2 rounded" required>
                </div>
                <div class="mb-2">
                    <label>Icon SVG</label>
                    <textarea name="icon_svg" id="editIconSvg" class="w-full border p-2 rounded" required></textarea>
                </div>
                <div class="flex justify-end mt-4 gap-2">
                    <button type="button" onclick="closeEditModal()" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
                </div>
            </form>
        </div>
    </div>

</div>

<!-- Script JS Modal -->
 <script>
    function showTambahModal() {
        document.getElementById('modalTambah').classList.remove('hidden');
    }

    function closeTambahModal() {
        document.getElementById('modalTambah').classList.add('hidden');
    }

    function editLayanan(id) {
        // Ambil data dari elemen di halaman atau bisa juga via AJAX
        fetch(`/admin/layanan/${id}`)
            .then(res => res.json())
            .then(data => {
                document.getElementById('editNama').value = data.nama;
                document.getElementById('editDeskripsi').value = data.deskripsi;
                document.getElementById('editHarga').value = data.harga;
                document.getElementById('editIconSvg').value = data.icon_svg;

                // Set action form edit
                document.getElementById('formEdit').action = `/admin/layanan/update/${id}`;

                // Tampilkan modal edit
                document.getElementById('modalEdit').classList.remove('hidden');
            });
    }

    function closeEditModal() {
        document.getElementById('modalEdit').classList.add('hidden');
    }
</script>


    <!-- JS HAMBURGER Menu  -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
        const btn = document.getElementById("hamburger-btn");
        const sidebar = document.getElementById("sidebar");
        const overlay = document.getElementById("overlay");

        btn.addEventListener("click", () => {
            sidebar.classList.remove("-translate-x-full");
            overlay.classList.remove("hidden");
        });

        overlay.addEventListener("click", () => {
            sidebar.classList.add("-translate-x-full");
            overlay.classList.add("hidden");
        });
    });
    </script>
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const sidebar = document.getElementById('sidebar');

        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            sidebar.classList.toggle('translate-x-0');
        });
    </script>
@endsection