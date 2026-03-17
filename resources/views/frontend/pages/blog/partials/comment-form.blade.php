@auth
    @if (auth()->user()->status == 'suspended')
    <div class="postbox-comment-warning mt-60">
        <h4 class="h4">{{ __('frontend.account_suspended') }}</h4>
        <p>{{ __('frontend.account_suspended_message') }}</p>
    </div>

    @elseif (auth()->user()->status == 'inactive')
    <div class="postbox-comment-warning mt-60">
        <h4 class="h4">{{ __('frontend.account_inactive') }}</h4>
        <p>{{ __('frontend.account_inactive_message') }}</p>
    </div>

    @else
    <div class="postbox-details-form" id="comment_box">
        <h3 class="postbox-comment-form-title mb-30">{{ __('frontend.leave_a_comment') }}</h3>

        <div class="postbox-details-form-wrapper">
            <div class="postbox-details-form-inner">
                <form action="{{ route('blog.comment.store', ['blog_id' => $blog_id]) }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="postbox-details-input-box">
                                <div class="postbox-details-input">
                                    <label for="comment">{{ __('frontend.comment') }} <span class="text-danger">*</span></label>
                                    <textarea id="comment" placeholder="{{ __('frontend.your_comment') }}" name="comment"></textarea>
                                    <x-input-error field="comment" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="postbox-details-input-box">
                        <button class="tp-btn-yellow-green sidebar-btn-style sidebar-btn" type="submit">
                            <span>
                                <span class="text-1">{{ __('frontend.post_comment') }}</span>
                                <span class="text-2">{{ __('frontend.post_comment') }}</span>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif

@else
    <div class="postbox-comment-warning mt-60">
        <h4 class="h4">{{ __('frontend.login_to_comment') }}</h4>
        <p>
        {{ __('frontend.login_to_post_comment') }}
        <a href="{{ route('user.login') }}">{{ __('frontend.login') }}</a>
        </p>
    </div>
@endauth
