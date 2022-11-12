<form action="" method="POST" class="space-y-4 px-4 py-6">
    <div>
        <input type="text"
               class="w-full bg-gray-100 rounded-xl placeholder-gray-900 px-4 py-2 border-none text-sm"
               placeholder="Your Idea"
        >
    </div>
    <div>
        <select name="category_add" id="category_add" class="w-full rounded-xl border-none bg-gray-100 text-sm px-4 py-2">
            <option value="Category One">Category One</option>
            <option value="Category Two">Category Two</option>
            <option value="Category Three">Category Three</option>
            <option value="Category Four">Category Four</option>
        </select>
    </div>
    <div>
        <textarea
            name="idea" id="idea" cols="30" rows="4"
            class="w-full bg-gray-100 rounded-xl placeholder-gray-900 text-sm px-4 py-2 border-none"
            placeholder="Describe your idea"
        ></textarea>
    </div>
    <div class="flex items-center justify-between space-x-3">
        <button
            type="button"
            class="flex items-center justify-center w-1/2 h-11
                text-xs bg-gray-200 font-semibold rounded-xl
                border border-gray-200 hover:border-gray-400
                transition duration-150 ease-in px-6 py-3
            "
        >
            <svg class="text-gray-600 w-4 transform -rotate-45" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
            </svg>
            <span class="ml-1">Attach</span>
        </button>

        <button
            type="submit"
            class="flex items-center justify-center w-1/2 h-11
                text-xs text-white bg-blue font-semibold rounded-xl
                border border-blue hover:bg-blue-hover
                transition duration-150 ease-in px-6 py-3
            "
        >
            <span class="ml-1">Submit</span>
        </button>
    </div>
</form>
