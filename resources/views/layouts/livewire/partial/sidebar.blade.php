<div class="d-flex flex-column flex-shrink-0 p-3 bg-light">
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="{{ route('backend.category.livewire') }}" class="nav-link {{ request()->is('livewire/categories') ? 'active' : 'link-dark' }}">
          Categories
        </a>
      </li>
      <hr>
      <li>
        <a href="{{ route('backend.article.livewire') }}" class="nav-link {{ request()->is('livewire/articles') ? 'active' : 'link-dark' }}">
          Articles
        </a>
      </li>
    </ul>
    <hr>
  </div>