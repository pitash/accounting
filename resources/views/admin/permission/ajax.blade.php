            <table id="pattern-type-data" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Menu Title</th>
                        <th>
                            View

                        </th>
                        <th>
                            Create

                        </th>
                        <th>
                            Edit

                        </th>
                        <th>
                            Delete
                            
                        </th>
                        <th>
                            Own

                        </th>
                    </tr>
                </thead>
                <tbody>


                    @foreach($menu as $item)
                    <tr>
                        <?php    $permission=DB::table('permissions')->where('role_id',$role_id)->where('menu_id',$item->id)->first(); ?>
                        <td>
                            {{$item->title}}
                            <input type="hidden" name="iddd[]" value="{{$permission->id}}">
                        </td>


                        <td>

                        <input type="checkbox" id="rtr{{$permission->id}}" onclick="abc('{{$permission->id}}');"  <?php if($permission->view=="on"){echo "checked";} ?>   class="checkBoxClass"  >

                        <input type="hidden" value="{{$permission->view}}"   class="checkBoxClass" id="abc{{$permission->id}}" name="view[]"  >


                        </td>




                        <td>
 
                            <input type="checkbox" id="add{{$permission->id}}" onclick="add('{{$permission->id}}');"  <?php if($permission->add=="on"){echo "checked";} ?> >
 
                            <input type="hidden" value="{{$permission->add}}"   class="checkBoxClass" id="view{{$permission->id}}" name="add[]"  >


                        </td>
                        <td>

                            <input type="checkbox" id="editt{{$permission->id}}" onclick="edit('{{$permission->id}}');"  <?php if($permission->edit=="on"){echo "checked";} ?> >

                    <input type="hidden" value="{{$permission->edit}}"   class="checkBoxClass" id="edit{{$permission->id}}" name="edit[]"  >
                        </td>



                        <td>

                            <input id="deletesdd{{$permission->id}}" onclick="deletesd('{{$permission->id}}');" type="checkbox"  <?php if($permission->delete=="on"){echo "checked";} ?> >

 <input type="hidden" value="{{$permission->delete}}"   class="checkBoxClass" id="delete{{$permission->id}}" name="delete[]"  >
                    

                        </td>




                        <td>

                            <input type="checkbox" id="ownn{{$permission->id}}" onclick="own('{{$permission->id}}');"   <?php if($permission->own=="on"){echo "checked";} ?>>

<input type="hidden" value="{{$permission->own}}"   class="checkBoxClass" id="own{{$permission->id}}" name="own[]"  >
                        </td>

                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="6">
                            <input type="submit"  class="btn btn-primary btn-lg" style="padding: 5px 70px;float: right;" value="Submit">


                        </td>
                    </tr>

                </tbody>








                <input type="hidden" name="rowCount" id="myText">

            </table>


            <script type="text/javascript">

             function abc(id){

               var view=document.getElementById("rtr"+id).checked;

                // alert(id);
               if(view==true){
                // alert('dkf');
                document.getElementById('abc'+id).value='on';
               }else{
                document.getElementById('abc'+id).value=' ';
               }


              

              }


             function add(id){
               var add=document.getElementById("add"+id).checked;
               if(add==true){
               document.getElementById('view'+id).value='on';
           }else{
               document.getElementById('view'+id).value=' ';
           }

              }

             function edit(id){
              var edit=document.getElementById("editt"+id).checked;
               if(edit==true){
               document.getElementById('edit'+id).value='on';
           }else{
              document.getElementById('edit'+id).value=' ';
           }

              }
             function deletesd(id){
                 var deletesdd=document.getElementById("deletesdd"+id).checked;
                 if(deletesdd==true){
               document.getElementById('delete'+id).value='on';
           }else{
              document.getElementById('delete'+id).value=' ';
           }

              }
             function own(id){
                var ownn=document.getElementById("ownn"+id).checked;
                  if(ownn==true){
                     document.getElementById('own'+id).value='on';
                 }else{
                     document.getElementById('own'+id).value=' ';

                 }

              }


       </script>