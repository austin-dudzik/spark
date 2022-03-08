@section('title', 'Schedule')

@extends('layouts.app')


@section('content')

    <style>
        :root {
            --user-theme-bg-color: {{\Illuminate\Support\Facades\Auth::user()->theme}};
        }

        .header {
            background-color: var(--user-theme-bg-color);
        }

        #schedule-list>.card:first-child .card-header
            background-color: var(--user-theme-bg-color);
            color: #fff;
        }

        #schedule-list>.card .fa-star{
            display: none;
        }

        #schedule-list>.card:first-child .fa-star{
            display: inline-block;
        }


    </style>


    <div class="w-75 mx-auto">
        <h3 class="mb-3">Schedule</h3>
    <div id="schedule-list">
    @include('schedule-list')
    </div>

        <button class="loadMore">Load more</button>

    </div>
    <script>
        $(".addSched").on("click", function() {
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
