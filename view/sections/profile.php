<section class="flex flex-col items-center gap-4 sm:flex-row sm:justify-between p-10 border border-b-greyHighLights bg-white">
        <label class="relative block">
            <span class="sr-only">Search</span>
            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
            <img src="assets/src/images/icons/search.svg" class="h-5 w-5 fill-slate-300" />
            </span>
            <input
            class="placeholder:italic placeholder:text-white block bg-lightModeMain w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-darkModeMain focus:ring-sky-500 focus:ring-1 sm:text-sm"
            placeholder="Search for anything..."
            type="text"
            name="search"
            />
        </label>
        <div class="flex gap-2 items-center">
        
        <a href="?action=logout">
            <svg class="cursor-pointer hover:scale-105" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px">
                <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/>
            </svg>
        </a>

            <img
            class="text-black cursor-pointer hover:scale-105"
            src="assets/src/images/icons/settings.svg"
            alt="settings icon"
            />
            <img
            class="text-black cursor-pointer hover:scale-105"
            src="assets/src/images/icons/bell notification.svg"
            alt="notifications icon"
            />
            <img
            src="https://picsum.photos/100"
            alt=""
            class="cursor-pointer rounded-full border border-black w-8 h-8"
            />
            <p class="text-nowrap">Ibrahim Nidam</p>
        </div>
</section>