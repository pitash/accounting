
<?php
$item=DB::table('settings')->where('id',1)->first();

$menu=DB::table('menus')->where('parent_id',0)->where('menu_type','!=',3)->orderBy('menu_order','ASC')->get();

 ?>
 <aside id="aside" class="app-aside hidden-xs bg-dark">
     <div class="aside-wrap">
       <div class="navi-wrap">
         <!-- user -->
         <div class="clearfix hidden-xs text-center hide" id="aside-user">
           <div class="dropdown wrapper">
             <a href="app.page.profile">
               <span class="thumb-lg w-auto-folded avatar m-t-sm">
                 <img src="{{ asset('logo/'.$item->company_logo) }}" class="img-full img-responsive" alt="...">
               </span>
             </a>
             <a href="#" data-toggle="dropdown" class="dropdown-toggle hidden-folded">
               <span class="clear">
                 <span class="block m-t-sm">
                   <strong class="font-bold text-lt">{{Auth::user()->name}}</strong>
                   <b class="caret"></b>
                 </span>
                 <span class="text-muted text-xs block">Art Director</span>
               </span>
             </a>
             <!-- / dropdown -->
           </div>
           <div class="line dk hidden-folded"></div>
         </div>
         <!-- / user -->

         <!-- nav -->
         <nav ui-nav class="navi clearfix">
           <ul class="nav">
             <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
               <span>Navigation</span>
             </li>

@foreach($menu as $m)


             <li>
               @if($m->url==null)
               <a href= "" class="auto">
                 @if($m->menu_type == '1')
                 <span class="pull-right text-muted">
                   <i class="fa fa-fw fa-angle-right text"></i>
 @endif
                   <i class="fa fa-fw fa-angle-down text-active"></i>

                 </span>
                 <i class="glyphicon glyphicon-stats icon text-primary-dker"></i>
                 <span class="font-bold">{{$m->title}} </span>
               </a>
               @else
                     <a href= "{{route($m->url)}}" class="auto">
                 <span class="pull-right text-muted">
                   <!-- <i class="fa fa-fw fa-angle-right text"></i>
                   <i class="fa fa-fw fa-angle-down text-active"></i> -->
                 </span>
                 <i class="glyphicon glyphicon-stats icon text-primary-dker"></i>
                 <span class="font-bold">{{$m->title}} </span>
               </a>
           @endif

<?php $sub=DB::table('menus')->where('parent_id',$m->id)->where('menu_type','!=',3)->orderBy('menu_order','ASC')->get();?>


@if(!empty($sub))

@foreach($sub as $sm)
               <ul class="nav nav-sub dk">


                 <li>
                   <a href="{{route($sm->url)}}" >
                     <span>{{$sm->title}}</span>
                   </a>
                 </li>

               </ul>
               @endforeach
@endif


             </li>



@endforeach

             <li class="line dk hidden-folded"></li>

           </ul>
         </nav>
         <!-- nav -->

         <!-- aside footer -->
         
         <!-- / aside footer -->
       </div>
     </div>
 </aside>
