@extends('layouts.app')

@section('content')
<section class="max-w-[1440px] mx-auto px-4 py-12">

  <header class="text-center mb-10">
    <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">Search Results</h1>
    @if(get_search_query())
      <p class="text-[#4E8D7C] text-base">Showing results for "<span class="font-semibold">{{ get_search_query() }}</span>"</p>
    @endif
  </header>

  <form role="search" method="get" action="{{ esc_url(home_url('/')) }}" class="mb-10 flex justify-center">
    <input 
      type="text" 
      name="s" 
      placeholder="Search articles..." 
      value="{{ get_search_query() }}"
      class="w-full max-w-md border border-gray-300 rounded-l-md px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#4E8D7C]" 
    />
    <button 
      type="submit"
      class="bg-[#4E8D7C] hover:bg-[#3D7465] text-white px-4 rounded-r-md transition"
    >
      <i class="fa-solid fa-magnifying-glass"></i>
    </button>
  </form>

  @if(have_posts())
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
      @while(have_posts()) @php the_post() @endphp
        <article class="relative h-[240px] rounded-xl overflow-hidden group border border-[#E8F3F0] bg-white shadow hover:shadow-lg transition">
          @if(has_post_thumbnail())
            <a href="{{ get_permalink() }}">
              {!! get_the_post_thumbnail(null, 'large', ['class' => 'w-full h-full object-cover object-center group-hover:scale-105 transition duration-500']) !!}
            </a>
          @else
            <a href="{{ get_permalink() }}">
              <img 
                src="https://placehold.co/600x400?text=No+Image" 
                alt="No Image" 
                class="w-full h-full object-cover object-center"
              />
            </a>
          @endif
          <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
          <div class="absolute bottom-5 left-5 text-white">
            <h2 class="text-xl font-bold leading-tight mb-1 drop-shadow-lg">
              <a href="{{ get_permalink() }}" class="hover:underline">{{ get_the_title() }}</a>
            </h2>
            <p class="text-xs opacity-95">{{ get_the_date() }}</p>
          </div>
        </article>
      @endwhile
    </div>

    <div class="mt-12 flex justify-center">
      {!! paginate_links([
        'prev_text' => '<i class="fa-solid fa-chevron-left"></i>',
        'next_text' => '<i class="fa-solid fa-chevron-right"></i>',
        'type'      => 'list',
        'end_size'  => 1,
        'mid_size'  => 1
      ]) !!}
    </div>
  
  @else
    <div class="text-center mt-16">
      <p class="text-lg text-gray-600 mb-4">No results found for <span class="font-semibold text-[#4E8D7C]">"{{ get_search_query() }}"</span>.</p>
      <a href="{{ home_url('/') }}" class="bg-[#4E8D7C] hover:bg-[#3D7465] text-white px-6 py-3 rounded-md transition font-semibold">
        Back to Home
      </a>
    </div>
  @endif

</section>
@endsection
