{{--
  Template Name: Blog
  Template Post Type: page
--}}

@extends('layouts.app')

@section('content')
<section class="max-w-[1440px] mx-auto px-4">
  
    
    <section class="bg-gradient-to-br from-gray-50 to-gray-100 py-12">
        <div class="max-w-[1440px] mx-auto px-4">
            <div class="text-center mb-8 gap-16">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-2">Blog</h1>
                <p class="text-gray-600"><a href="/">Home</a> / <span class="text-[#4E8D7C]">Blog</span></p>
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="mb-10 pt-10 flex justify-center">
                    <input 
                        type="text" 
                        name="s" 
                        placeholder="Search articles..." 
                        value="<?php echo get_search_query(); ?>"
                        class="w-full max-w-md border border-gray-300 rounded-l-md px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#4E8D7C]" 
                    />
                    <button 
                        type="submit" 
                        class="bg-[#4E8D7C] hover:bg-[#3D7465] text-white px-4 rounded-r-md transition">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>

            </div>
        </div>
    </section>

    <!-- Search Bar -->

    <!-- Featured + Posts Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 py-12">
      
        <!-- Featured Post -->
        <?php
        $featured_query = new WP_Query([
            'posts_per_page'      => 1,
            'ignore_sticky_posts' => 1,
        ]);
        if ($featured_query->have_posts()) :
            while ($featured_query->have_posts()) : $featured_query->the_post();
        ?>
        <article class="relative h-[420px] rounded-xl overflow-hidden group">
            <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('large', [
                'class' => 'w-full h-full object-cover object-center'
            ]); ?>
            <?php else : ?>
            <img 
                src="https://placehold.co/600x400?text=No+Image" 
                alt="<?php the_title_attribute(); ?>" 
                class="w-full h-full object-cover object-center bg-gray-200"
            />
            <?php endif; ?>
            <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/55 to-transparent"></div>
            <div class="absolute bottom-6 left-6 text-white">
            <h2 class="text-2xl font-bold mb-1 drop-shadow-lg">
                <a href="<?php the_permalink(); ?>" class="hover:underline"><?php the_title(); ?></a>
            </h2>
            <p class="text-xs opacity-95"><?php echo get_the_date(); ?></p>
            </div>

        </article>

        <?php endwhile; wp_reset_postdata(); endif; ?>

        <!-- Grid Posts -->
        <div class="grid grid-cols-2 sm:grid-cols-2 gap-4">
        <?php
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            $posts_per_page = 4;
            $offset_start = 1;
            $offset = $offset_start + (($paged - 1) * $posts_per_page);

            $grid_query = new WP_Query([
                'posts_per_page'      => $posts_per_page,
                'offset'              => $offset,
                'ignore_sticky_posts' => 1,
                'paged'               => $paged,
            ]);

            if ($grid_query->have_posts()) :
                while ($grid_query->have_posts()) : $grid_query->the_post();
        ?>
            <article class="relative h-[200px] rounded-lg overflow-hidden group">
            <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('large', [
                'class' => 'w-full h-full object-cover object-center'
            ]); ?>
            <?php else : ?>
            <img 
                src="https://placehold.co/600x400?text=No+Image" 
                alt="<?php the_title_attribute(); ?>" 
                class="w-full h-full object-cover object-center bg-gray-200"
            />
            <?php endif; ?>
            <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/55 to-transparent"></div>
            <div class="absolute bottom-6 left-6 text-white">
            <h2 class="text-2xl font-bold mb-1 drop-shadow-lg">
                <a href="<?php the_permalink(); ?>" class="hover:underline"><?php the_title(); ?></a>
            </h2>
            <p class="text-xs opacity-95"><?php echo get_the_date(); ?></p>
            </div>
            </article>
        <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-12 flex justify-center">
        <?php
        $big = 999999999;
        $pages = paginate_links([
            'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format'    => '?paged=%#%',
            'current'   => max(1, get_query_var('paged')),
            'total'     => $grid_query->max_num_pages ?? 1,
            'prev_text' => '<i class="fa-solid fa-chevron-left"></i>',
            'next_text' => '<i class="fa-solid fa-chevron-right"></i>',
            'type'      => 'array'
        ]);

        if (is_array($pages)) :
            echo '<nav class="inline-flex rounded-md shadow-sm" aria-label="Pagination">';
            foreach ($pages as $page) {
                if (strpos($page, 'current') !== false) {
                    echo '<span class="px-4 py-2 border border-[#4E8D7C] bg-[#4E8D7C] text-white text-sm font-medium">' . wp_kses_post($page) . '</span>';
                } elseif (strpos($page, 'dots') !== false) {
                    echo '<span class="px-4 py-2 border border-gray-300 bg-white text-gray-500 text-sm">' . wp_kses_post($page) . '</span>';
                } else {
                    echo '<span class="px-4 py-2 border border-gray-300 bg-white text-gray-700 hover:bg-[#E8F3F0] text-sm transition">' . wp_kses_post($page) . '</span>';
                }
            }
            echo '</nav>';
        endif;
        ?>
    </div>

</section>
@endsection
