@can('update', $idea)
    <!-- @push('modals') -->
    <livewire:edit-idea :idea="$idea"/>
    <!-- @endpush -->
@endcan

@can('delete', $idea)
    <livewire:delete-idea :idea="$idea"/>
@endcan

@auth
    <livewire:mark-idea-as-spam :idea="$idea"/>
@endauth

@admin
    @if ($idea->spam_reports > 0)
        <livewire:mark-idea-as-not-spam :idea="$idea"/>
    @endif
@endadmin

@auth
    <livewire:edit-comment />
@endauth

@auth
    <livewire:delete-comment />
@endauth

@auth
    <livewire:mark-comment-as-spam />
@endauth
