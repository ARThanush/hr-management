<div class="dropdown dropdown-action">
    <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="material-icons">more_vert</i>
    </a>
    <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="javascript:void(0)" data-url="{{ route('projects.edit', ['project' => ($id)]) }}" data-ajax-modal="true" data-title="{{ __('Edit Project') }}" data-size="lg">
            <i class="fa-solid fa-pencil m-r-5"></i> {{ __('Edit') }}
        </a>
        <a class="dropdown-item deleteBtn" data-route="{{ route('projects.destroy', $id) }}" data-title="{{ __('Delete Project') }}" data-question="{{ __('Are you sure you want to delete project?') }}" href="javascript:void(0)">
            <i class="fa-regular fa-trash-can m-r-5"></i> {{ __('Delete') }}
        </a>
    </div>
</div>


