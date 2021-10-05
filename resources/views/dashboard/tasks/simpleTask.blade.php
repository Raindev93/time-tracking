<div class="row">
  <div class="col s12">
      <table>
        <thead>
          <tr>
              <th>Title</th>
              <th>Comment</th>
              <th>Date</th>
              <th>Time spent</th>
          </tr>
        </thead>

        <tbody>

          @foreach($tasks as $task)
            <tr>
              <td>
                {{$task->title}}
              </td>
              <td>
                {{$task->comment}}
              </td>
              <td>
                {{$task->date}}
              </td>
              <td>
                {{$task->time_spent}}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div class="row">
  <div class="col s12 center">
      <ul class="pagination">
        <li class="waves-effect"><a href="{{ $tasks->previousPageUrl() }}"><i class="material-icons">chevron_left</i></a></li>
        <li class="active"><a href="#!">{{$tasks->currentPage()}}</a></li>
        <li class="waves-effect"><a href="{{ $tasks->nextPageUrl() }}"><i class="material-icons">chevron_right</i></a></li>
      </ul>
  </div>
</div>