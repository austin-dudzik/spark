@section('title', 'Schedule')

@extends('layouts.app')


@section('content')

    <div class="w-75 mx-auto">
        <h3 class="mb-3"><i class="far fa-list me-1"></i> Schedule</h3>
        <p>A breakdown of what you've got going on now and coming up.</p>

        @if(count($overdue))
            <div class="py-3">
                <h5><i class="fas fa-exclamation-circle text-danger me-1"></i> Overdue</h5>
                @foreach($overdue as $overdue_task)
                    <x-task :task="$overdue_task"></x-task>
                @endforeach
            </div>
        @endif

        <div id="schedule-list">
            @include('schedule-list')
        </div>

        <div class="d-flex justify-content-center">
            <button class="loadMore btn bg-s_theme text-white px-5"><i class="far fa-long-arrow-down me-2"></i> Load more</button>
        </div>

    </div>
    <script>
        $(document).on("click", ".addSched", function () {
            $("#due_date").val($(this).data("date"));
        });
    </script>

    <script>
        let page = 1;
        $(".loadMore").on("click", function () {
            $(this).addClass("disabled").html('<i class="fas fa-spinner-third mx-4 fa-spin"></i>');
            page++;
            $.ajax({
                url: "/schedule/",
                data: {
                    page: page
                },
                type: "GET",
                return: "html",
                success: function (result) {
                    $(".loadMore").removeClass("disabled").html('<i class="far fa-long-arrow-down me-2"></i> Load more');
                    $("#schedule-list").append(result);
                }
            });
        });
    </script>

@endsection
