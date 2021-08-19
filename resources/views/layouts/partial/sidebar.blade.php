<div class="d-flex flex-column flex-shrink-0 p-3 bg-light">
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="{{ route('category.index') }}" class="nav-link {{ request()->is('category') ? 'active' : 'link-dark' }}">
          Categories
        </a>
      </li>
      <hr>
      <li>
        <a href="{{ route('article.index') }}" class="nav-link {{ request()->is('article') ? 'active' : 'link-dark' }}">
          Articles
        </a>
      </li>
    </ul>
    <hr>
  </div>