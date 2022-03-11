<a href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside" class="menu-link text-decoration-none">
    <i class="fas fa-sliders-h"></i> View
</a>
<div class="dropdown-menu">
    <form method="post" action="{{url('updateView')}}">
        <div class="dropdown-header">
            <h6 class="mb-1">Customize your view</h6>
            <p>View your tasks in a whole new way. Sort, order,<br> and choose a new layout.</p>
        </div>
        <div class="px-4">
            @csrf
            @method('put')

            <label for="sort_by">Sort by</label>
            <select class="form-select mb-2" name="sort_by" id="sort_by">
                <option value="due_date">Due date</option>
                <option value="alphabetically" {{$view->sort_by == 'alphabetically' ? 'selected' : '' }}>
                    Alphabetically
                </option>
                <option value="date_added" {{$view->sort_by == 'date_added' ? 'selected' : '' }}>Date added</option>
                <option value="date_updated" {{$view->sort_by == 'date_updated' ? 'selected' : '' }}>Date updated
                </option>
            </select>

            <label for="order">Order</label>
            <select class="form-select" name="order" id="order">
                <option value="asc" {{$view->order_by == 'asc' ? 'selected' : '' }}>Ascending</option>
                <option value="desc" {{$view->order_by == 'desc' ? 'selected' : '' }}>Descending</option>
            </select>

            <div class="btn-group mt-3 w-100">
                <input type="radio" class="btn-check" name="view" value="list"
                       id="list" {{$view->task_view == 'list' ? 'checked' : '' }}>
                <label class="btn btn-outline-primary" for="list">
                    <i class="fas fa-list"></i> List</label>

                <input type="radio" class="btn-check" name="view" value="grid"
                       id="grid" {{$view->task_view == 'grid' ? 'checked' : '' }}>
                <label class="btn btn-outline-primary" for="grid">
                    <i class="fas fa-grid"></i> Grid</label>

                <input type="radio" class="btn-check" name="view" value="table"
                       id="table" {{$view->task_view == 'table' ? 'checked' : '' }}>
                <label class="btn btn-outline-primary" for="table">
                    <i class="fas fa-table"></i> Table</label>
            </div>

            <button type="submit" class="btn btn-dark btn-block my-3 w-100">Apply view<i
                    class="far fa-long-arrow-right ms-2"></i></button>
        </div>
    </form>
</div>
