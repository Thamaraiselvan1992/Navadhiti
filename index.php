<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
    <style>
      .error{
        color:red;
      }
    </style>

   <div class="col-md-6 offset-md-3 mt-5">
    <a target="_blank" href="https://www.navadhiti.com/">
       <img src='https://www.navadhiti.com/assets/img/logo-small.svg'>
     </a>
     <br>
   
     <form  action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data">
       
       <div class="form-group mt-3">
        <div class="row">
            <div class="col-md-10"> <label class="mr-2">Upload your CV:</label>
                <input type="file" name="file" accept="application/JSON" required></div>
                <div class="col-md-2"> <button type="submit" class="btn btn-primary">Import</button></div>
        </div>
       
        
       </div>
       
       <hr>
      
     </form>
     <?php 
     
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
      //  echo "<pre>";
      $filedata = $fileContent = file_get_contents($_FILES['file']['tmp_name']);
      $details = json_decode($filedata);
      // print_r($details);
      if(!empty($details) && isset($details->fields) && !empty($details->fields)){
        usort($details->fields, function($a, $b) {
          return $a->order - $a->order;
      });
        echo '<form action="formSubmit.php" method="POST">';
        foreach($details->fields as $key =>$formData){ ?>
         <div class="row pt-3">
         <div class='col-md-4'><label for="<?=$formData->label;?>"><?=$formData->label;?><?php if(isset($formData->unit)){  echo ' (<small>'.$formData->unit.'</small>)';}?><?php if(isset($formData->isRequired)){ if($formData->isRequired==1){ echo '<span class="error">*</span>';}}?></label></div>
         <div class='col-md-8'>
           <?php if($formData->type !='dropdown' && $formData->type !='textarea' && $formData->type !='checkbox' && $formData->type !='radio'){?>
           <input type="<?=$formData->type;?>" name='<?=$formData->key;?>' class='form-control' <?php if(isset($formData->isRequired)){ if($formData->isRequired==1){ echo 'required';}}?> <?=($formData->isReadonly==1)?'readonly':'';?> >
          <?php }else if($formData->type =='dropdown'){?>
           
            <select name='<?=$formData->key;?>' class='form-control' <?php if(isset($formData->isRequired)){ if($formData->isRequired==1){ echo 'required';}}?> <?=($formData->isReadonly==1)?'readonly':'';?> >
              <option value=''>----SELECT-----</value>
            <?php foreach($formData->items as $opt){ ?>
              <option value='<?=$opt->value;?>'><?=$opt->text;?></option>

            <?php } ?>
          </select>
          <?php }?>
          </div>
         </div>
      <?php  }
      
      echo '<div class="pt-3"><button type="submit" class="btn btn-success float-right ">Submit</button></div>';
        echo '</form>';
      }
     }
     
     ?>
 </div> 
 

</body>
</html>