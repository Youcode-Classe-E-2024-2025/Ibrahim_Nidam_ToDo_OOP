
<section id="kanban" class="min-h-screen p-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 justify-items-center sm:justify-items-stretch">
  <!-- To Do Column -->
  <div id="todo" class="flex flex-col gap-4 w-full max-w-[320px] sm:w-full sm:max-w-full h-full">
    <div class="flex flex-col gap-4">
      <div class="flex justify-between items-center">
        <div class="flex items-center gap-2">
          <p id="todo-para" class="text-xl font-medium">To Do</p>
          <div id="todo-stats" class="rounded-full border border-black w-8 h-8 text-lightModeMain flex items-center justify-center text-xs">
            0
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
        href="#"
        data-status-id="todo"
        class="add-Task-btn text-white bg-lightModeMain p-2 rounded text-center hover:bg-opacity-90 transition-colors"
      >+ Add Task</a>
    </div>
    
    <article id="todo-card-article" class="flex flex-col gap-3 flex-1 w-full">
      <div class="place-holder p-6 bg-white rounded-lg shadow-md border border-gray-200 w-full">
        No Task Yet
      </div>
    </article>
  </div>

  <!-- Doing Column -->
  <div id="doing" class="flex flex-col gap-4 w-full max-w-[320px] sm:w-full sm:max-w-full h-full">
    <div class="flex flex-col gap-4">
      <div class="flex justify-between items-center">
        <div class="flex items-center gap-2">
          <p id="doing-para" class="text-xl font-medium">Doing</p>
          <div id="doing-stats" class="rounded-full border border-black w-8 h-8 text-lightModeMain flex items-center justify-center text-xs">
            0
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
        href="#"
        data-status-id="doing"
        class="add-Task-btn text-white bg-lightModeMain p-2 rounded text-center hover:bg-opacity-90 transition-colors"
      >+ Add Task</a>
    </div>
    
    <article id="doing-card-article" class="flex flex-col gap-3 flex-1 w-full">
      <div class="place-holder p-6 bg-white rounded-lg shadow-md border border-gray-200 w-full">
        No Task Yet
      </div>
    </article>
  </div>

  <!-- Review Column -->
  <div id="review" class="flex flex-col gap-4 w-full max-w-[320px] sm:w-full sm:max-w-full h-full">
    <div class="flex flex-col gap-4">
      <div class="flex justify-between items-center">
        <div class="flex items-center gap-2">
          <p id="review-para" class="text-xl font-medium">Review</p>
          <div id="review-stats" class="rounded-full border border-black w-8 h-8 text-lightModeMain flex items-center justify-center text-xs">
            0
          </div>
        </div>
        <img
          data-para-id="review-para"
          src="assets/src/images/icons/more vert points.svg"
          alt="More options"
          class="more-vert text-black cursor-pointer h-6 w-6"
        />
      </div>
      <a
        href="#"
        data-status-id="review"
        class="add-Task-btn text-white bg-lightModeMain p-2 rounded text-center hover:bg-opacity-90 transition-colors"
      >+ Add Task</a>
    </div>
    
    <article id="review-card-article" class="flex flex-col gap-3 flex-1 w-full">
      <div class="place-holder p-6 bg-white rounded-lg shadow-md border border-gray-200 w-full">
        No Task Yet
      </div>
    </article>
  </div>

  <!-- Done Column -->
  <div id="done" class="flex flex-col gap-4 w-full max-w-[320px] sm:w-full sm:max-w-full h-full">
    <div class="flex flex-col gap-4">
      <div class="flex justify-between items-center">
        <div class="flex items-center gap-2">
          <p id="done-para" class="text-xl font-medium">Done</p>
          <div id="done-stats" class="rounded-full border border-black w-8 h-8 text-lightModeMain flex items-center justify-center text-xs">
            0
          </div>
        </div>
        <img
          data-para-id="done-para"
          src="assets/src/images/icons/more vert points.svg"
          alt="More options"
          class="more-vert text-black cursor-pointer h-6 w-6"
        />
      </div>
      <a
        href="#"
        data-status-id="done"
        class="add-Task-btn text-white bg-lightModeMain p-2 rounded text-center hover:bg-opacity-90 transition-colors"
      >+ Add Task</a>
    </div>
    
    <article id="done-card-article" class="flex flex-col gap-3 flex-1 w-full">
      <div class="place-holder p-6 bg-white rounded-lg shadow-md border border-gray-200 w-full">
        No Task Yet
      </div>
    </article>
  </div>
</section>