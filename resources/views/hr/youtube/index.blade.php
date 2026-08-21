@extends('layouts.hr')

@section('content')

<div class="container-fluid">

    <h3 class="mb-4">YouTube Search</h3>


    {{-- Search Form --}}
    <form action="{{ route('hr.youtube.search') }}" method="GET">

        <div class="input-group mb-4">

            <input
                type="text"
                name="q"
                class="form-control"
                placeholder="Search YouTube..."
                value="{{ request('q') }}"
            >

            <button type="submit" class="btn btn-primary">
                Search
            </button>

        </div>

    </form>


    {{-- YouTube Player --}}
    <div id="youtube-player-container" class="mb-4 d-none">

        <div id="youtube-player"></div>

    </div>


    {{-- Comments --}}
    <div id="comments-container" class="card mb-4 d-none">

        <div class="card-header">
            <h5 class="mb-0">Comments</h5>
        </div>

        <div id="comments-list" class="card-body">
        </div>

    </div>


    {{-- Search Results --}}
    @foreach($videos as $video)

        <div class="card mb-3">

            <div class="row g-0">

                {{-- Thumbnail --}}
                <div class="col-md-4">

                    <img
                        src="{{ $video['snippet']['thumbnails']['medium']['url'] }}"
                        class="img-fluid rounded-start"
                        alt="{{ $video['snippet']['title'] }}"
                    >

                </div>


                {{-- Video Information --}}
                <div class="col-md-8">

                    <div class="card-body">

                        <h5 class="card-title">
                            {{ $video['snippet']['title'] }}
                        </h5>

                        <p class="card-text">
                            {{ $video['snippet']['description'] }}
                        </p>

                        <p class="text-muted">
                            {{ $video['snippet']['channelTitle'] }}
                        </p>


                        {{-- Buttons --}}
                        @if(isset($video['id']['videoId']))

                            {{-- Watch --}}
                            <!-- <a
                                href="#"
                                class="btn btn-primary watch-video"
                                data-video-id="{{ $video['id']['videoId'] }}"
                            >
                                Watch Video
                            </a> -->
                            <a
                                href="{{ route('hr.youtube.watch', $video['id']['videoId']) }}"
                                class="btn btn-primary"
                            >
                                Watch Video
                            </a>


                            {{-- Comments --}}
                            <button
                                type="button"
                                class="btn btn-secondary view-comments"
                                data-video-id="{{ $video['id']['videoId'] }}"
                            >
                                View Comments
                            </button>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    @endforeach

</div>


{{-- YouTube IFrame Player API --}}
<script src="https://www.youtube.com/iframe_api"></script>

{{-- jQuery --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


<script>
    // YouTube Player initialization
    let player;

    function onYouTubeIframeAPIReady() {
        player = new YT.Player('youtube-player', {
            height: '400',
            width: '700',
            videoId: ''
        });
    }

    // Watch Video click handler
    $('.watch-video').on('click', function (e) {
        e.preventDefault();
        const videoId = $(this).data('video-id');

        // Show player container and load selected video
        $('#youtube-player-container').removeClass('d-none');
        player.loadVideoById(videoId);
    });

    // View Comments click handler
    $('.view-comments').on('click', function () {
        const videoId = $(this).data('video-id');

        // Show comments section and display loading state
        $('#comments-container').removeClass('d-none');
        $('#comments-list').html(`
            <p class="text-muted">
                Loading comments...
            </p>
        `);

        // Fetch comments via AJAX request
        $.ajax({
            url: "{{ route('hr.youtube.comments') }}",
            type: 'GET',
            data: {
                videoId: videoId
            },
            headers: {
                'Accept': 'application/json'
            },
            success: function (data) {
                console.log(data);

                if (data.success) {
                    if (data.comments.length === 0) {
                        $('#comments-list').html(`
                            <p class="text-muted">
                                No comments available.
                            </p>
                        `);
                        return;
                    }

                    let commentsHtml = '';

                    $.each(data.comments, function (index, comment) {
                        commentsHtml += `
                            <div class="border-bottom pb-3 mb-3">
                                <h6 class="mb-1">
                                    ${comment.author}
                                </h6>
                                <p class="mb-0">
                                    ${comment.text}
                                </p>
                            </div>
                        `;
                    });

                    $('#comments-list').html(commentsHtml);
                } else {
                    $('#comments-list').html(`
                        <p class="text-danger">
                            ${data.message}
                        </p>
                    `);
                }
            },
            error: function (xhr) {
                console.error(xhr.responseText);
                $('#comments-list').html(`
                    <p class="text-danger">
                        Unable to load comments.
                    </p>
                `);
            }
        });
    });
</script>

@endsection