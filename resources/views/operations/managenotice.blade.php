@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><i class="nav-icon far fa-plus-square"></i> Admin Control</li>
                        <li class="breadcrumb-item"><i class="fas fa-user-friends nav-iconn"></i> User Lists</li>
                        <li class="breadcrumb-item active"><i class="fas fa-user-cog nav-icon"></i> Admin</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Created At</th>
                                        <th style="width: 150px;">Actions</th> <!-- Adjusted width for Actions column -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($notices as $notice)
                                    <tr>
                                        <td>{{ $notice->notice_title }}</td>
                                        <td>{{ $notice->notice_content }}</td>
                                        <td>{{ $notice->created_at }}</td>
                                        <td>
                                            <div class="d-flex justify-content-between">
                                                <button class="btn btn-warning btn-sm mr-1" onclick="showEditModal({{ $notice->id }})">Edit</button>
                                                <form method="post" action="{{ '/deletenotice/' . $notice->id }}" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Notice</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editForm" action="" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="editTitle">Title</label>
                        <input type="text" class="form-control" id="editTitle" name="notice_title" required>
                    </div>
                    <div class="form-group">
                        <label for="editContent">Content</label>
                        <input type="text" class="form-control" id="editContent" name="notice_content" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="js/app.js"></script>

<script>
    function showEditModal(noticeId) {
        console.log('Opening edit modal for notice with ID:', noticeId);
        // Fetch notice data from server and fill in modal fields
        $.get('/notices/' + noticeId, function(data) {
            $('#editForm').attr('action', '/notices/' + noticeId);
            $('#editTitle').val(data.notice_title);
            $('#editContent').val(data.notice_content);
            $('#editModal').modal('show');
        });
    }
</script>

@endsection
