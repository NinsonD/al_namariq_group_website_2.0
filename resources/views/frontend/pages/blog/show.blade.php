@extends('frontend.layouts.master')

@section('meta_title', $blog?->title . ' || ' . $settings->app_name)
@section('meta_description', $blog?->seo_description)

@push('custom_meta')
    <meta property="og:title" content="{{ $blog?->seo_title }}" />
    <meta property="og:description" content="{{ $blog?->seo_description }}" />
    <meta property="og:image" content="{{ asset($blog?->image) }}" />
    <meta property="og:URL" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
@endpush

@php
    extract(getSiteMenus());
@endphp

@section('header')
   @include('frontend.layouts.headers.header-inner', ['main_menu' => $main_menu])
@endsection

@section('content')
   <x-breadcrumb :title="__('frontend.blog_breadcrumb_title')" />

    <section id="postbox" class="postbox-area pt-110 pb-80">
        <div class="container container-1330">
            <div class="row">
                <div class="col-lg-8">
                    <div class="postbox-wrapper mb-115">
                        <article class="postbox-details-item item-border mb-20">
                            <div class="postbox-details-info-wrap">
                                @if ($blog->category)
                                <div class="postbox-tag postbox-details-tag">
                                    <span>
                                        <a href="{{ route('blog.index', ['cat' => $blog->category?->slug]) }}">
                                            <i>
                                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M4.39101 4.39135H4.39936M13.6089 8.73899L8.74578 13.6021C8.61979 13.7283 8.47018 13.8283 8.3055 13.8966C8.14082 13.9649 7.9643 14 7.78603 14C7.60777 14 7.43124 13.9649 7.26656 13.8966C7.10188 13.8283 6.95228 13.7283 6.82629 13.6021L1 7.78264V1H7.78264L13.6089 6.82629C13.8616 7.08045 14.0034 7.42427 14.0034 7.78264C14.0034 8.14102 13.8616 8.48483 13.6089 8.73899Z" stroke="black" stroke-opacity="0.6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </i>
                                            {{ $blog->category?->title }}
                                        </a>
                                    </span>
                                    <span>
                                        {{ readingTime($blog->description) }}
                                    </span>
                                </div>
                                @endif

                                <h4 class="postbox-title fs-54">
                                    {{ $blog->title }}
                                </h4>

                                @include('frontend.pages.blog.partials.details-meta', ['blog' => $blog])
                            </div>

                        </article>
                        <div class="postbox-details-thumb mb-45">
                            <img class="w-100" src="{{ asset($blog->image) }}" alt="{{ $blog->title }}">
                        </div>
                        <div class="postbox-details-text mb-45">
                            {!! clean($blog->description) !!}
                        </div>

                        @include('frontend.pages.blog.partials.details-tag-share', ['tags' => $blog->tags])
                        @include('frontend.pages.blog.partials.author', ['author' => $blog->author])
                    </div>
                </div>
                <div class="col-lg-4">
                    @include('frontend.pages.blog.partials.sidebar',[
                        'popular_blogs' => $popular_blogs,
                        'categories' => $categories,
                        'blog_tags' => $blog_tags,
                    ])
                </div>
            </div>
        </div>

        @if ($next_blog)
            @include('frontend.pages.blog.partials.next-blog', ['blog' => $next_blog])
        @endif

        <div class="container container-1330">
            <div class="row">
                <div class="col-xl-8">
                    <!-- comments -->
                    @include('frontend.pages.blog.partials.comments', ['comments' => $blog->comments, 'blog_id' => $blog->id])
                    @include('frontend.pages.blog.partials.comment-form', ['blog_id' => $blog->id])
                </div>
            </div>
        </div>
    </section>

@endsection

@section('footer')
    @include('frontend.layouts.footers.footer-inner', ['footer_menu_one' => $footer_menu_one, 'footer_menu_two' => $footer_menu_two])
@endsection


@push('js')
   <script>
      'use strict';

      $(function(){

         // comment edit
         $(document).on('click', '.postbox-comment-edit', function(e) {
            e.preventDefault();


            const commentID = $(this).data('comment-id');
            let commentText = $(this).closest('.postbox-comment-box').find('.comment-text-html').html();
            let commentForm = $(this).closest('.postbox-comment-box').find('.postbox-edit-comment-holder');
            let route = "{{ route('blog.comment.update', ['blog_id' => $blog->id, 'comment' => ':commentID']) }}";
            route = route.replace(':commentID', commentID);

            let updateText = "{{ __('frontend.update') }}";
            let closeText = "{{ __('frontend.close') }}";
            let placeholderText = "{{ __('frontend.your_comment') }}";
            let headingText = "{{ __('frontend.edit_comment') }}";

             $('#comment_box').hide();

            let formHtml = `<div class="postbox-comment-form edit-form mt-20" >
                                 <h6 class="h6">${headingText}</h6>
                                 <form action="${route}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row gx-8">
                                       <div class="col-xl-12 col-lg-12">
                                             <div class="postbox-comment-input postbox-details-input">
                                                <textarea placeholder="${placeholderText}" name="comment">${commentText}</textarea>
                                             </div>
                                       </div>
                                       <div class="col-xxl-12">
                                             <div class="postbox-comment-btn">
                                                <button type="submit" class="tp-btn tp-btn-yellow-green sidebar-btn post-btn edit-btn">${updateText}</button>
                                                <button type="submit" class="tp-btn tp-btn-yellow-green sidebar-btn close-btn edit-close-btn">${closeText}</button>
                                             </div>
                                       </div>
                                    </div>
                                 </form>
                           </div>`;
            commentForm.html(formHtml);
         });

         $(document).on('click', '.close-btn', function(e){
            e.preventDefault();
            $(this).closest('.postbox-comment-form').remove();
            $('#comment_box').show();
         })

         // comment reply
         $(document).on('click', '.postbox-comment-reply-btn', function(e) {
            e.preventDefault();

            let replyTo = $(this).data('reply-to');
            let replyForm = $(this).closest('.postbox-comment-box').find('.postbox-reply-comment-holder');
            console.log(replyForm);
            let route = "{{ route('blog.comment.store', ['blog_id' => $blog->id]) }}";

            let replyText = "{{ __('frontend.reply') }}";
            let closeText = "{{ __('frontend.close') }}";
            let placeholderText = "{{ __('frontend.your_comment') }}";
            let headingText = "{{ __('frontend.reply_comment') }}";

            // hide the main comment form if it exists
            $('#comment_box').hide();

            let formHtml = `<div class="postbox-comment-form reply-form mt-20">
                              <h6 class="h6">${headingText}</h6>
                              <form action="${route}" method="POST">
                                 @csrf
                                 @method('POST')
                                 <input type="hidden" name="parent_id" value="${replyTo}">
                                 <div class="row gx-8">
                                    <div class="col-xl-12 col-lg-12">
                                          <div class="postbox-comment-input postbox-details-input">
                                             <textarea placeholder="${placeholderText}" name="comment"></textarea>
                                          </div>
                                    </div>
                                    <div class="col-xxl-12">
                                          <div class="postbox-comment-btn">
                                             <button type="submit" class="tp-btn tp-btn-yellow-green sidebar-btn post-btn replay-btn">${replyText}</button>
                                             <button type="submit" class="tp-btn tp-btn-yellow-green sidebar-btn close-btn replay-close-btn">${closeText}</button>
                                          </div>
                                    </div>
                                 </div>
                              </form>
                        </div>`;
            replyForm.html(formHtml);
         });
      })

   </script>

@endpush
