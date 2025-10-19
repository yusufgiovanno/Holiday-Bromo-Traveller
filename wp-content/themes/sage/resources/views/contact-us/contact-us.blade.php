{{--
  Template Name: Contact Us
  Template Post Type: page
--}}

@extends('layouts.app')

@section('content')
    <section class="bg-gradient-to-br from-gray-50 to-gray-100 py-16">
            <div class="max-w-[1440px] mx-auto px-4">
                <div class="text-center mb-8">
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-2">Contact Us</h1>
                    <p class="text-gray-600"><a href="/">Home</a> / <span class="text-[#4E8D7C]">Contact</span></p>
                </div>
            </div>
    </section>
    <main class="max-w-[1440px] mx-auto px-4 py-16 grid grid-cols-1 md:grid-cols-2 gap-12">
        <!-- Contact Form -->
        
        <section>
            <div class="bg-white rounded-2xl shadow-xl p-8 md:p-10">
                <h2 class="text-2xl font-semibold mb-8 text-gray-700">Send a Message</h2>
                <form action="#" method="POST" class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium mb-1 text-gray-600">Full Name</label>
                        <input type="text"
                            class="w-full rounded-md border border-gray-300 p-2 text-sm focus:ring-[#4E8D7C]"
                            placeholder="John Doe" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1 text-gray-600">Email</label>
                        <input type="email"
                            class="w-full rounded-md border border-gray-300 p-2 text-sm focus:ring-[#4E8D7C]"
                            placeholder="you@example.com" required>
                    </div>

                    <!-- WhatsApp Number -->
                    <div>
                        <label class="block text-sm font-medium mb-1 text-gray-600">WhatsApp Number</label>
                        <div class="flex rounded-lg border border-gray-300 focus-within:ring-1 focus-within:ring-indigo-500 overflow-hidden">
                            <!-- <span class="bg-gray-100 text-gray-600 text-sm px-3 flex items-center select-none">+62</span> -->
                            <input
                                type="tel"
                                name="whatsapp"
                                placeholder="+62 812-3456-7890"
                                class="w-full p-2 text-sm focus:outline-none"
                                required
                            >
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Start with your country code (e.g. +62 for Indonesia)</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1 text-gray-600">Message</label>
                        <textarea rows="5"
                            class="w-full rounded-md border border-gray-300 p-2 text-sm focus:ring-[#4E8D7C]"
                            placeholder="Write your message..." required></textarea>
                    </div>

                    <button type="submit"
                        class="w-full bg-[#4E8D7C] hover:bg-[#3D7465] text-white font-semibold py-3 rounded-lg transition">
                        Send Message
                    </button>
                </form>


                <!-- Social Links -->
                <div class="mt-10 flex justify-center text-2xl gap-2">
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

        <section class="max-w-[1440px] mx-auto py-8">
            <div class="columns-2 md:columns-3 lg:columns-4 [column-gap:1rem]">
                <a href="https://picsum.photos/1200/800" class="glightbox block mb-4" data-gallery="gallery">
                    <img src="https://picsum.photos/400/500" alt="Gallery 1"
                        class="w-full rounded-lg shadow-md hover:scale-105 transition-transform duration-300 object-cover">
                </a>
                <a href="https://picsum.photos/1200/700" class="glightbox block mb-4" data-gallery="gallery">
                    <img src="https://picsum.photos/400/300" alt="Gallery 2"
                        class="w-full rounded-lg shadow-md hover:scale-105 transition-transform duration-300 object-cover">
                </a>
                <a href="https://picsum.photos/1200/900" class="glightbox block mb-4" data-gallery="gallery">
                    <img src="https://picsum.photos/400/600" alt="Gallery 3"
                        class="w-full rounded-lg shadow-md hover:scale-105 transition-transform duration-300 object-cover">
                </a>
                <a href="https://picsum.photos/1200/750" class="glightbox block mb-4" data-gallery="gallery">
                    <img src="https://picsum.photos/400/400" alt="Gallery 4"
                        class="w-full rounded-lg shadow-md hover:scale-105 transition-transform duration-300 object-cover">
                </a>
                <a href="https://picsum.photos/1200/850" class="glightbox block mb-4" data-gallery="gallery">
                    <img src="https://picsum.photos/400/550" alt="Gallery 5"
                        class="w-full rounded-lg shadow-md hover:scale-105 transition-transform duration-300 object-cover">
                </a>
                <a href="https://picsum.photos/1200/820" class="glightbox block mb-4" data-gallery="gallery">
                    <img src="https://picsum.photos/400/450" alt="Gallery 6"
                        class="w-full rounded-lg shadow-md hover:scale-105 transition-transform duration-300 object-cover">
                </a>
                <a href="https://picsum.photos/1200/880" class="glightbox block mb-4" data-gallery="gallery">
                    <img src="https://picsum.photos/400/350" alt="Gallery 7"
                        class="w-full rounded-lg shadow-md hover:scale-105 transition-transform duration-300 object-cover">
                </a>
            </div>
        </section>
        <script>
        document.addEventListener("DOMContentLoaded", () => {
        const lightbox = GLightbox({ selector: '.glightbox' });
        });
    </script>
    {{--
    <section class="max-w-4xl mx-auto px-4 pb-20">
        <h2 class="text-2xl font-semibold mb-6 text-center text-gray-700">Watch Our Video</h2>
        <div class="aspect-w-16 aspect-h-9 rounded-2xl overflow-hidden shadow-xl">
            <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="YouTube video" allowfullscreen
                class="w-full h-full"></iframe>
        </div>
    </section> --}}
@endsection
