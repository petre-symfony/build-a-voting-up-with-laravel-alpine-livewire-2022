<x-modal-confirm
    event-to-open-modal="custom-mark-idea-as-not-spam-modal"
    event-to-close-modal="ideaWasMarkedAsNotSpam"
    modal-title="Mark Idea as Not Spam"
    modal-description="Are you sure you want to mark this idea as NOT spam? This will reset the spam counter to 0"
    modal-confirm-button-text="Reset Spam Counter"
    wire-click="markIdeaAsNotSpam"
/>
