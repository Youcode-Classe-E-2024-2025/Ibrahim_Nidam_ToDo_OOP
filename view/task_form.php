<?php include("sections/header.php") ?>


<section id="form"class="items-center justify-center bg-gray-100 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">

<form method="POST" action="?action=create" class="bg-white p-8 rounded-lg shadow-md w-full max-w-md md:max-w-lg space-y-6">
    <div class="flex items-center space-x-4">
        <label for="title" class="w-24 text-gray-700 font-semibold">Title:</label>
        <input
            type="text"
            name="title"
            id="title"
            maxlength="16"
            required
            class="flex-1 px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
    </div>

    <div class="flex items-center space-x-4">
        <label for="description" class="w-24 text-gray-700 font-semibold">Description:</label>
        <textarea
            name="description"
            id="description"
            maxlength="100"
            class="flex-1 px-4 py-2 border border-gray-300 rounded resize-none h-24 focus:outline-none focus:ring-2 focus:ring-blue-500"
        ></textarea>
    </div>

    <div class="flex items-center space-x-4">
        <label for="due_date" class="w-24 text-gray-700 font-semibold">Due Date:</label>
        <input
            type="date"
            name="due_date"
            id="due_date"
            required
            class="flex-1 px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
    </div>

    <div class="flex items-center space-x-4">
        <label class="w-24 text-gray-700 font-semibold">Time:</label>
        <div class="flex flex-1 space-x-2">
            <select
                name="due_time_hh"
                id="due_time_hh"
                required
                class="w-1/2 px-2 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
                <option value="HH">HH</option>
                <?php for ($i = 0; $i < 24; $i++): ?>
                    <option value="<?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>"><?= str_pad($i, 2, '0', STR_PAD_LEFT) ?></option>
                <?php endfor; ?>
            </select>
            <select
                name="due_time_mm"
                id="due_time_mm"
                required
                class="w-1/2 px-2 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
                <option value="MM">MM</option>
                <?php for ($i = 0; $i < 60; $i++): ?>
                    <option value="<?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>"><?= str_pad($i, 2, '0', STR_PAD_LEFT) ?></option>
                <?php endfor; ?>
            </select>
        </div>
    </div>

    <div class="flex items-center space-x-4">
        <label class="w-24 text-gray-700 font-semibold">Priority:</label>
        <div class="flex flex-1 justify-between">
            <input type="radio" name="priority" value="high" id="priority-high" required>
            <label for="priority-high" class="text-red-500">High</label>
            <input type="radio" name="priority" value="medium" id="priority-medium" required>
            <label for="priority-medium" class="text-orange-400">Medium</label>
            <input type="radio" name="priority" value="low" id="priority-low" required>
            <label for="priority-low" class="text-green-500">Low</label>
        </div>
    </div>
            <div class="flex items-center space-x-4">
            <label class="w-24 text-gray-700 font-semibold">Status:</label>
            <select
                name="status"
                id="status"
                required
                class="flex-1 px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
                <option value="To Do">To Do</option>
                <option value="Doing">Doing</option>
                <option value="Review">Review</option>
                <option value="Done">Done</option>
            </select>
        </div>

    <div class="flex justify-end mt-6">

        <button
            type="submit"
            class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300"
        >
            Add Task
        </button>
    </div>
</form>
</section>
<?php include("sections/footer.php") ?>