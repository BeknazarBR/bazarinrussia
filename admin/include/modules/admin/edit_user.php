<?php
if( !defined('unisitecms') ) exit;


 $array_data = findOne("uni_admin","id=?", array($id));
 if(count($array_data) == 0){
     exit();
 }

?>
 
<div class="row">
   <div class="page-header">
      <div class="d-flex align-items-center">
         <h2 class="page-header-title"><?php echo $array_data->fio; ?></h2>
      </div>
   </div>
</div>

<div class="row" >
   <div class="col-lg-12" >

      <div class="widget has-shadow">

         <div class="widget-body">

          <br>

            <form class="form-data" >

              <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-3 form-control-label">Фото</label>
                <div class="col-lg-7">

                   <?php echo img( array( "img1" => array( "class" => "change-img", "path" => $config["media"]["other"] . "/" . $array_data->image, "width" => "60px" ), "img2" => array( "class" => "change-img", "path" => $config["media"]["other"] . "/icon_photo_add.png", "width" => "60px" ) ) ); ?>

                   <input type="file" class="input-img" name="image" >

                </div>
              </div>

              <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-3 form-control-label">Имя</label>
                <div class="col-lg-5">
                     <input type="text" class="form-control" name="name" value="<?php echo $array_data->fio; ?>" >
                </div>
              </div>
 
              <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-3 form-control-label">Роль</label>
                <div class="col-lg-5">
                     <select name="role" class="selectpicker select-role" >
                        <option value="0" >Не выбрано</option>
                        <?php
                        $roles = $Admin->adminRole();
                        foreach ($roles as $key => $value) {
                           ?>
                             <option value="<?php echo $key; ?>" <?php if($array_data->role == $key){ echo ' selected=""'; } ?> ><?php echo $value; ?></option>
                           <?php
                        }
                        ?>
                     </select>
                </div>
              </div>

              <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-3 form-control-label">Телефон</label>
                <div class="col-lg-5">
                     <?php if($_SESSION["cp_control_admin"]){ ?>
                     <input type="text" class="form-control" name="phone" value="<?php echo $array_data->phone; ?>" >
                     <?php }else{ ?>
                      -
                     <?php } ?>
                </div>
              </div>

              <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-3 form-control-label">Email</label>
                <div class="col-lg-5">
                     <?php if($_SESSION["cp_control_admin"]){ ?>
                     <input type="text" class="form-control" name="email" value="<?php echo $array_data->email; ?>" >
                     <?php }else{ ?>
                      -
                     <?php } ?>
                </div>
              </div>

              <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-3 form-control-label">Пароль</label>
                <div class="col-lg-5">
                     <input type="text" class="form-control" name="pass" >
                </div>
              </div>              

              <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-3 form-control-label"></label>
                <div class="col-lg-5">
                   <h3 style="margin-top: 15px" >Привилегии 
                    <div class="btn-group btn-group-toggle" style="margin-left: 10px;" data-toggle="buttons">
                       <label class="btn btn-light btn-sm">
                       <input type="radio" id="option-toggle-privileges1" autocomplete="off"> Выбрать всё
                       </label>
                       <label class="btn btn-light btn-sm">
                       <input type="radio" id="option-toggle-privileges2" autocomplete="off"> Снять всё
                       </label>
                    </div>
                   </h3><hr>



                </div>
              </div>


               <?php
                  $get = getAll("SELECT * FROM uni_privileges");
                  foreach($get AS $result){
                    
                    if($array_data->privileges) if(in_array($result["value"],explode(",",$array_data->privileges))){ $chk = 'checked=""'; }else{ $chk = ''; }
                                                                  
                      $arr[$result["uid"]][$result["main_title"]][] = '
                      <div class="styled-checkbox">
                        <input type="checkbox" class="checkbox-privileges" '.$chk.' name="privileges[]" value="'.$result["value"].'" id="'.$result["value"].'" >
                        <label for="'.$result["value"].'">'.$result["sub_title"].'</label>
                      </div>';

                  }
                  
                  if(count($arr)>0){
                  $out = "";    
                      foreach($arr AS $uid=>$arr2){
                          foreach($arr2 AS $value=>$arr3){
                            $out .= '<div class="form-group row d-flex align-items-center mb-5"><label class="col-lg-3 form-control-label" >'.$value.'</label><div class="col-lg-7">';  
                              foreach($arr3 AS $value2=>$res){
                                 $out .= $res; 
                              }
                            $out .= '</div></div>';  
                          }                            
                      }
                    echo $out;  
                  }
               ?>


              <input type="hidden" name="id" value="<?php echo $id; ?>" >

            </form>

         </div>

      </div>

      <p align="right" >
        <button type="button" class="btn btn-success edit-admin">Сохранить</button>
      </p>
      
   </div>
</div>

<script type="text/javascript" src="include/modules/admin/script.js"></script>
