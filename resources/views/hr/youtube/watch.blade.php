@extends('layouts.hr')

@section('content')
<div class="container-fluid">
    {{-- Back Button --}}
    <div class="mb-3">
        <a href="{{ url()->previous() }}" class="btn btn-secondary">← Back</a>
    </div>

    {{-- Video Player --}}
    <div class="mb-4">
        <div id="youtube-player"></div>
    </div>

    {{-- Comments Button --}}
    <div class="mb-3">
        <button type="button" id="showComments" class="btn btn-primary">Comments</button>
    </div>

    {{-- Comments Container --}}
    <div id="comments-container" class="card mb-4 d-none">
        <div class="card-header">
            <h5 class="mb-0">Comments</h5>
        </div>
        <div id="comments-list" class="card-body"></div>
    </div>
</div>

{{-- External Scripts --}}
<script src="https://www.youtube.com/iframe_api"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
    // YouTube IFrame Player initialization
    let player;

    function onYouTubeIframeAPIReady() {
        player = new YT.Player('youtube-player', {
            height: '500',
            width: '100%',
            videoId: '{{ $videoId }}'
        });
    }

    // Fetch and display comments on button click
    $('#showComments').on('click', function () {
        const videoId = "{{ $videoId }}";

        $('#comments-container').removeClass('d-none');
        $('#comments-list').html(`
            <p class="text-muted">Loading comments...</p>
        `);

        $.ajax({
            url: "{{ route('hr.youtube.comments') }}",
            type: 'GET',
            data: { videoId: videoId },
            headers: { 'Accept': 'application/json' },
            success: function (data) {
                console.log(data);

                if (data.success) {
                    if (data.comments.length === 0) {
                        $('#comments-list').html(`
                            <p class="text-muted">No comments available.</p>
                        `);
                        return;
                    }

                    let commentsHtml = '';
                    $.each(data.comments, function (index, comment) {
                        commentsHtml += `
                            <div class="border-bottom pb-3 mb-3">
                                <h6 class="mb-1">${comment.author}</h6>
                                <p class="mb-0">${comment.text}</p>
                            </div>
                        `;
                    });

                    $('#comments-list').html(commentsHtml);
                } else {
                    $('#comments-list').html(`
                        <p class="text-danger">${data.message}</p>
                    `);
                }
            },
            error: function (xhr) {
                console.error(xhr.responseText);
                $('#comments-list').html(`
                    <p class="text-danger">Unable to load comments.</p>
                `);
            }
        });
    });
</script>
@endsection