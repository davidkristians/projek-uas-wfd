@extends('base.dashboard_user')

@section('history')
<main class="mt-24 px-6 lg:px-6 pt-4 bg-gradient-to-br from-[#1B2845] to-[#003049] justify-center">
    <section class="flex-1 bg-gradient-to-tl from-[#000000]/30 to-[#ffffff]/30 backdrop-blur-md p-8 rounded-3xl"> 
        <h1 class="text-white text-center mb-14 text-4xl font-bold">History</h1>
        @foreach ($history as $date => $bookings)
    <div class="mb-8">
        <h2 class="text-lg font-medium mb-2 text-gray-300">{{ $date }}</h2>
        @foreach ($bookings as $booking)
            <div class="flex justify-between items-center bg-white text-black px-4 py-3 mb-3 rounded-3xl shadow-md">
                <div>
                    <h3 class="text-xl font-bold text-cyan-700">{{ $booking->service_name }}</h3>
                    <p class="text-m text-gray-600">{{ \Carbon\Carbon::parse($booking->time)->format('H:i') }}</p>
                </div>
                @if ($booking->rating)
                    <p class="text-2xl font-bold text-black text-right">{{ $booking->rating }} <span>⭐</span></p>
                @else
                    <form action="{{ route('bookings.rate', $booking->id) }}" method="POST" class="flex items-center space-x-2">
                        @csrf
                        <select name="rating" class="border rounded p-1 text-sm">
                            <option value="" disabled selected>Rate Now</option>
                            @for ($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                        <button type="submit" class="text-sm bg-blue-500 text-white px-2 py-1 rounded">Submit</button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>
@endforeach

    </section>
</main>
@endsection
