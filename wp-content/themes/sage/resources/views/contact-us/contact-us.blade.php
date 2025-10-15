{{--
  Template Name: Contact Us
  Template Post Type: page
--}}

@extends('layouts.app')

@section('content')
    <main class="max-w-6xl mx-auto px-4 py-16 grid grid-cols-1 md:grid-cols-2 gap-12">
        <!-- Contact Form -->
        <section>
            <div class="bg-white rounded-2xl shadow-xl p-8 md:p-10">
                <h2 class="text-2xl font-semibold mb-8 text-gray-700">Send a Message</h2>
                <form action="#" method="POST" class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium mb-1 text-gray-600">Full Name</label>
                        <input type="text"
                            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            placeholder="John Doe" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1 text-gray-600">Email</label>
                        <input type="email"
                            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            placeholder="you@example.com" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1 text-gray-600">Message</label>
                        <textarea rows="5" class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            placeholder="Write your message..." required></textarea>
                    </div>
                    <button type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-lg transition">
                        Send Message
                    </button>
                </form>

                <!-- Social Links -->
                <div class="mt-10 flex justify-center space-x-6 text-2xl">
                    <a href="#" class="text-blue-600 hover:text-blue-800 transition"><i
                            class="fab fa-facebook"></i></a>
                    <a href="#" class="text-pink-500 hover:text-pink-700 transition"><i
                            class="fab fa-instagram"></i></a>
                    <a href="#" class="text-black hover:text-gray-700 transition"><i class="fab fa-tiktok"></i></a>
                </div>
            </div>
        </section>

        <!-- Google Map -->
        <section class="rounded-2xl overflow-hidden shadow-xl h-96 md:h-auto">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3792.3198632678145!2d113.22432686142886!3d-7.751219828458645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7ad6596540515%3A0x27d2c747b932df7f!2sHOLIDAY%20BROMO%20TRAVELLER!5e0!3m2!1sen!2sid!4v1760508163044!5m2!1sen!2sid"
                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>
    </main>

    {{-- <section class="max-w-6xl mx-auto px-4 pb-16">
        <h2 class="text-2xl font-semibold mb-8 text-center text-gray-700">Gallery</h2>

        <!-- Masonry Grid -->
        <div class="columns-2 md:columns-3 lg:columns-4 gap-4 space-y-4">
            <img src="https://picsum.photos/400/500" alt="Gallery 1"
                class="w-full rounded-lg shadow-md hover:scale-105 transition-transform duration-300 object-cover">
            <img src="https://picsum.photos/400/300" alt="Gallery 2"
                class="w-full rounded-lg shadow-md hover:scale-105 transition-transform duration-300 object-cover">
            <img src="https://picsum.photos/400/600" alt="Gallery 3"
                class="w-full rounded-lg shadow-md hover:scale-105 transition-transform duration-300 object-cover">
            <img src="https://picsum.photos/400/400" alt="Gallery 4"
                class="w-full rounded-lg shadow-md hover:scale-105 transition-transform duration-300 object-cover">
            <img src="https://picsum.photos/400/550" alt="Gallery 5"
                class="w-full rounded-lg shadow-md hover:scale-105 transition-transform duration-300 object-cover">
            <img src="https://picsum.photos/400/450" alt="Gallery 6"
                class="w-full rounded-lg shadow-md hover:scale-105 transition-transform duration-300 object-cover">
            <img src="https://picsum.photos/400/350" alt="Gallery 7"
                class="w-full rounded-lg shadow-md hover:scale-105 transition-transform duration-300 object-cover">
        </div>
    </section>

    <section class="max-w-4xl mx-auto px-4 pb-20">
        <h2 class="text-2xl font-semibold mb-6 text-center text-gray-700">Watch Our Video</h2>
        <div class="aspect-w-16 aspect-h-9 rounded-2xl overflow-hidden shadow-xl">
            <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="YouTube video" allowfullscreen
                class="w-full h-full"></iframe>
        </div>
    </section> --}}
@endsection
