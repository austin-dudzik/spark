@section('title', 'Schedule')

@extends('layouts.app')


@section('content')

    <div class="w-75 mx-auto">
        <h3 class="mb-3">Schedule</h3>
    <div id="schedule-list">
    @include('schedule-list')
    </div>

        <div class="d-flex justify-content-center">
        <button class="loadMore btn btn-primary px-5"><i class="far fa-long-arrow-down me-2"></i> Load more</button>
        </div>

    </div>
    <script>
        $(document).on("click", ".addSched", function() {
            $("#due_date").val($(this).data("date"));
        });
    </script>

    <script>
        let page = 1;
        $(".loadMore").on("click", function() {
            page++;
            $.ajax({
                url: "/schedule/",
                data: {
                    page: page
                },
                type: "GET",
                return: "html",
                success: function(result) {
                   console.log(result);
                   $("#schedule-list").append(result);
                }
            });
        });
    </script>

@endsection
