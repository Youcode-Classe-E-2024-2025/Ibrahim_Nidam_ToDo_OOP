<?php 
if (!isset($_SESSION['user'])) {
  header("Location: ?action=login");
  exit;
}
?>
<?php include("sections/header.php") ?>
<?php include("sections/profile.php") ?>
<?php include("sections/stats.php") ?>


<section id="kanban" class="min-h-screen p-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 justify-items-center sm:justify-items-stretch">
  <!-- To Do Column -->
  <div id="todo" class="flex flex-col gap-4 w-full max-w-[320px] sm:w-full sm:max-w-full h-full">
    <div class="flex flex-col gap-4">
      <div class="flex justify-between items-center">
        <div class="flex items-center gap-2">
          <p id="todo-para" class="text-xl font-medium">To Do</p>
          <div id="todo-stats" class="rounded-full border border-black w-8 h-8 text-lightModeMain flex items-center justify-center text-xs">
          <?php echo count(array_filter($tasks, fn($task) => $task['status'] === 'To Do')); ?>
          </div>
        </div>
        <img
          id="more-vert-todo"
          data-para-id="todo-para"
          src="assets/src/images/icons/more vert points.svg"
          alt="More options"
          class="more-vert text-black cursor-pointer h-6 w-6"
        />
      </div>
      <a
        href="?action=create_form"
        data-status-id="todo"
        class=" text-white bg-lightModeMain p-2 rounded text-center hover:bg-opacity-90 transition-colors"
      >+ Add Task</a>
    </div>
    
    <article id="todo-card-article" class="flex flex-col gap-3 flex-1 w-full">
    <?php $doingtasks = array(); foreach ($tasks as $task){ if($task["status"] == 'To Do'){ $doingtasks[] = $task;}} ?>
    <?php if (!empty($doingtasks)): ?>
      <?php foreach ($doingtasks as $doing): ?>
        <div class="dragNdrop cursor-pointer max-w-sm p-4 bg-white rounded-lg shadow-md border border-gray-200">
        <?php if(!empty($doing["tag"])): ?>
            <div class="absolute top-2 right-16 bg-blue-500 text-white text-xs font-semibold px-3 py-1 rounded-full shadow">
              <p><?= $doing["tag"] ?></p>
            </div>
          <?php endif; ?>
            <div class="flex justify-between items-start mb-2">
              <span class="${priority_Class_color} text-sm font-semibold px-2 py-1 rounded-md"><?= $doing["title"] ?></span>
              <a href="?action=delete&id=<?= $doing['id'] ?>">
                <img src="assets/src/images/icons/trash.svg" alt="" class="trash-icon text-black cursor-pointer">
              </a>
            </div>
            <p class="text-greyText text-xs mb-2"><?= date('Y-m-d', strtotime($doing['created_at'])) . " > " . date('Y-m-d', strtotime($doing['due_datetime'])) ?></p>
            <p class="text-sm text-ellipsis overflow-hidden text-gray-700 mb-4"><?= $doing['description']?></p>
        
        <div class="flex justify-between items-center pt-2">
          <div class="flex items-center">
            <div class="flex -space-x-2">
              <img src="https://picsum.photos/100" alt="" class="w-6 h-6 rounded-full border border-black">
              <img src="https://picsum.photos/100" alt="" class="w-6 h-6 rounded-full border border-black">
              <img src="https://picsum.photos/100" alt="" class="w-6 h-6 rounded-full border border-black">
              <div class="cursor-pointer rounded-full border border-black w-6 h-6 bg-lightModeMain text-white flex items-center justify-center text-xs">+3</div>
            </div>
          </div>
          
            <div class="flex items-center gap-4 text-gray-300 text-xs">
                <div class="flex items-center">
                    <img src="assets/src/images/icons/eye visibility.svg" alt="eye icon" class="w-4 h-4 mr-1" />
                    <span>2</span>
                  </div>
                  <div class="flex items-center">
                    <img src="assets/src/images/icons/comment.svg" alt="comment icon" class="w-4 h-4 mr-1" />
                    <span>0</span>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
              <div class="place-holder p-6 bg-white rounded-lg shadow-md border border-gray-200 w-full">
               No Task Yet
              </div>
            <?php endif; ?>
    </article>
  </div>

  <!-- Doing Column -->
  <div id="doing" class="flex flex-col gap-4 w-full max-w-[320px] sm:w-full sm:max-w-full h-full">
    <div class="flex flex-col gap-4">
      <div class="flex justify-between items-center">
        <div class="flex items-center gap-2">
          <p id="doing-para" class="text-xl font-medium">Doing</p>
          <div id="doing-stats" class="rounded-full border border-black w-8 h-8 text-lightModeMain flex items-center justify-center text-xs">
          <?php echo count(array_filter($tasks, fn($task) => $task['status'] === 'Doing')); ?>
          </div>
        </div>
        <img
          data-para-id="doing-para"
          src="assets/src/images/icons/more vert points.svg"
          alt="More options"
          class="more-vert text-black cursor-pointer h-6 w-6"
        />
      </div>
      <a
        href="?action=create_form"
        data-status-id="doing"
        class=" text-white bg-lightModeMain p-2 rounded text-center hover:bg-opacity-90 transition-colors"
      >+ Add Task</a>
    </div>
    
    <article id="doing-card-article" class="flex flex-col gap-3 flex-1 w-full">
    <?php $doingtasks = array(); foreach ($tasks as $task){ if($task["status"] == 'Doing'){ $doingtasks[] = $task;}} ?>
    <?php if (!empty($doingtasks)): ?>
      <?php foreach ($doingtasks as $doing): ?>
        <div class="dragNdrop cursor-pointer max-w-sm p-4 bg-white rounded-lg shadow-md border border-gray-200">
        <?php if(!empty($doing["tag"])): ?>
            <div class="absolute top-2 right-16 bg-blue-500 text-white text-xs font-semibold px-3 py-1 rounded-full shadow">
              <p><?= $doing["tag"] ?></p>
            </div>
          <?php endif; ?>
            <div class="flex justify-between items-start mb-2">
              <span class="${priority_Class_color} text-sm font-semibold px-2 py-1 rounded-md"><?= $doing["title"] ?></span>
              <a href="?action=delete&id=<?= $doing['id'] ?>">
                <img src="assets/src/images/icons/trash.svg" alt="" class="trash-icon text-black cursor-pointer">
              </a>
            </div>
            <p class="text-greyText text-xs mb-2"><?= date('Y-m-d', strtotime($doing['created_at'])) . " > " . date('Y-m-d', strtotime($doing['due_datetime'])) ?></p>
            <p class="text-sm text-ellipsis overflow-hidden text-gray-700 mb-4"><?= $doing['description']?></p>
        
        <div class="flex justify-between items-center pt-2">
          <div class="flex items-center">
            <div class="flex -space-x-2">
              <img src="https://picsum.photos/100" alt="" class="w-6 h-6 rounded-full border border-black">
              <img src="https://picsum.photos/100" alt="" class="w-6 h-6 rounded-full border border-black">
              <img src="https://picsum.photos/100" alt="" class="w-6 h-6 rounded-full border border-black">
              <div class="cursor-pointer rounded-full border border-black w-6 h-6 bg-lightModeMain text-white flex items-center justify-center text-xs">+3</div>
            </div>
          </div>
          
            <div class="flex items-center gap-4 text-gray-300 text-xs">
                <div class="flex items-center">
                    <img src="assets/src/images/icons/eye visibility.svg" alt="eye icon" class="w-4 h-4 mr-1" />
                    <span>2</span>
                  </div>
                  <div class="flex items-center">
                    <img src="assets/src/images/icons/comment.svg" alt="comment icon" class="w-4 h-4 mr-1" />
                    <span>0</span>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
              <div class="place-holder p-6 bg-white rounded-lg shadow-md border border-gray-200 w-full">
               No Task Yet
              </div>
            <?php endif; ?>
    </article>
  </div>

  <!-- Review Column -->
  <div id="review" class="flex flex-col gap-4 w-full max-w-[320px] sm:w-full sm:max-w-full h-full">
    <div class="flex flex-col gap-4">
      <div class="flex justify-between items-center">
        <div class="flex items-center gap-2">
          <p id="review-para" class="text-xl font-medium">Review</p>
          <div id="review-stats" class="rounded-full border border-black w-8 h-8 text-lightModeMain flex items-center justify-center text-xs">
          <?php echo count(array_filter($tasks, fn($task) => $task['status'] === 'Review')); ?>
          </div>
        </div>
        <img
          data-para-id="review-para"
          src="assets/src/images/icons/more vert points.svg"
          alt="More options"
          class="more-vert text-black cursor-pointer h-6 w-6"
        />
      </div>
      <a href="?action=create_form" data-status-id="review" class="text-white bg-lightModeMain p-2 rounded text-center hover:bg-opacity-90 transition-colors">+ Add Task</a>

    </div>
    
    <article id="review-card-article" class="flex flex-col gap-3 flex-1 w-full">
    <?php $doingtasks = array(); foreach ($tasks as $task){ if($task["status"] == 'Review'){ $doingtasks[] = $task;}} ?>
    <?php if (!empty($doingtasks)): ?>
      <?php foreach ($doingtasks as $doing): ?>
        <div class="dragNdrop cursor-pointer max-w-sm p-4 bg-white rounded-lg shadow-md border border-gray-200">
        <?php if(!empty($doing["tag"])): ?>
            <div class="absolute top-2 right-16 bg-blue-500 text-white text-xs font-semibold px-3 py-1 rounded-full shadow">
              <p><?= $doing["tag"] ?></p>
            </div>
          <?php endif; ?>
            <div class="flex justify-between items-start mb-2">
              <span class="${priority_Class_color} text-sm font-semibold px-2 py-1 rounded-md"><?= $doing["title"] ?></span>
              <a href="?action=delete&id=<?= $doing['id'] ?>">
                <img src="assets/src/images/icons/trash.svg" alt="" class="trash-icon text-black cursor-pointer">
              </a>
            </div>
            <p class="text-greyText text-xs mb-2"><?= date('Y-m-d', strtotime($doing['created_at'])) . " > " . date('Y-m-d', strtotime($doing['due_datetime'])) ?></p>
            <p class="text-sm text-ellipsis overflow-hidden text-gray-700 mb-4"><?= $doing['description']?></p>
        
        <div class="flex justify-between items-center pt-2">
          <div class="flex items-center">
            <div class="flex -space-x-2">
              <img src="https://picsum.photos/100" alt="" class="w-6 h-6 rounded-full border border-black">
              <img src="https://picsum.photos/100" alt="" class="w-6 h-6 rounded-full border border-black">
              <img src="https://picsum.photos/100" alt="" class="w-6 h-6 rounded-full border border-black">
              <div class="cursor-pointer rounded-full border border-black w-6 h-6 bg-lightModeMain text-white flex items-center justify-center text-xs">+3</div>
            </div>
          </div>
          
            <div class="flex items-center gap-4 text-gray-300 text-xs">
                <div class="flex items-center">
                    <img src="assets/src/images/icons/eye visibility.svg" alt="eye icon" class="w-4 h-4 mr-1" />
                    <span>2</span>
                  </div>
                  <div class="flex items-center">
                    <img src="assets/src/images/icons/comment.svg" alt="comment icon" class="w-4 h-4 mr-1" />
                    <span>0</span>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
              <div class="place-holder p-6 bg-white rounded-lg shadow-md border border-gray-200 w-full">
               No Task Yet
              </div>
            <?php endif; ?>
    </article>
  </div>

  <!-- Done Column -->
  <div id="done" class="flex flex-col gap-4 w-full max-w-[320px] sm:w-full sm:max-w-full h-full">
    <div class="flex flex-col gap-4">
      <div class="flex justify-between items-center">
        <div class="flex items-center gap-2">
          <p id="done-para" class="text-xl font-medium">Done</p>
          <div id="done-stats" class="rounded-full border border-black w-8 h-8 text-lightModeMain flex items-center justify-center text-xs">
          <?php echo count(array_filter($tasks, fn($task) => $task['status'] === 'Done')); ?>
          </div>
        </div>
        <img
          data-para-id="done-para"
          src="assets/src/images/icons/more vert points.svg"
          alt="More options"
          class="more-vert text-black cursor-pointer h-6 w-6"
        />
      </div>
      <a href="?action=create_form" data-status-id="done" class=" text-white bg-lightModeMain p-2 rounded text-center hover:bg-opacity-90 transition-colors"> + Add Task</a>

    </div>
    
    <article id="done-card-article" class="flex flex-col gap-3 flex-1 w-full">
    <?php $doingtasks = array(); foreach ($tasks as $task){ if($task["status"] == 'Done'){ $doingtasks[] = $task;}} ?>
    <?php if (!empty($doingtasks)): ?>
      <?php foreach ($doingtasks as $doing): ?>
        <div class="dragNdrop cursor-pointer max-w-sm p-4 bg-white rounded-lg shadow-md border border-gray-200">
          <?php if(!empty($doing["tag"])): ?>
            <div class="absolute top-2 right-16 bg-blue-500 text-white text-xs font-semibold px-3 py-1 rounded-full shadow">
              <p><?= $doing["tag"] ?></p>
            </div>
          <?php endif; ?>
            <div class="flex justify-between items-start mb-2">
              <span class="${priority_Class_color} text-sm font-semibold px-2 py-1 rounded-md"><?= $doing["title"] ?></span>
              <a href="?action=delete&id=<?= $doing['id'] ?>">
                <img src="assets/src/images/icons/trash.svg" alt="" class="trash-icon text-black cursor-pointer">
              </a>
            </div>
            <p class="text-greyText text-xs mb-2"><?= date('Y-m-d', strtotime($doing['created_at'])) . " > " . date('Y-m-d', strtotime($doing['due_datetime'])) ?></p>
            <p class="text-sm text-ellipsis overflow-hidden text-gray-700 mb-4"><?= $doing['description']?></p>
        
        <div class="flex justify-between items-center pt-2">
          <div class="flex items-center">
            <div class="flex -space-x-2">
              <img src="https://picsum.photos/100" alt="" class="w-6 h-6 rounded-full border border-black">
              <img src="https://picsum.photos/100" alt="" class="w-6 h-6 rounded-full border border-black">
              <img src="https://picsum.photos/100" alt="" class="w-6 h-6 rounded-full border border-black">
              <div class="cursor-pointer rounded-full border border-black w-6 h-6 bg-lightModeMain text-white flex items-center justify-center text-xs">+3</div>
            </div>
          </div>
          
            <div class="flex items-center gap-4 text-gray-300 text-xs">
                <div class="flex items-center">
                    <img src="assets/src/images/icons/eye visibility.svg" alt="eye icon" class="w-4 h-4 mr-1" />
                    <span>2</span>
                  </div>
                  <div class="flex items-center">
                    <img src="assets/src/images/icons/comment.svg" alt="comment icon" class="w-4 h-4 mr-1" />
                    <span>0</span>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
              <div class="place-holder p-6 bg-white rounded-lg shadow-md border border-gray-200 w-full">
               No Task Yet
              </div>
            <?php endif; ?>
    </article>
  </div>
</section>
<?php include("sections/footer.php") ?>