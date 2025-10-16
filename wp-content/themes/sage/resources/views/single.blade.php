{{--
  Template Name: Single Post Custom
  Template Post Type: post
--}}

@extends('layouts.app')

@section('content')
<article class="max-w-[1440px] mx-auto px-4 py-10">
  
  <header class="mb-8">
    <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">{{ get_the_title() }}</h1>
    <div class="w-full h-64 md:h-80 rounded-xl overflow-hidden flex items-center justify-center bg-gray-100 mb-4 relative">
      @if(has_post_thumbnail())
        {!! get_the_post_thumbnail(null, 'large', ['class' => 'w-full h-full object-cover object-center']) !!}
      @else
        <img 
          src="https://placehold.co/600x400?text=No+Image" 
          alt="No Image" 
          class="w-full h-full object-cover object-center"
        />
      @endif
    </div>
    <div class="text-gray-400 text-sm mb-2">
      <span>{{ get_the_date() }}</span>
    </div>
  </header>
  
  <section class="prose prose-neutral max-w-none">
    {!! get_the_content() !!}
  </section>

  <section class="mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 mt-12">
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
                            <span class="bg-gray-100 text-gray-600 text-sm px-3 flex items-center select-none">+62</span>
                            <input
                                type="tel"
                                name="whatsapp"
                                placeholder="812-3456-7890"
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
  </section>

</article>
@endsection
