@props([
    'type' => 'success',
    'redirect' => false,
    'messageToDisplay' => ''
])

<div
    x-data="{
        isOpen: false,
        isError: @if ($type === 'success') false @elseif ($type === 'error') true @endif,
        messageToDisplay: '{{ $messageToDisplay }}',
        showNotification(message) {
            this.isOpen = true
            this.messageToDisplay = message
            setTimeout(() => {
                this.isOpen = false
            }, 5000)
        }
    }"
    x-init="
        @if($redirect)
            $nextTick(() => showNotification(messageToDisplay))
        @else
            livewire.on('ideaWasUpdated', (message) => {
                isError = false
                showNotification(message)
            })
            livewire.on('ideaWasMarkedAsSpam', (message) => {
                isError = false
                showNotification(message)
            })
            livewire.on('ideaWasMarkedAsNotSpam', (message) => {
                isError = false
                showNotification(message)
            })
            livewire.on('statusWasUpdated', (message) => {
                isError = false
                showNotification(message)
            })
            livewire.on('statusWasUpdatedError', (message) => {
                isError = true
                showNotification(message)
            })
            livewire.on('commentWasAdded', (message) => {
                isError = false
                showNotification(message)
            })
            livewire.on('commentWasUpdated', (message) => {
                isError = false
                showNotification(message)
            })
            livewire.on('commentWasDeleted', (message) => {
                isError = false
                showNotification(message)
            })
            livewire.on('commentWasMarkedAsSpam', (message) => {
                isError = false
                showNotification(message)
            })
            livewire.on('commentWasMarkedAsNotSpam', (message) => {
                isError = false
                showNotification(message)
            })
        @endif
    "
    x-cloak
    x-show="isOpen"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-x-8"
    x-transition:enter-end="opacity-100 translate-x-0"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 translate-x-0"
    x-transition:leave-end="opacity-0 translate-x-8"
    @keydown.escape.window="isOpen = false"

    class="
        flex justify-between max-w-xs sm:max-w-sm w-full
        fixed bottom-0 right-0 bg-white rounded-xl shadow-lg border
        px-4 py-5 mx-6 my-8 z-20
    "
>
    <div
        class="flex items-center"
    >

        <svg x-show="!isError" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
        </svg>


        <svg x-show="isError" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>

        <div class="font-semibold text-gray-500 text-sm sm:text-base ml-2" x-text="messageToDisplay"></div>
    </div>
    <button @click="isOpen = false" class="text-gray-400 hover:text-gray-500">
        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>

