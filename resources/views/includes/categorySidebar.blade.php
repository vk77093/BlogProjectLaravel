<div class="well">
    <h4>Blog Categories</h4>

    <div class="row">
        <div class="col-lg-6">
          @if($postCategory)
          @foreach($postCategory as $cat)
            <ul class="list-unstyled">
                <li><a href="#">{{$cat->name}}</a>
                </li>

            </ul>

        </div>

        <!-- /.col-lg-6 -->
        <div class="col-lg-6">
          @endforeach
          @endif
        </div>

        <!-- /.col-lg-6 -->
    </div>

    <!-- /.row -->
</div>
