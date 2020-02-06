  <?php require_once(TEMPLATEPATH . '/framework/admin/allBreadcrumbs/arrowcrumbs.php'); ?>

  <div class="uou-block-3d">
    <div class="container">
      
      <ul class="breadcrumbs-secondary">
          <?php if (function_exists("medicaldirectory_arrow_breadcrumb")) {
                  medicaldirectory_arrow_breadcrumb();
                } 
          ?>  
      </ul>
    </div>
  </div> <!-- end .uou-block-3b -->