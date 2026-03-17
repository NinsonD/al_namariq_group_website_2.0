<div class="postbox-details-meta d-flex align-items-center">
    <div class="postbox-author-box d-flex align-items-center ">
        <div class="postbox-author-img">
            <img src="{{ asset($blog->author->avatar) }}" alt="{{ $blog->author->name }}">
        </div>
        <div class="postbox-author-info">
            <h4 class="postbox-author-name">
                {{ $blog->author->name }}
            </h4>
        </div>
    </div>
    <div class="postbox-meta">
        <i>
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 4.19997V8.99997L12.2 10.6M17 9C17 13.4183 13.4183 17 9 17C4.58172 17 1 13.4183 1 9C1 4.58172 4.58172 1 9 1C13.4183 1 17 4.58172 17 9Z" stroke="black" stroke-opacity="0.6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </i>
        <span>
            {{ pureDate($blog->created_at) }}
        </span>
    </div>
    <div class="postbox-meta">
        <i>
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17 8.55557C17.003 9.72878 16.7289 10.8861 16.2 11.9333C15.5728 13.1882 14.6086 14.2437 13.4155 14.9816C12.2223 15.7195 10.8473 16.1106 9.44443 16.1111C8.27122 16.1142 7.11387 15.8401 6.06666 15.3111L1 17L2.68889 11.9333C2.15994 10.8861 1.88583 9.72878 1.88889 8.55557C1.88943 7.15269 2.28054 5.77766 3.01841 4.58451C3.75629 3.39135 4.81178 2.42719 6.06666 1.80002C7.11387 1.27107 8.27122 0.996966 9.44443 1.00003H9.88887C11.7416 1.10224 13.4916 1.88426 14.8037 3.19634C16.1157 4.50843 16.8978 6.25837 17 8.11113V8.55557Z" stroke="black" stroke-opacity="0.6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </i>
        <span>
            {{ $blog->comments->count() ?? 0 }} {{ __('frontend.comments') }}
        </span>
    </div>
</div>
