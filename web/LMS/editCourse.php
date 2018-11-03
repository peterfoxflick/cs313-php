<?php include './partials/db.php';?>


<?php

$course_id = $_GET['id'];


$contents = get_all_content($course_id);
$name = get_course_data($course_id);


 ?>


 <?php include './partials/header.php';?>
 <?php include './partials/navbar.php';?>


 <div class="container">
   <div class="col">
     <div class="row">
       <h1><?php echo $name ?></h1>
     </div>
     <div class="row">
       <ul class="list-group" id="list">
         <?php foreach($contents as $content): ?>
           <?php echo "<li id='{$content['id']}'><a href='./content.php?id={$content['id']}' class='list-group-item list-group-item-action'>{$content['name']}</a></li>" ?>
          <?php endforeach; ?>
       </ul>
      </div>
    </div>
    <form action="controller/editCourse.php" method="POST">
      <input type="hidden" id="savedData" value="" name="newOrder" />
      <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Save">

    </form>  </div>





 <?php include './partials/footer.php';?>
 <script>


 function save(){
   var list = document.getElementById('list');
   var ids = list.querySelectorAll('*[id]');
   document.getElementById('savedData').value = ids;
 }



 var el = document.getElementById('list');
 Sortable.create(el, {
 	group: "localStorage-example",
 	store: {
 		/**
 		 * Get the order of elements. Called once during initialization.
 		 * @param   {Sortable}  sortable
 		 * @returns {Array}
 		 */
 		get: function (sortable) {
 			var order = localStorage.getItem(sortable.options.group.name);
 			return order ? order.split('|') : [];
 		},

 		/**
 		 * Save the order of elements. Called onEnd (when the item is dropped).
 		 * @param {Sortable}  sortable
 		 */
 		set: function (sortable) {
 			var order = sortable.toArray();
 			localStorage.setItem(sortable.options.group.name, order.join('|'));
      save();
 		}
 	}
 })
 </script>



 </body>
 </html>
