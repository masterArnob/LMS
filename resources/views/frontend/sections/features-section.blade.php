@if (!empty($feature))
    <ul class="wsus__banner_features d-flex flex-wrap">
            <li class="green wow fadeInRight">
                <div class="icon">
                    <img src="{{ asset($feature->image_one) }}" alt="Features" class="img-fluid">
                </div>
                <div class="text">
                    <h4>{{ $feature->title_one }}</h4>
                    <p>{{ $feature->subtitle_one }}</p>
                </div>
            </li>
            <li class="pink wow fadeInRight">
                <div class="icon">
                    <img src="{{ $feature->image_two }}" alt="Features" class="img-fluid">
                </div>
                <div class="text">
                    <h4>{{ $feature->title_two }}</h4>
                    <p>{{ $feature->subtitle_two }}</p>
                </div>
            </li>
            <li class="sky wow fadeInRight">
                <div class="icon">
                    <img src="{{ asset($feature->image_three) }}" alt="Features" class="img-fluid">
                </div>
                <div class="text">
                    <h4>{{ $feature->title_three }}</h4>
                    <p>{{ $feature->subtitle_three }}</p>
                </div>
            </li>
        </ul>
@else
    <p class="text-center">Please add features in the admin panel.</p>
@endif
