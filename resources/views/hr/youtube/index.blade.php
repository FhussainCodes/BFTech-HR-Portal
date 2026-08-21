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


    {{-- Comments Section --}}
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

                <div class="col-md-4">

                    <img
                        src="{{ $video['snippet']['thumbnails']['medium']['url'] }}"
                        class="img-fluid rounded-start"
                        alt="{{ $video['snippet']['title'] }}"
                    >

                </div>


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


                        {{-- Watch Button --}}
                        @if(isset($video['id']['videoId']))

                            <a
                                href="#"
                                class="btn btn-primary watch-video"
                                data-video-id="{{ $video['id']['videoId'] }}"
                            >
                                Watch Video
                            </a>


                            {{-- Comments Button --}}
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


<script>

    let player;


    /*
    |--------------------------------------------------------------------------
    | YouTube Player
    |--------------------------------------------------------------------------
    */

    function onYouTubeIframeAPIReady() {

        player = new YT.Player('youtube-player', {

            height: '400',
            width: '700',

            videoId: ''

        });

    }


    /*
    |--------------------------------------------------------------------------
    | Watch Video
    |--------------------------------------------------------------------------
    */

    document.querySelectorAll('.watch-video').forEach(button => {

        button.addEventListener('click', function (event) {

            event.preventDefault();

            const videoId = this.dataset.videoId;


            // Show player
            document
                .getElementById('youtube-player-container')
                .classList.remove('d-none');


            // Load selected video
            player.loadVideoById(videoId);

        });

    });


    /*
    |--------------------------------------------------------------------------
    | View Comments
    |--------------------------------------------------------------------------
    */

    document.querySelectorAll('.view-comments').forEach(button => {

        button.addEventListener('click', function () {

            const videoId = this.dataset.videoId;

            const commentsContainer =
                document.getElementById('comments-container');

            const commentsList =
                document.getElementById('comments-list');


            // Show comments section
            commentsContainer.classList.remove('d-none');


            // Temporary loading message
            commentsList.innerHTML = `
                <p class="text-muted">
                    Loading comments...
                </p>
            `;


            /*
            |--------------------------------------------------------------
            | Send AJAX request to Laravel
            |--------------------------------------------------------------
            */

            fetch(
                `{{ route('hr.youtube.comments') }}?videoId=${encodeURIComponent(videoId)}`
            )

                .then(response => {

                    if (!response.ok) {
                        throw new Error('Failed to fetch comments.');
                    }

                    return response.json();

                })

                .then(data => {

                    if (!data.success) {

                        commentsList.innerHTML = `
                            <p class="text-danger">
                                ${data.message}
                            </p>
                        `;

                        return;
                    }


                    // No comments
                    if (data.comments.length === 0) {

                        commentsList.innerHTML = `
                            <p class="text-muted">
                                No comments available.
                            </p>
                        `;

                        return;
                    }


                    /*
                    |----------------------------------------------------------
                    | Display comments
                    |----------------------------------------------------------
                    */

                    commentsList.innerHTML = '';


                    data.comments.forEach(comment => {

                        const commentElement = document.createElement('div');

                        commentElement.classList.add(
                            'border-bottom',
                            'pb-3',
                            'mb-3'
                        );


                        commentElement.innerHTML = `
                            <h6 class="mb-1">
                                ${escapeHtml(comment.author)}
                            </h6>

                            <p class="mb-0">
                                ${escapeHtml(comment.text)}
                            </p>
                        `;


                        commentsList.appendChild(commentElement);

                    });

                })

                .catch(error => {

                    console.error(error);

                    commentsList.innerHTML = `
                        <p class="text-danger">
                            Unable to load comments.
                        </p>
                    `;

                });

        });

    });


    /*
    |--------------------------------------------------------------------------
    | Escape HTML
    |--------------------------------------------------------------------------
    |
    | Comments YouTube se aa rahe hain, isliye unko directly innerHTML
    | mein inject nahi karna chahiye.
    |
    */

    function escapeHtml(text) {

        const div = document.createElement('div');

        div.textContent = text;

        return div.innerHTML;

    }

</script>

@endsection