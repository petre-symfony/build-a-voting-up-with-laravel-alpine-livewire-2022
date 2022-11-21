<x-modal-confirm
    livewire-event-to-open-modal="markAsNotSpamCommentWasSet"
    event-to-close-modal="commentWasMarkedAsNotSpam"
    modal-title="Mark Comment as Not Spam"
    modal-description="Are you sure you want to mark this comment as NOT spam? This will reset the spam counter to 0"
    modal-confirm-button-text="Mark as Not Spam"
    wire-click="markAsNotSpam"
/>
