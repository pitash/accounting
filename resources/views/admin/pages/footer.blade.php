  
  
<?php $item=DB::table('settings')->where('id',1)->first();  ?>

  <footer id="footer" class="app-footer" role="footer">
    <div class="wrapper b-t bg-light">
      <span class="pull-right"><a href ui-scroll="app" class="m-l-sm text-muted"><i class="fa fa-long-arrow-up"></i></a></span>
     {{$item->copyright}}
    </div>
  </footer>
