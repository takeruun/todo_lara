<form action="{{ route('comments.create',[ 'folder' => $folder_id, 'task' => $task_id ])}}" method="POST">
  @csrf
  <div class="form-group">
    <input type="text" class="form-control" name="content" id="content" value="{{ old('content') }}">
  </div>
  <div class="text-right">
    <button class="btn btn-primary" type="submit">送信</button>
  </div>
</form>