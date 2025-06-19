<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VroomWash</title>
    <link rel="icon" href="{{ asset('icon_vroom.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-[#1B2845] to-[#003049] overflow-x-hidden font-[Poppins]">
    @include('include.navbar_user')

    @if (Request::is('base/dashboard_user') || Request::is('/'))
    <main class="mt-24 px-6 lg:px-6 pt-4">
        <div class="flex flex-col lg:flex-row gap-8">
            <section class="flex-1 bg-gradient-to-tl from-[#000000]/30 to-[#ffffff]/30 backdrop-blur-md p-8 rounded-3xl">
                <h1 class="text-4xl text-white font-bold mb-2">Book Now</h1>
                <p class="text-gray-300 mb-6">Choose Your Car Wash Services</p>

                <div id="serviceGrid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($layanans as $layanan)
                    <div class="rounded-lg p-6 bg-gray-800 text-white flex flex-col justify-between service-card cursor-pointer" data-id="{{ $layanan->id }}" data-name="{{ $layanan->nama }}" data-price="{{ $layanan->harga }}">
                        <div>
                            <div class="text-5xl mb-3">{!! $layanan->icon_svg !!}</div>
                            <p class="text-sm text-gray-400 mb-2 text-center">{{ $layanan->deskripsi }}</p>
                            <h3 class="text-lg font-bold text-center">{{ $layanan->nama }}</h3>
                            <p class="text-green-400 text-center mt-1 text-lg font-semibold">${{ number_format($layanan->harga, 0, ',', '.') }}</p>
                        </div>
                        {{-- Tombol select sekarang menjadi bagian dari card yang bisa diklik --}}
                    </div>
                    @endforeach
                </div>

                <div class="mt-8">
                    <label class="block text-sm text-white mb-1">Enter your location</label>
                    <input type="text" id="locationInput" placeholder="Your Location (ex, Jalan Siwalankerto Blok DX, No. X. RT X/RW X, Wonocolo, Surabaya)" class="w-full p-2 rounded-lg text-black" />
                </div>

                <div class="mt-4">
                    <label class="block text-sm text-white mb-1">Date & Time</label>
                    <div class="flex flex-col sm:flex-row gap-4">
                        {{-- Input tanggal dengan batasan tanggal lampau --}}
                        <input type="date" id="dateInput" class="w-full sm:w-1/2 p-2 rounded-lg text-black" min="{{ date('Y-m-d') }}" />

                        {{-- Input waktu yang diubah menjadi dropdown/select --}}
                        <select id="timeSelect" name="time" class="w-full sm:w-1/2 p-2 rounded-lg text-black" required disabled>
                            <option value="">-- Pilih Tanggal Dahulu --</option>
                        </select>
                    </div>
                </div>
                <button id="bookNowBtn" class="mt-4 bg-cyan-700 hover:bg-cyan-800 px-6 py-2 rounded-full text-white font-semibold" disabled>Book Now</button>
            </section>

            <aside class="w-full lg:w-[22rem] flex flex-col gap-6">
                 {{-- ... Isi aside kanan tetap sama ... --}}
            </aside>
        </div>
    </main>
    @endif

    @yield('profile_user')
    @yield('my_bookings')
    @yield('history')

    <div id="confirmationModal" class=" text-white fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-gray-800 p-6 rounded-xl max-w-md mx-auto mt-20">
                <div class="modal-header flex justify-between items-center mb-4">
                    <h5 class="text-xl font-bold text-white">Confirm Booking</h5>
                    <button id="closeModal" class="text-white text-xl hover:text-gray-300">×</button>
                </div>
                <div class="modal-body">
                    <p><strong>Name :</strong> <span id="modalName" class="text-white">{{ Auth::guard('web')->user()->name }}</span></p>
                    <p><strong>Location :</strong> <span id="modalLocation" class="text-white"></span></p>
                    <p><strong>Date :</strong> <span id="modalDate" class="text-white"></span></p>
                    <p><strong>Time :</strong> <span id="modalTime" class="text-white"></span></p>
                    <p><strong>Service :</strong> <span id="modalService" class="text-white"></span></p>
                    <p><strong>Price :</strong> <span id="modalPrice" class="text-white"></span></p>
                    <form id="bookingForm" action="{{ route('book.store') }}" method="POST" class="mt-4">
                        @csrf
                        <input type="hidden" name="service_id" id="serviceId">
                        <input type="hidden" name="location" id="formLocation">
                        <input type="hidden" name="date" id="formDate">
                        <input type="hidden" name="time" id="formTime">
                        <label for="paymentMethod" class="block mt-2 text-white">Payment Method:</label>
                        <select id="paymentMethod" name="payment_method" class="w-full p-2 bg-gray-700 rounded-lg text-white mt-1">
                            <option value="cod">Cash on Delivery (COD)</option>
                            <option value="e-money">E-Money</option>
                            <option value="debit">Debit Card</option>
                            <option value="bank-transfer">Bank Transfer</option>
                        </select>
                        <div class="modal-footer flex justify-end mt-4">
                            <button type="button" id="cancelBookingBtn" class="px-4 py-2 bg-red-700 hover:bg-red-800 rounded-lg mr-2 text-white">Cancel</button>
                            <button type="submit" id="confirmBookingBtn" class="px-4 py-2 bg-cyan-700 hover:bg-cyan-600 rounded-lg text-white">Book</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    // Fungsi pembantu di luar agar bisa dipanggil dari mana saja
    function confirmLogout() {
        if (confirm("Are you sure you want to logout?")) {
            document.getElementById('logout-form').submit();
        }
    }

    function toggleMenu() {
        const menu = document.getElementById("dropdownMenu");
        if (menu) {
            menu.classList.toggle("invisible");
            menu.classList.toggle("opacity-0");
        }
    }

    // Listener utama untuk semua logika halaman
    document.addEventListener('DOMContentLoaded', () => {
        let selectedService = null;

        const dateInput = document.getElementById('dateInput');
        const timeSelect = document.getElementById('timeSelect');
        const locationInput = document.getElementById('locationInput');
        const bookNowBtn = document.getElementById('bookNowBtn');
        const modal = document.getElementById('confirmationModal');

        // --- Fungsi untuk mengecek kelengkapan form ---
        function checkFormCompleteness() {
            const location = locationInput.value;
            const date = dateInput.value;
            const time = timeSelect.value;

            // Tombol "Book Now" hanya aktif jika semua field terisi
            if (selectedService && location && date && time) {
                bookNowBtn.disabled = false;
            } else {
                bookNowBtn.disabled = true;
            }
        }

        // --- 1. Logika untuk memilih service card ---
        document.querySelectorAll('.service-card').forEach(card => {
            card.addEventListener('click', () => {
                document.querySelectorAll('.service-card').forEach(c => c.classList.remove('border-4', 'border-cyan-500'));
                card.classList.add('border-4', 'border-cyan-500');

                selectedService = {
                    id: card.getAttribute('data-id'),
                    name: card.getAttribute('data-name'),
                    price: card.getAttribute('data-price')
                };
                checkFormCompleteness(); // Cek kelengkapan setiap kali service dipilih
            });
        });

        // --- 2. Logika untuk mengambil slot waktu saat tanggal berubah (AJAX) ---
        dateInput.addEventListener('change', function() {
            const selectedDate = this.value;
            timeSelect.innerHTML = '<option value="">Memuat slot...</option>';
            timeSelect.disabled = true;
            checkFormCompleteness();

            if (!selectedDate) {
                timeSelect.innerHTML = '<option value="">-- Pilih Tanggal Dahulu --</option>';
                return;
            }

            fetch(`{{ route('api.available_slots') }}?date=${selectedDate}`)
                .then(response => {
                    if (!response.ok) throw new Error('Gagal mengambil data jadwal.');
                    return response.json();
                })
                .then(slots => {
                    timeSelect.innerHTML = '';
                    if (slots.length > 0) {
                        timeSelect.disabled = false;
                        let defaultOption = new Option('-- Pilih Jam Tersedia --', '');
                        defaultOption.disabled = true;
                        defaultOption.selected = true;
                        timeSelect.add(defaultOption);
                        slots.forEach(slot => timeSelect.add(new Option(slot, slot)));
                    } else {
                        timeSelect.disabled = true;
                        timeSelect.add(new Option('-- Tidak ada slot tersedia --', ''));
                    }
                })
                .catch(error => {
                    console.error('Error fetching slots:', error);
                    timeSelect.disabled = true;
                    timeSelect.innerHTML = '<option value="">Gagal memuat slot</option>';
                });
        });

        // --- Tambahkan listener untuk input lain ---
        locationInput.addEventListener('input', checkFormCompleteness);
        timeSelect.addEventListener('change', checkFormCompleteness);

        // --- 3. Logika untuk menampilkan modal ---
        bookNowBtn.addEventListener('click', () => {
            const location = locationInput.value;
            const date = dateInput.value;
            const time = timeSelect.value; // Mengambil dari select

            document.getElementById('modalLocation').textContent = location;
            document.getElementById('modalDate').textContent = date;
            document.getElementById('modalTime').textContent = time;
            document.getElementById('modalService').textContent = selectedService.name;
            document.getElementById('modalPrice').textContent = `$${selectedService.price}`;
            
            document.getElementById('serviceId').value = selectedService.id;
            document.getElementById('formLocation').value = location;
            document.getElementById('formDate').value = date;
            document.getElementById('formTime').value = time;
            
            modal.classList.remove('hidden');
        });

        // --- 4. Logika untuk menutup modal & submit form ---
        document.getElementById('closeModal').addEventListener('click', () => modal.classList.add('hidden'));
        document.getElementById('cancelBookingBtn').addEventListener('click', () => modal.classList.add('hidden'));

        document.getElementById('bookingForm').addEventListener('submit', (event) => {
            event.preventDefault();
            const formData = new FormData(event.target);
            
            // Tambahkan tombol loading
            const submitBtn = document.getElementById('confirmBookingBtn');
            submitBtn.disabled = true;
            submitBtn.textContent = 'Booking...';

            fetch(`{{ route('book.store') }}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                },
                body: formData
            })
            .then(response => response.json().then(data => ({ ok: response.ok, status: response.status, data })))
            .then(({ ok, status, data }) => {
                if (ok) {
                    window.location.href = '/user/success';
                } else {
                    alert('Booking Gagal: ' + (data.message || `Error ${status}`));
                }
            })
            .catch(error => {
                console.error('Fetch Error:', error);
                alert('Terjadi kesalahan. Silakan coba lagi.');
            })
            .finally(() => {
                // Kembalikan tombol ke keadaan semula
                submitBtn.disabled = false;
                submitBtn.textContent = 'Book';
            });
        });

        // Listener untuk menu profil
        const profileMenuWrapper = document.getElementById("profileMenuWrapper");
        if(profileMenuWrapper) {
            document.addEventListener("click", function (e) {
                const menu = document.getElementById("dropdownMenu");
                if (!profileMenuWrapper.contains(e.target) && !menu.classList.contains("invisible")) {
                    toggleMenu();
                }
            });
        }
    });
</script>
</html>