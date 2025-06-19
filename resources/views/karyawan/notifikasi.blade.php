@extends('base.dashboard_karyawan')

@section('notifikasi')
<div class="flex-grow flex flex-col mt-1">
    <main class="px-6 lg:px-6 pt-4">
        <section class="flex-1 p-8 rounded-3xl">
            <h1 class="mb-10 text-4xl fw-bold text-center">Notifikasi</h1>

            <div class="max-w-3xl mx-auto space-y-4">
                @forelse ($notifications as $notification)
                    <div class="bg-gradient-to-tl from-[#000000]/30 to-[#ffffff]/20 backdrop-blur-md text-white rounded-lg p-4 flex items-start gap-4 @if(!$notification->is_read) border-l-4 border-cyan-400 @endif">
                        <div class="text-cyan-400 mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                            </svg>
                        </div>
                        <div>
                            <p>{{ $notification->message }}</p>
                            <small class="text-gray-400">{{ $notification->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-10">
                        <p class="text-gray-400">Tidak ada notifikasi untuk Anda.</p>
                    </div>
                @endforelse
            </div>
        </section>
    </main>
</div>
@endsection